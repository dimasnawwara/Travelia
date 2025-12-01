<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\User;
use App\Models\Pesanan;

class DashboardController extends Controller 
{
    public function index()
    {
        $totalDestinasi = Destinasi::count();
        $totalUsers     = User::count();
        $totalPesanan  = Pesanan::count();

        // Grafik per bulan
        $months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

        $salesData = [];
        for ($m = 1; $m <= 12; $m++) {
            $salesData[] = Pesanan::whereMonth('created_at', $m)->count();
        }

        return view('admin.dashboard', compact(
            'totalDestinasi',
            'totalUsers',
            'totalPesanan',
            'months',
            'salesData'
        ));
    }
}
