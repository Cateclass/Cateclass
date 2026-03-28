<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <a href="{{ url('/catequista/atividades') }}" class="flex items-center gap-2 text-sm text-gray-600 hover:text-blue-600 mb-4">
        <i class="material-icons-outlined">arrow_back</i>
        Voltar para Atividades
    </a>

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Criar nova atividade</h1>

        @if(session('sucesso'))
            <div class="p-3 mb-4 text-sm text-center rounded-lg bg-green-100 text-green-700">
                {{ session('sucesso') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('catequista.criarAtividadeSubmit') }}" method="POST" class="space-y-6">

            @csrf <div>
                <label for="turma_id" class="block text-sm font-medium text-gray-700 mb-2">Para qual turma?</label>
                <select id="turma_id" name="turma_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Selecione uma turma --</option>
                    @if(isset($turmas) && $turmas->isNotEmpty())
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}" {{ old('turma_id') == $turma->id ? 'selected' : '' }}>
                                {{ $turma->nome_turma }} ({{ $turma->etapa->nome_etapa ?? 'Sem etapa' }})
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div>
                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título da atividade</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: Reflexão sobre a Campanha da Fraternidade" required>
            </div>

            <div>
                <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">Instruções (Descrição)</label>
                <textarea id="descricao" name="descricao" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Descreva o que o catequizando deve fazer...">{{ old('descricao') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="data_entrega" class="block text-sm font-medium text-gray-700 mb-2">Data de Entrega</label>
                    <input type="datetime-local" id="data_entrega" name="data_entrega" value="{{ old('data_entrega') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="tipo" class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                    <select id="tipo" name="tipo" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="reflexao" {{ old('tipo') == 'reflexao' ? 'selected' : '' }}>Reflexão</option>
                        <option value="quiz" {{ old('tipo') == 'quiz' ? 'selected' : '' }}>Quiz</option>
                        <option value="leitura" {{ old('tipo') == 'leitura' ? 'selected' : '' }}>Leitura</option>
                        <option value="video" {{ old('tipo') == 'video' ? 'selected' : '' }}>Vídeo</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Entrega</label>
                <fieldset class="mt-2">
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input id="tipo_entrega_texto" name="tipo_entrega" type="radio" value="texto" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" {{ old('tipo_entrega', 'texto') == 'texto' ? 'checked' : '' }}>
                            <label for="tipo_entrega_texto" class="ml-3 block text-sm text-gray-700">
                                Resposta com Texto (Ex: uma reflexão)
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="tipo_entrega_confirmacao" name="tipo_entrega" type="radio" value="confirmacao" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" {{ old('tipo_entrega') == 'confirmacao' ? 'checked' : '' }}>
                            <label for="tipo_entrega_confirmacao" class="ml-3 block text-sm text-gray-700">
                                Apenas Confirmação (Ex: "Reze uma Ave Maria")
                            </label>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="text-right">
                <a href="{{ url('/catequista/atividades') }}" class="text-gray-600 py-2 px-4 rounded-md hover:bg-gray-100">
                    Cancelar
                </a>
                <button type="submit" class="ml-4 inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                    Criar Atividade
                </button>
            </div>

        </form>
    </div>

</x-app-layout>
