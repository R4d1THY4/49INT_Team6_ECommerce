<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number', 30)->unique();
            $table->string('sender', 100);
            $table->string('receiver', 100);
            $table->string('service', 50);
            $table->decimal('weight', 8, 2);
            $table->timestamps();
        });

        DB::table('shipments')->insert([
            [
                'tracking_number' => 'TRK001',
                'sender' => 'Intan',
                'receiver' => 'Budi',
                'service' => 'Standard Ground',
                'weight' => 1.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tracking_number' => 'TRK002',
                'sender' => 'Siti',
                'receiver' => 'Andi',
                'service' => 'Next-Day Express',
                'weight' => 2.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tracking_number' => 'TRK003',
                'sender' => 'Rina',
                'receiver' => 'Dewi',
                'service' => 'Cold Chain (Refrigerated)',
                'weight' => 0.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};