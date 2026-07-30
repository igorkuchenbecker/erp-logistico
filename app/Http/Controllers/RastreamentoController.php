<?php

namespace App\Http\Controllers;

use App\Models\UF;

class RastreamentoController extends Controller
{
    public function index()
    {
        $rastreamentos = UF::whereNotNull('codigo_rastreio')
            ->orderBy('prazo_entrega')
            ->paginate(15);

        return view('rastreamento.index', compact('rastreamentos'));
    }

    public function show($codigo)
    {
        $uf = UF::where('codigo_rastreio', $codigo)->firstOrFail();
        return view('rastreamento.show', compact('uf'));
    }
}
