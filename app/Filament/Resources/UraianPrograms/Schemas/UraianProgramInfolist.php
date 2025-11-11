<?php

namespace App\Filament\Resources\UraianPrograms\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UraianProgramInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('id_standar'),
                TextEntry::make('id_program_kegiatan'),
                TextEntry::make('nama_uraian'),
                TextEntry::make('banyaknya')
                    ->numeric(),
                TextEntry::make('satuan')
                    ->placeholder('-'),
                TextEntry::make('jumlah')
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
