<?php
namespace App\Http\Controllers;

use App\Models\perhitunganBOM;
use App\Models\BahanBaku;
use Illuminate\Http\Request;

class PerhitunganBOMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bom = PerhitunganBOM::with('bahanBaku')->get();

return view('perhitungan_bom.index', compact('bom'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bahan = BahanBaku::orderBy('nama_bahan')->get();

return view('perhitungan_bom.create', compact('bahan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'kode_produk'    => 'required',

            'nama_produk'    => 'required',

            'kode_bahan'     => 'required',

            'nama_bahan'     => 'required',

            'kategori'       => 'required',

            'qty_per_produk' => 'required|numeric',

            'satuan'         => 'required',

            'harga_satuan'   => 'required|numeric',

        ]);

        $total =
        $request->qty_per_produk *
        $request->harga_satuan;

        PerhitunganBOM::create([

            'kode_produk'    => $request->kode_produk,

            'nama_produk'    => $request->nama_produk,

            'kode_bahan'     => $request->kode_bahan,

            'nama_bahan'     => $request->nama_bahan,

            'kategori'       => $request->kategori,

            'qty_per_produk' => $request->qty_per_produk,

            'satuan'         => $request->satuan,

            'harga_satuan'   => $request->harga_satuan,

            'total_biaya'    => $total,

        ]);

        return redirect()
            ->route('perhitungan-bom.index')
            ->with('success', 'Data berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(perhitunganBOM $perhitunganBOM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(perhitunganBOM $perhitunganBOM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, perhitunganBOM $perhitunganBOM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(perhitunganBOM $perhitunganBOM)
    {
        //
    }
}
