<?php

namespace App\Filament\Resources\ProjectorsResource\Pages;

use App\Filament\Resources\ProjectorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectors extends EditRecord
{
    protected static string $resource = ProjectorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
