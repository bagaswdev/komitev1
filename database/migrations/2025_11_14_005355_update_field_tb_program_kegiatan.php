<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tb_uraian_program', function (Blueprint $table) {
            // Hapus constraint lama dulu
            $table->dropForeign(['id_program_kegiatan']);

            // Tambahkan ulang dengan ON DELETE RESTRICT
            $table->foreign('id_program_kegiatan')
                ->references('id')
                ->on('tb_program_kegiatan')
                ->onDelete('cascade');
        });
    }

    /*************  ✨ Windsurf Command ⭐  *************/
    /**

     * Revert the changes to the tb_uraian_program table.
     */
    public function down(): void
    {
        Schema::table('tb_uraian_program', function (Blueprint $table) {
            // Kembalikan ke cascade kalau rollback
            $table->dropForeign(['id_program_kegiatan']);

            $table->foreign('id_program_kegiatan')
                ->references('id')
                ->on('tb_program_kegiatan')
                ->onDelete('restrict');
        });
    }
};
