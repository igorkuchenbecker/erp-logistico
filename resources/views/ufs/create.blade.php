@extends('layouts.app')

@section('title', 'Nova UF - ERP Logístico')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Nova UF</h1>

    <form action="{{ route('ufs.store') }}" method="POST"
          class="bg-white rounded-lg shadow p-6 max-w-2xl space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Código</label>
            <input type="text" name="codigo" value="{{ old('codigo') }}" required maxlength="50"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
            @error('codigo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Peso (kg)</label>
                <input type="number" step="0.01" min="0" name="peso" value="{{ old('peso') }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                @error('peso') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Item</label>
                <input type="text" name="tipo_item" value="{{ old('tipo_item') }}" required maxlength="100"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                @error('tipo_item') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Origem</label>
                <input type="text" name="origem" value="{{ old('origem') }}" required maxlength="150"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                @error('origem') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Destino</label>
                <input type="text" name="destino" value="{{ old('destino') }}" required maxlength="150"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                @error('destino') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="em_transito" {{ old('status') == 'em_transito' ? 'selected' : '' }}>Em Trânsito</option>
                <option value="entregue" {{ old('status') == 'entregue' ? 'selected' : '' }}>Entregue</option>
                <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
            @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Observação (opcional)</label>
            <textarea name="observacao" rows="3" maxlength="500"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">{{ old('observacao') }}</textarea>
            @error('observacao') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                Salvar
            </button>
            <a href="{{ route('ufs.index') }}"
               class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                Cancelar
            </a>
        </div>
    </form>
@endsection
