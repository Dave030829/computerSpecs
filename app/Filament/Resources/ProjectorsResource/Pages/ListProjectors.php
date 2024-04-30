<?php

namespace App\Filament\Resources\ProjectorsResource\Pages;

use App\Filament\Resources\ProjectorsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectors extends ListRecords
{
    protected static string $resource = ProjectorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
