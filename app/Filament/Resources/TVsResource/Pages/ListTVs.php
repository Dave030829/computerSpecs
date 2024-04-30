<?php

namespace App\Filament\Resources\TVsResource\Pages;

use App\Filament\Resources\TVsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTVs extends ListRecords
{
    protected static string $resource = TVsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
