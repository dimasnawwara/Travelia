<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $table = "destinasi";

    protected $fillable = [
    'judul',
    'kategori',
    'harga',
    'rating',
    'gambar',
    'deskripsi',
    'is_populer'
];

public function pesanan()
{
    return $this->hasMany(Pesanan::class);
}


}
