<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perhitungan_bom', function (Blueprint $table) {

            $table->id();

            // Data Produk
            $table->string('kode_produk');
            $table->string('nama_produk');

            // Relasi ke tabel bahan_bakus
            $table->foreignId('bahan_baku_id')
                ->constrained('bahan_bakus')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Kebutuhan bahan untuk 1 produk
            $table->decimal('qty_per_produk', 10, 2);

            // Persentase waste (opsional)
            $table->decimal('waste', 5, 2)->default(0);

            // Catatan
            $table->text('keterangan')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perhitungan_bom');
    }
};
