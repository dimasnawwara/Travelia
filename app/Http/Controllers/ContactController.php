<?php

// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller {
    public function showForm() {
        return view('contact.form');
    }

    public function submit(Request $r) {
        $r->validate(['name'=>'required','email'=>'required|email','message'=>'required|min:5']);

        Contact::create([
            'user_id' => Auth::id(),
            'name' => $r->name,
            'email' => $r->email,
            'message' => $r->message,
        ]);

        return redirect()->route('contact.form')->with('success','Pesan berhasil dikirim. Terima kasih!');
    }
}
