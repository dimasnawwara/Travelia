<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('destinasi')->latest()->get();
        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function show($id)
{
    $pesanan = Pesanan::with('destinasi')->findOrFail($id);

    return view('admin.pesanan.show', compact('pesanan'));
}


   public function destroy($id)
{
    $pesanan = Pesanan::findOrFail($id);
    $pesanan->delete();

    return redirect()->route('admin.pesanan.index')
        ->with('success', 'Pesanan berhasil dihapus');
}


}

