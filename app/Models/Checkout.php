<?php

// app/Models/Checkout.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id','destination_id','name','email','quantity','total_price','status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function destination() {
        return $this->belongsTo(Destination::class);
    }
}
