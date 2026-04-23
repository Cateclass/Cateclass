<x-guest-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md mb-8 text-center">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('img/logotipo.jpg') }}" alt="Logo CateClass" class="h-20 w-auto object-contain">
        </div>
        <h2 class="text-2xl font-bold text-gray-800">
            Crie sua conta
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            Preencha os dados abaixo para se cadastrar no CateClass
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nome Completo</label>
            <div class="mt-1">
                <input id="name"
                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       type="text"
                       name="name"
                       :value="old('name')"
                       required autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <div class="mt-1">
                <input id="email"
                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       type="email"
                       name="email"
                       :value="old('email')"
                       required autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
            <div class="mt-1">
                <input id="telefone"
                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       type="text"
                       name="telefone"
                       :value="old('telefone')"
                       required autocomplete="tel" />
            </div>
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Eu sou um:</label>
            <div class="flex items-center mt-2 gap-6">
                <label class="flex items-center cursor-pointer">
                    <input type="radio"
                           name="tipo_usuario"
                           value="catequizando"
                           class="h-4 w-4 rounded-full border-gray-300 text-blue-500 focus:ring-blue-500"
                           {{ old('tipo_usuario') == 'catequizando' ? 'checked' : '' }} required>
                    <span class="ml-2 text-sm text-gray-700">Catequizando</span>
                </label>

                <label class="flex items-center cursor-pointer">
                    <input type="radio"
                           name="tipo_usuario"
                           value="catequista"
                           class="h-4 w-4 rounded-full border-gray-300 text-blue-500 focus:ring-blue-500"
                           {{ old('tipo_usuario') == 'catequista' ? 'checked' : '' }} required>
                    <span class="ml-2 text-sm text-gray-700">Catequista</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('tipo_usuario')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
            <div class="mt-1">
                <input id="password"
                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       type="password"
                       name="password"
                       required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
            <div class="mt-1">
                <input id="password_confirmation"
                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       type="password"
                       name="password_confirmation"
                       required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2">
            <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                Registrar
            </button>
        </div>

        <div class="mt-6 text-center text-sm text-gray-600">
            Já tem uma conta?
            <a href="{{ route('login') }}" class="font-medium text-blue-500 hover:text-blue-600 hover:underline">
                Faça login
            </a>
        </div>
    </form>
</x-guest-layout>
