<?php

namespace App\Http\Controllers;

use App\Models\UF;

class DestinoController extends Controller
{
    private static array $destinos = [
        'BMAC' => [
            'nome'    => 'BMAC — Base de Movimentação de Apoio e Cabos',
            'endereco' => 'Avenida Elias Agostinho, 665 - Imbetiba, Macaé - RJ, CEP 27913-350',
            'detalhes' => 'É o porto próprio da Petrobras voltado para o suporte logístico e ancoragem de plataformas.',
        ],
        'PACU' => [
            'nome'    => 'PACU — Porto do Açu',
            'endereco' => 'Via 5 Projetada, S/n - Distrito Industrial de Açu, São João da Barra - RJ, CEP 28200-000',
            'detalhes' => 'Complexo portuário industrial, um dos maiores do Brasil, com foco em petróleo, mineração e energia.',
        ],
    ];

    public function show(string $destino)
    {
        $destino = strtoupper($destino);

        if (!isset(self::$destinos[$destino])) {
            abort(404);
        }

        $info = self::$destinos[$destino];
        $ufs = UF::where('destino', $destino)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('destino.show', compact('destino', 'info', 'ufs'));
    }
}
