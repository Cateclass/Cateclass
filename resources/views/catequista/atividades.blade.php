<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="flex flex-col md:flex-row justify-between md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Atividades e Reflexões
            </h1>
            <p class="mt-1 text-md text-gray-500">
                Proponha atividades e acompanhe a participação da turma.
            </p>
        </div>
        <a href="{{ route('catequista.criarAtividade') }}" class="flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition duration-300">
            <i class="material-icons-outlined">add_circle_outline</i>
            <span>Adicionar ou criar atividade</span>
        </a>
    </div>

    @if(session('sucesso'))
        <div class="p-3 mb-4 text-sm text-center rounded-lg bg-green-100 text-green-700">
            {{ session('sucesso') }}
        </div>
    @elseif(session('erro'))
        <div class="p-3 mb-4 text-sm text-center rounded-lg bg-red-100 text-red-700">
            {{ session('erro') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
            <span class="p-3 rounded-full bg-gray-100 text-gray-600 mb-2">
                <i class="material-icons-outlined text-3xl">inventory_2</i>
            </span>
            <p class="text-3xl font-bold text-gray-900">{{ $atividades->count() }}</p>
            <p class="text-sm text-gray-500">Total de Atividades</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
            <span class="p-3 rounded-full bg-yellow-100 text-yellow-600 mb-2">
                <i class="material-icons-outlined text-3xl">hourglass_empty</i>
            </span>
            <p class="text-3xl font-bold text-gray-900">{{ $pendentes ?? 0 }}</p>
            <p class="text-sm text-gray-500">Pendentes (Correção)</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
            <span class="p-3 rounded-full bg-blue-100 text-blue-600 mb-2">
                <i class="material-icons-outlined text-3xl">dynamic_feed</i>
            </span>
            <p class="text-3xl font-bold text-gray-900">{{ $entregas ?? 0 }}</p>
            <p class="text-sm text-gray-500">Total de Entregas</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
            <span class="p-3 rounded-full bg-green-100 text-green-600 mb-2">
                <i class="material-icons-outlined text-3xl">check_circle_outline</i>
            </span>
            <p class="text-3xl font-bold text-gray-900">{{ $concluidas ?? 0 }}</p>
            <p class="text-sm text-gray-500">Concluídas (Corrigidas)</p>
        </div>
    </div>

    <div class="border-b border-gray-300 mb-6">
        <nav class="flex gap-6 -mb-px">
            <button class="py-4 px-1 border-b-2 border-blue-600 text-blue-600 font-semibold">
                Todas
            </button>
        </nav>
    </div>

    <div class="flex flex-col gap-4">

        @if($atividades->isEmpty())
            <p class="text-gray-600 col-span-3 bg-white p-4 rounded-lg shadow-md">Você ainda não criou nenhuma atividade.</p>
        @else
            @foreach ($atividades as $atividade)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">

                        <div class="flex items-center gap-3">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $atividade->titulo }}</h3>
                            <span class="text-xs font-medium bg-gray-200 text-gray-700 px-2 py-0.5 rounded-full">{{ $atividade->tipo }}</span>
                        </div>

                        <div class="flex gap-2 flex-shrink-0">

                            <a href="{{ url('/catequista/atividade/'.$atividade->id_atividade.'/editar') }}" class="text-sm font-medium text-gray-600 bg-gray-100 px-3 py-1 rounded-md hover:bg-gray-200">
                                editar
                            </a>

                            <a href="{{ url('/catequista/atividade/'.$atividade->id_atividade.'/entregas') }}" class="text-sm font-medium text-blue-600 bg-blue-100 px-3 py-1 rounded-md hover:bg-blue-200">
                                ver entregas
                            </a>

                            <form action="{{ url('/catequista/atividade/excluir') }}" method="POST" onsubmit="return confirm('Atenção! Excluir esta atividade também apagará TODAS as respostas enviadas pelos alunos. Deseja continuar?');">
                                @csrf @method('DELETE') <input type="hidden" name="id_atividade" value="{{ $atividade->id_atividade }}">

                                <button type="submit" class="text-sm font-medium text-red-600 bg-red-100 px-3 py-1 rounded-md hover:bg-red-200">
                                    excluir
                                </button>
                            </form>

                        </div>
                    </div>

                    <p class="text-gray-600 mt-2 text-sm">{{ $atividade->descricao ?? '' }}</p>

                    <div class="flex flex-col sm:flex-row justify-between sm:items-center mt-4 pt-4 border-t border-gray-100 gap-4">
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <i class="material-icons-outlined text-base">group</i>
                            <span>{{ $atividade->turma->nome_turma ?? 'Sem turma vinculada' }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <i class="material-icons-outlined text-base">calendar_today</i>
                            <span>
                                Entrega:
                                @if($atividade->data_entrega)
                                    {{ \Carbon\Carbon::parse($atividade->data_entrega)->format('d/m/Y - H:i') }}
                                @else
                                    Sem data definida
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

</x-app-layout>
