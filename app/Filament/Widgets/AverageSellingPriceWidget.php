<?php

namespace App\Filament\Widgets;

use App\Models\laptops;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Laptop;

class AverageSellingPriceWidget extends \Filament\Widgets\StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Average Selling Price', number_format(laptops::average('price'), 0))
                ->description('Average price across all laptops.')
        ];
    }
}
