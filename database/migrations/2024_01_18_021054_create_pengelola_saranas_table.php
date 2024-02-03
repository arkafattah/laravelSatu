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
        Schema::create('pengelola_saranas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sarana_id');
            $table->string('keterangan');
            $table->string('unit')->nullable();
            $table->string('jumlah_unit');
            $table->date('tanggal');
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sarana_id')->references('id')->on('saranas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengelola_saranas');
    }
};
