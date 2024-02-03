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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_id');
            $table->unsignedBigInteger('pengguna_id');
            $table->string('nama');
            $table->string('jumlah');
            $table->timestamps();
            
            $table->foreign('jenis_id')->references('id')->on('jenis_barangs');
            $table->foreign('pengguna_id')->references('id')->on('users');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
