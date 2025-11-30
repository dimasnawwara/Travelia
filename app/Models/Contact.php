<?php

// app/Models/Contact.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model {
    use HasFactory;

    protected $fillable = ['user_id','name','email','message','is_read'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
