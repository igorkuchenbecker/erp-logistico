@extends('layouts.app')

@section('title', 'UFs - ERP Logístico')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Unidades de Frete (UF)</h1>
        <a href="{{ route('ufs.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
            + Cadastrar UF
        </a>
    </div>

    <form method="GET" class="flex gap-3 mb-6">
        <input type="text" name="search" placeholder="Buscar por código, origem ou destino..."
               value="{{ request('search') }}"
               class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400">
        <select name="status"
                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <option value="">Todos os status</option>
            <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="em_transito" {{ request('status') == 'em_transito' ? 'selected' : '' }}>Em Trânsito</option>
            <option value="entregue" {{ request('status') == 'entregue' ? 'selected' : '' }}>Entregue</option>
            <option value="cancelado" {{ request('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
        </select>
        <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
            Filtrar
        </button>
    </form>

    @if($ufs->isEmpty())
        <div class="bg-white rounded-lg shadow p-8 text-center text-gray-500">
            Nenhuma UF cadastrada ainda.
        </div>
    @else
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 text-left text-sm font-medium text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Código</th>
                        <th class="px-4 py-3">Peso (kg)</th>
                        <th class="px-4 py-3">Tipo</th>
                        <th class="px-4 py-3">Origem</th>
                        <th class="px-4 py-3">Destino</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($ufs as $uf)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">{{ $uf->codigo }}</td>
                        <td class="px-4 py-3">{{ number_format($uf->peso, 2, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $uf->tipo_item }}</td>
                        <td class="px-4 py-3">{{ $uf->origem }}</td>
                        <td class="px-4 py-3">{{ $uf->destino }}</td>
                        <td class="px-4 py-3">
                            <x-status-badge :status="$uf->status" />
                        </td>
                        <td class="px-4 py-3 text-right space-x-2">
                            <a href="{{ route('ufs.show', $uf) }}"
                               class="text-indigo-600 hover:text-indigo-800 text-sm">Ver</a>
                            <a href="{{ route('ufs.edit', $uf) }}"
                               class="text-blue-600 hover:text-blue-800 text-sm">Editar</a>
                            <form action="{{ route('ufs.destroy', $uf) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Remover UF {{ $uf->codigo }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $ufs->links() }}
        </div>
    @endif
@endsection
