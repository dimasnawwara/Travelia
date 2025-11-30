<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function index()
    {
        $items = Destinasi::all();
        return view('admin.destinasi.index', compact('items'));
    }

    public function create()
    {
        return view('admin.destinasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'harga' => 'required|integer',
            'rating' => 'nullable|numeric',
            'gambar' => 'required|image'
        ]);

        $data['gambar'] = $request->file('gambar')->store('destinasi', 'public');

        Destinasi::create($data);

        return redirect()->route('admin.destinasi.index');
    }

    public function edit($id)
    {
        $item = Destinasi::findOrFail($id);
        return view('admin.destinasi.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Destinasi::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'harga' => 'required|integer',
            'rating' => 'nullable|numeric',
            'gambar' => 'nullable|image'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('destinasi', 'public');
        }

        $item->update($data);

        return redirect()->route('admin.destinasi.index');
    }

    public function destroy($id)
    {
        Destinasi::destroy($id);
        return back();
    }
}
