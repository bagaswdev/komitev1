<?php

namespace App\Filament\Resources\UraianPrograms\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UraianProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_standar')
                    ->required(),
                TextInput::make('id_program_kegiatan')
                    ->required(),
                TextInput::make('nama_uraian')
                    ->required(),
                TextInput::make('banyaknya')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('satuan'),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric()
                    ->default(0.0),
            ]);
    }
}
