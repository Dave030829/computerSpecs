<?php

namespace App\Filament\Widgets;

use App\Models\laptops;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Laptop;

class TotalInventoryWidget extends \Filament\Widgets\StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Inventory', laptops::sum('in_stock'))
                ->description('Total units available across all models.')
        ];
    }
}
