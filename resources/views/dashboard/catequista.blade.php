<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Bem-vindo(a) de volta, {{ explode(' ', auth()->user()->name)[0] }}!
        </h1>
        <p class="mt-1 text-md text-gray-500">
            Aqui está um resumo da sua caminhada na catequese.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total de Turmas</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $turmas->count() }}</p>
            </div>
            <span class="p-3 rounded-full bg-blue-100 text-blue-600">
                <i class="material-icons-outlined text-3xl">groups</i>
            </span>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total de Catequizandos</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalCatequizandos }}</p>
            </div>
            <span class="p-3 rounded-full bg-green-100 text-green-600">
                <i class="material-icons-outlined text-3xl">school</i>
            </span>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total de Atividades</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalAtividades }}</p>
            </div>
            <span class="p-3 rounded-full bg-gray-100 text-gray-600">
                <i class="material-icons-outlined text-3xl">inventory_2</i>
            </span>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Pendentes Correção</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $pendentesCorrecao }}</p>
            </div>
            <span class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                <i class="material-icons-outlined text-3xl">hourglass_empty</i>
            </span>
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Acesso Rápido às Turmas</h2>
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

                        <a href="{{ url('/catequista/turma/'.$turma->id_turma.'/editar') }}" class="absolute top-12 right-4 text-gray-400 hover:text-gray-600">
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
                                <a href="{{ url('/catequista/turma?id='.$turma->id_turma) }}" class="text-sm font-semibold text-blue-600 hover:underline">
                                    Gerenciar
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</x-app-layout>
