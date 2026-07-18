<?php
namespace App\Http\Controllers;

use App\Models\JadwalProduksi;
use Illuminate\Http\Request;

class JadwalProduksiController extends Controller
{
    public function index(Request $request)
    {
        $query = JadwalProduksi::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_jadwal', 'like', "%{$search}%")
                  ->orWhere('catatan', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $jadwalProduksis = $query->latest()->get();

        return view('jadwal-produksi.index', compact('jadwalProduksis'));
    }

    public function create()
    {
        return view('jadwal-produksi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_jadwal'    => 'required|string|max:255|unique:jadwal_produksi,kode_jadwal',
            'qty_produksi'   => 'required|integer|min:1',
            'tanggal_mulai'  => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status'         => 'required|in:Dijadwalkan,Berjalan,Selesai,Ditunda',
            'catatan'        => 'nullable|string',
        ]);

        JadwalProduksi::create($validated);

        return redirect()
            ->route('jadwal-produksi.index')
            ->with('success', 'Jadwal produksi berhasil ditambahkan.');
    }

    public function show(JadwalProduksi $jadwalProduksi)
    {
        return view('jadwal-produksi.show', compact('jadwalProduksi'));
    }

    public function edit(JadwalProduksi $jadwalProduksi)
    {
        return view('jadwal-produksi.edit', compact('jadwalProduksi'));
    }

    public function update(Request $request, JadwalProduksi $jadwalProduksi)
    {
        $validated = $request->validate([
            'kode_jadwal'    => 'required|string|max:255|unique:jadwal_produksi,kode_jadwal,' . $jadwalProduksi->id,
            'qty_produksi'   => 'required|integer|min:1',
            'tanggal_mulai'  => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status'         => 'required|in:Dijadwalkan,Berjalan,Selesai,Ditunda',
            'catatan'        => 'nullable|string',
        ]);

        $jadwalProduksi->update($validated);

        return redirect()
            ->route('jadwal-produksi.index')
            ->with('success', 'Jadwal produksi berhasil diperbarui.');
    }

    public function destroy(JadwalProduksi $jadwalProduksi)
    {
        $jadwalProduksi->delete();

        return redirect()
            ->route('jadwal-produksi.index')
            ->with('success', 'Jadwal produksi berhasil dihapus.');
    }
}
