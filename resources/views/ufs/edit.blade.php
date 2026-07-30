@extends('layouts.app')

@section('title', 'Editar UF - ERP Logístico')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar UF #{{ $uf->codigo }}</h1>

    <form action="{{ route('ufs.update', $uf) }}" method="POST"
          class="bg-white rounded-lg shadow p-6 max-w-2xl space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Código</label>
            <input type="text" value="{{ $uf->codigo }}" disabled
                   class="w-full border border-gray-200 bg-gray-50 text-gray-400 rounded-lg px-4 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Peso (kg)</label>
            <input type="text" name="peso" value="{{ old('peso', number_format($uf->peso, 2, ',', '.')) }}" placeholder="ex: 4 ou ,4"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
            @error('peso') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Item</label>
            <select name="tipo_item" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                <option value="">Selecione...</option>
                <option value="Caixa de madeira" {{ old('tipo_item', $uf->tipo_item) == 'Caixa de madeira' ? 'selected' : '' }}>Caixa de madeira</option>
                <option value="Caixa de papelão" {{ old('tipo_item', $uf->tipo_item) == 'Caixa de papelão' ? 'selected' : '' }}>Caixa de papelão</option>
                <option value="Plástico" {{ old('tipo_item', $uf->tipo_item) == 'Plástico' ? 'selected' : '' }}>Plástico</option>
                <option value="Palete" {{ old('tipo_item', $uf->tipo_item) == 'Palete' ? 'selected' : '' }}>Palete</option>
                <option value="Amarrado" {{ old('tipo_item', $uf->tipo_item) == 'Amarrado' ? 'selected' : '' }}>Amarrado</option>
                <option value="Mala Case" {{ old('tipo_item', $uf->tipo_item) == 'Mala Case' ? 'selected' : '' }}>Mala Case</option>
            </select>
            @error('tipo_item') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Origem</label>
                <select name="origem" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    <option value="">Selecione...</option>
                    <option value="ARM-MACAÉ" {{ old('origem', $uf->origem) == 'ARM-MACAÉ' ? 'selected' : '' }}>ARM-MACAÉ</option>
                    <option value="IMBETIBA" {{ old('origem', $uf->origem) == 'IMBETIBA' ? 'selected' : '' }}>IMBETIBA</option>
                    <option value="IMBOASSICA" {{ old('origem', $uf->origem) == 'IMBOASSICA' ? 'selected' : '' }}>IMBOASSICA</option>
                    <option value="ARM-RIO" {{ old('origem', $uf->origem) == 'ARM-RIO' ? 'selected' : '' }}>ARM-RIO</option>
                </select>
                @error('origem') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Destino</label>
                <select name="destino" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    <option value="">Selecione...</option>
                    <option value="PACU" {{ old('destino', $uf->destino) == 'PACU' ? 'selected' : '' }}>PACU</option>
                    <option value="BMAC" {{ old('destino', $uf->destino) == 'BMAC' ? 'selected' : '' }}>BMAC</option>
                </select>
                @error('destino') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                <option value="">Selecione...</option>
                <option value="pendente" {{ old('status', $uf->status) == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="aguardando_coleta" {{ old('status', $uf->status) == 'aguardando_coleta' ? 'selected' : '' }}>Aguardando Coleta</option>
                <option value="coletado" {{ old('status', $uf->status) == 'coletado' ? 'selected' : '' }}>Coletado</option>
                <option value="unitizado" {{ old('status', $uf->status) == 'unitizado' ? 'selected' : '' }}>Unitizado</option>
                <option value="liberado_programacao" {{ old('status', $uf->status) == 'liberado_programacao' ? 'selected' : '' }}>Liberado Programação</option>
                <option value="em_transito" {{ old('status', $uf->status) == 'em_transito' ? 'selected' : '' }}>Em Trânsito</option>
                <option value="entregue" {{ old('status', $uf->status) == 'entregue' ? 'selected' : '' }}>Entregue</option>
                <option value="cancelado" {{ old('status', $uf->status) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
            @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="border-t pt-4">
            <h3 class="font-bold text-gray-700 mb-3">Informações de Transporte</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Caminhão</label>
                    <input type="text" name="tipo_caminhao" value="{{ old('tipo_caminhao', $uf->tipo_caminhao) }}"
                           placeholder="ex: Truck, Carreta, VUC"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    @error('tipo_caminhao') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Colaborador</label>
                    <input type="text" name="colaborador" value="{{ old('colaborador', $uf->colaborador) }}"
                           placeholder="Nome do motorista"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    @error('colaborador') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Trajeto</label>
                    <input type="text" name="trajeto" value="{{ old('trajeto', $uf->trajeto) }}"
                           placeholder="ex: BR-101 Norte"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    @error('trajeto') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Observação (opcional)</label>
            <textarea name="observacao" rows="3" maxlength="500"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">{{ old('observacao', $uf->observacao) }}</textarea>
            @error('observacao') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                Atualizar
            </button>
            <a href="{{ route('ufs.index') }}"
               class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
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
