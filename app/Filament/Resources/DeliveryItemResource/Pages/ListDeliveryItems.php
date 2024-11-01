<?php

namespace App\Filament\Resources\DeliveryItemResource\Pages;

use App\Filament\Resources\DeliveryItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeliveryItems extends ListRecords
{
    protected static string $resource = DeliveryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
