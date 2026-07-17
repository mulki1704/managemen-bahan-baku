<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PerhitunganBOM;


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

    public function bom()
    {
        return $this->hasMany(PerhitunganBOM::class, 'bahan_baku_id');
    }

}
