<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4 hover:text-[#4A9FFF] transition-colors">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="mb-10" style="font-family: 'Inter', sans-serif;">
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
            Dashboard
        </h1>
        <p class="mt-2 text-lg text-gray-600" style="font-family: 'Roboto', sans-serif;">
            Bem-vindo(a) <strong>{{ explode(' ', auth()->user()->nome ?? 'Coordenador(a)')[0] }}</strong>! Aqui está o resumo das suas atividades de catequese.
        </p>
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 mb-5" style="font-family: 'Inter', sans-serif;">
        Visão Geral
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12" style="font-family: 'Roboto', sans-serif;">

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            <div>
                <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-1">Total de Turmas</p>
                <p class="text-4xl font-bold text-gray-800">{{ $totalTurmas }}</p>
            </div>
            <div class="p-4 rounded-full bg-[#CCE7FE] text-[#4A9FFF]">
                <i class="material-icons text-4xl">groups</i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            <div>
                <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-1">Catequistas</p>
                <p class="text-4xl font-bold text-gray-800">{{ $totalCatequistas }}</p>
            </div>
            <div class="p-4 rounded-full bg-green-100 text-[#58A65A]">
                <i class="material-icons text-4xl">co_present</i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            <div>
                <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-1">Catequizandos</p>
                <p class="text-4xl font-bold text-[#4A9FFF]">{{ $totalCatequizandos }}</p>
            </div>
            <div class="p-4 rounded-full bg-gray-100 text-gray-600">
                <i class="material-icons text-4xl">school</i>
            </div>
        </div>

    </div>

    {{--<h2 class="text-2xl font-semibold text-gray-800 mb-5" style="font-family: 'Inter', sans-serif;">
        Ações Rápidas
    </h2>

    <div class="flex flex-col sm:flex-row gap-4" style="font-family: 'Roboto', sans-serif;">

        <a href="{{ url('/coordenador/turmas/create') }}" class="flex items-center justify-center gap-2 bg-[#4A9FFF] hover:bg-blue-600 text-white px-6 py-4 rounded-xl shadow-sm transition-all duration-300 font-medium text-lg hover:shadow-md">
            <i class="material-icons">add_circle_outline</i>
            Criar Nova Turma
        </a>

        <a href="{{ url('/coordenador/comunicados/create') }}" class="flex items-center justify-center gap-2 bg-white border-2 border-[#4A9FFF] text-[#4A9FFF] hover:bg-[#CCE7FE] hover:text-blue-700 px-6 py-4 rounded-xl shadow-sm transition-all duration-300 font-medium text-lg hover:shadow-md">
            <i class="material-icons">campaign</i>
            Enviar Comunicado Geral
        </a>

    </div>--}}

</x-app-layout>
