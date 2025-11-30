<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $table = "destinasi";

    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'gambar',
        'harga',
        'rating'
    ];
}
