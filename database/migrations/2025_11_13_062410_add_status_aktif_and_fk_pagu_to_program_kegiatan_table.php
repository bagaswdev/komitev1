<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ✅ Tambahkan kolom status_aktif di tabel tb_pagu_tahun_anggaran
        Schema::table('tb_pagu_tahun_anggaran', function (Blueprint $table) {
            $table->boolean('status_aktif')
                ->default(false)
                ->after('nominal_dana'); // letakkan setelah nominal_dana
        });

        // ✅ Tambahkan FK ke tb_program_kegiatan
        Schema::table('tb_program_kegiatan', function (Blueprint $table) {
            $table->foreignUuid('fk_id_pagu_tahun_anggaran')
                ->nullable()
                ->after('id_standar')
                ->constrained('tb_pagu_tahun_anggaran')
                ->onDelete('restrict'); // tidak bisa dihapus jika masih dipakai
        });
    }

    public function down(): void
    {
        // Rollback perubahan
        Schema::table('tb_program_kegiatan', function (Blueprint $table) {
            $table->dropForeign(['fk_id_pagu_tahun_anggaran']);
            $table->dropColumn('fk_id_pagu_tahun_anggaran');
        });

        Schema::table('tb_pagu_tahun_anggaran', function (Blueprint $table) {
            $table->dropColumn('status_aktif');
        });
    }
};
