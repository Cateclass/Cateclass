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
