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
        Schema::create('tb_uraian_program', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_standar')->constrained('tb_standar')->onDelete('cascade');
            $table->foreignUuid('id_program_kegiatan')->constrained('tb_program_kegiatan')->onDelete('cascade');
            $table->string('nama_uraian', 255);
            $table->unsignedInteger('banyaknya')->default(0);
            $table->string('satuan', 50)->nullable();

            // Subtotal per uraian (banyaknya × harga satuan)
            $table->decimal('jumlah', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_uraian_program');
    }
};
