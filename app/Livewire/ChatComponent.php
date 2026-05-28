<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatComponent extends Component
{
    // propriedades publicas, fica visivel no html

    public $turmas = []; // turmas que o usuário tem acesso
    public $usuarios = []; // usuarios para o chat privado
    public $activeChatType = null; // se é turma oou privado
    public $activeChatId = null; // id da turma ou usuario
    public $messages = []; // msgs da conversa
    public $newMessage = ''; // texto que o usario ta digitando

    // método mount
    // roda quando a tela é carregada e carrega os dados pesados

    public function mount()
    {
        // pega o usuario
        $user = Auth::user();

        if($user->tipo_usuario == 'coordenador'){
            // coordenadora tem todas as turmas e usuarios
            $this->turmas = Turma::all();
            $this->usuarios = User::where('id', '!=', $user->id)->get();
        }
        elseif ($user->tipo_usuario == 'catequista'){
            // catequista tem as turmas dela e coordenadora
            $this->turmas = $user->turmasGerenciadas()->get();
            $this->usuarios = User::where('tipo_usuario', 'coordenador')->get();
        }
        elseif ($user->tipo_usuario == 'catequizando'){
            // catequizando tem as turmas que ele está e a coordenadora
            $this->turmas = $user->turmasCursadas()->get();
            $this->usuarios = User::where('tipo_usuario', 'coordenador')->get();
        }
    }

    // o metodo passa o tipo e o id da conversa
    public function selectChat($type, $id)
    {
        $this->activeChatType = $type;
        $this->activeChatId = $id;

        // limpa o input
        $this->newMessage = '';

        // chama o método que carrega as mensagens
        $this->loadMessages();
    }

    // carrega as mensagens do chat atual
    // carrega as mensagens do chat atual
    public function loadMessages()
    {
        // se naão tiver chat selecionado não faz nada
        if(!$this->activeChatId) return;

        $mensagensMongo = null;

        if($this->activeChatType === 'turma'){
            // busca as mensagens no mongo daquela turma ordenado pela mais atiga até a recente
            $mensagensMongo = Message::where('turma_id', (int) $this->activeChatId)
                ->orderBy('created_at', 'asc')
                ->get();
        }
        elseif ($this->activeChatType === 'privado') {
            $myId = Auth::id();
            $targetId = (int) $this->activeChatId;

            // busca no mongo as conversas do chat privado
            $mensagensMongo = Message::where(function ($query) use ($myId, $targetId) {
                $query->where('sender_id', $myId)
                    ->where('receiver_id', $targetId);
            })
                ->orWhere(function ($query) use ($myId, $targetId) {
                    $query->where('sender_id', $targetId)
                        ->where('receiver_id', $myId);
                })
                ->orderBy('created_at', 'asc')
                ->get();
        }

        // msotrar o nome de quem enviou a mensagem (forma corrigida)
        if ($mensagensMongo) {
            $this->messages = $mensagensMongo->map(function($msg) {
                // Vai no MariaDB e acha o dono da mensagem
                $sender = User::find($msg->sender_id);

                // Converte a mensagem do Mongo para Array individualmente
                $msgArray = $msg->toArray();

                // Anexa o nome com segurança
                $msgArray['sender_name'] = $sender ? $sender->name : 'Usuário Removido';

                return $msgArray;
            })->toArray();
        }
    }

    // manda a mensagem
    public function sendMessage()
    {
        // validação da msg
        $this->validate([
            'newMessage' => 'required|string|max:1000'
        ]);

        // prepara os dados que vão para o mongo
        $data = [
            'sender_id' => Auth::id(),
            'body' => $this->newMessage,
        ];

        // salva o id correto da conversa
        if($this->activeChatType === 'turma'){
            $data['turma_id'] = (int) $this->activeChatId;
            $data['receiver_id'] = null;
        } else {
            $data['turma_id'] = null;
            $data['receiver_id'] = (int) $this->activeChatId;
        }

        // salva no mongo
        Message::create($data);

        // limpa o campo de texto
        $this->reset('newMessage');

        // recarrega as msg
        $this->loadMessages();

        // avisa o navegador que deu certo
        $this->dispatch('mensagem-enviada');
    }

    // fala qual arquivo representa esse componente
    public function render()
    {
        return view('livewire.⚡chat-component');
    }

} // fim da classe
