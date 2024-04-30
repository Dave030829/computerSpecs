<?php

namespace App\Filament\Resources\MonitorsResource\Pages;

use App\Filament\Resources\MonitorsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMonitors extends ListRecords
{
    protected static string $resource = MonitorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
