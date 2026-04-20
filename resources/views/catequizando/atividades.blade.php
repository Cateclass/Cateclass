<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Atividades e Reflexões
        </h1>
        <p class="mt-1 text-md text-gray-500">
            Veja suas atividades, entregue as pendentes e acompanhe seu progresso.
        </p>
    </div>

    @if(session('sucesso'))
        <div class="p-3 my-4 text-sm text-center rounded-lg bg-green-100 text-green-700">
            {{ session('sucesso') }}
        </div>
    @elseif(session('erro'))
        <div class="p-3 my-4 text-sm text-center rounded-lg bg-red-100 text-red-700">
            {{ session('erro') }}
        </div>
    @endif

    <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['total'] }}</p>
            </div>
            <div class="bg-gray-100 p-3 rounded-full">
                <i class="material-icons text-gray-600">assignment</i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Pendentes</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['pendentes'] }}</p>
            </div>
            <div class="bg-gray-100 p-3 rounded-full">
                <i class="material-icons text-gray-600">schedule</i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Não Enviadas</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['naoEnviadas'] }}</p>
            </div>
            <div class="bg-gray-100 p-3 rounded-full">
                <i class="material-icons text-red-500">error_outline</i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Concluídas</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['concluidas'] }}</p>
            </div>
            <div class="bg-gray-100 p-3 rounded-full">
                <i class="material-icons text-green-500">check_circle</i>
            </div>
        </div>
    </div>

    @php
        $classeAtiva = "py-4 px-1 border-b-2 border-indigo-600 font-semibold text-indigo-600";
        $classeInativa = "py-4 px-1 border-b-2 border-transparent text-gray-500 font-medium hover:text-gray-700 hover:border-gray-300";
    @endphp

    <div class="mt-8 w-full border-b border-gray-200">
        <nav class="flex gap-8 -mb-px">
            <a href="{{ route('catequizando.atividades', ['filtro' => 'todas']) }}"
               class="{{ $filtro == 'todas' ? $classeAtiva : $classeInativa }}">
                Todas
            </a>

            <a href="{{ route('catequizando.atividades', ['filtro' => 'pendentes']) }}"
               class="{{ $filtro == 'pendentes' ? $classeAtiva : $classeInativa }}">
                Pendentes
            </a>

            <a href="{{ route('catequizando.atividades', ['filtro' => 'atrasadas']) }}"
               class="{{ $filtro == 'atrasadas' ? $classeAtiva : $classeInativa }}">
                Atrasadas
            </a>

            <a href="{{ route('catequizando.atividades', ['filtro' => 'concluidas']) }}"
               class="{{ $filtro == 'concluidas' ? $classeAtiva : $classeInativa }}">
                Concluídas
            </a>
        </nav>
    </div>

    <div class="mt-6 flex flex-col gap-6">

        @if ($lista_atividades->isEmpty())
            <p class="text-gray-600 p-4 bg-white rounded-lg shadow-md">
                Nenhuma atividade encontrada para este filtro.
            </p>
        @else
            @foreach ($lista_atividades as $atividade)

                @php
                    // Lógica para verificar status da atividade
                    // Assumindo que você carregou as respostas do usuário na query
                    $estaConcluida = $atividade->respostas->isNotEmpty();

                    $estaAtrasada = false;
                    $classeData = 'text-gray-500';

                    if ($atividade->data_entrega && !$estaConcluida) {
                        if (\Carbon\Carbon::parse($atividade->data_entrega)->isPast()) {
                            $estaAtrasada = true;
                            $classeData = 'text-red-600 font-semibold bg-red-100 px-2 py-1 rounded-md';
                        }
                    }
                @endphp

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">

                        <div class="flex items-center gap-3">
                            <h2 class="text-xl font-semibold text-gray-800">
                                {{ $atividade->titulo }}
                            </h2>
                            <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                {{ $atividade->tipo }}
                            </span>
                        </div>

                        <div class="mt-4 sm:mt-0">
                            @if ($estaConcluida)
                                <a href="{{ route("catequizando.verAtividade", $atividade) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition-colors">
                                    Ver Resposta
                                </a>
                            @elseif ($estaAtrasada)
                                <a href="{{ route("catequizando.verAtividade", $atividade) }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-red-700 transition-colors">
                                    Ver (Atrasada)
                                </a>
                            @else
                                <a href="{{ route("catequizando.verAtividade", $atividade) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition-colors">
                                    Ver Atividade
                                </a>
                            @endif
                        </div>
                    </div>

                    <p class="mt-3 text-sm text-gray-600">
                        {{ $atividade->descricao ?? '' }}
                    </p>

                    <div class="mt-4 pt-4 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8">

                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <i class="material-icons text-base">people_outline</i>
                            <span>Turma: {{ $atividade->turma->nome_turma ?? 'Sem turma' }}</span>
                        </div>

                        <div class="flex items-center gap-2 text-sm {{ $classeData }}">
                            <i class="material-icons text-base">calendar_today</i>
                            <span>
                                Entrega:
                                @if ($atividade->data_entrega)
                                    {{ \Carbon\Carbon::parse($atividade->data_entrega)->format('d/m/Y - H:i') }}
                                @else
                                    Sem data definida
                                @endif
                            </span>
                        </div>

                        <div class="ml-auto">
                            @if ($estaConcluida)
                                <div class="flex items-center gap-2 text-sm text-green-600 font-medium">
                                    <i class="material-icons text-base">check_circle</i>
                                    <span>Concluído</span>
                                </div>
                            @elseif ($estaAtrasada)
                                <div class="flex items-center gap-2 text-sm text-red-600 font-medium">
                                    <i class="material-icons text-base">error</i>
                                    <span>Atrasada</span>
                                </div>
                            @else
                                <div class="flex items-center gap-2 text-sm text-blue-600 font-medium">
                                    <i class="material-icons text-base">schedule</i>
                                    <span>Pendente</span>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
        @endif

    </div>
</x-app-layout>
