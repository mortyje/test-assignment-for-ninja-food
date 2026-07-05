<?php

namespace App\Filament\Admin\Resources\ShortUrlResource\Pages;

use App\Filament\Admin\Resources\ShortUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShortUrl extends CreateRecord
{
    protected static string $resource = ShortUrlResource::class;
}
