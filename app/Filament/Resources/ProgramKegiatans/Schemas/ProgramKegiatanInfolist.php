<?php

namespace App\Filament\Resources\ProgramKegiatans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProgramKegiatanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('id_standar'),
                TextEntry::make('judul_program'),
                TextEntry::make('total')
                    ->numeric(),
                TextEntry::make('pagu_dipa')
                    ->numeric(),
                TextEntry::make('pagu_komite')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
