<?php

namespace App\Filament\Vendor\Resources\VendorOrderResource\Pages;

use App\Filament\Vendor\Resources\VendorOrderResource;
use App\Models\Vendor;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVendorOrder extends CreateRecord
{
    protected static string $resource = VendorOrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $vendor = Vendor::where('user_id', auth()->id())->first();

        if ($vendor) {
            $data['vendor_id'] = $vendor->id;
        } else {
            $data['vendor_id'] = null;
        }
        return $data;
    }
}
