<?php

namespace App\Filament\Vendor\Resources\CouponResource\Pages;

use App\Filament\Vendor\Resources\CouponResource;
use App\Models\Vendor;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCoupon extends CreateRecord
{
    protected static string $resource = CouponResource::class;
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
