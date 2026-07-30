@extends('layouts.app')

@section('title', 'Dashboard - ERP Logístico')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-indigo-600">{{ $total }}</p>
            <p class="text-sm text-gray-500 mt-1">Total de UFs</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-3xl font-bold text-yellow-600">{{ $porStatus['pendente'] ?? 0 }}</p>
            <p class="text-sm text-gray-500 mt-1">Pendentes</p>
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

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                            <td class="py-2">{{ $item->destino }}</td>
                            <td class="py-2 text-right font-medium">{{ $item->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
