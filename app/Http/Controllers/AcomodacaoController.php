<?php

namespace App\Http\Controllers;

use App\Models\Acomodacao;
use App\Models\UnidadeDeHotel;
use Illuminate\Http\Request;

class AcomodacaoController extends Controller
{
    /**
     * Exibe a lista de acomodações.
     */
    public function index()
    {
        // Carrega todas as acomodações junto com a unidade de hotel associada
        $acomodacoes = Acomodacao::with('unidadeDeHotel')->get();
        return view('acomodacoes.index', compact('acomodacoes'));
    }

    /**
     * Mostra o formulário para criar uma nova acomodação.
     */
    public function create()
    {
        // Carrega todas as unidades de hotel disponíveis para seleção
        $unidadesDeHotel = UnidadeDeHotel::all();
        return view('acomodacoes.create', compact('unidadesDeHotel'));
    }

    /**
     * Salva uma nova acomodação no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos campos obrigatórios
        $request->validate([
            'tipo_acomodacao' => 'required|string|max:50',
            'politica_de_uso' => 'required|string',
            'capacidade_maxima_acomodacao' => 'required|integer',
            'status_acomodacao' => 'required|string|max:50',
            'ponto_atribuido' => 'nullable|integer',
            'fk_id_hotel' => 'required|exists:unidades_de_hotel,id_hotel',
        ]);

        // Cria a nova acomodação
        Acomodacao::create($request->all());

        return redirect()->route('acomodacoes.index')->with('success', 'Acomodação criada com sucesso.');
    }

    /**
     * Mostra os detalhes de uma acomodação específica.
     */
    public function show($id)
    {
        // Busca a acomodação pelo ID
        $acomodacao = Acomodacao::find($id);

        if (!$acomodacao) {
            return redirect()->route('acomodacoes.index')->with('error', 'Acomodação não encontrada.');
        }

        return view('acomodacoes.show', compact('acomodacao'));
    }

    /**
     * Mostra o formulário para editar uma acomodação existente.
     */
    public function edit($id)
    {
        // Busca a acomodação e as unidades de hotel disponíveis
        $acomodacao = Acomodacao::find($id);
        $unidadesDeHotel = UnidadeDeHotel::all();

        if (!$acomodacao) {
            return redirect()->route('acomodacoes.index')->with('error', 'Acomodação não encontrada.');
        }

        return view('acomodacoes.edit', compact('acomodacao', 'unidadesDeHotel'));
    }

    /**
     * Atualiza uma acomodação no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Busca a acomodação
        $acomodacao = Acomodacao::find($id);

        if (!$acomodacao) {
            return redirect()->route('acomodacoes.index')->with('error', 'Acomodação não encontrada.');
        }

        // Validação dos campos obrigatórios
        $request->validate([
            'tipo_acomodacao' => 'required|string|max:50',
            'politica_de_uso' => 'required|string',
            'capacidade_maxima_acomodacao' => 'required|integer',
            'status_acomodacao' => 'required|string|max:50',
            'ponto_atribuido' => 'nullable|integer',
            'fk_id_hotel' => 'required|exists:unidades_de_hotel,id_hotel',
        ]);

        // Atualiza a acomodação
        $acomodacao->update($request->all());

        return redirect()->route('acomodacoes.index')->with('success', 'Acomodação atualizada com sucesso.');
    }

    /**
     * Remove uma acomodação do banco de dados.
     */
    public function destroy($id)
    {
        // Busca a acomodação pelo ID
        $acomodacao = Acomodacao::find($id);

        if (!$acomodacao) {
            return redirect()->route('acomodacoes.index')->with('error', 'Acomodação não encontrada.');
        }

        // Remove a acomodação
        $acomodacao->delete();

        return redirect()->route('acomodacoes.index')->with('success', 'Acomodação removida com sucesso.');
    }
}
