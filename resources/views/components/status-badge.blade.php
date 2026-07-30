@props(['status'])

@php
    $classes = match($status) {
        'pendente'    => 'bg-yellow-100 text-yellow-800',
        'em_transito' => 'bg-blue-100 text-blue-800',
        'entregue'    => 'bg-green-100 text-green-800',
        'cancelado'   => 'bg-red-100 text-red-800',
        default       => 'bg-gray-100 text-gray-800',
    };

    $label = match($status) {
        'pendente'    => 'Pendente',
        'em_transito' => 'Em Trânsito',
        'entregue'    => 'Entregue',
        'cancelado'   => 'Cancelado',
        default       => $status,
    };
@endphp

<span class="inline-block px-2 py-0.5 text-xs font-semibold rounded-full {{ $classes }}">
    {{ $label }}
</span>
