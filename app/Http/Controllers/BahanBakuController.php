<?php
namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    public function index(Request $request)
    {
        $query = BahanBaku::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_bahan', 'like', "%{$search}%")
                  ->orWhere('nama_bahan', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        $bahan = $query->latest()->get();

        return view('bahan_baku.index', compact('bahan'));
    }

    public function create()
    {
        return view('bahan_baku.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_bahan'   => 'required|string|max:255|unique:bahan_bakus,kode_bahan',
            'nama_bahan'   => 'required|string|max:255',
            'kategori'     => 'required|string|max:255',
            'satuan'       => 'required|string|max:255',
            'stok'         => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'harga'        => 'required|numeric|min:0',
        ]);

        BahanBaku::create($validated);

        return redirect()
            ->route('bahan-baku.index')
            ->with('success', 'Data bahan baku berhasil ditambahkan.');
    }

    public function show(BahanBaku $bahanBaku)
    {
        return view('bahan_baku.show', compact('bahanBaku'));
    }

    public function edit(BahanBaku $bahanBaku)
    {
        return view('bahan_baku.edit', compact('bahanBaku'));
    }

    public function update(Request $request, BahanBaku $bahanBaku)
    {
        $validated = $request->validate([
            'kode_bahan'   => 'required|string|max:255|unique:bahan_bakus,kode_bahan,' . $bahanBaku->id,
            'nama_bahan'   => 'required|string|max:255',
            'kategori'     => 'required|string|max:255',
            'satuan'       => 'required|string|max:255',
            'stok'         => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'harga'        => 'required|numeric|min:0',
        ]);

        $bahanBaku->update($validated);

        return redirect()
            ->route('bahan-baku.index')
            ->with('success', 'Data bahan baku berhasil diperbarui.');
    }

    public function destroy(BahanBaku $bahanBaku)
    {
        $bahanBaku->delete();

        return redirect()
            ->route('bahan-baku.index')
            ->with('success', 'Data bahan baku berhasil dihapus.');
    }
}
