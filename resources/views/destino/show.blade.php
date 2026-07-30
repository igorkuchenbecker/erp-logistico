@extends('layouts.app')

@section('title', "{$info['nome']} - ERP Logístico")

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $info['nome'] }}</h1>
        <a href="{{ route('dashboard') }}"
           class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
            Voltar
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-6 space-y-4">
            <h2 class="font-bold text-gray-700 dark:text-gray-200 border-b dark:border-gray-700 pb-2">Informações do Destino</h2>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Endereço</p>
                <p class="font-medium">{{ $info['endereco'] }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Detalhes</p>
                <p class="font-medium">{{ $info['detalhes'] }}</p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-6">
            <h2 class="font-bold text-gray-700 dark:text-gray-200 border-b dark:border-gray-700 pb-2 mb-3">UFs com destino a {{ $destino }}</h2>
            @if($ufs->isEmpty())
                <p class="text-gray-400 dark:text-gray-500 text-sm">Nenhuma UF com este destino.</p>
            @else
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-500 dark:text-gray-400">
                            <th class="pb-2">Código</th>
                            <th class="pb-2">Origem</th>
                            <th class="pb-2">Status</th>
                            <th class="pb-2 text-right">Data</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @foreach($ufs as $uf)
                        <tr>
                            <td class="py-2">
                                <a href="{{ route('ufs.show', $uf) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                    {{ $uf->codigo }}
                                </a>
                            </td>
                            <td class="py-2">{{ $uf->origem }}</td>
                            <td class="py-2"><x-status-badge :status="$uf->status" /></td>
                            <td class="py-2 text-right text-gray-500 dark:text-gray-400">{{ $uf->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">{{ $ufs->links() }}</div>
            @endif
        </div>
    </div>
@endsection
