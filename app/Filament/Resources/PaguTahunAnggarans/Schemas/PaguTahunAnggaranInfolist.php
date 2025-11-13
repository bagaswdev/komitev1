<?php

namespace App\Filament\Resources\PaguTahunAnggarans\Schemas;

use App\Models\PaguTahunAnggaran;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PaguTahunAnggaranInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('tahun'),
                TextEntry::make('nominal_dana')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (PaguTahunAnggaran $record): bool => $record->trashed()),
            ]);
    }
}
