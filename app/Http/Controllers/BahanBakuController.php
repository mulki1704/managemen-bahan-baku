<?php
namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahan = BahanBaku::all();

        return view('bahan_baku.index', compact('bahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahan_baku.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_bahan'   => 'required|unique:bahan_bakus,kode_bahan',
            'nama_bahan'   => 'required',
            'kategori'     => 'required',
            'satuan'       => 'required',
            'stok'         => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'harga'        => 'required|numeric|min:0',
        ]);

        BahanBaku::create([
            'kode_bahan'   => $request->kode_bahan,
            'nama_bahan'   => $request->nama_bahan,
            'kategori'     => $request->kategori,
            'satuan'       => $request->satuan,
            'stok'         => $request->stok,
            'stok_minimum' => $request->stok_minimum,
            'harga'        => $request->harga,
        ]);

        return redirect()
            ->route('bahan-baku.index')
            ->with('success', 'Data bahan baku berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(BahanBaku $bahanBaku)
    {
        return view('bahan_baku.show', compact('bahanBaku'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BahanBaku $bahanBaku)
    {
        return view('bahan_baku.edit', compact('bahanBaku'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BahanBaku $bahanBaku)
    {
        {
    $request->validate([
        'kode_bahan'   => 'required|unique:bahan_bakus,kode_bahan,' . $bahanBaku->id,
        'nama_bahan'   => 'required',
        'kategori'     => 'required',
        'satuan'       => 'required',
        'stok'         => 'required|integer|min:0',
        'stok_minimum' => 'required|integer|min:0',
        'harga'        => 'required|numeric|min:0',
    ]);

    $bahanBaku->update($request->all());

    return redirect()
        ->route('bahan-baku.index')
        ->with('success', 'Data bahan baku berhasil diperbarui.');
}

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BahanBaku $bahanBaku)
    {
        $bahanBaku->delete();

return redirect()
    ->route('bahan-baku.index')
    ->with('success', 'Data bahan baku berhasil dihapus.');

    }
}
