<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Atividade;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // pega o id do catequista
        $usuario = auth()->user();

        // se for catequista
        if ($usuario->tipo_usuario === 'catequista') {
            $atividades = Atividade::whereHas('turma', function ($query) use ($usuario) {
                $query->where('catequista_id', $usuario->id);
            })->latest()->get();

            return view('catequista.atividades', compact('atividades'));
        }

        // se for catequizando
        if ($usuario->tipo_usuario === 'catequizando') {

            // pega o filtro da URL
            $filtro = $request->query('filtro', 'todas');

            // busca as atividades das turmas que o aluno está matriculado
            $todasAtividades = Atividade::whereHas('turma.alunos', function ($query) use ($usuario) {
                $query->where('user_id', $usuario->id);
            })
                ->with(['turma', 'respostas' => function($query) use ($usuario) {
                    $query->where('catequizando_id', $usuario->id);
                }])
                ->latest()
                ->get();

            // calcula as estatisticas
            $total = $todasAtividades->count();

            // uma atividade está concluída se a collection de 'respostas' deste catequizando não estiver vazia
            $concluidas = $todasAtividades->filter(fn($a) => $a->respostas->isNotEmpty())->count();

            // atrasadas: Não tem resposta, tem data_entrega, e a data passou do "agora"
            $naoEnviadas = $todasAtividades->filter(fn($a) =>
                $a->respostas->isEmpty() &&
                $a->data_entrega &&
                \Carbon\Carbon::parse($a->data_entrega)->isPast()
            )->count();

            // pendentes
            $pendentes = $total - $concluidas;

            $stats = compact('total', 'pendentes', 'naoEnviadas', 'concluidas');

            // aplicando o Filtro para a lista que vai renderizar na tela
            $lista_atividades = $todasAtividades;

            if ($filtro === 'pendentes') {
                $lista_atividades = $todasAtividades->filter(fn($a) =>
                    $a->respostas->isEmpty() &&
                    (!$a->data_entrega || \Carbon\Carbon::parse($a->data_entrega)->isFuture())
                );
            } elseif ($filtro === 'atrasadas') {
                $lista_atividades = $todasAtividades->filter(fn($a) =>
                    $a->respostas->isEmpty() &&
                    $a->data_entrega &&
                    \Carbon\Carbon::parse($a->data_entrega)->isPast()
                );
            } elseif ($filtro === 'concluidas') {
                $lista_atividades = $todasAtividades->filter(fn($a) => $a->respostas->isNotEmpty());
            }

            return view('catequizando.atividades', compact('lista_atividades', 'stats', 'filtro'));
        }

        abort(403, 'Acesso não autorizado.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // retorna as turmas do catequista para poder escolher qual será a turma
        $turmas = auth()->user()->turmasGerenciadas()->orderBy('nome_turma')->get();

        // mostra o formulário para o catequista criar uma atividade
        return view('catequista.criarAtividade', compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validação
        $validated = $this->getRegrasValidacao($request);

        // guarda no banco
        Atividade::create($validated);

        // retorna para a view de atividades
        return redirect()->route('catequista.atividades');
    }

    /**
     * Display the specified resource.
     */
    public function show(Atividade $atividade)
    {
        $usuario = auth()->user();

        // carrega os dados da atividade
        $atividade->load('turma.etapa');

        // busca se o usuário enviou alguma resposta ou não, se não enviou retorna null
        $resposta = $atividade->respostas()->where('catequizando_id', $usuario->id)->first();

        // retorna a view de ver atividade
        return view('catequizando.verAtividade', compact('atividade', 'resposta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atividade $atividade): View
    {
        $turmas = Turma::where('catequista_id', auth()->id())->get();

        return view('catequista.editarAtividade', compact('atividade', 'turmas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atividade $atividade): RedirectResponse
    {
        // validação
        $validated = $this->getRegrasValidacao($request);

        // faz o update
        $atividade->update($validated);

        // retorna a view
        return redirect()->route('catequista.atividades')->with('sucesso', "Atividade editada com sucesso.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atividade $atividade): RedirectResponse
    {
        // deleta a atividade
        $atividade->delete();

        // retorna a view de atividades
        return redirect()->route('catequista.atividades');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getRegrasValidacao(Request $request): array
    {
        $catequistaId = auth()->id();

        // validar os dados
        return $request->validate(
        // regras
            [
                'turma_id' => [
                    'required',
                    'integer',
                    Rule::exists('turmas', 'id')->where(function ($query) use ($catequistaId) {
                        return $query->where('catequista_id', $catequistaId);
                    })
                ],
                'titulo' => 'required|string|max:255',
                'descricao' => 'nullable|string|max:255',
                'data_entrega' => 'required|date',
                'tipo' => 'required|string|in:reflexao,quiz,leitura,video',
                'tipo_entrega' => 'required|string|in:texto,confirmacao',
            ],
            // mensagens
            [
                'turma_id.required' => 'Selecione uma turma!',
                'turma_id.integer' => 'O formato de turma é inválido!',
                'turma_id.exists' => 'A turma selecionada é inválida ou você não possui permissão nela!',

                'titulo.required' => 'Informe o titulo!',
                'titulo.string' => 'O título deve ser um texto!',
                'titulo.max' => 'O titulo deve ter no máximo 255 caracteres!',

                'descricao.string' => 'A descrição deve ser um texto!',
                'descricao.max' => 'A descrição deve ter no máximo 255 caracteres!',

                'data_entrega.required' => 'Informe a data de entrega!',
                'data_entrega.date' => 'A data de entrega precisa ser uma data!',

                'tipo.required' => 'Informe a categoria!',
                'tipo.string' => 'A categoria deve ser um texto!',
                'tipo.in' => 'A categoria selecionada é inválida!',

                'tipo_entrega.required' => 'Informe o tipo de entrega!',
                'tipo_entrega.string' => 'O tipo de entrega selecionada deve ser um texto!',
                'tipo_entrega.in' => 'O tipo de entrega selecionado é inválido!'
            ]);
    }
}
