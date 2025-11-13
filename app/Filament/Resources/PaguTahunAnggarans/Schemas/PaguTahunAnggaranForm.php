<?php

namespace App\Filament\Resources\PaguTahunAnggarans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaguTahunAnggaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tahun')
                    ->required(),
                TextInput::make('nominal_dana')
                    ->required()
                    ->numeric(),
            ]);
    }
}
