<?php
namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function pengguna() {
        return view('admin.pengguna');
    }

    public function pesanan() {
        return view('admin.pesanan');
    }

    public function destinasi() {
        return view('admin.destinasi');
    }

    public function laporan() {
        return view('admin.laporan');
    }
}
