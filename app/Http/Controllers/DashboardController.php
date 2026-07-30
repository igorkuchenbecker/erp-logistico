<?php

namespace App\Http\Controllers;

use App\Models\UF;

class DashboardController extends Controller
{
    public function index()
    {
        $total = UF::count();
        $porStatus = UF::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $porDestino = UF::selectRaw('destino, count(*) as total')
            ->groupBy('destino')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        $recentes = UF::latest()->take(5)->get();

        return view('dashboard', compact(
            'total', 'porStatus', 'porDestino', 'recentes'
        ));
    }
}
