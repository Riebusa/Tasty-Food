<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->label('Foto')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('galeri')
                    ->visibility('public')
                    ->maxSize(5120)
                    ->imageEditor()
                    ->automaticallyResizeImagesMode('contain')
                    ->automaticallyResizeImagesToWidth('1600')
                    ->automaticallyResizeImagesToHeight('1600')
                    ->columnSpanFull(),

                TextInput::make('judul')->label('Judul (opsional)')->maxLength(255),

                TextInput::make('urutan')->label('Urutan')->numeric()->default(0)->minValue(0),

                Toggle::make('is_slider')
                    ->label('Tampil di slider halaman Galeri'),

                Toggle::make('is_home')
                    ->label('Tampil di bagian Galeri pada Home')
                    ->helperText('Home menampilkan maksimal 6 foto.'),
            ]);
    }
}