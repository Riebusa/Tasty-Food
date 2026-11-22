<?php

namespace App\Filament\Resources\FiturCards\Pages;

use App\Filament\Resources\FiturCards\FiturCardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFiturCards extends ListRecords
{
    protected static string $resource = FiturCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
