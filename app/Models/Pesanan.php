<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'nama',
        'email',
        'destinasi_id',
        'jumlah',
    ];

    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class, 'destinasi_id');
    }
}

