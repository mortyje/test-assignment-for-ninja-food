<?php

namespace App\Filament\Admin\Resources\ShortUrlResource\Pages;

use App\Filament\Admin\Resources\ShortUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShortUrls extends ListRecords
{
    protected static string $resource = ShortUrlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
