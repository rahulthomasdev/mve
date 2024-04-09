<?php

namespace App\Filament\Vendor\Widgets;

use App\Models\Vendor;
use App\Models\VendorOrder;
use Filament\Widgets\ChartWidget;

class TotalOrdersBarChart extends ChartWidget
{
    protected static ?string $heading = 'Total Orders';

    protected function getData(): array
    {
        $orders_by_months = VendorOrder::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->where('vendor_id', Vendor::where('user_id', auth()->id())->first()->id)
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Fill missing months with 0
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($orders_by_months[$i])) {
                $orders_by_months[$i] = 0;
            }
        }

        // Sort array by keys (months)
        ksort($orders_by_months);
        return [
            'datasets' => [
                [
                    'label' => 'Total Orders Received',
                    'data' => $orders_by_months,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
