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
        Schema::create('pembelian_sarpras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->unsignedBigInteger('jenis_kebutuhan');
            $table->string('spesifikasi');
            $table->unsignedBigInteger('jumlah');
            $table->string('harga_satuan');
            $table->string('gambar_katalog')->nullable();
            $table->string('paraf_kapokja')->nullable();
            $table->string('gambar_pembelian')->nullable();
             $table->string('status');
             $table->date('tanggal');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jenis_kebutuhan')->references('id')->on('jenis_kebutuhans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_sarpras');
    }
};
