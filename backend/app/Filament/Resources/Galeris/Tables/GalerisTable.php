<?php

namespace App\Filament\Resources\Galeris\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalerisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')->label('Foto')->disk('public')->square(),
                TextColumn::make('judul')->label('Judul')->searchable()->placeholder('-'),
                TextColumn::make('urutan')->label('Urutan')->sortable(),
                IconColumn::make('is_slider')->label('Slider')->boolean(),
                IconColumn::make('is_home')->label('Home')->boolean(),
            ])
            ->defaultSort('urutan')
            ->reorderable('urutan')
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