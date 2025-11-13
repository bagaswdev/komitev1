<?php

namespace App\Filament\Resources\PaguTahunAnggarans;

use App\Filament\Resources\PaguTahunAnggarans\Pages\CreatePaguTahunAnggaran;
use App\Filament\Resources\PaguTahunAnggarans\Pages\EditPaguTahunAnggaran;
use App\Filament\Resources\PaguTahunAnggarans\Pages\ListPaguTahunAnggarans;
use App\Filament\Resources\PaguTahunAnggarans\Pages\ViewPaguTahunAnggaran;
use App\Filament\Resources\PaguTahunAnggarans\Schemas\PaguTahunAnggaranForm;
use App\Filament\Resources\PaguTahunAnggarans\Schemas\PaguTahunAnggaranInfolist;
use App\Filament\Resources\PaguTahunAnggarans\Tables\PaguTahunAnggaransTable;
use App\Models\PaguTahunAnggaran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PaguTahunAnggaranResource extends Resource
{
    protected static ?string $model = PaguTahunAnggaran::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-banknotes';

    protected static string|UnitEnum|null $navigationGroup = 'Pendapatan & Anggaran';

    protected static ?string $navigationLabel = 'Pagu Tahun Anggaran';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return PaguTahunAnggaranForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PaguTahunAnggaranInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaguTahunAnggaransTable::configure($table);
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
            'index' => ListPaguTahunAnggarans::route('/'),
            'create' => CreatePaguTahunAnggaran::route('/create'),
            'view' => ViewPaguTahunAnggaran::route('/{record}'),
            'edit' => EditPaguTahunAnggaran::route('/{record}/edit'),
        ];
    }
}
