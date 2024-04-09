<?php

namespace App\Filament\Vendor\Resources\VendorOrderResource\RelationManagers;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action as ActionsAction;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'orderItems';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_id')
                    ->required()
                    ->default(function (RelationManager $livewire) {
                        return $livewire->getOwnerRecord()->pluck('order_id')->first();
                    }),
                Forms\Components\TextInput::make('vendor_order_id')
                    ->required()
                    ->default(function (RelationManager $livewire) {
                        return $livewire->getOwnerRecord()->pluck('vendor_order_id')->first();
                    }),
                Forms\Components\Select::make('product_id')
                    ->required()
                    ->options(Product::where('vendor_id', Vendor::where('user_id', auth()->id())->first()->id)->pluck('name', 'id')->all()),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('unit_price')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('order_id')
            ->columns([
                Tables\Columns\TextColumn::make('order_id'),
                Tables\Columns\TextColumn::make('product.name'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\ImageColumn::make('product.images')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
                // Tables\Actions\AssociateAction::make(),


            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DissociateAction::make(),
                // Tables\Actions\DeleteAction::make(),
                ActionsAction::make('Product Details')
                    ->icon('heroicon-m-view-columns')
                    ->infolist(
                        [
                            TextEntry::make('product.name')->label("Product Name")->columnSpan(2),
                            ComponentsSection::make('Product Images')
                                ->schema([
                                    ImageEntry::make('product.images')->label(''),
                                ])
                        ]
                    )
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false)
                    ->disabledForm(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DissociateBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
