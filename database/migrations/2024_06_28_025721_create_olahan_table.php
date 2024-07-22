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
        Schema::create('olahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sampah_id');;
            //foreignId untuk membuat relasi antara table sampah dengan table olahan melalui id sampah
            $table->string('nama_olahan');
            $table->text('deskripsi');
            $table->text('langkah_langkah');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('olahan');
    }
};
