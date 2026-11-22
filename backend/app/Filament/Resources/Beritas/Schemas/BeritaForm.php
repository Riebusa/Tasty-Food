<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->label('Slug (alamat berita)')
                    ->helperText('Kosongkan agar dibuat otomatis dari judul.')
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                DateTimePicker::make('diterbitkan_pada')
                    ->label('Tanggal terbit')
                    ->default(now()),

                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('berita')
                    ->visibility('public')
                    ->maxSize(5120)
                    ->imageEditor()
                    ->automaticallyResizeImagesMode('contain')
                    ->automaticallyResizeImagesToWidth('1600')
                    ->automaticallyResizeImagesToHeight('1600')
                    ->columnSpanFull(),

                Textarea::make('ringkasan')
                    ->label('Ringkasan')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('isi')
                    ->label('Isi berita')
                    ->required()
                    ->rows(12)
                    ->columnSpanFull(),

                Toggle::make('is_utama')
                    ->label('Jadikan berita utama')
                    ->helperText('Tampil besar di Home dan halaman Berita.'),

                Toggle::make('is_terbit')
                    ->label('Terbitkan')
                    ->default(true),
            ]);
    }
}