<div class="h-full flex flex-col">
    <div class="mb-4">
        <h1 class="text-3xl font-bold text-black">Chat</h1>
        <p class="text-gray-600 text-sm">conversas e mensagens</p>
    </div>

    <div class="flex-1 bg-white rounded-xl shadow-sm border border-gray-200 flex overflow-hidden min-h-[600px]">

        <div class="w-1/3 lg:w-1/4 border-r border-gray-200 bg-gray-50 flex flex-col overflow-y-auto">
            <div class="p-4 border-b border-gray-200 bg-white">
                <h2 class="text-lg font-bold text-black">Contatos</h2>
            </div>

            @if(count($turmas) > 0)
                <div class="p-3 text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-100">
                    Minhas Turmas
                </div>
                @foreach($turmas as $turma)
                    <button
                        wire:click="selectChat('turma', {{ $turma->id }})"
                        class="w-full flex items-center gap-3 p-4 border-b border-gray-100 transition-colors text-left
                        {{ $activeChatType === 'turma' && $activeChatId == $turma->id ? 'bg-[#CCE7FE]' : 'hover:bg-gray-100 bg-white' }}"
                    >
                        <div class="flex justify-center items-center w-10 h-10 rounded-full bg-[#58A65A] text-white font-bold shrink-0">
                            <i class="material-icons text-xl">groups</i>
                        </div>
                        <div class="overflow-hidden">
                            <p class="font-semibold text-gray-900 truncate">{{ $turma->nome ?? 'Turma ' . $turma->id }}</p>
                            <p class="text-xs text-gray-500 truncate">Chat do grupo</p>
                        </div>
                    </button>
                @endforeach
            @endif

            @if(count($usuarios) > 0)
                <div class="p-3 text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-100">
                    Mensagens Diretas
                </div>
                @foreach($usuarios as $usuario)
                    <button
                        wire:click="selectChat('privado', {{ $usuario->id }})"
                        class="w-full flex items-center gap-3 p-4 border-b border-gray-100 transition-colors text-left
                        {{ $activeChatType === 'privado' && $activeChatId == $usuario->id ? 'bg-[#CCE7FE]' : 'hover:bg-gray-100 bg-white' }}"
                    >
                        <div class="flex justify-center items-center w-10 h-10 rounded-full bg-[#4A9FFF] text-white font-bold shrink-0">
                            {{ strtoupper(substr($usuario->name, 0, 1)) }}
                        </div>
                        <div class="overflow-hidden">
                            <p class="font-semibold text-gray-900 truncate">{{ $usuario->name }}</p>
                            <p class="text-xs text-[#4A9FFF] truncate">{{ ucfirst($usuario->tipo_usuario ?? 'Usuário') }}</p>
                        </div>
                    </button>
                @endforeach
            @endif
        </div>

        <div class="flex-1 flex flex-col bg-white">

            @if($activeChatId)
                <div class="p-4 border-b border-gray-200 bg-white flex items-center gap-3 shadow-sm z-10">
                    <div class="flex justify-center items-center w-10 h-10 rounded-full bg-gray-200 text-gray-700 font-bold">
                        <i class="material-icons text-xl">{{ $activeChatType === 'turma' ? 'groups' : 'person' }}</i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-black">
                            @if($activeChatType === 'turma')
                                Chat da Turma
                            @else
                                Chat Privado
                            @endif
                        </h3>
                    </div>
                </div>

                <div wire:poll.2s="loadMessages" class="flex-1 p-4 overflow-y-auto bg-[#F8FAFC] space-y-4">
                    @forelse($messages as $message)
                        @php
                            $isMyMessage = $message['sender_id'] == auth()->id();
                        @endphp

                        <div class="flex {{ $isMyMessage ? 'justify-end' : 'justify-start' }}">
                            <div class="flex max-w-[70%] gap-2 {{ $isMyMessage ? 'flex-row-reverse' : 'flex-row' }}">

                                <div class="flex justify-center items-center w-8 h-8 rounded-full bg-gray-300 text-gray-700 font-bold text-xs shrink-0 mt-1">
                                    {{ strtoupper(substr($message['sender_name'], 0, 1)) }}
                                </div>

                                <div class="flex flex-col {{ $isMyMessage ? 'items-end' : 'items-start' }}">
                                    <span class="text-xs text-gray-500 mb-1 px-1">{{ $message['sender_name'] }}</span>
                                    <div class="p-3 rounded-2xl shadow-sm
                                        {{ $isMyMessage
                                            ? 'bg-[#4A9FFF] text-white rounded-tr-none'
                                            : 'bg-white border border-gray-200 text-black rounded-tl-none' }}">
                                        <p class="text-sm">{{ $message['body'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="h-full flex items-center justify-center text-gray-500">
                            Nenhuma mensagem ainda. Inicie a conversa!
                        </div>
                    @endforelse
                </div>

                <div class="p-4 border-t border-gray-200 bg-white">
                    <form wire:submit.prevent="sendMessage" class="flex items-center gap-3">
                        <input
                            type="text"
                            wire:model="newMessage"
                            placeholder="Escreva sua mensagem..."
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-[#4A9FFF] focus:border-[#4A9FFF] block w-full p-3 shadow-sm"
                            required
                        >
                        <button
                            type="submit"
                            class="flex items-center justify-center w-12 h-12 bg-[#4A9FFF] hover:bg-blue-600 text-white rounded-full transition-colors shadow-md shrink-0"
                            title="Enviar"
                        >
                            <i class="material-icons">send</i>
                        </button>
                    </form>
                </div>
            @else
                <div class="flex-1 flex flex-col items-center justify-center text-gray-400 bg-gray-50">
                    <i class="material-icons text-6xl mb-4 text-[#CCE7FE]">chat</i>
                    <h2 class="text-xl font-medium text-gray-600">Selecione uma conversa para começar</h2>
                    <p class="text-sm mt-2">Escolha uma turma ou contato no painel ao lado.</p>
                </div>
            @endif
        </div>
    </div>
</div>
