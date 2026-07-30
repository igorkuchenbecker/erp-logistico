<?php

namespace App\Http\Controllers;

use App\Models\UF;
use Illuminate\Http\Request;

class UFController extends Controller
{
    private function convertePeso($valor)
    {
        if (is_null($valor)) return 0;
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        return (float) $valor;
    }

    public function index()
    {
        $ufs = UF::query()
            ->when(request('status'), fn($q, $v) => $q->where('status', $v))
            ->when(request('search'), fn($q, $v) => $q->where(function($q) use ($v) {
                $q->where('codigo', 'like', "%{$v}%")
                  ->orWhere('origem', 'like', "%{$v}%")
                  ->orWhere('destino', 'like', "%{$v}%");
            }))
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('ufs.index', compact('ufs'));
    }

    public function create()
    {
        $proximoCodigo = (UF::max('codigo') ?? 10000) + 1;
        return view('ufs.create', compact('proximoCodigo'));
    }

    public function store(Request $request)
    {
        $request->merge(['peso' => $this->convertePeso($request->peso)]);

        $validated = $request->validate([
            'peso'       => 'required|numeric|min:0',
            'tipo_item'  => 'required|in:Caixa de madeira,Caixa de papelão,Plástico,Palete,Amarrado,Mala Case',
            'origem'     => 'required|in:ARM-MACAÉ,IMBETIBA,IMBOASSICA,ARM-RIO',
            'destino'    => 'required|in:PACU,BMAC',
            'status'     => 'required|in:pendente,em_transito,entregue,cancelado,unitizado,aguardando_coleta,coletado,liberado_programacao',
            'observacao' => 'nullable|string|max:500',
        ]);

        $uf = new UF($validated);
        UF::gerarRastreio($uf);
        $uf->save();

        return redirect()->route('ufs.index')
            ->with('success', 'UF cadastrada com sucesso.');
    }

    public function show(UF $uf)
    {
        return view('ufs.show', compact('uf'));
    }

    public function edit(UF $uf)
    {
        return view('ufs.edit', compact('uf'));
    }

    public function update(Request $request, UF $uf)
    {
        $request->merge(['peso' => $this->convertePeso($request->peso)]);

        $validated = $request->validate([
            'peso'          => 'required|numeric|min:0',
            'tipo_item'     => 'required|in:Caixa de madeira,Caixa de papelão,Plástico,Palete,Amarrado,Mala Case',
            'origem'        => 'required|in:ARM-MACAÉ,IMBETIBA,IMBOASSICA,ARM-RIO',
            'destino'       => 'required|in:PACU,BMAC',
            'status'        => 'required|in:pendente,em_transito,entregue,cancelado,unitizado,aguardando_coleta,coletado,liberado_programacao',
            'tipo_caminhao' => 'nullable|string|max:100',
            'colaborador'   => 'nullable|string|max:100',
            'trajeto'       => 'nullable|string|max:255',
            'observacao'    => 'nullable|string|max:500',
        ]);

        $uf->fill($validated);
        UF::gerarRastreio($uf);
        $uf->save();

        return redirect()->route('ufs.index')
            ->with('success', 'UF atualizada com sucesso.');
    }

    public function destroy(UF $uf)
    {
        $uf->delete();

        return redirect()->route('ufs.index')
            ->with('success', 'UF removida com sucesso.');
    }
}
