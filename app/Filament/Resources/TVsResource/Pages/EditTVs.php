<?php

namespace App\Filament\Resources\TVsResource\Pages;

use App\Filament\Resources\TVsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTVs extends EditRecord
{
    protected static string $resource = TVsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
