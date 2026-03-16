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
