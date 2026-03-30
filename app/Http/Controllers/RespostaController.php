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
        // pega o usuario logado
        $usuario = Auth::user();

        // valida os dados
        $request->validate([
            'atividade_id' => 'required|exists:atividades,id',
            'tipo_entrega' => 'required|in:texto,confirmacao',
            'texto_resposta' => 'required_if:tipo_entrega,texto|string|nullable|max:255'
        ], [
            'texto_resposta.required_if' => 'A resposta é obrigatória para este tipo de atividade!',
            'texto_resposta.max' => 'A resposta deve ter no máximo 255 caracteres!'
        ]);

        // insere a resposta no banco
        Resposta::create([
            'atividade_id' => $request->atividade_id,
            'user_id' => $usuario->id,
            'texto' => $request->texto_resposta,
        ]);

        // retorna para as atividades do catequizando
        return redirect()->route('catequizando.atividades')->with('sucesso', 'Atividade entregue com sucesso!');
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
    public function destroy(Request $request)
    {
        // pega o usuario logado
        $usuario = Auth::user();

        // busca a resposta pelo id
        $resposta = Resposta::find($request->resposta_id);

        // verifica se a resposta existe e se foi enviada por esse aluno e retorna para a tela anterior com sucesso
        if ($resposta && $resposta->user_id === $usuario->id) {
            $resposta->delete();
            return back()->with('sucesso', 'Envio cancelado. Você pode enviar novamente.');
        }

        // retorna para a tela anterior com erro caso não passar na validação
        return back()->with('erro', 'Não foi possível cancelar este envio.');
    }
}
