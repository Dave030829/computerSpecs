<?php

namespace App\Filament\Resources\PersonalComputersResource\Pages;

use App\Filament\Resources\PersonalComputersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonalComputers extends EditRecord
{
    protected static string $resource = PersonalComputersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
