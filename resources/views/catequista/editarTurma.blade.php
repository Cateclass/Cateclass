<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <a href="{{ route('catequista.turmas') }}" class="flex items-center gap-2 text-sm text-gray-600 hover:text-blue-600 mb-4">
        <i class="material-icons-outlined">arrow_back</i>
        Voltar para Minhas Turmas
    </a>

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Turma</h1>

        <form action="{{ route('catequista.editarTurmaSubmit', $turma->id) }}" method="POST">

            @csrf
            @method('PUT') @if(session('sucesso'))
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

            <div class="mb-4">
                <label for="nome_turma" class="block text-sm font-medium text-gray-700 mb-1">Nome da Turma</label>
                <input type="text" name="nome_turma" id="nome_turma" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 focus:outline-none"
                       value="{{ $turma->nome_turma }}" readonly title="O nome da turma é gerado automaticamente.">
            </div>

            <div class="mb-4">
                <label for="etapa_id" class="block text-sm font-medium text-gray-700 mb-1">Etapa</label>
                <select name="etapa_id" id="etapa_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                    <option value="">Selecione uma etapa</option>
                    @if(isset($etapas) && $etapas->isNotEmpty())
                        @foreach ($etapas as $etapa)
                            <option value="{{ $etapa->id }}" {{ old('etapa_id', $turma->etapa_id) == $etapa->id ? 'selected' : '' }}>
                                {{ $etapa->nome_etapa }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="mb-4">
                <label for="tipo_turma" class="block text-sm font-medium text-gray-700 mb-1">Modalidade / Tipo</label>
                <select name="tipo_turma" id="tipo_turma" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                    <option value="Online" {{ old('tipo_turma', $turma->tipo_turma) == 'Online' ? 'selected' : '' }}>Online</option>
                    <option value="Presencial" {{ old('tipo_turma', $turma->tipo_turma) == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                    <option value="Eucaristia" {{ old('tipo_turma', $turma->tipo_turma) == 'Eucaristia' ? 'selected' : '' }}>Eucaristia</option>
                    <option value="Crisma" {{ old('tipo_turma', $turma->tipo_turma) == 'Crisma' ? 'selected' : '' }}>Crisma</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="dia_horario" class="block text-sm font-medium text-gray-700 mb-1">Dia e Horário</label>
                <input type="text" name="dia_horario" id="dia_horario" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                       value="{{ old('dia_horario', $turma->dia_horario ?? '') }}" placeholder="Ex: Sábado 09h" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="data_inicio" class="block text-sm font-medium text-gray-700 mb-1">Data de Início</label>
                    <input type="date" name="data_inicio" id="data_inicio" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                           value="{{ old('data_inicio', $turma->data_inicio) }}" required>
                </div>
                <div>
                    <label for="data_termino" class="block text-sm font-medium text-gray-700 mb-1">Data de Término (Opcional)</label>
                    <input type="date" name="data_termino" id="data_termino" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                           value="{{ old('data_termino', $turma->data_termino) }}">
                </div>
            </div>

            <div class="flex justify-end items-center">
                <div class="flex gap-4">
                    <a href="{{ route('catequista.turmas') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Salvar Alterações
                    </button>
                </div>
            </div>

        </form>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <form action="{{ route('catequista.deleteTurma', $turma->id) }}" method="POST" onsubmit="return confirm('TEM CERTEZA? Excluir uma turma é uma ação permanente e apagará TODAS as suas atividades, respostas e matrículas de alunos. Esta ação não pode ser desfeita.');" class="m-0">
                @csrf
                @method('DELETE') <button type="submit" class="text-sm font-medium text-red-600 hover:bg-red-50 py-2 px-4 rounded-md">
                    Excluir Turma
                </button>
            </form>
        </div>

    </div>
</x-app-layout>
