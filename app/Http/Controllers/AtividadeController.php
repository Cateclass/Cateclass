<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Atividade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // pega o id do catequista
        $catequistaId = auth()->id();

        // busca as atividades que pertencem as turmas desse catequista
        $atividades = Atividade::whereHas('turma', function ($query) use ($catequistaId) {
            $query->where('catequista_id', $catequistaId);
        })->latest()->get();

        // retorna a view com as atividades
        return view('atividade.index', compact('atividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // mostra o formulário para o catequista criar uma atividade
        return view('catequista.criarAtividade');
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
    public function show(string $id)
    {
        // mostra a view para o catequizando ver a atividade e poder responder
        return view('verAtividade');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atividade $atividade): View
    {
        return view('catequista.editarAtividade', compact('atividade'));
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
        return redirect()->route('catequista.atividades');
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
