<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ShortUrlResource\Pages;
use App\Filament\Admin\Resources\ShortUrlResource\RelationManagers;
use App\Models\ShortUrl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;

class ShortUrlResource extends Resource
{
    protected static ?string $model = ShortUrl::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('original_url')
                ->required()
                ->url()
                ->maxLength(2048),

            TextInput::make('short_code')
                ->required()
                ->maxLength(10),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('original_url')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('short_code')
                    ->copyable()
                    ->badge(),

                TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShortUrls::route('/'),
            'create' => Pages\CreateShortUrl::route('/create'),
            'edit' => Pages\EditShortUrl::route('/{record}/edit'),
        ];
    }
}
