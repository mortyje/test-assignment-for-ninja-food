<?php

namespace App\Filament\Admin\Resources\ShortUrlResource\Pages;

use App\Filament\Admin\Resources\ShortUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShortUrl extends EditRecord
{
    protected static string $resource = ShortUrlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
