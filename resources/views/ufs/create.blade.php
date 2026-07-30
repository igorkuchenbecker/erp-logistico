@extends('layouts.app')

@section('title', 'Nova UF - ERP Logístico')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Nova UF</h1>

    <form action="{{ route('ufs.store') }}" method="POST"
          class="bg-white dark:bg-gray-900 rounded-lg shadow p-6 max-w-2xl space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Código</label>
            <input type="text" disabled value="{{ $proximoCodigo }}"
                   class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-semibold rounded-lg px-4 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Peso (kg)</label>
            <input type="text" name="peso" value="{{ old('peso') }}" placeholder="ex: 4 ou ,4"
                   class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
            @error('peso') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tipo de Item</label>
            <select name="tipo_item" required
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                <option value="">Selecione...</option>
                <option value="Caixa de madeira" {{ old('tipo_item') == 'Caixa de madeira' ? 'selected' : '' }}>Caixa de madeira</option>
                <option value="Caixa de papelão" {{ old('tipo_item') == 'Caixa de papelão' ? 'selected' : '' }}>Caixa de papelão</option>
                <option value="Plástico" {{ old('tipo_item') == 'Plástico' ? 'selected' : '' }}>Plástico</option>
                <option value="Palete" {{ old('tipo_item') == 'Palete' ? 'selected' : '' }}>Palete</option>
                <option value="Amarrado" {{ old('tipo_item') == 'Amarrado' ? 'selected' : '' }}>Amarrado</option>
                <option value="Mala Case" {{ old('tipo_item') == 'Mala Case' ? 'selected' : '' }}>Mala Case</option>
            </select>
            @error('tipo_item') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Origem</label>
                <select name="origem" required
                        class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    <option value="">Selecione...</option>
                    <option value="ARM-MACAÉ" {{ old('origem') == 'ARM-MACAÉ' ? 'selected' : '' }}>ARM-MACAÉ</option>
                    <option value="IMBETIBA" {{ old('origem') == 'IMBETIBA' ? 'selected' : '' }}>IMBETIBA</option>
                    <option value="IMBOASSICA" {{ old('origem') == 'IMBOASSICA' ? 'selected' : '' }}>IMBOASSICA</option>
                    <option value="ARM-RIO" {{ old('origem') == 'ARM-RIO' ? 'selected' : '' }}>ARM-RIO</option>
                </select>
                @error('origem') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Destino</label>
                <select name="destino" required
                        class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    <option value="">Selecione...</option>
                    <option value="PACU" {{ old('destino') == 'PACU' ? 'selected' : '' }}>PACU</option>
                    <option value="BMAC" {{ old('destino') == 'BMAC' ? 'selected' : '' }}>BMAC</option>
                </select>
                @error('destino') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
            <select name="status" required
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                <option value="">Selecione...</option>
                <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="aguardando_coleta" {{ old('status') == 'aguardando_coleta' ? 'selected' : '' }}>Aguardando Coleta</option>
                <option value="coletado" {{ old('status') == 'coletado' ? 'selected' : '' }}>Coletado</option>
                <option value="unitizado" {{ old('status') == 'unitizado' ? 'selected' : '' }}>Unitizado</option>
                <option value="liberado_programacao" {{ old('status') == 'liberado_programacao' ? 'selected' : '' }}>Liberado Programação</option>
                <option value="em_transito" {{ old('status') == 'em_transito' ? 'selected' : '' }}>Em Trânsito</option>
                <option value="entregue" {{ old('status') == 'entregue' ? 'selected' : '' }}>Entregue</option>
                <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
            @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Observação (opcional)</label>
            <textarea name="observacao" rows="3" maxlength="500"
                      class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">{{ old('observacao') }}</textarea>
            @error('observacao') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                Salvar
            </button>
            <a href="{{ route('ufs.index') }}"
               class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                Cancelar
            </a>
        </div>
    </form>
@endsection

@push('scripts')
<script>
document.querySelector('input[name="peso"]').addEventListener('blur', function() {
    if (!this.value) return;
    let v = this.value.replace(/\./g, '').replace(',', '.');
    let n = parseFloat(v);
    if (!isNaN(n)) this.value = n.toFixed(2).replace('.', ',');
});
</script>
@endpush
