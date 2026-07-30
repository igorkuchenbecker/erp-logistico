@extends('layouts.app')

@section('title', 'Rastreamento - ERP Logístico')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Rastreamento</h1>
    </div>

    @if($rastreamentos->isEmpty())
        <div class="bg-white rounded-lg shadow p-8 text-center text-gray-500">
            Nenhuma carga em rastreamento no momento.
        </div>
    @else
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 text-left text-sm font-medium text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Cód. Rastreio</th>
                        <th class="px-4 py-3">UF</th>
                        <th class="px-4 py-3">Origem</th>
                        <th class="px-4 py-3">Destino</th>
                        <th class="px-4 py-3">Caminhão</th>
                        <th class="px-4 py-3">Colaborador</th>
                        <th class="px-4 py-3">Prazo</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($rastreamentos as $r)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <a href="{{ route('rastreamento.show', $r->codigo_rastreio) }}"
                               class="text-emerald-700 font-bold hover:underline">
                                {{ $r->codigo_rastreio }}
                            </a>
                        </td>
                        <td class="px-4 py-3">{{ $r->codigo }}</td>
                        <td class="px-4 py-3">{{ $r->origem }}</td>
                        <td class="px-4 py-3">{{ $r->destino }}</td>
                        <td class="px-4 py-3">{{ $r->tipo_caminhao ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $r->colaborador ?? '—' }}</td>
                        <td class="px-4 py-3">
                            @if($r->prazo_entrega)
                                {{ $r->prazo_entrega->format('d/m/Y H:i') }}
                            @else
                                —
                            @endif
                        </td>
                        <td class="px-4 py-3"><x-status-badge :status="$r->status" /></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $rastreamentos->links() }}</div>
    @endif
@endsection
