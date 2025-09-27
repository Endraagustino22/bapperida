<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesertaMagang;
use App\Models\Penelitian;
use App\Models\Kkn;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalMagang = PesertaMagang::count();
        $totalPenelitian = Penelitian::count();
        // $totalKkn = Kkn::count();
        $totalUsers = User::count();

        $latestMagang = PesertaMagang::latest()->take(3)->get();
        $latestPenelitian = Penelitian::latest()->take(3)->get();

        return view('admin.dashboard', compact(
            'totalMagang',
            'totalPenelitian',
            // 'totalKkn',
            'totalUsers',
            'latestMagang',
            'latestPenelitian'
        ));
    }
}
