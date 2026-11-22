<?php

namespace App\Filament\Resources\Pesans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PesansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('sudah_dibaca')->label('Dibaca')->boolean(),
                TextColumn::make('subject')->label('Subjek')->searchable()->limit(40),
                TextColumn::make('nama')->label('Nama')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('created_at')->label('Dikirim')->dateTime('d M Y H:i')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('sudah_dibaca')->label('Status dibaca'),
            ])
            ->recordActions([
                EditAction::make()->label('Buka'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}