<?php

namespace App\Filament\Vendor\Resources\ProductResource\Pages;

use App\Filament\Vendor\Resources\ProductResource;
use App\Models\Category;
use App\Models\Vendor;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $vendor = Vendor::where('user_id', auth()->id())->first();
        $category = Category::where('category_id', $data['category_id'])->first();

        if ($vendor) {
            $data['vendor_id'] = $vendor->id;
        } else {
            $data['vendor_id'] = null;
        }
        if ($category) {
            $data['category_id'] = $category->category_id;
        } else {
            $data['category_id'] = null;
        }

        return $data;
    }
}
