<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4 hover:text-[#4A9FFF] transition-colors">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="max-w-3xl mx-auto mt-8" style="font-family: 'Roboto', sans-serif;">

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">

            <h2 class="text-2xl font-bold text-gray-900 mb-6" style="font-family: 'Inter', sans-serif;">
                Editar Turma: <span class="text-[#4A9FFF]">{{ $turma->nome_turma }}</span>
            </h2>

            <form action="{{ route('coordenadora.turmas.update', $turma) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT') <div>
                    <label for="nome_turma" class="block text-sm font-medium text-gray-700 mb-1">Nome da Turma</label>
                    <input type="text" id="nome_turma" name="nome_turma" value="{{ old('nome_turma', $turma->nome_turma) }}" required
                           class="w-full border border-gray-300 rounded-lg p-2.5 text-gray-700 focus:ring-[#4A9FFF] focus:border-[#4A9FFF] outline-none transition-colors shadow-sm">
                    @error('nome_turma') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="etapa_id" class="block text-sm font-medium text-gray-700 mb-1">Etapa</label>
                        <select id="etapa_id" name="etapa_id" required
                                class="w-full border border-gray-300 rounded-lg p-2.5 text-gray-700 focus:ring-[#4A9FFF] focus:border-[#4A9FFF] outline-none transition-colors shadow-sm bg-white">
                            <option value="">Selecione uma etapa</option>
                            @foreach($etapas as $etapa)
                                <option value="{{ $etapa->id }}" {{ old('etapa_id', $turma->etapa_id) == $etapa->id ? 'selected' : '' }}>
                                    {{ $etapa->nome_etapa }}
                                </option>
                            @endforeach
                        </select>
                        @error('etapa_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="tipo_turma" class="block text-sm font-medium text-gray-700 mb-1">Tipo da Turma</label>
                        <select id="tipo_turma" name="tipo_turma" required
                                class="w-full border border-gray-300 rounded-lg p-2.5 text-gray-700 focus:ring-[#4A9FFF] focus:border-[#4A9FFF] outline-none transition-colors shadow-sm bg-white">
                            <option value="Eucaristia" {{ old('tipo_turma', $turma->tipo_turma) == 'Eucaristia' ? 'selected' : '' }}>Eucaristia</option>
                            <option value="Crisma" {{ old('tipo_turma', $turma->tipo_turma) == 'Crisma' ? 'selected' : '' }}>Crisma</option>
                            <option value="Catequese Adultos" {{ old('tipo_turma', $turma->tipo_turma) == 'Catequese Adultos' ? 'selected' : '' }}>Catequese Adultos</option>
                            <option value="Pré-Catequese" {{ old('tipo_turma', $turma->tipo_turma) == 'Pré-Catequese' ? 'selected' : '' }}>Pré-Catequese</option>
                        </select>
                        @error('tipo_turma') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label for="catequista_id" class="block text-sm font-medium text-gray-700 mb-1">Catequista Responsável</label>
                    <select id="catequista_id" name="catequista_id"
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-gray-700 focus:ring-[#4A9FFF] focus:border-[#4A9FFF] outline-none transition-colors shadow-sm bg-white">
                        <option value="">Sem catequista atribuído</option>
                        @foreach($catequistas as $catequista)
                            <option value="{{ $catequista->id }}" {{ old('catequista_id', $turma->catequista_id) == $catequista->id ? 'selected' : '' }}>
                                {{ $catequista->nome ?? $catequista->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('catequista_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="data_inicio" class="block text-sm font-medium text-gray-700 mb-1">Data de Início</label>
                        <input type="date" id="data_inicio" name="data_inicio" value="{{ old('data_inicio', $turma->data_inicio) }}" required
                               class="w-full border border-gray-300 rounded-lg p-2.5 text-gray-700 focus:ring-[#4A9FFF] focus:border-[#4A9FFF] outline-none transition-colors shadow-sm">
                        @error('data_inicio') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="data_termino" class="block text-sm font-medium text-gray-700 mb-1">Data de Término (Opcional)</label>
                        <input type="date" id="data_termino" name="data_termino" value="{{ old('data_termino', $turma->data_termino) }}"
                               class="w-full border border-gray-300 rounded-lg p-2.5 text-gray-700 focus:ring-[#4A9FFF] focus:border-[#4A9FFF] outline-none transition-colors shadow-sm">
                        @error('data_termino') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('coordenadora.turmas') }}"
                       class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors duration-200">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-5 py-2.5 bg-[#4A9FFF] hover:bg-blue-600 text-white font-medium rounded-lg shadow-sm transition-colors duration-200">
                        Salvar Alterações
                    </button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>
