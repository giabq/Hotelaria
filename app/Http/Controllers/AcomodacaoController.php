<?php

namespace App\Http\Controllers;

use App\Models\Acomodacao;
use Illuminate\Http\Request;

class AcomodacaoController extends Controller
{
    public function index()
    {
        $acomodacoes = Acomodacao::all();
        return view('acomodacoes.index', compact('acomodacoes'));
    }

    public function create()
    {
        return view('acomodacoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_acomodacao' => 'required',
            'politica_de_uso' => 'required',
            'capacidade_maxima_acomodacao' => 'required|integer',
            'status_acomodacao' => 'required',
            'ponto_atribuido' => 'required|integer'
        ]);

        Acomodacao::create($request->all());
        return redirect()->route('acomodacoes.index')
                         ->with('success', 'Acomodação cadastrada com sucesso.');
    }

    public function show(Acomodacao $acomodacao)
    {
        return view('acomodacoes.show', compact('acomodacao'));
    }

    public function edit(Acomodacao $acomodacao)
    {
        return view('acomodacoes.edit', compact('acomodacao'));
    }

    public function update(Request $request, Acomodacao $acomodacao)
    {
        $request->validate([
            'tipo_acomodacao' => 'required',
            'politica_de_uso' => 'required',
            'capacidade_maxima_acomodacao' => 'required|integer',
            'status_acomodacao' => 'required',
            'ponto_atribuido' => 'required|integer'
        ]);

        $acomodacao->update($request->all());
        return redirect()->route('acomodacoes.index')
                         ->with('success', 'Acomodação atualizada com sucesso.');
    }

    public function destroy(Acomodacao $acomodacao)
    {
        $acomodacao->delete();
        return redirect()->route('acomodacoes.index')
                         ->with('success', 'Acomodação deletada com sucesso.');
    }
}
