<aside id="sidebar" class="fixed lg:relative bg-white w-[280px] lg:w-[300px] h-screen
                         flex flex-col z-50
                         transition-transform duration-300 ease-in-out
                         shadow-lg lg:shadow-none
                         -translate-x-full lg:translate-x-0">

    <div class="relative flex items-center gap-3 p-4 mb-4 border-b">
        <img class="w-20 h-20 rounded-full" src="{{ asset('img/logotipo.jpg') }}" alt="Logotipo CateClass">
        <div>
            <p class="font-bold">CateClass</p>
            <span class="text-sm text-[#4A9FFF]">Plataforma Educacional</span>
        </div>
        <button id="menu-close" class="lg:hidden absolute top-3 right-3 text-gray-600 hover:text-gray-900">
            <i class="material-icons text-3xl">close</i>
        </button>
    </div>

    <nav class="flex-1">
        <ul class="list-none p-0">
            <li>
                <a class="flex items-center gap-3 p-3 pl-6 hover:bg-gray-100 rounded-lg mx-2" href="{{ route('dashboard') }}">
                    <i class="material-icons">home</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 p-3 pl-6 hover:bg-gray-100 rounded-lg mx-2" href="{{ route('catequista.turmas') }}">
                    <i class="material-icons">groups</i>
                    Minhas Turmas
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 p-3 pl-6 hover:bg-gray-100 rounded-lg mx-2" href="{{ route('catequista.atividades') }}">
                    <i class="material-icons">assignment</i>
                    Atividades
                </a>
            </li>
            <li>
                <a class="flex items-center gap-3 p-3 pl-6 hover:bg-gray-100 rounded-lg mx-2" href="{{ route('chat.index') }}">
                    <i class="material-icons">forum</i>
                    Chat e Mensagens
                </a>
            </li>
        </ul>
    </nav>

    <div class="p-4">
        <div class="pb-4 mb-4 border-b">
            <p class="pl-2 uppercase text-sm font-semibold text-gray-600 mb-3">Ações rápidas</p>

            <div class="flex flex-col items-center gap-3">
                <a class="flex justify-center items-center gap-2 bg-[#008000] text-white w-full py-2 rounded-lg" href="{{ route('catequista.criarTurma') }}">
                    <i class="material-icons">group_add</i>
                    Criar Turma
                </a>

                <a class="flex justify-center items-center gap-2 bg-[#4A9FFF] text-white w-full py-2 rounded-lg" href="{{ route('catequista.criarAtividade') }}">
                    <i class="material-icons">add_task</i>
                    Criar Atividade
                </a>

                @if (isset($dados['stats']['pendentes_correcao']) && $dados['stats']['pendentes_correcao'] > 0)
                    <a class="flex justify-center items-center gap-2 bg-[#D4F3E6] text-[#40B568] w-full py-2 rounded-lg"
                       href="{{ url('/catequista/atividades') }}">
                        <i class="fa fa-bell text-xl"></i>
                        {{ $dados['stats']['pendentes_correcao'] }}
                        para Corrigir
                    </a>
                @endif
            </div>
        </div>

        <div class="flex justify-center">
            <a class="flex items-center gap-3 bg-[#BEDDF5] w-full p-2 rounded-lg" href="{{ route('profile.edit') }}">
                <div class="flex justify-center items-center w-10 h-10 rounded-full bg-[#4A9FFF] text-white font-bold">
                    {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 1)) }}
                </div>
                <div class="flex flex-col items-start">
                    <span class="text-black font-semibold">
                        {{ auth()->user()->name ?? 'Catequista' }}
                    </span>
                    <span class="text-sm text-[#4A9FFF]">
                        {{ ucfirst(auth()->user()->tipo_usuario ?? 'Catequista') }}
                    </span>
                </div>
            </a>
        </div>
    </div>
</aside>
