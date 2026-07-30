@extends('layouts.app')

@section('title', "UF {$uf->codigo} - ERP Logístico")

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">UF — {{ $uf->codigo }}</h1>
        <div class="space-x-2">
            <a href="{{ route('ufs.edit', $uf) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Editar
            </a>
            <a href="{{ route('ufs.index') }}"
               class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                Voltar
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-6 max-w-2xl space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Código</p>
                <p class="font-medium">{{ $uf->codigo }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Peso</p>
                <p class="font-medium">{{ number_format($uf->peso, 2, ',', '.') }} kg</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Tipo de Item</p>
                <p class="font-medium">{{ $uf->tipo_item }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                <x-status-badge :status="$uf->status" />
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Origem</p>
                <p class="font-medium">{{ $uf->origem }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Destino</p>
                <p class="font-medium">{{ $uf->destino }}</p>
            </div>
        </div>

        @if($uf->observacao)
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-400">Observação</p>
            <p class="mt-1">{{ $uf->observacao }}</p>
        </div>
        @endif

        @if($uf->codigo_rastreio)
        <div class="border-t dark:border-gray-700 pt-4">
            <h3 class="font-bold text-gray-700 dark:text-gray-200 mb-3">Rastreamento</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Código de Rastreio</p>
                    <a href="{{ route('rastreamento.show', $uf->codigo_rastreio) }}"
                       class="font-bold text-emerald-700 dark:text-emerald-400 hover:underline">
                        {{ $uf->codigo_rastreio }}
                    </a>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Prazo de Entrega</p>
                    <p class="font-medium">{{ $uf->prazo_entrega?->format('d/m/Y H:i') ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Tipo de Caminhão</p>
                    <p class="font-medium">{{ $uf->tipo_caminhao ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Colaborador</p>
                    <p class="font-medium">{{ $uf->colaborador ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Trajeto</p>
                    <p class="font-medium">{{ $uf->trajeto ?? '—' }}</p>
                </div>
            </div>
        </div>
        @endif

        <div class="text-xs text-gray-400 dark:text-gray-500 pt-4 border-t dark:border-gray-700">
            Criado em {{ $uf->created_at->format('d/m/Y H:i') }}
            &middot; Atualizado em {{ $uf->updated_at->format('d/m/Y H:i') }}
        </div>
    </div>
@endsection
