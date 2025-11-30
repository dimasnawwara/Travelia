<?php

// database/migrations/2025_01_01_000000_create_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('username')->nullable();
    $table->string('name')->nullable();
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->boolean('is_admin')->default(false);   // <-- WAJIB ADA DI SINI
    $table->rememberToken();
    $table->timestamps();
});
}

};

