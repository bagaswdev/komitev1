<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_standar_user', function (Blueprint $table) {
            $table->uuid('standar_id');
            $table->uuid('user_id');
            $table->primary(['standar_id', 'user_id']);

            $table->foreign('standar_id')->references('id')->on('tb_standar')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_standar_user');
    }
};
