<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil destinasi populer
        $popular = Destinasi::where('is_populer', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Ambil satu destinasi dari masing-masing kategori
        $pantai = Destinasi::where('kategori', 'pantai')->first();
        $budaya = Destinasi::where('kategori', 'budaya')->first();
        $gunung = Destinasi::where('kategori', 'gunung')->first();

        return view('home.index', compact('popular', 'pantai', 'budaya', 'gunung'));
    }
}
