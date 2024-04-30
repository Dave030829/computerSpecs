<?php

namespace App\Filament\Resources\MobilePhonesResource\Pages;

use App\Filament\Resources\MobilePhonesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMobilePhones extends EditRecord
{
    protected static string $resource = MobilePhonesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
