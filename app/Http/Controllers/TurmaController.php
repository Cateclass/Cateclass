<?php

namespace App\Http\Controllers;

use App\Models\Turma;
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
            return view('catequista.turmas', compact('turmas'));
        }
        // catequizando
        elseif ($usuario->tipo_usuario === 'catequizando')
        {
            // pega as turmas do catequizando
            $turmas = $usuario->turmasCursadas;

            // retorna a view passando as turmas
            return view('catequizando.turmas', compact('turmas'));
        }
        // coordenadora
        elseif ($usuario->tipo_usuario === 'coordenadora')
        {
            // pega todas as turmas do sistema
            $turmas = Turma::all();

            // retorna a view passando as turmas
            return view('coordenador.turmas', compact('turmas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // retorna a view de formulário para criação de turma
        return view('catequista.criarTurma');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // valida os dados
        $validated = $request->validate(
            // regras
            [
                'tipo_turma' => 'required|string|max:20',
                'dia_horario' => 'required|string',
                'etapa_id' => 'required|integer|exists',
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

        // define o nome da turma
        // pega o nome da catequista
        $nome = $request->user()->name;
        $nomeCatequista = explode(' ', $nome)[0];
        // gera o nome
        $nomeGerado = "{$validated['tipo_turma']} - {$validated['dia_horario']} - {$nomeCatequista}";

        // injeta os dados no array $validated
        $validated['nome_turma'] = $nomeGerado;
        $validated['catequista_id'] = auth()->id();

        // salva no banco
        Turma::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
