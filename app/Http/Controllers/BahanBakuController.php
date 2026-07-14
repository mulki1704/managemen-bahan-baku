<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    public function index()
    {
        $bahans = \App\Models\BahanBaku::all();
        return view('bahan_baku.index', compact('bahans'));
    }
}
