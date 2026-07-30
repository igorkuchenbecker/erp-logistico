@extends('layouts.app')

@section('title', 'Dashboard - ERP Logístico')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

    <div class="grid grid-cols-3 md:grid-cols-5 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-indigo-600">{{ $total }}</p>
            <p class="text-sm text-gray-500 mt-1">Total</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-yellow-600">{{ $porStatus['pendente'] ?? 0 }}</p>
            <p class="text-sm text-gray-500 mt-1">Pendentes</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-orange-600">{{ $porStatus['aguardando_coleta'] ?? 0 }}</p>
            <p class="text-sm text-gray-500 mt-1">Aguar. Coleta</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-cyan-600">{{ $porStatus['coletado'] ?? 0 }}</p>
            <p class="text-sm text-gray-500 mt-1">Coletados</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-purple-600">{{ $porStatus['unitizado'] ?? 0 }}</p>
            <p class="text-sm text-gray-500 mt-1">Unitizados</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-teal-600">{{ $porStatus['liberado_programacao'] ?? 0 }}</p>
            <p class="text-sm text-gray-500 mt-1">Lib. Programação</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-blue-600">{{ $porStatus['em_transito'] ?? 0 }}</p>
            <p class="text-sm text-gray-500 mt-1">Em Trânsito</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-green-600">{{ $porStatus['entregue'] ?? 0 }}</p>
            <p class="text-sm text-gray-500 mt-1">Entregues</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-red-600">{{ $porStatus['cancelado'] ?? 0 }}</p>
            <p class="text-sm text-gray-500 mt-1">Cancelados</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="font-bold text-gray-700 mb-3">Top Destinos</h2>
            @if($porDestino->isEmpty())
                <p class="text-gray-400 text-sm">Nenhum dado ainda.</p>
            @else
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-500">
                            <th class="pb-2">Destino</th>
                            <th class="pb-2 text-right">UFs</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($porDestino as $item)
                        <tr>
                            <td class="py-2">
                                <a href="{{ route('destino.show', $item->destino) }}" class="text-indigo-600 hover:underline font-medium">
                                    {{ $item->destino }}
                                </a>
                            </td>
                            <td class="py-2 text-right font-medium">{{ $item->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="font-bold text-gray-700 mb-3">Em Trânsito</h2>
            @if($emTransito->isEmpty())
                <p class="text-gray-400 text-sm">Nenhuma carga em trânsito.</p>
            @else
                <div class="space-y-3">
                    @foreach($emTransito as $uf)
                    <div class="border border-gray-200 rounded-lg p-3">
                        <div class="flex items-center justify-between mb-1">
                            <a href="{{ route('rastreamento.show', $uf->codigo_rastreio) }}"
                               class="text-emerald-700 font-bold hover:underline text-lg">
                                {{ $uf->codigo_rastreio }}
                            </a>
                            <x-status-badge :status="$uf->status" />
                        </div>
                        <p class="text-xs text-gray-500">
                            {{ $uf->origem }} → {{ $uf->destino }}
                        </p>
                        @if($uf->prazo_entrega)
                            <p class="text-xs mt-1 {{ $uf->prazo_entrega->isPast() ? 'text-red-500' : 'text-gray-400' }}">
                                Prazo: {{ $uf->prazo_entrega->format('d/m/Y H:i') }}
                            </p>
                        @endif
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="font-bold text-gray-700 mb-3">Últimas UFs Cadastradas</h2>
            @if($recentes->isEmpty())
                <p class="text-gray-400 text-sm">Nenhuma UF cadastrada.</p>
            @else
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-500">
                            <th class="pb-2">Código</th>
                            <th class="pb-2">Status</th>
                            <th class="pb-2 text-right">Data</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($recentes as $uf)
                        <tr>
                            <td class="py-2">
                                <a href="{{ route('ufs.show', $uf) }}" class="text-indigo-600 hover:underline">
                                    {{ $uf->codigo }}
                                </a>
                            </td>
                            <td class="py-2">
                                <x-status-badge :status="$uf->status" />
                            </td>
                            <td class="py-2 text-right text-gray-500">{{ $uf->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
