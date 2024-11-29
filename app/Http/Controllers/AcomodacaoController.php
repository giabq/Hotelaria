<?php

namespace App\Http\Controllers;

use App\Models\Acomodacao;
use App\Models\UnidadeDeHotel;
use Illuminate\Http\Request;

class AcomodacaoController extends Controller
{
    /**
     * Exibe uma lista de acomodações.
     */
    public function index()
    {
        $acomodacoes = Acomodacao::with('unidadeDeHotel')->get();
        return view('acomodacoes.index', compact('acomodacoes'));
    }

    /**
     * Mostra o formulário para criar uma nova acomodação.
     */
    public function create()
    {
        $unidadesDeHotel = UnidadeDeHotel::all(); // Busca todas as unidades de hotel para preencher o select
        return view('acomodacoes.create', compact('unidadesDeHotel'));
    }

    /**
     * Salva uma nova acomodação no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_acomodacao' => 'required|string|max:50',
            'politica_de_uso' => 'required|string',
            'capacidade_maxima_acomodacao' => 'required|integer',
            'status_acomodacao' => 'required|string|max:50',
            'ponto_atribuido' => 'nullable|integer',
            'fk_id_hotel' => 'required|exists:unidades_de_hotel,id_hotel', // Verifica se o hotel existe
        ]);

        Acomodacao::create($request->all());

        return redirect()->route('acomodacoes.index')
                         ->with('success', 'Acomodação criada com sucesso.');
    }

    /**
     * Mostra os detalhes de uma acomodação específica.
     */
    public function show(Acomodacao $acomodacao)
    {
        return view('acomodacoes.show', compact('acomodacao'));
    }

    /**
     * Mostra o formulário para editar uma acomodação existente.
     */
    public function edit(Acomodacao $acomodacao)
    {
        $unidadesDeHotel = UnidadeDeHotel::all();
        return view('acomodacoes.edit', compact('acomodacao', 'unidadesDeHotel'));
    }

    /**
     * Atualiza uma acomodação no banco de dados.
     */
    public function update(Request $request, Acomodacao $acomodacao)
    {
        $request->validate([
            'tipo_acomodacao' => 'required|string|max:50',
            'politica_de_uso' => 'required|string',
            'capacidade_maxima_acomodacao' => 'required|integer',
            'status_acomodacao' => 'required|string|max:50',
            'ponto_atribuido' => 'nullable|integer',
            'fk_id_hotel' => 'required|exists:unidades_de_hotel,id_hotel', // Verifica se o hotel existe
        ]);

        $acomodacao->update($request->all());

        return redirect()->route('acomodacoes.index')
                         ->with('success', 'Acomodação atualizada com sucesso.');
    }

    /**
     * Remove uma acomodação do banco de dados.
     */
    public function destroy(Acomodacao $acomodacao)
    {
        $acomodacao->delete();

        return redirect()->route('acomodacoes.index')
                         ->with('success', 'Acomodação removida com sucesso.');
    }
}
