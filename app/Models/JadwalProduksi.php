<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalProduksi extends Model
{
    protected $table = 'jadwal_produksi';

    protected $fillable = [
        'kode_jadwal',
        'produk_id',
        'qty_produksi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'catatan',

    ];

    // public function produk()
    // {
    //     return $this->belongsTo(Produk::class, 'produk_id');
    // }

}
