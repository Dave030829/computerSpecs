<?php

namespace App\Filament\Resources\LaptopsResource\Pages;

use App\Filament\Resources\LaptopsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaptops extends ListRecords
{
    protected static string $resource = LaptopsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
