<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StandarPaguOverview extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $stats = DB::table('komite.tb_standar as s')
            ->leftJoin('komite.tb_program_kegiatan as pk', 'pk.id_standar', '=', 's.id')
            ->select(
                's.nama_standar',
                DB::raw('COUNT(pk.id) as jumlah_program'),
                DB::raw('COALESCE(SUM(pk.total), 0) as total_pagu')
            )
            ->groupBy('s.id', 's.nama_standar')
            ->orderBy('s.nama_standar') // Urutkan alfabet agar konsisten
            ->get();

        $totalKeseluruhan = $stats->sum('total_pagu');
        $jumlahStandar = $stats->count();

        $cards = [];

        // Total Keseluruhan
        $cards[] = Stat::make('Total Pagu Semua Standar', 'Rp. ' . number_format($totalKeseluruhan, 0, ',', '.'))
            ->description("{$jumlahStandar} standar terdata")
            ->descriptionIcon('heroicon-m-banknotes')
            ->color('primary');

        // Per Standar (termasuk yang 0)
        foreach ($stats as $item) {
            $cards[] = Stat::make(
                $item->nama_standar,
                'Rp. ' . number_format($item->total_pagu, 0, ',', '.')
            )
                ->description("{$item->jumlah_program} program")
                ->descriptionIcon('heroicon-m-document-text')
                ->color($this->getColorByStandar($item->nama_standar));
        }

        return $cards;
    }

    private function getColorByStandar(string $nama): string
    {
        return match (true) {
            str_contains($nama, 'Proses') => 'success',
            str_contains($nama, 'Isi') => 'info',
            str_contains($nama, 'Penilaian') => 'warning',
            str_contains($nama, 'Pengelolaan') => 'danger',
            str_contains($nama, 'PTT') => 'primary',
            str_contains($nama, 'Sarpras') => 'rose',
            str_contains($nama, 'Kelulusan') => 'emerald',
            str_contains($nama, 'Pembiayaan') => 'amber',
            default => 'gray',
        };
    }
}