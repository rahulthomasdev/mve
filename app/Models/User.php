<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() == 'admin') {
            return str_ends_with($this->email, '@mve.com') && $this->role == 'admin';
        }
        if ($panel->getId() == 'vendor') {
            return str_ends_with($this->email, '@mve.com') && $this->role == 'vendor';
        }
    }
    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }

    // Define event listener for user creation
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            // Check if the user's role is "vendor"
            if ($user->role === 'vendor') {
                // Create a corresponding entry in the vendor table
                $user->vendor()->create([]);
            }
        });

        static::updated(function ($user) {
            if ($user->isDirty('role') && $user->role == 'vendor') {
                if (!$user->vendor) {
                    $user->vendor()->create([]);
                }
            }
        });
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
