<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class PaguAnggaranOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        // Ambil data dengan status aktif = 1, atau baris pertama jika tidak ada
        $data = DB::table('komite.tb_pagu_tahun_anggaran')
            ->where('status_aktif', 1)
            ->first();

        // Jika tidak ada yang aktif, ambil baris pertama
        if (!$data) {
            $data = DB::table('komite.tb_pagu_tahun_anggaran')
                ->orderBy('tahun', 'desc')
                ->first();
        }

        // Jika tetap tidak ada data
        if (!$data) {
            return [
                Stat::make('Total Pagu Anggaran', 'Tidak ada data')
                    ->description('Belum ada pagu anggaran')
                    ->descriptionIcon('heroicon-m-exclamation-triangle')
                    ->color('danger'),
            ];
        }

        $tahun = $data->tahun;
        $totalPagu = $data->nominal_dana ?? 0;
        $isAktif = $data->status_aktif == 1;

        return [
            Stat::make("Total Pagu Anggaran {$tahun}", '')
                ->value('Rp. '. number_format($totalPagu, 0, ',', '.')) // Rp + angka besar
                ->description($isAktif ? 'Aktif' : 'Tidak Aktif')
                ->descriptionIcon($isAktif ? 'heroicon-m-check-circle' : 'heroicon-m-x-circle')
                ->color($isAktif ? 'success' : 'warning')
                ->extraAttributes([
                    'class' => 'text-3xl font-bold'
                ]),
        ];
    }
}