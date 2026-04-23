<x-guest-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md mb-8 text-center">
        <div class="flex justify-center mb-4">
            <img src="{{ asset("img/logotipo.jpg") }}" alt="Logo CateClass" class="h-20 w-auto object-contain">
        </div>
        <h2 class="text-2xl font-bold text-gray-800">
            Bem-vindo(a) ao CateClass!
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            Faça login para acessar sua conta
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <div class="mt-1">
                <input id="email"
                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       type="email"
                       name="email"
                       :value="old('email')"
                       required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
            <div class="mt-1">
                <input id="password"
                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       type="password"
                       name="password"
                       required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-500 focus:ring-blue-500" name="remember">
                <label for="remember_me" class="ml-2 block text-sm text-gray-600">
                    Lembrar de mim
                </label>
            </div>

            @if (Route::has('password.request'))
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-blue-500 hover:text-blue-600 hover:underline">
                        Esqueceu a senha?
                    </a>
                </div>
            @endif
        </div>

        <div>
            <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                Entrar
            </button>
        </div>

        @if (Route::has('register'))
            <div class="mt-6 text-center text-sm text-gray-600">
                Não tem uma conta?
                <a href="{{ route('register') }}" class="font-medium text-blue-500 hover:text-blue-600 hover:underline">
                    Registre-se
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>
