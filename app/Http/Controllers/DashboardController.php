<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RekomendasiController;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $rekomendasiController = new RekomendasiController();
        $jumlahRekomendasi = $rekomendasiController->getJumlahRekomendasi();

        return view('dashboard.index', compact('jumlahRekomendasi'));
    }
}