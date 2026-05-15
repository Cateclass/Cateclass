<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4 hover:text-[#4A9FFF] transition-colors">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="max-w-2xl mx-auto mt-8 mb-12" style="font-family: 'Roboto', sans-serif;">

        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">

            <div class="absolute top-0 left-0 w-full h-2 bg-[#4A9FFF]"></div>

            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight" style="font-family: 'Inter', sans-serif;">
                    Editar Usuário
                </h2>
                <p class="mt-2 text-gray-500 text-sm">
                    Atualizando os dados de <span class="font-semibold text-[#4A9FFF]">{{ $user->name }}</span>
                </p>
            </div>

            <form action="{{ route('coordenadora.usuarios.update', $user) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full border border-gray-300 rounded-lg p-2.5 text-gray-700 focus:ring-[#4A9FFF] focus:border-[#4A9FFF] outline-none transition-colors shadow-sm">
                    @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                           class="w-full border border-gray-300 rounded-lg p-2.5 text-gray-700 focus:ring-[#4A9FFF] focus:border-[#4A9FFF] outline-none transition-colors shadow-sm">
                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="telefone" class="block text-sm font-medium text-gray-700 mb-1">Telefone</label>
                    <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $user->telefone) }}" required placeholder="(14)99999-9999" maxlength="14"
                           class="w-full border border-gray-300 rounded-lg p-2.5 text-gray-700 focus:ring-[#4A9FFF] focus:border-[#4A9FFF] outline-none transition-colors shadow-sm">
                    @error('telefone') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <span class="block text-sm font-medium text-gray-700 mb-2">Perfil do Usuário:</span>
                    <div class="flex items-center gap-6">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="tipo_usuario" value="catequizando" required
                                   class="w-4 h-4 text-[#4A9FFF] border-gray-300 focus:ring-[#4A9FFF]"
                                {{ old('tipo_usuario', $user->tipo_usuario) == 'catequizando' ? 'checked' : '' }}>
                            <span class="text-gray-700 text-sm group-hover:text-gray-900">Catequizando</span>
                        </label>

                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="tipo_usuario" value="catequista" required
                                   class="w-4 h-4 text-[#4A9FFF] border-gray-300 focus:ring-[#4A9FFF]"
                                {{ old('tipo_usuario', $user->tipo_usuario) == 'catequista' ? 'checked' : '' }}>
                            <span class="text-gray-700 text-sm group-hover:text-gray-900">Catequista</span>
                        </label>
                    </div>
                    @error('tipo_usuario') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center justify-end gap-4 pt-6 mt-4 border-t border-gray-100">
                    <a href="{{ url()->previous() }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 transition-colors">
                        Cancelar
                    </a>

                    <button type="submit"
                            class="w-full md:w-auto px-8 py-3 bg-[#4A9FFF] hover:bg-blue-600 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-[#4A9FFF]">
                        Salvar Alterações
                    </button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>
