<?php

namespace App\Filament\Resources\Standars\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StandarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_standar')
                    ->required(),
            ]);
    }
}
