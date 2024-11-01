<?php

namespace App\Filament\Resources\DeliveryItemResource\Pages;

use App\Filament\Resources\DeliveryItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeliveryItem extends EditRecord
{
    protected static string $resource = DeliveryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
