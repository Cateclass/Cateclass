<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="flex flex-col md:flex-row justify-between md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Minhas Turmas
            </h1>
            <p class="mt-1 text-md text-gray-500">
                Gerencie suas turmas e acompanhe a caminhada de fé
            </p>
        </div>
        <a href="{{ route('catequista.criarTurma') }}" class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
            <i class="material-icons-outlined">add_circle_outline</i>
            <span>Nova turma</span>
        </a>
    </div>

    <div class="relative mb-8">
        <input
            type="text"
            placeholder="Pesquisar Turmas"
            class="w-full pl-10 pr-4 py-3 rounded-lg shadow-sm border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
        <i class="material-icons-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
            search
        </i>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @if($turmas->isEmpty())
            <p class="text-gray-600 col-span-3">Você ainda não cadastrou nenhuma turma.</p>
        @else
            @php
                $cores = ['bg-blue-500', 'bg-green-500', 'bg-purple-500', 'bg-red-500'];
            @endphp

            @foreach ($turmas as $turma)
                @php $cor = $cores[$loop->index % count($cores)]; @endphp

                <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
                    <div class="h-10 {{ $cor }}"></div>

                    <a href="{{ url('/catequista/turma/'.$turma->id.'/editar') }}" class="absolute top-12 right-4 text-gray-400 hover:text-gray-600" title="Editar Turma">
                        <i class="material-icons-outlined">more_vert</i>
                    </a>

                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-2 h-14">
                            {{ $turma->nome_turma }}
                        </h3>
                        <p class="text-sm text-gray-600 mb-4 h-12">
                            {{ $turma->etapa->nome_etapa ?? 'Sem etapa' }}
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-medium text-gray-400 bg-gray-100 px-2 py-1 rounded">
                                {{ $turma->codigo_turma }}
                            </span>
                            <a href="{{ route('catequista.verTurma', $turma->id) }}" class="text-sm font-semibold text-blue-600 hover:underline">
                                ver mais
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

</x-app-layout>
