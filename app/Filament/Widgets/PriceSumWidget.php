<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PriceSumWidget extends ChartWidget
{
    protected static ?string $heading = 'Price of pruducts';


    protected function getData(): array
{
    $results = DB::table('price_sum')->first();

    $dataList = [
        $results->price_sum_laptop,
        $results->price_sum_personal_computer,
        $results->price_sum_tablets,
        $results->price_sum_mobile_phones,
        $results->price_sum_tvs,
        $results->price_sum_projectors,
        $results->price_sum_monitors,
    ];

    $labelList = [
        'Laptop',
        'Personal Computer',
        'Tablets',
        'Mobile Phones',
        'TVs',
        'Projectors',
        'Monitors',
    ];

    return [
        'datasets' => [
            [
                'label' => 'Price Sum',
                'data' => $dataList,
            ],
        ],
        'labels' => $labelList,
    ];
}


    protected function getType(): string
    {
        return 'bar';
    }
}
