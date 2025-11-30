<?php
// app/Http/Controllers/Admin/CheckoutController.php
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
}

