<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
   
protected $table = 'bahan_bakus';

protected $fillable = [
    'kode_bahan',
    'nama_bahan',
    'kategori',
    'satuan',
    'stok',
    'stok_minimum',
    'harga',
];


}
