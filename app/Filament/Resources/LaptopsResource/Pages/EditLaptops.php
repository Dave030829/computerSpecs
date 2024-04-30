<?php

namespace App\Filament\Resources\LaptopsResource\Pages;

use App\Filament\Resources\LaptopsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaptops extends EditRecord
{
    protected static string $resource = LaptopsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
