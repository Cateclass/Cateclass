<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="max-w-4xl mx-auto">

        <a href="{{ route('catequizando.atividades') }}" class="flex items-center gap-2 text-sm text-gray-600 hover:text-indigo-600 mb-4">
            <i class="material-icons">arrow_back</i>
            Voltar para Atividades
        </a>

        @if(session('sucesso'))
            <div class="p-3 mb-4 text-sm text-center rounded-lg bg-green-100 text-green-700">
                {{ session('sucesso') }}
            </div>
        @elseif(session('erro'))
            <div class="p-3 mb-4 text-sm text-center rounded-lg bg-red-100 text-red-700">
                {{ session('erro') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ $atividade->titulo }}
                    </h1>
                    <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded-full">
                        {{ $atividade->tipo }}
                    </span>
                </div>
            </div>

            <div class="mt-4 pt-4 flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8 text-sm text-gray-500">
                <div class="flex items-center gap-2">
                    <i class="material-icons text-base">people_outline</i>
                    <span>{{ $atividade->turma->nome_turma ?? 'Sem turma' }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="material-icons text-base">badge</i>
                    <span>{{ $atividade->turma->etapa->nome_etapa ?? 'Sem etapa' }}</span>
                </div>
                <div class="flex items-center gap-2">
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
            </div>

            <p class="mt-6 text-base text-gray-700 leading-relaxed whitespace-pre-line">
                {{ $atividade->descricao ?? 'Sem descrição' }}
            </p>
        </div>

        @if ($resposta)

            <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-gray-800">Sua Resposta</h2>

                    <form action="{{ route('catequizando.cancelarResposta') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja cancelar o envio? Sua resposta será apagada e você precisará enviar novamente.');">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="resposta_id" value="{{ $resposta->id }}">
                        <button type="submit" class="text-sm font-medium text-red-600 bg-red-100 px-4 py-2 rounded-md hover:bg-red-200">
                            Cancelar Envio
                        </button>
                    </form>
                </div>

                <div class="p-4 bg-gray-50 rounded-md border border-gray-200">
                    <p class="text-gray-500 text-sm mb-2">
                        Enviado em: {{ \Carbon\Carbon::parse($resposta->created_at)->format('d/m/Y \à\s H:i') }}
                    </p>

                    @if ($resposta->texto)
                        <p class="text-gray-800 leading-relaxed whitespace-pre-line">
                            {{ $resposta->texto }}
                        </p>
                    @else
                        <p class="text-gray-800 italic">
                            Você marcou esta atividade como concluída.
                        </p>
                    @endif
                </div>

                @if ($resposta->comentario_catequista)
                    <div class="mt-4 p-4 bg-blue-50 rounded-md border border-blue-200">
                        <h3 class="font-semibold text-blue-800 mb-2">Comentário do Catequista:</h3>
                        <p class="text-gray-800 leading-relaxed whitespace-pre-line">
                            {{ $resposta->comentario_catequista }}
                        </p>
                    </div>
                @endif
            </div>

        @else
            @if ($atividade->tipo_entrega == 'texto')

                <form action="{{ route('catequizando.responderAtividade') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md mt-6">
                    @csrf
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Enviar Resposta</h2>

                    <input type="hidden" name="atividade_id" value="{{ $atividade->id }}">
                    <input type="hidden" name="tipo_entrega" value="texto">

                    <div>
                        <label for="texto_resposta" class="block text-sm font-medium text-gray-700 mb-2">Sua resposta:</label>
                        <textarea
                            id="texto_resposta"
                            name="texto_resposta"
                            rows="8"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Escreva sua reflexão ou resposta aqui..."
                            required
                        ></textarea>
                    </div>

                    <div class="mt-6 text-right">
                        <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            Enviar Atividade
                        </button>
                    </div>
                </form>

            @else

                <form action="{{ route('catequizando.responderAtividade') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md mt-6">
                    @csrf
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Confirmar Conclusão</h2>

                    <input type="hidden" name="atividade_id" value="{{ $atividade->id }}">
                    <input type="hidden" name="tipo_entrega" value="confirmacao">

                    <p class="text-gray-700">Esta atividade não requer um envio de texto. Apenas marque como concluída quando você a tiver realizado.</p>

                    <div class="mt-6 text-right">
                        <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            Marcar como Concluída
                        </button>
                    </div>
                </form>

            @endif

        @endif

    </div>
</x-app-layout>
