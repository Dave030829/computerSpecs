<?php

namespace App\Filament\Resources\MobilePhonesResource\Pages;

use App\Filament\Resources\MobilePhonesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMobilePhones extends ListRecords
{
    protected static string $resource = MobilePhonesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
