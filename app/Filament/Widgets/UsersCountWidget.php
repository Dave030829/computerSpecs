<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersCountWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('DeviceType', User::query()->count())->label(__('Users')),
        ];
    }
}
