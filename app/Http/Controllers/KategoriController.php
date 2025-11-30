<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;

class KategoriController extends Controller
{
    public function show($kategori)
    {
        // Validasi kategori
        if (!in_array($kategori, ['pantai', 'gunung', 'budaya'])) {
            abort(404);
        }

        $items = Destinasi::where('kategori', $kategori)->get();

        return view('kategori.show', compact('items', 'kategori'));
    }
}
