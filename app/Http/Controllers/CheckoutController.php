<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Pesanan;

class CheckoutController extends Controller
{
    // HALAMAN CHECKOUT
    public function index($id)
    {
        $item = Destinasi::findOrFail($id);
        return view('checkout.index', compact('item'));
    }

    // SIMPAN PESANAN
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama'   => 'required',
            'email'  => 'required|email',
            'jumlah' => 'required|integer|min:1',
        ]);

        Pesanan::create([
            'nama'         => $request->nama,
            'email'        => $request->email,
            'destinasi_id' => $id,
            'jumlah'       => $request->jumlah,
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');
    }
}
