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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jab_id')->nullable();
            $table->unsignedBigInteger('kelompok_id')->nullable();
            $table->string('name');
            $table->string('kode_pegawai')->unique();
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
