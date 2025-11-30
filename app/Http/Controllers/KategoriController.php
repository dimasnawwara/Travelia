<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index');
    }

    public function show($kategori)
    {
        $items = Destinasi::where('kategori', $kategori)->get();

        return view('kategori.show', [
            'items' => $items,
            'kategori' => $kategori
        ]);
    }

    public function detail($kategori, $id)
    {
        $item = Destinasi::findOrFail($id);

        return view('kategori.detail', compact('item', 'kategori'));
    }
}
