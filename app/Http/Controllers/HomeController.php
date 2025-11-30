<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 6 destinasi terbaru untuk bagian “Destinasi Populer”
        $popular = Destinasi::orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('home.index', compact('popular'));
    }
}
