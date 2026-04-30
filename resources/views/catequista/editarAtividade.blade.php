<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <a href="{{ route('catequista.atividades') }}" class="flex items-center gap-2 text-sm text-gray-600 hover:text-blue-600 mb-4 w-fit">
        <i class="material-icons-outlined">arrow_back</i>
        Voltar para Atividades
    </a>

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md mb-8">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar atividade</h1>

        @if(session('sucesso'))
            <div class="p-3 mb-4 text-sm text-center rounded-lg bg-green-100 text-green-700">
                {{ session('sucesso') }}
            </div>
        @elseif(session('erro'))
            <div class="p-3 mb-4 text-sm text-center rounded-lg bg-red-100 text-red-700">
                {{ session('erro') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-3 mb-4 text-sm text-center rounded-lg bg-red-100 text-red-700">
                Preencha os campos destacados corretamente e tente novamente.
            </div>
        @endif

        <form action="{{ route('catequista.atividadeUpdate', $atividade->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="turma_id" class="block text-sm font-medium text-gray-700 mb-2">Para qual turma?</label>
                <select id="turma_id" name="turma_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Selecione uma turma --</option>
                    @foreach ($turmas as $turma)
                        <option value="{{ $turma->id }}"
                            {{ old('turma_id', $atividade->turma_id) == $turma->id ? 'selected' : '' }}>
                            {{ $turma->nome_turma }}
                        </option>
                    @endforeach
                </select>
                @error('turma_id') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título da atividade</label>
                <input type="text" id="titulo" name="titulo" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('titulo', $atividade->titulo) }}" required>
                @error('titulo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">Instruções (Descrição)</label>
                <textarea id="descricao" name="descricao" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('descricao', $atividade->descricao) }}</textarea>
                @error('descricao') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="data_entrega" class="block text-sm font-medium text-gray-700 mb-2">Data de Entrega (Opcional)</label>
                    <input type="datetime-local" id="data_entrega" name="data_entrega"
                           value="{{ old('data_entrega', $atividade->data_entrega ? \Carbon\Carbon::parse($atividade->data_entrega)->format('Y-m-d\TH:i') : '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('data_entrega') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="tipo" class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                    <select id="tipo" name="tipo" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="reflexao" {{ old('tipo', $atividade->tipo) == 'reflexao' ? 'selected' : '' }}>Reflexão</option>
                        <option value="quiz" {{ old('tipo', $atividade->tipo) == 'quiz' ? 'selected' : '' }}>Quiz</option>
                        <option value="leitura" {{ old('tipo', $atividade->tipo) == 'leitura' ? 'selected' : '' }}>Leitura</option>
                        <option value="video" {{ old('tipo', $atividade->tipo) == 'video' ? 'selected' : '' }}>Vídeo</option>
                    </select>
                    @error('tipo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Entrega</label>
                <fieldset class="mt-2">
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input id="tipo_entrega_texto" name="tipo_entrega" type="radio" value="texto" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300"
                                {{ old('tipo_entrega', $atividade->tipo_entrega) == 'texto' ? 'checked' : '' }}>
                            <label for="tipo_entrega_texto" class="ml-3 block text-sm text-gray-700">
                                Resposta com Texto
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="tipo_entrega_confirmacao" name="tipo_entrega" type="radio" value="confirmacao" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300"
                                {{ old('tipo_entrega', $atividade->tipo_entrega) == 'confirmacao' ? 'checked' : '' }}>
                            <label for="tipo_entrega_confirmacao" class="ml-3 block text-sm text-gray-700">
                                Apenas Confirmação
                            </label>
                        </div>
                    </div>
                </fieldset>
                @error('tipo_entrega') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="text-right flex justify-end items-center mt-6">
                <a href="{{ route('catequista.atividades') }}" class="text-gray-600 py-2 px-4 rounded-md hover:bg-gray-100 transition duration-300">
                    Cancelar
                </a>
                <button type="submit" class="ml-4 inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300">
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
