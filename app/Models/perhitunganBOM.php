<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganBOM extends Model
{
    use HasFactory;

    protected $table = 'perhitungan_bom';

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'bahan_baku_id',
        'qty_per_produk',
        'waste',
        'keterangan',
    ];

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class);
    }

    public function getTotalBiayaAttribute()
    {
        $harga = $this->bahanBaku->harga ?? 0;
        $qty = $this->qty_per_produk ?? 0;
        $waste = $this->waste ?? 0;
        return ($qty + ($qty * $waste / 100)) * $harga;
    }
}