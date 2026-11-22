<?php

namespace App\Filament\Resources\Pesans\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PesanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')->label('Nama')->disabled(),
                TextInput::make('email')->label('Email')->disabled(),
                TextInput::make('subject')->label('Subjek')->disabled()->columnSpanFull(),
                Textarea::make('pesan')->label('Pesan')->disabled()->rows(8)->columnSpanFull(),
                Toggle::make('sudah_dibaca')->label('Sudah dibaca'),
            ]);
    }
}