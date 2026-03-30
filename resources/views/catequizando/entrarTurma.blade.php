<x-app-layout>

    <header>
        <button id="menu-toggle" class="lg:hidden p-4 text-gray-700">
            <i class="material-icons text-3xl">menu</i>
        </button>
    </header>

    <div class="flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-lg shadow-md max-w-sm p-8 w-full">
            <div class="text-center">
                <i class="material-icons text-5xl mb-4 text-green-600">key</i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2 text-center">Entrar na turma</h3>
            <p class="text-base text-gray-700 mb-6 text-center">Peça o código da turma para seu catequista e insira-o aqui</p>

            <form action="{{ route('catequizando.matricular') }}" method="POST">

                @csrf @if(session('sucesso'))
                    <div class="p-3 mb-4 text-sm text-center rounded-lg bg-green-100 text-green-700">
                        {{ session('sucesso') }}
                    </div>
                @elseif(session('erro'))
                    <div class="p-3 mb-4 text-sm text-center rounded-lg bg-red-100 text-red-700">
                        {{ session('erro') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="p-3 mb-4 text-sm text-center rounded-lg bg-red-100 text-red-700">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <input
                    type="text"
                    name="codigo_turma"
                    value="{{ old('codigo_turma') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md mb-6 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-300 uppercase"
                    placeholder="Código da turma"
                    required
                >
                <button
                    type="submit"
                    class="w-full bg-green-600 text-white font-bold py-3 px-4 rounded-md hover:bg-green-700 transition-colors"
                >
                    Entrar
                </button>
            </form>
        </div>

    </div>

</x-app-layout>
