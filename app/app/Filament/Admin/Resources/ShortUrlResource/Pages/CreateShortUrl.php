<?php

namespace App\Filament\Admin\Resources\ShortUrlResource\Pages;

use App\Filament\Admin\Resources\ShortUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateShortUrl extends CreateRecord
{
    protected static string $resource = ShortUrlResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        return $data;
    }
}
