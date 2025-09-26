<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesertaMagang;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPeserta = PesertaMagang::count();
        $diterima = PesertaMagang::where('status', 'Diterima')->count();
        $ditolak = PesertaMagang::where('status', 'Ditolak')->count();
        $menunggu = PesertaMagang::where('status', 'Menunggu')->count();

        return view('view-magang.admin.dashboard', compact('totalPeserta', 'diterima', 'ditolak', 'menunggu'));
    }
}
