<?php

// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($id)
{
    $destinasi = Destinasi::findOrFail($id);
    return view('checkout.index', compact('destinasi'));
}


    public function store(Request $request, $id)
    {
        $destinasi = Destinasi::findOrFail($id);

        Pesanan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'destinasi_id' => $id,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/destinasi')->with('success', 'Pesanan berhasil dibuat!');
    }
}
