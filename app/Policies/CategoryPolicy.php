<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vendor;

class CategoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update()
    {
        $user =  User::where('id', auth()->id())->first();
        if ($user->role == 'vendor' || $user->role == 'user') {
            return false;
        } else {
            return true;
        }
    }
    public function delete()
    {
        $user =  User::where('id', auth()->id())->first();
        if ($user->role == 'vendor' || $user->role == 'user') {
            return false;
        } else {
            return true;
        }
    }
    public function deleteAny()
    {
        $user =  User::where('id', auth()->id())->first();
        if ($user->role == 'vendor' || $user->role == 'user') {
            return false;
        } else {
            return true;
        }
    }
    public function create()
    {
        $user =  User::where('id', auth()->id())->first();
        if ($user->role == 'vendor' || $user->role == 'user') {
            return false;
        } else {
            return true;
        }
    }
}
