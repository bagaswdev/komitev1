<?php

namespace App\Filament\Resources\ProgramKegiatans\Schemas;

use Filament\Support\RawJs;
use Filament\Schemas\Schema;
use App\Models\PaguTahunAnggaran;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class ProgramKegiatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('fk_id_pagu_tahun_anggaran')
                    ->label('Tahun Anggaran Aktif')
                    ->disabled() // hanya tampilan, tidak bisa diubah user
                    ->default(function () {
                        $pagu = PaguTahunAnggaran::where('status_aktif', 1)->first();
                        return $pagu ? $pagu->tahun : '-';
                    }),

                Select::make('id_standar')
                    ->label('Standar')
                    ->options(function () {
                        $user = auth()->user();
                        return $user->standars()->pluck('nama_standar', 'id');
                    })
                    ->required(),
                TextInput::make('judul_program')
                    ->required(),



                // 👉 Repeater untuk uraian program
                Repeater::make('uraianProgram')
                    ->label('Uraian Kegiatan')
                    ->relationship('uraianProgram')
                    ->schema([
                        Grid::make(4)->schema([
                            // TextInput::make('nama_uraian')
                            //     ->label('Nama Uraian')
                            //     ->required(),

                            // TextInput::make('banyaknya')
                            //     ->numeric()
                            //     ->reactive()
                            //     ->live(debounce: 2000) // Wait 2000ms before re-rendering the schema.
                            //     ->required()
                            //     ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            //         $satuan = (float) $get('satuan');
                            //         $set('jumlah', $state * $satuan);
                            //     }),

                            // TextInput::make('satuan')
                            //     ->label('Harga Satuan')
                            //     ->prefix('Rp')
                            //     ->numeric()
                            //     ->reactive()
                            //     ->live(debounce: 2000) // Wait 500ms before re-rendering the schema.
                            //     ->required()
                            //     ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            //         $banyaknya = (float) $get('banyaknya');
                            //         $set('jumlah', $state * $banyaknya);
                            //     }),

                            // TextInput::make('jumlah')
                            //     ->label('Jumlah Otomatis')
                            //     ->numeric()
                            //     ->prefix('Rp')
                            //     ->readOnly(), // biar user nggak ubah manual


                            TextInput::make('nama_uraian')
                                ->label('Nama Uraian')
                                ->required(),

                            TextInput::make('banyaknya')
                                ->numeric()
                                ->reactive()
                                ->live(debounce: 1500)
                                ->required()
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $satuan = (float) $get('satuan');
                                    $set('jumlah', $state * $satuan);
                                }),

                            TextInput::make('satuan')
                                ->label('Harga Satuan')
                                ->numeric()
                                ->prefix('Rp')
                                ->mask(RawJs::make('function($input) { return new Intl.NumberFormat("id-ID").format($input); }'))
                                ->stripCharacters(['.', 'Rp', ','])
                                ->reactive()
                                ->live(debounce: 1500)
                                ->required()
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $banyaknya = (float) $get('banyaknya');
                                    $set('jumlah', $banyaknya * $state);
                                }),

                            TextInput::make('jumlah')
                                ->label('Jumlah Otomatis')
                                ->numeric()
                                ->prefix('Rp')
                                ->formatStateUsing(fn($state) => 'Rp ' . number_format($state ?? 0, 0, ',', '.'))
                                ->readOnly(),
                        ]),
                    ])
                    ->defaultItems(1)
                    ->minItems(1) // 👈 tidak bisa dihapus semua
                    // ->minItems(1) // 👈 tidak bisa dihapus semua
                    ->createItemButtonLabel('Tambah Uraian Kegiatan')
                    ->columns(1)
                    ->columnSpanFull() // 👈 tambahkan ini

            ]);
    }
}
