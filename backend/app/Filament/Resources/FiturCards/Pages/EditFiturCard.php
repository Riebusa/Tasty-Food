<?php

namespace App\Filament\Resources\FiturCards\Pages;

use App\Filament\Resources\FiturCards\FiturCardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFiturCard extends EditRecord
{
    protected static string $resource = FiturCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
