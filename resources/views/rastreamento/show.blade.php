@extends('layouts.app')

@section('title', "Rastreio {$uf->codigo_rastreio} - ERP Logístico")

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            Rastreio — {{ $uf->codigo_rastreio }}
        </h1>
        <a href="{{ route('rastreamento.index') }}"
           class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
            Voltar
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-6 space-y-4">
            <h2 class="font-bold text-gray-700 dark:text-gray-200 border-b dark:border-gray-700 pb-2">Informações da Carga</h2>

            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">UF</p>
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
                <p class="text-sm text-gray-500 dark:text-gray-400">Observação</p>
                <p class="font-medium">{{ $uf->observacao ?? '—' }}</p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-6 space-y-4">
            <h2 class="font-bold text-gray-700 dark:text-gray-200 border-b dark:border-gray-700 pb-2">Detalhes do Transporte</h2>

            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Tipo de Caminhão</p>
                <p class="font-medium">{{ $uf->tipo_caminhao ?? 'Não informado' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Colaborador</p>
                <p class="font-medium">{{ $uf->colaborador ?? 'Não informado' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Trajeto</p>
                <p class="font-medium">{{ $uf->trajeto ?? 'Não informado' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Origem</p>
                <p class="font-medium">{{ $uf->origem }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Destino</p>
                <p class="font-medium">{{ $uf->destino }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Prazo Máximo de Entrega</p>
                <p class="font-medium">
                    @if($uf->prazo_entrega)
                        {{ $uf->prazo_entrega->format('d/m/Y H:i') }}
                        @if($uf->prazo_entrega->isPast())
                            <span class="text-red-600 text-sm font-semibold">(Vencido)</span>
                        @else
                            <span class="text-green-600 text-sm font-semibold">
                                ({{ intval(now()->diffInHours($uf->prazo_entrega, false)) }}h restantes)
                            </span>
                        @endif
                    @else
                        —
                    @endif
                </p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                <x-status-badge :status="$uf->status" />
            </div>
        </div>
    </div>
@endsection
