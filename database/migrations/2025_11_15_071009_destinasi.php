<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('destinasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('kategori')->nullable(); // gunung, pantai, budaya, dll
            $table->string('gambar'); // path gambar
            $table->integer('harga');
            $table->float('rating')->default(4.5);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('destinasi');
    }
};
