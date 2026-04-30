<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="mb-8">
        <a href="{{ route('catequista.verEntregas', $resposta->atividade_id) }}" class="flex items-center gap-1 text-sm text-blue-600 hover:underline mb-2 w-fit">
            <i class="material-icons-outlined text-base">arrow_back</i>
            Voltar para Entregas
        </a>

        <h1 class="text-3xl font-bold text-gray-800 mt-1">
            Corrigir Atividade
        </h1>
        <p class="mt-1 text-md text-gray-500">
            Veja a resposta do aluno e envie seu feedback.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
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

                <div class="mt-4">
                    <h4 class="text-sm font-semibold text-gray-600 mb-2">Resposta Enviada:</h4>
                    @if (!empty($resposta->texto))
                        <div class="p-4 bg-gray-50 text-gray-700 border border-gray-200 rounded-md">
                            <p class="whitespace-pre-wrap">{{ $resposta->texto }}</p>
                        </div>
                    @else
                        <div class="p-3 bg-green-50 text-green-700 border border-green-200 rounded-md flex items-center gap-2 w-fit">
                            <i class="material-icons-outlined text-base">check_circle</i>
                            <span class="font-medium">Marcado como Concluído</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <form action="{{ route('catequista.salvarCorrecao', $resposta->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                @method('PUT')

                <h3 class="text-xl font-semibold text-gray-800 mb-4">Seu Feedback</h3>

                <div>
                    <label for="comentario_catequista" class="block text-sm font-medium text-gray-700 mb-1">
                        Comentário (visível para o aluno):
                    </label>
                    <textarea
                        id="comentario_catequista"
                        name="comentario_catequista"
                        rows="8"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('comentario_catequista') border-red-500 @enderror"
                        placeholder="Escreva seu feedback aqui..."
                    >{{ old('comentario_catequista', $resposta->comentario_catequista) }}</textarea>

                    @error('comentario_catequista')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="mt-4 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 transition-colors"
                >
                    Salvar Feedback
                </button>
            </form>
        </div>

    </div>

</x-app-layout>
