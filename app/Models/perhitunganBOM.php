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

    /**
     * Relasi ke tabel bahan baku
     */
    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class);
    }
}
