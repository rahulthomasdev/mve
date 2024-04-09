<?php

namespace App\Filament\Vendor\Widgets;

use App\Models\Product;
use App\Models\Vendor;
use App\Models\VendorOrder;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Orders', VendorOrder::where('vendor_id', Vendor::where('user_id', auth()->id())->first()->id)->count()),
            Stat::make('Total Products', Product::where('vendor_id', Vendor::where('user_id', auth()->id())->first()->id)->count()),
            Stat::make('Pending Orders', VendorOrder::where('status', 'pending')->where('vendor_id', Vendor::where('user_id', auth()->id())->first()->id)->count())
        ];
    }
}
