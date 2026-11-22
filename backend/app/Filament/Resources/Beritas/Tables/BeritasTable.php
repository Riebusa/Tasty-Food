<?php

namespace App\Filament\Resources\Beritas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class BeritasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')->label('Gambar')->disk('public')->square(),
                TextColumn::make('judul')->label('Judul')->searchable()->limit(50),
                IconColumn::make('is_utama')->label('Utama')->boolean(),
                IconColumn::make('is_terbit')->label('Terbit')->boolean(),
                TextColumn::make('diterbitkan_pada')->label('Tanggal terbit')->dateTime('d M Y')->sortable(),
            ])
            ->defaultSort('diterbitkan_pada', 'desc')
            ->filters([
                TernaryFilter::make('is_terbit')->label('Status terbit'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}