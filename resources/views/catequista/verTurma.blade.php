<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="mb-6">
        <a href="{{ route('catequista.turmas') }}" class="flex items-center gap-2 text-sm text-blue-600 hover:underline">
            <i class="material-icons-outlined text-base">arrow_back</i>
            Voltar para Minhas Turmas
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex flex-col md:flex-row justify-between md:items-start">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    {{ $turma->nome_turma }}
                </h1>
                <p class="mt-1 text-md text-gray-500">
                    {{ $turma->etapa->nome_etapa ?? 'Sem etapa' }}
                </p>
            </div>
            <div class="mt-4 md:mt-0 md:text-right">
                <p class="text-sm text-gray-500">Código da Turma:</p>
                <p class="text-2xl font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg inline-block">
                    {{ $turma->codigo_turma }}
                </p>
            </div>
        </div>
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 flex flex-col gap-6">
            <h2 class="text-2xl font-semibold text-gray-800">Mural de Atividades</h2>

            @if($atividades->isEmpty())
                <p class="text-gray-600 bg-white p-4 rounded-lg shadow-md">Nenhuma atividade criada para esta turma ainda.</p>
            @else
                @foreach ($atividades as $atividade)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                            <div class="flex items-center gap-3">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $atividade->titulo }}</h3>
                                <span class="text-xs font-medium bg-gray-200 text-gray-700 px-2 py-0.5 rounded-full">{{ $atividade->tipo }}</span>
                            </div>
                            <div class="flex gap-2 flex-shrink-0">
                                <a href="{{ url('/catequista/atividade/'.$atividade->id_atividade.'/editar') }}" class="text-sm font-medium text-gray-600 bg-gray-100 px-3 py-1 rounded-md hover:bg-gray-200">editar</a>
                                <a href="{{ url('/catequista/atividade/'.$atividade->id_atividade.'/entregas') }}" class="text-sm font-medium text-blue-600 bg-blue-100 px-3 py-1 rounded-md hover:bg-blue-200">ver entregas</a>
                            </div>
                        </div>
                        <p class="text-gray-600 mt-2 text-sm">{{ $atividade->descricao ?? '' }}</p>
                        <div class="flex flex-col sm:flex-row justify-between sm:items-center mt-4 pt-4 border-t border-gray-100 gap-4">
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <i class="material-icons-outlined text-base">calendar_today</i>
                                <span>
                                    Entrega:
                                    @if ($atividade->data_entrega)
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

        <div class="lg:col-span-1 flex flex-col gap-6">
            <h2 class="text-2xl font-semibold text-gray-800">Catequizandos ({{ $catequizandos->count() }})</h2>
            <div class="bg-white rounded-lg shadow-md p-6">
                <ul class="flex flex-col gap-4">
                    @if($catequizandos->isEmpty())
                        <p class="text-sm text-gray-500">Nenhum catequizando matriculado nesta turma.</p>
                    @else
                        @foreach ($catequizandos as $aluno)
                            <li class="flex items-center justify-between gap-3 pb-3 border-b border-gray-100 last:border-b-0">
                                <div class="flex items-center gap-3">
                                    <span class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600 font-semibold">
                                        {{ strtoupper(substr($aluno->name, 0, 1)) }} </span>
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $aluno->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $aluno->email }}</p>
                                    </div>
                                </div>

                                <form action="{{ url('/catequista/turma/remover-aluno') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover {{ $aluno->name }} desta turma?');" class="m-0">
                                    @csrf
                                    @method('DELETE') <input type="hidden" name="catequizando_id" value="{{ $aluno->id }}"> <input type="hidden" name="turma_id" value="{{ $turma->id_turma }}">
                                    <button type="submit" class="text-gray-400 hover:text-red-500">
                                        <i class="material-icons-outlined">remove_circle_outline</i>
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

    </div>

</x-app-layout>
