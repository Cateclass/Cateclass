<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Criar Nova Turma</h1>

        <form action="{{ route('catequista.criarTurmaSubmit') }}" method="POST">

            @csrf

            @if(session('sucesso'))
                <div class="p-3 mb-4 text-sm text-center rounded-lg bg-green-100 text-green-700">
                    {{ session('sucesso') }}
                </div>
            @endif

            @if(session('erro'))
                <div class="p-3 mb-4 text-sm text-center rounded-lg bg-red-100 text-red-700">
                    {{ session('erro') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="p-3 mb-4 text-sm rounded-lg bg-red-100 text-red-700">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-4">
                <label for="etapa_id" class="block text-sm font-medium text-gray-700 mb-1">Etapa</label>
                <select name="etapa_id" id="etapa_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                    <option value="">Selecione uma etapa</option>

                    @if(isset($etapas) && $etapas->isNotEmpty())
                        @foreach ($etapas as $etapa)
                            <option value="{{ $etapa->id }}">
                                {{ $etapa->nome_etapa }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="mb-4">
                <label for="tipo_turma" class="block text-sm font-medium text-gray-700 mb-1">Tipo da Turma</label>
                <select name="tipo_turma" id="tipo_turma" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                    <option value="Eucaristia">Eucaristia</option>
                    <option value="Crisma">Crisma</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="dia_horario" class="block text-sm font-medium text-gray-700 mb-1">Dia e Horário</label>
                <input type="text" name="dia_horario" id="dia_horario" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Ex: Sábado 09h" required>
                <p class="text-xs text-gray-500 mt-1">Isso será usado para gerar o nome da turma.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="data_inicio" class="block text-sm font-medium text-gray-700 mb-1">Data de Início</label>
                    <input type="date" name="data_inicio" id="data_inicio" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label for="data_termino" class="block text-sm font-medium text-gray-700 mb-1">Data de Término (Opcional)</label>
                    <input type="date" name="data_termino" id="data_termino" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ url('/catequista/turmas') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Criar Turma
                </button>
            </div>

        </form>
    </div>

</x-app-layout>
