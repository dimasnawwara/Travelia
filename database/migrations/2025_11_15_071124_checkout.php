<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();

            // Relasi ke user (boleh null, kalau user dihapus -> set null)
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');

            // Relasi ke destinasi (hapus destinasi -> checkout ikut terhapus)
            $table->foreignId('destinasi_id')
                  ->constrained('destinasi')
                  ->onDelete('cascade');

            $table->string('name');          // nama pemesan
            $table->string('email');
            $table->integer('quantity')->default(1);
            $table->decimal('total_price', 12, 2);
            $table->string('status')->default('pending'); 
            // pending, paid, cancelled, done

            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('checkouts');   // ← perbaikan penting!
    }
};
