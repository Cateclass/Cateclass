<x-app-layout>

    <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4 hover:text-[#4A9FFF] transition-colors">
        <i class="material-icons text-3xl">menu</i>
    </button>

    <div class="mb-8" style="font-family: 'Inter', sans-serif;">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Gerenciamento de Catequistas
        </h1>
        <p class="mt-1 text-gray-600 text-sm" style="font-family: 'Roboto', sans-serif;">
            Visualize, pesquise e gerencie os catequistas da paróquia.
        </p>
    </div>

    <div class="mb-6 relative w-full md:w-1/2 lg:w-1/3" style="font-family: 'Roboto', sans-serif;">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="material-icons text-gray-400">search</i>
        </div>
        <input type="text" id="pesquisarCatequista" placeholder="Pesquisar Catequistas..."
               class="pl-10 w-full border border-gray-300 rounded-lg py-2.5 focus:ring-[#4A9FFF] focus:border-[#4A9FFF] shadow-sm transition-all text-gray-700 bg-white placeholder-gray-400">
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden" style="font-family: 'Roboto', sans-serif;">
        <div class="overflow-x-auto" style="width: 100%;">

            <table style="width: 100%; border-collapse: collapse; text-align: left;">

                <thead style="background-color: #f9fafb; border-bottom: 1px solid #e5e7eb;">
                <tr>
                    <th scope="col" style="width: 30%; padding: 1rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; text-align: left;">
                        Nome
                    </th>
                    <th scope="col" style="width: 30%; padding: 1rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; text-align: left;">
                        Email
                    </th>
                    <th scope="col" style="width: 25%; padding: 1rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; text-align: left;">
                        Telefones
                    </th>
                    <th scope="col" style="width: 15%; padding: 1rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; text-align: center;">
                        Ações
                    </th>
                </tr>
                </thead>

                <tbody style="background-color: #ffffff;">

                @forelse ($users->where('tipo_usuario', 'catequista') as $catequista)
                    <tr class="hover:bg-gray-50 transition-colors duration-150" style="border-bottom: 1px solid #e5e7eb;">

                        <td style="padding: 1rem 1.5rem; text-align: left; white-space: nowrap;">
                            <div style="font-weight: 600; color: #111827; font-size: 0.95rem;">
                                {{ $catequista->nome ?? $catequista->name }}
                            </div>
                        </td>

                        <td style="padding: 1rem 1.5rem; text-align: left; white-space: nowrap; color: #4b5563; font-size: 0.95rem;">
                            {{ $catequista->email ?? 'Sem email' }}
                        </td>

                        <td style="padding: 1rem 1.5rem; text-align: left; white-space: nowrap; color: #4b5563; font-size: 0.95rem;">
                            {{ $catequista->telefone ?? '(Não informado)' }}
                        </td>

                        <td style="padding: 1rem 1.5rem; white-space: nowrap;">
                            <div style="display: flex; justify-content: center; gap: 0.75rem;">
                                <a href="{{ route('coordenadora.editarUsuario', $catequista) }}" title="Editar" class="text-blue-500 hover:text-blue-700 transition-colors p-1 rounded hover:bg-blue-50">
                                    <i class="material-icons-outlined">edit</i>
                                </a>

                                <form action="{{ route('coordenadora.deletarUsuario', $catequista) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este catequista?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Excluir" class="text-red-500 hover:text-red-700 transition-colors p-1 rounded hover:bg-red-50">
                                        <i class="material-icons-outlined">delete</i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding: 3rem 1.5rem; text-align: center; color: #6b7280;">
                            <i class="material-icons text-4xl mb-2 text-gray-300">person_off</i>
                            <p style="font-size: 1.125rem; margin: 0;">Nenhum catequista encontrado.</p>
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>

        </div>
    </div>

</x-app-layout>
