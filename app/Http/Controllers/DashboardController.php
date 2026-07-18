<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\JadwalProduksi;
use App\Models\PerhitunganBOM;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBahan = BahanBaku::count();
        $stokMenipis = BahanBaku::whereColumn('stok', '<=', 'stok_minimum')->where('stok', '>', 0)->count();
        $stokHabis = BahanBaku::where('stok', 0)->count();
        $totalBOM = PerhitunganBOM::count();
        $jadwalBerjalan = JadwalProduksi::where('status', 'Berjalan')->count();
        $jadwalDijadwalkan = JadwalProduksi::where('status', 'Dijadwalkan')->count();

        $bahanBaku = BahanBaku::latest()->get();

        $bahanMenipis = BahanBaku::whereColumn('stok', '<=', 'stok_minimum')
            ->where('stok', '>', 0)
            ->orderBy('stok')
            ->limit(5)
            ->get();

        $bahanHabis = BahanBaku::where('stok', 0)
            ->limit(5)
            ->get();

        return view('dashboard.index', compact(
            'totalBahan',
            'stokMenipis',
            'stokHabis',
            'totalBOM',
            'jadwalBerjalan',
            'jadwalDijadwalkan',
            'bahanBaku',
            'bahanMenipis',
            'bahanHabis'
        ));
    }
}
