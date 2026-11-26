<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Buat tabel customers hanya jika belum ada
        if (!Schema::hasTable('customers')) {
            Schema::create('customers', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('phone')->nullable();
                $table->string('city')->nullable();
                $table->string('status')->nullable();
                $table->text('address')->nullable();
                $table->string('role')->default('customer'); // <-- Kolom Role ditambahkan di sini
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};