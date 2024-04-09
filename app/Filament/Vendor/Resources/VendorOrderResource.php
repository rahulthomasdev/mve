<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\VendorOrderResource\Pages;
use App\Filament\Vendor\Resources\VendorOrderResource\RelationManagers;
use App\Filament\Vendor\Resources\VendorOrderResource\RelationManagers\OrderItemsRelationManager;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\VendorOrder;
use App\Utils\OrderUtility;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorOrderResource extends Resource
{
    protected static ?string $model = VendorOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'My Orders';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('vendor_order_no')
                    ->required()
                    ->default(OrderUtility::class::generateUniqueOrderNumber('MVE-V-'))
                    ->disabledOn('edit'),
                Forms\Components\Select::make('order_id')
                    ->label('Order no')
                    ->required()
                    ->options(Order::pluck('order_no', 'id')->all())
                    ->disabledOn('edit'),
                Forms\Components\TextInput::make('shipping_address')
                    ->required()
                    ->maxLength(255)
                    ->disabledOn('edit'),
                Forms\Components\TextInput::make('shipping_method')
                    ->required()
                    ->maxLength(255)
                    ->default('Free')
                    ->disabledOn('edit'),
                Forms\Components\DatePicker::make('expected_delivery_date')
                    ->disabledOn('edit'),
                Forms\Components\Select::make('status')
                    ->required()
                    ->default('pending')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'canceled' => 'Canceled',
                        'delivered' => 'Delivered',
                        'refunded' => 'Refunded',
                        'returned' => 'Returned',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vendor_order_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shipping_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('expected_delivery_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'gray',
                        'shipped' => 'info',
                        'canceled' => 'danger',
                        'delivered' => 'success',
                        'refunded' => 'info',
                        'returned' => 'info',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            OrderItemsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVendorOrders::route('/'),
            'create' => Pages\CreateVendorOrder::route('/create'),
            'edit' => Pages\EditVendorOrder::route('/{record}/edit'),
            'view' => Pages\ViewVendorOrder::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $vendor = Vendor::where('user_id', auth()->id())->first();
        return parent::getEloquentQuery()->where('vendor_id', $vendor->id);
    }
}
