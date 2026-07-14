<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_produksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jadwal')->unique();
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->integer('qty_produksi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status', [
                'Dijadwalkan',
                'Berjalan',
                'Selesai',
                'Ditunda'
            ])->default('Dijadwalkan');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_produksi');
    }
};