<?php

namespace App\Filament\Resources\ProgramKegiatans;

use App\Filament\Resources\ProgramKegiatans\Pages\CreateProgramKegiatan;
use App\Filament\Resources\ProgramKegiatans\Pages\EditProgramKegiatan;
use App\Filament\Resources\ProgramKegiatans\Pages\ListProgramKegiatans;
use App\Filament\Resources\ProgramKegiatans\Pages\ViewProgramKegiatan;
use App\Filament\Resources\ProgramKegiatans\Schemas\ProgramKegiatanForm;
use App\Filament\Resources\ProgramKegiatans\Schemas\ProgramKegiatanInfolist;
use App\Filament\Resources\ProgramKegiatans\Tables\ProgramKegiatansTable;
use App\Models\ProgramKegiatan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProgramKegiatanResource extends Resource
{
    protected static ?string $model = ProgramKegiatan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProgramKegiatanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProgramKegiatanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgramKegiatansTable::configure($table);
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
            'index' => ListProgramKegiatans::route('/'),
            'create' => CreateProgramKegiatan::route('/create'),
            'view' => ViewProgramKegiatan::route('/{record}'),
            'edit' => EditProgramKegiatan::route('/{record}/edit'),
        ];
    }
}
