<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="mb-8">
        <a href="{{ url()->previous() }}" class="flex items-center gap-1 text-sm text-blue-600 hover:underline mb-2 w-fit">
            <i class="material-icons-outlined text-base">arrow_back</i>
            Voltar para a Turma
        </a>

        <span class="text-xs font-semibold bg-gray-200 text-gray-700 px-2 py-0.5 rounded-full">
            {{ $atividade->turma->nome_turma ?? 'Turma' }}
        </span>
        <h1 class="text-3xl font-bold text-gray-800 mt-1">
            {{ $atividade->titulo }}
        </h1>
        <p class="mt-1 text-md text-gray-500">
            {{ $atividade->descricao }}
        </p>
    </div>

    <div>
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Entregas dos Catequizandos</h2>

        @if(session('sucesso'))
            <div class="p-3 my-4 text-sm text-center rounded-lg bg-green-100 text-green-700">
                {{ session('sucesso') }}
            </div>
        @elseif(session('erro'))
            <div class="p-3 my-4 text-sm text-center rounded-lg bg-red-100 text-red-700">
                {{ session('erro') }}
            </div>
        @endif

        @if($respostas->isEmpty())
            <p class="text-gray-600 p-4 bg-white rounded-lg shadow-md">
                Nenhum catequizando enviou uma resposta para esta atividade ainda.
            </p>
        @else
            <div class="flex flex-col gap-4">
                @foreach ($respostas as $resposta)
                    <div class="bg-white p-6 rounded-lg shadow-md">

                        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                            <div class="flex items-center gap-3">
                                <span class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600 font-semibold uppercase">
                                    {{ Str::substr($resposta->nome_catequizando ?? 'A', 0, 1) }}
                                </span>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        {{ $resposta->nome_catequizando ?? 'Aluno' }}
                                    </h3>
                                    <span class="text-xs text-gray-500">
                                        Enviado em: {{ \Carbon\Carbon::parse($resposta->data_envio)->format('d/m/Y \à\s H:i') }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex gap-2 flex-shrink-0">
                                <a href="{{ route('catequista.corrigirAtividade', $resposta->id) }}" class="text-sm font-medium text-blue-600 bg-blue-100 px-3 py-1 rounded-md hover:bg-blue-200 transition duration-300">
                                    {{ empty($resposta->comentario_catequista) ? 'Dar Feedback' : 'Editar Feedback' }}
                                </a>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100">
                            @if (!empty($resposta->texto))
                                <p class="text-gray-700 whitespace-pre-wrap">{{ $resposta->texto }}</p>
                            @else
                                <div class="p-3 bg-green-50 text-green-700 border border-green-200 rounded-md flex items-center gap-2 w-fit">
                                    <i class="material-icons-outlined text-base">check_circle</i>
                                    <span class="font-medium">Marcado como Concluído</span>
                                </div>
                            @endif
                        </div>

                        @if (!empty($resposta->comentario_catequista))
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <h4 class="text-sm font-semibold text-gray-600 mb-2">Seu Feedback:</h4>
                                <div class="p-3 bg-gray-50 text-gray-700 border border-gray-200 rounded-md">
                                    <p class="whitespace-pre-wrap">{{ $resposta->comentario_catequista }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</x-app-layout>
