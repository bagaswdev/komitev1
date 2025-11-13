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
        Schema::create('tb_program_kegiatan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_standar')->constrained('tb_standar')->onDelete('cascade');
            $table->string('judul_program', 255);

            // Uang Rupiah: aman sampai Rp 999.999.999.999,99 (999 Triliun)
            $table->decimal('total', 15, 2)->default(0);
            $table->decimal('pagu_dipa', 15, 2)->default(0);
            $table->decimal('pagu_komite', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_program_kegiatan');
    }
};
