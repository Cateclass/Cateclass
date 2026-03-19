<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        // retorna a lista de todos os usu[arios cadastrados
        $users = User::all();

        // retorna a view da coordenadora com todos os usuários
        return view('coordenacao.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // não utiliza nesse controller
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // não utiliza nesse controller
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) : View
    {
        // retorna a view com o perfil detalhado do usuário
        return view('coordenacao.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // retorna a view com os dados do usuário já preenchidos
        return view('coordenacao.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //valida os dados
        $validated = $request->validate(
            // regras
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user)],
                'telefone' => ['required', 'string', 'max:14', Rule::unique(User::class)->ignore($user)],
                'tipo_usuario' => ['required', 'string', 'in:catequista,catequizando']
            ],
            // mensagens
            [
                'name.required' => 'O nome é obrigatório.',
                'name.string' => 'O formato do nome é inválido.',
                'name.max' => 'O nome deve ter no máximo 255 caracteres.',

                'email.required' => 'O e-mail é obrigatório.',
                'email.string' => 'O formato do e-mail é inválido.',
                'email.lowercase' => 'O e-mail deve estar apenas em letras minúsculas.',
                'email.email' => 'Por favor, insira um endereço de e-mail válido.',
                'email.max' => 'O e-mail deve ter no máximo 255 caracteres.',
                'email.unique' => 'Este e-mail já está em uso por outro usuário.',

                'telefone.required' => 'O telefone é obrigatório.',
                'telefone.string' => 'O formato do telefone é inválido.',
                'telefone.max' => 'O telefone não pode ter mais que 14 caracteres.',
                'telefone.unique' => 'Este número de telefone já está cadastrado.',

                'tipo_usuario.required' => 'Por favor, selecione o tipo de usuário.',
                'tipo_usuario.string' => 'O formato do tipo de usuário é inválido.',
                'tipo_usuario.in' => 'O tipo de usuário selecionado é inválido. Escolha entre Catequista ou Catequizando.'
            ]
        );

        // atualiza o usuário
        $user->update($validated);

        // retorna para o show com o aviso
        return redirect()->route('coordenacao.show', ['user' => $user])->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // deleta o usuário
        $user->delete();

        // volta para o index com a mensagem de sucesso
        return redirect()->route('coordenacao.index')->with('Usuário removido com sucesso!');
    }
}
