<?php

namespace App\Filament\Resources\ProgramKegiatans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class ProgramKegiatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_standar')
                    ->label('Standar')
                    ->options(function () {
                        $user = auth()->user();
                        return $user->standars()->pluck('nama_standar', 'id');
                    })
                    ->required(),
                TextInput::make('judul_program')
                    ->required(),
                // TextInput::make('total')
                //     ->required()
                //     ->numeric()
                //     ->default(0.0),
                // TextInput::make('pagu_dipa')
                //     ->required()
                //     ->numeric()
                //     ->default(0.0),
                // TextInput::make('pagu_komite')
                //     ->required()
                //     ->numeric()
                //     ->default(0.0),
            ]);
    }
}
