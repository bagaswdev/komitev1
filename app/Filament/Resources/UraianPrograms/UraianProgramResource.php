<?php

namespace App\Filament\Resources\UraianPrograms;

use App\Filament\Resources\UraianPrograms\Pages\CreateUraianProgram;
use App\Filament\Resources\UraianPrograms\Pages\EditUraianProgram;
use App\Filament\Resources\UraianPrograms\Pages\ListUraianPrograms;
use App\Filament\Resources\UraianPrograms\Pages\ViewUraianProgram;
use App\Filament\Resources\UraianPrograms\Schemas\UraianProgramForm;
use App\Filament\Resources\UraianPrograms\Schemas\UraianProgramInfolist;
use App\Filament\Resources\UraianPrograms\Tables\UraianProgramsTable;
use App\Models\UraianProgram;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UraianProgramResource extends Resource
{
    protected static ?string $model = UraianProgram::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return UraianProgramForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UraianProgramInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UraianProgramsTable::configure($table);
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
            'index' => ListUraianPrograms::route('/'),
            'create' => CreateUraianProgram::route('/create'),
            'view' => ViewUraianProgram::route('/{record}'),
            'edit' => EditUraianProgram::route('/{record}/edit'),
        ];
    }
}
