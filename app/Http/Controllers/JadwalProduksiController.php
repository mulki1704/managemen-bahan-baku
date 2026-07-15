<?php

namespace App\Http\Controllers;

use App\Models\JadwalProduksi;
use Illuminate\Http\Request;

class JadwalProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalProduksi = JadwalProduksi::all();

        return view('jadwal-produksi.index', compact('jadwalProduksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwal-produksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $lastId = JadwalProduksi::max('id') + 1;

    $kode = 'JP-' . str_pad($lastId, 3, '0', STR_PAD_LEFT);

    JadwalProduksi::create([
        'kode_jadwal'      => $kode,
        'produk_id'        => $request->produk_id,
        'qty_produksi'     => $request->qty_produksi,
        'tanggal_mulai'    => $request->tanggal_mulai,
        'tanggal_selesai'  => $request->tanggal_selesai,
        'status'           => $request->status,
        'catatan'          => $request->catatan,
    ]);

    return redirect()
        ->route('jadwal-produksi.index')
        ->with('success', 'Jadwal Produksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalProduksi $jadwalProduksi)
    {
        return view('jadwal-produksi.show', compact('jadwalProduksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalProduksi $jadwalProduksi)
    {
        return view('jadwal-produksi.edit', compact('jadwalProduksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalProduksi $jadwalProduksi)
    {
        $jadwalProduksi->update($request->all());

        return redirect()
            ->route('jadwal-produksi.index')
            ->with('success', 'Jadwal Produksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalProduksi $jadwalProduksi)
    {
        $jadwalProduksi->delete();

        return redirect()
            ->route('jadwal-produksi.index')
            ->with('success', 'Jadwal Produksi berhasil dihapus.');
    }
}