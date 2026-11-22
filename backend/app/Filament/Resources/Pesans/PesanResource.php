<?php

namespace App\Filament\Resources\Pesans;

use App\Filament\Resources\Pesans\Pages\EditPesan;
use App\Filament\Resources\Pesans\Pages\ListPesans;
use App\Filament\Resources\Pesans\Schemas\PesanForm;
use App\Filament\Resources\Pesans\Tables\PesansTable;
use App\Models\Pesan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PesanResource extends Resource
{
    protected static ?string $model = Pesan::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $modelLabel = 'Pesan';

    protected static ?string $pluralModelLabel = 'Pesan Masuk';

    protected static ?string $recordTitleAttribute = 'subject';

    protected static ?int $navigationSort = 4;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        $belumDibaca = Pesan::where('sudah_dibaca', false)->count();

        return $belumDibaca > 0 ? (string) $belumDibaca : null;
    }

    public static function form(Schema $schema): Schema
    {
        return PesanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PesansTable::configure($table);
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
            'index' => ListPesans::route('/'),
            'edit' => EditPesan::route('/{record}/edit'),
        ];
    }
}