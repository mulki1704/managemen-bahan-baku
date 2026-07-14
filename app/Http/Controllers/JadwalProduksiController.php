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
        $jadwalProduksis = JadwalProduksi::all();
        return view('jadwal-produksi.index', compact('jadwalProduksis'));
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
        JadwalProduksi::create($request->all());

        return redirect()
        ->route('jadwal-produksi.index')
        ->with('success', 'Jadwal Produksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalProduksi $jadwalProduksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwal = JadwalProduksi::findOrFail(($id));
        return view('jadwal-produksi.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalProduksi $jadwalProduksi)
    {
        $jadwal = JadwalProduksi::findOrFail($jadwalProduksi->id);  
        $jadwal->update($request->all());
        return redirect()
        ->route('jadwal-produksi.index')
        ->with('success', 'Jadwal Produksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalProduksi $jadwalProduksi)
    {
        jadwalProduksi::destroy($jadwalProduksi->id);
        
        return redirect()
        ->route('jadwal-produksi.index')
        ->with('success', 'Jadwal Produksi berhasil dihapus.');
    }
}
