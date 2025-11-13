<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_pagu_tahun_anggaran', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // ✅ Tahun anggaran (YYYY)
            $table->year('tahun');

            // ✅ Nominal dana
            $table->decimal('nominal_dana', 15, 2);

            $table->timestamps();

            // ✅ Soft delete
            $table->softDeletes(); // otomatis menambah kolom deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagu_tahun_anggarans');
    }
};
