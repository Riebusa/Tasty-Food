<?php

namespace App\Filament\Resources\FiturCards\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FiturCardForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')->label('Judul')->required()->maxLength(255),

                TextInput::make('urutan')->label('Urutan')->numeric()->default(0)->minValue(0),

                Textarea::make('deskripsi')->label('Deskripsi')->required()->rows(4)->columnSpanFull(),

                FileUpload::make('gambar')
                    ->label('Gambar piring (disarankan PNG transparan, persegi)')
                    ->image()
                    ->disk('public')
                    ->directory('fitur')
                    ->visibility('public')
                    ->maxSize(3072)
                    ->columnSpanFull(),
            ]);
    }
}