<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Atividade;
use App\Models\Resposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // pega o id do catequizando
        $catequizandoId = Auth::user()->id;

        // valida o dado
        $validated = $request->validate(
            // regras
            [
                'texto' => 'required|string|max:255'
            ],
            // mensagens
            [
                'texto.required' => 'A resposta é obrigatória!',
                'texto.string' => 'A resposta deve ser um texto!',
                'texto.max' => 'A resposta deve ter no máximo 255 caracteres!'
            ]
        );

        // guarda no banco
        Resposta::create($validated);

        // retorna para a view de atividade
        return redirect()->route('atividade.show', $catequizandoId);

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
    public function edit(Resposta $resposta)
    {
        //mostra a resposta do aluno para ele corrigir/dar feedback
        return view('formCorrecao', compact('resposta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resposta $resposta)
    {
        // valida a resposta
        $validated = $request->validate(
            // regra
            [
            'comentario_catequista' => 'nullable|string|max:255',
            ],
            // mensagens
            [
                'comentario_catequista.nullable' => 'O texto pode ser vazio!',
                'comentario_catequista.string' => 'O comentário deve ser um texto!',
                'comentario_catequista.max' => 'O comentário deve ter no máximo 255 caracteres!'
            ]
        );

        // atualiza a resposta com o comentário
        $resposta->update($validated);

        // retorna para a lista de respostas
        return redirect()->route('respostas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
