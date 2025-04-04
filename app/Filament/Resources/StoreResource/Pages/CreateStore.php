<?php

declare(strict_types = 1);

namespace App\Filament\Resources\StoreResource\Pages;

use App\Filament\Resources\StoreResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateStore extends CreateRecord
{
    protected static string $resource = StoreResource::class;

    #[\Override]
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Empresa criada com sucesso')
            ->seconds(5);
    }
}
