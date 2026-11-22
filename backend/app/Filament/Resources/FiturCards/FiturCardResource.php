<?php

namespace App\Filament\Resources\FiturCards;

use App\Filament\Resources\FiturCards\Pages\CreateFiturCard;
use App\Filament\Resources\FiturCards\Pages\EditFiturCard;
use App\Filament\Resources\FiturCards\Pages\ListFiturCards;
use App\Filament\Resources\FiturCards\Schemas\FiturCardForm;
use App\Filament\Resources\FiturCards\Tables\FiturCardsTable;
use App\Models\FiturCard;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FiturCardResource extends Resource
{
    protected static ?string $model = FiturCard::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'judul';

    protected static ?string $modelLabel = 'Kartu Fitur';
    
    protected static ?string $pluralModelLabel = 'Kartu Fitur (Home)';
    
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return FiturCardForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FiturCardsTable::configure($table);
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
            'index' => ListFiturCards::route('/'),
            'create' => CreateFiturCard::route('/create'),
            'edit' => EditFiturCard::route('/{record}/edit'),
        ];
    }
}
