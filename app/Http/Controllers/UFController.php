<?php

namespace App\Http\Controllers;

use App\Models\UF;
use Illuminate\Http\Request;

class UFController extends Controller
{
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
        return view('ufs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo'     => 'required|string|max:50|unique:ufs,codigo',
            'peso'       => 'required|numeric|min:0',
            'tipo_item'  => 'required|string|max:100',
            'origem'     => 'required|string|max:150',
            'destino'    => 'required|string|max:150',
            'status'     => 'required|in:pendente,em_transito,entregue,cancelado',
            'observacao' => 'nullable|string|max:500',
        ]);

        UF::create($validated);

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
        $validated = $request->validate([
            'codigo'     => 'required|string|max:50|unique:ufs,codigo,' . $uf->id,
            'peso'       => 'required|numeric|min:0',
            'tipo_item'  => 'required|string|max:100',
            'origem'     => 'required|string|max:150',
            'destino'    => 'required|string|max:150',
            'status'     => 'required|in:pendente,em_transito,entregue,cancelado',
            'observacao' => 'nullable|string|max:500',
        ]);

        $uf->update($validated);

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
