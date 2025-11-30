<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasi = Destinasi::all();
        return view('destinasi.index', compact('destinasi'));
    }

public function show($id)
{
    $item = Destinasi::findOrFail($id);
    return view('destinasi.show', compact('item'));
}

}
