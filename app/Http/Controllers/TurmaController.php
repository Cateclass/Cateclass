<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use App\Models\Turma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;



class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // verifica quem está logado
        $usuario = Auth::user();

        // catequista
        if($usuario->tipo_usuario === 'catequista')
        {
            // pega as turmas do catequista
            $turmas = $usuario->turmasGerenciadas;

            // retorna a view passando as turmas
            return view('catequista.verTurmas', compact('turmas'));
        }

        // catequizando
        if ($usuario->tipo_usuario === 'catequizando')
        {
            // pega as turmas do catequizando
            $turmas = $usuario->turmasCursadas;

            // retorna a view passando as turmas
            return view('catequizando.turmas', compact('turmas'));
        }

        // coordenadora
        if ($usuario->tipo_usuario === 'coordenadora')
        {
            // pega todas as turmas do sistema
            $turmas = Turma::all();

            // retorna a view passando as turmas
            return view('coordenador.turmas', compact('turmas'));
        }

        // não achou usuário
        abort(403, 'Você não possui permissão para acessar esta Página!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // pega as etapas para passar para a view
        $etapas = Etapa::all();
        // retorna a view de formulário para criação de turma
        return view('catequista.criarTurma', compact('etapas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // valida os dados
        $validated = $request->validate(
            // regras
            [
                'tipo_turma' => 'required|string|max:20',
                'dia_horario' => 'required|string',
                'etapa_id' => 'required|integer|exists:etapas,id',
                'data_inicio' => 'required|date',
                'data_termino' => 'nullable|date|after_or_equal:data_inicio'
            ],
            // mensagens
            [
                'tipo_turma.required' => 'O tipo da turma é obrigatório!',
                'tipo_turma.string' => 'O tipo da turma deve ser um texto!',
                'tipo_turma.max' => 'O tipo da turma deve tor no máximo 20 caracteres',

                'dia_horario.required' => 'O dia e horário é obrigatório!',
                'dia_horario.string' => 'O dia e horário deve ser um texto!',

                'etapa_id.required' => 'A etapa é obrigatória!',
                'etapa_id.integer' => 'A etapa deve ser um inteiro!',
                'etapa_id.exists' => 'A etapa deve ser válida!',

                'data_inicio.required' => 'É obrigatório definir a data de início!',
                'data_inicio.date' => 'A data de início deve ser do tipo data!',

                'data_termino.date' => 'A data de término deve ser do tipo data!',
                'data_termino.after_or_equal:data_inicio' => 'A data de término deve suceder a data de início!'
            ]
        );

        // define o nome da turma
        // pega o nome da catequista
        $nome = $request->user()->name;
        $nomeCatequista = explode(' ', $nome)[0];
        // gera o nome
        $nomeGerado = "{$validated['tipo_turma']} - {$validated['dia_horario']} - $nomeCatequista";

        // injeta os dados no array $validated
        $validated['nome_turma'] = $nomeGerado;
        $validated['catequista_id'] = auth()->id();

        // salva no banco
        Turma::create($validated);

        // retorna a tela de turmas
        return redirect()->route('catequista.turmas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turma $turma): View
    {
        // verifica se a turma pertence ao catequista
        if ($turma->catequista_id !== auth()->id()) {
            abort(403, 'Acesso não autorizado.');
        }

        // carrega a etapa da turma
        $turma->load('etapa');

        // busca as atividades da turma
        $atividades = $turma->atividades()->latest()->get();

        // busca os catequizandos da turma
        $catequizandos = $turma->alunos()->get();

        return view('catequista.verTurma', compact('turma', 'atividades', 'catequizandos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turma $turma)
    {
        // permite apenas o catequista da turma
        if ($turma->catequista_id !== auth()->id()) {
            abort(403, 'Acesso não autorizado.');
        }

        // pegas as etapas
        $etapas = Etapa::all();

        // retorna a view com a turma encontrada pelo parâmetro da rota
        return view('catequista.editarTurma', compact('turma', 'etapas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Turma $turma)
    {
        // permite apenas o catequista da turma
        if ($turma->catequista_id !== auth()->id()) {
            abort(403, 'Acesso não autorizado.');
        }

        // valida os dados
        $validated = $request->validate(
        // regras
            [
                'tipo_turma' => 'required|string|max:20',
                'dia_horario' => 'required|string',
                'etapa_id' => 'required|integer|exists:etapas,id',
                'data_inicio' => 'required|date',
                'data_termino' => 'nullable|date|after_or_equal:data_inicio'
            ],
            // mensagens
            [
                'tipo_turma.required' => 'O tipo da turma é obrigatório!',
                'tipo_turma.string' => 'O tipo da turma deve ser um texto!',
                'tipo_turma.max:20' => 'O tipo da turma deve tor no máximo 20 caracteres',

                'dia_horario.required' => 'O dia e horário é obrigatório!',
                'dia_horario.string' => 'O dia e horário deve ser um texto!',

                'etapa_id.required' => 'A etapa é obrigatória!',
                'etapa_id.integer' => 'A etapa deve ser um inteiro!',
                'etapa_id.exists' => 'A etapa deve ser válida!',

                'data_inicio.required' => 'É obrigatório definir a data de início!',
                'data_inicio.date' => 'A data de início deve ser do tipo data!',

                'data_termino.date' => 'A data de término deve ser do tipo data!',
                'data_termino.after_or_equal:data_inicio' => 'A data de término deve suceder a data de início!'
            ]
        );

        // recalcula o nome da turma
        $nome = $request->user()->name;
        $nomeCatequista = explode(' ', $nome)[0];
        // gera o nome
        $nomeGerado = "{$validated['tipo_turma']} - {$validated['dia_horario']} - $nomeCatequista";

        // injeta os dados no array $validated
        $validated['nome_turma'] = $nomeGerado;

        // atualiza os dados
        $turma->update($validated);

        // retorna para o index de turmas
        return redirect()->route('catequista.turmas')->with('sucesso', 'Turma atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turma $turma)
    {
        // deleta a turma
        $turma->delete();

        // retorna para o index de turmas
        return redirect()->route('catequista.turmas')->with('success', 'Turma apagada com sucesso!');
    }

    // métodos para o catequizando entrar na turma

    // mostra o formulário para o catequizando colocar o código da turma
    public function entrarTurma() : View
    {
        return view('catequizando.entrarTurma');
    }

    // processa o código e coloca o catequizando na turma
    public function matricular(Request $request) : RedirectResponse
    {
        // valida os dados
        $request->validate([
            'codigo_turma' => 'required|string|exists:turmas,codigo_turma'
        ], [
            'codigo_turma.required' => 'Por favor, informe o código da turma.',
            'codigo_turma.exists' => 'Código inválido ou turma não encontrada.'
        ]);

        // busca a turma usando o código validado
        $turma = Turma::where('codigo_turma', $request->codigo_turma)->first();
        $user = auth()->user();

        // verifica se o catequizando já não está na turma
        if ($turma->alunos()->where('user_id', $user->id)->exists()) {
            return back()->with('erro', 'Você já está matriculado nesta turma!');
        }

        // insere o catequizando na turma
        $turma->alunos()->attach($user->id);

        // redireciona para a dashboard
        return redirect()->route('dashboard')->with('sucesso', 'Matriculado com sucesso! Bem vindo(a) a turma!');
    }
}
