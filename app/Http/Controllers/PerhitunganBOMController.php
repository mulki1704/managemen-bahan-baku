<?php
namespace App\Http\Controllers;

use App\Models\PerhitunganBOM;
use App\Models\BahanBaku;
use Illuminate\Http\Request;

class PerhitunganBOMController extends Controller
{
    public function index(Request $request)
    {
        $query = PerhitunganBOM::with('bahanBaku');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_produk', 'like', "%{$search}%")
                  ->orWhere('nama_produk', 'like', "%{$search}%");
            });
        }

        $bom = $query->latest()->get();

        return view('perhitungan_bom.index', compact('bom'));
    }

    public function create()
    {
        $bahan = BahanBaku::orderBy('nama_bahan')->get();

        return view('perhitungan_bom.create', compact('bahan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_produk'    => 'required|string|max:255',
            'nama_produk'    => 'required|string|max:255',
            'bahan_baku_id'  => 'required|exists:bahan_bakus,id',
            'qty_per_produk' => 'required|numeric|min:0',
            'waste'          => 'nullable|numeric|min:0|max:100',
            'keterangan'     => 'nullable|string',
        ]);

        $validated['waste'] = $validated['waste'] ?? 0;

        PerhitunganBOM::create($validated);

        return redirect()
            ->route('perhitungan-bom.index')
            ->with('success', 'Data BOM berhasil ditambahkan.');
    }

    public function show(PerhitunganBOM $perhitunganBom)
    {
        $perhitunganBom->load('bahanBaku');

        return view('perhitungan_bom.show', compact('perhitunganBom'));
    }

    public function edit(PerhitunganBOM $perhitunganBom)
    {
        $bahan = BahanBaku::orderBy('nama_bahan')->get();
        $perhitunganBom->load('bahanBaku');

        return view('perhitungan_bom.edit', compact('perhitunganBom', 'bahan'));
    }

    public function update(Request $request, PerhitunganBOM $perhitunganBom)
    {
        $validated = $request->validate([
            'kode_produk'    => 'required|string|max:255',
            'nama_produk'    => 'required|string|max:255',
            'bahan_baku_id'  => 'required|exists:bahan_bakus,id',
            'qty_per_produk' => 'required|numeric|min:0',
            'waste'          => 'nullable|numeric|min:0|max:100',
            'keterangan'     => 'nullable|string',
        ]);

        $validated['waste'] = $validated['waste'] ?? 0;

        $perhitunganBom->update($validated);

        return redirect()
            ->route('perhitungan-bom.index')
            ->with('success', 'Data BOM berhasil diperbarui.');
    }

    public function destroy(PerhitunganBOM $perhitunganBom)
    {
        $perhitunganBom->delete();

        return redirect()
            ->route('perhitungan-bom.index')
            ->with('success', 'Data BOM berhasil dihapus.');
    }
}
