<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Atividade;
use App\Models\Resposta;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // pega os dados do usuário logado
        $user = Auth::user();

        if($user->tipo_usuario === 'catequista')
        {
            // pega as turmas do catequista
            $turmas = $user->turmasGerenciadas()->with('etapa')->orderByDesc('data_inicio')->get();

            // pega o total de catequizandos do catequista
            $totalCatequizandos = User::whereHas('turmasGerenciadas', function ($query) use ($user)
            {
                $query->where('catequista_id', $user->id);
            })->count();

            // pega as atividades e pendencias
            $totalAtividades = Atividade::whereHas('turma', function ($query) use ($user)
            {
                $query->where('catequista_id', $user->id);
            })->count();

            $pendentesCorrecao = Resposta::whereHas('atividade.turma', function ($query) use ($user)
            {
                $query->where('catequista_id', $user->id);
            })->whereNull('comentario_catequista')->count();

            // retorna a view dashboard de catequistas
            return view('dashboard.catequista', compact(
                'turmas',
                'totalCatequizandos',
                'totalAtividades',
                'pendentesCorrecao'
            ));
        }
        elseif ($user->tipo_usuario === 'catequizando')
        {
            // pega as turmas do catequizando
            $turmas = $user->turmasCursadas()->with('etapa')->get();

            // pega o total de turmas
            $totalTurmas = $turmas->count();

            // conta as atividades de todas as turmas que ele cursa
            $totalAtividades = Atividade::whereHas('turma.alunos', function ($query) use ($user)
            {
                $query->where('user_id', $user->id);
            })->count();

            // conta as resposatas que ele enviou
            $concluidas = $user->respostas()->count();

            // calcula as atividades pendentes
            $pendentes = max(0, $totalAtividades - $concluidas);

            // retorna a view com os dados
            return view('dashboard.catequizando', compact(
                'turmas',
                'totalTurmas',
                'totalAtividades',
                'concluidas',
                'pendentes'
            ));
        }
        elseif ($user->tipo_usuario === 'coordenador')
        {
            // conta todas as turmas
            $totalTurmas = Turma::count();

            // conta o total de catequistas
            $totalCatequistas = User::where('tipo_usuario', 'catequista')->count();

            // conta o total de catequizandos
            $totalCatequizandos = User::where('tipo_usuario', 'catequizando')->count();

            // retorna a view com os dados
            return view('dashboard.coordenador', compact(
                'totalTurmas',
                'totalCatequistas',
                'totalCatequizandos'
            ));
        }
        // Fallback de segurança
        abort(403, 'Acesso não autorizado ou perfil inválido.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
