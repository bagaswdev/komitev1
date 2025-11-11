<?php

namespace App\Filament\Resources\ProgramKegiatans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProgramKegiatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_standar')
                    ->required(),
                TextInput::make('judul_program')
                    ->required(),
                TextInput::make('total')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('pagu_dipa')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('pagu_komite')
                    ->required()
                    ->numeric()
                    ->default(0.0),
            ]);
    }
}
