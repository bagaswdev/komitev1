<?php

namespace App\Filament\Resources\ProgramKegiatans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Schemas\Schema;

class ProgramKegiatanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('standar.nama_standar')
                    ->label('Standar'),

                TextEntry::make('judul_program')
                    ->label('Judul Program'),

                TextEntry::make('total')
                    ->numeric()
                    ->label('Total Kebutuhan')
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state ?? 0, 0, ',', '.')),

                TextEntry::make('pagu_dipa')
                    ->numeric()
                    ->label('Pagu DIPA')
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state ?? 0, 0, ',', '.')),

                TextEntry::make('pagu_komite')
                    ->numeric()
                    ->label('Pagu Komite')
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state ?? 0, 0, ',', '.')),

                // 👇 Tambahkan repeatable entry untuk daftar uraian
                RepeatableEntry::make('uraianProgram')
                    ->label('Daftar Uraian Kegiatan')
                    ->schema([
                        TextEntry::make('nama_uraian')
                            ->label('Nama Uraian'),

                        TextEntry::make('banyaknya')
                            ->label('Banyaknya'),

                        TextEntry::make('satuan')
                            ->label('Harga Satuan')
                            ->formatStateUsing(fn($state) => 'Rp ' . number_format($state ?? 0, 0, ',', '.')),

                        TextEntry::make('jumlah')
                            ->label('Jumlah')
                            ->formatStateUsing(fn($state) => 'Rp ' . number_format($state ?? 0, 0, ',', '.')),
                    ])
                    ->columns(4)
                    ->columnSpanFull(),
            ]);
    }
}
