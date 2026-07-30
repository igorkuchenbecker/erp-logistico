@extends('layouts.app')

@section('title', "UF {$uf->codigo} - ERP Logístico")

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">UF — {{ $uf->codigo }}</h1>
        <div class="space-x-2">
            <a href="{{ route('ufs.edit', $uf) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Editar
            </a>
            <a href="{{ route('ufs.index') }}"
               class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Voltar
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 max-w-2xl space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-500">Código</p>
                <p class="font-medium">{{ $uf->codigo }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Peso</p>
                <p class="font-medium">{{ number_format($uf->peso, 2, ',', '.') }} kg</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Tipo de Item</p>
                <p class="font-medium">{{ $uf->tipo_item }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Status</p>
                <x-status-badge :status="$uf->status" />
            </div>
            <div>
                <p class="text-sm text-gray-500">Origem</p>
                <p class="font-medium">{{ $uf->origem }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Destino</p>
                <p class="font-medium">{{ $uf->destino }}</p>
            </div>
        </div>

        @if($uf->observacao)
        <div>
            <p class="text-sm text-gray-500">Observação</p>
            <p class="mt-1">{{ $uf->observacao }}</p>
        </div>
        @endif

        <div class="text-xs text-gray-400 pt-4 border-t">
            Criado em {{ $uf->created_at->format('d/m/Y H:i') }}
            &middot; Atualizado em {{ $uf->updated_at->format('d/m/Y H:i') }}
        </div>
    </div>
@endsection
