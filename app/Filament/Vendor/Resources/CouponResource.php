<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\CouponResource\Pages;
use App\Filament\Vendor\Resources\CouponResource\RelationManagers;
use App\Models\Coupon;
use App\Models\Vendor;
use App\Utils\CouponUtility;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255)
                    ->default(CouponUtility::class::generateCouponCode()),
                Forms\Components\TextInput::make('discount_percentage')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100),
                Forms\Components\DateTimePicker::make('expiry_date')
                    ->required(),
                Forms\Components\TextInput::make('use_limit')
                    ->required()
                    ->numeric()
                    ->default(1),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_percentage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expiry_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('use_limit')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $vendor = Vendor::where('user_id', auth()->id())->first();
        return parent::getEloquentQuery()->where('vendor_id', $vendor->id);
    }
}
