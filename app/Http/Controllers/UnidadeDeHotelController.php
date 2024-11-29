<?php

namespace App\Http\Controllers;

use App\Models\UnidadeDeHotel;
use Illuminate\Http\Request;

class UnidadeDeHotelController extends Controller
{
    public function index()
    {
        $unidades_de_hotel = UnidadeDeHotel::all();
        return view('unidades_de_hotel.index', compact('unidades_de_hotel'));
    }

    public function create()
    {
        return view('unidades_de_hotel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'registro_imobiliario' => 'required|integer',
            'caixa_entrada' => 'required|numeric',
            'caixa_saida' => 'required|numeric',
            'num_vagas' => 'required|integer',
            'local_hot' => 'required|string|max:50',
            'categoria_hot' => 'required|string|max:50',
            'nome_fantasia_hot' => 'required|string|max:50',
            'tamanho_hot' => 'required|string|max:50'
        ]);

        UnidadeDeHotel::create($request->all());
        return redirect()->route('unidades_de_hotel.index')
            ->with('success', 'Unidade de Hotel cadastrada com sucesso.');
    }

    public function show($id)
    {
        // Localiza a unidade de hotel no banco de dados
        $unidadeDeHotel = UnidadeDeHotel::find($id);

        if (!$unidadeDeHotel) {
            return redirect()->route('unidades_de_hotel.index')
                ->with('error', 'Unidade de Hotel não encontrada.');
        }

        return view('unidades_de_hotel.show', compact('unidadeDeHotel'));
    }


    public function edit($id)
    {
        $unidadeDeHotel = UnidadeDeHotel::find($id);

        if (!$unidadeDeHotel) {
            abort(404, 'Unidade de Hotel não encontrada.');
        }

        return view('unidades_de_hotel.edit', compact('unidadeDeHotel'));
    }



    public function update(Request $request, $id)
    {
        // Localiza a unidade de hotel no banco
        $unidadeDeHotel = UnidadeDeHotel::find($id);

        // Verifica se a unidade existe
        if (!$unidadeDeHotel) {
            return redirect()->route('unidades_de_hotel.index')
                ->with('error', 'Unidade de Hotel não encontrada.');
        }

        // Valida os dados recebidos
        $request->validate([
            'registro_imobiliario' => 'nullable|integer',
            'caixa_entrada' => 'nullable|numeric',
            'caixa_saida' => 'nullable|numeric',
            'num_vagas' => 'nullable|integer',
            'local_hot' => 'required|string|max:50',
            'categoria_hot' => 'required|string|max:50',
            'nome_fantasia_hot' => 'required|string|max:50',
            'tamanho_hot' => 'required|string|max:50',
        ]);

        // Atualiza os dados no banco
        $unidadeDeHotel->update($request->all());

        return redirect()->route('unidades_de_hotel.index')
            ->with('success', 'Unidade de Hotel atualizada com sucesso.');
    }


    public function destroy($id)
    {
        // Localiza a unidade de hotel no banco de dados
        $unidadeDeHotel = UnidadeDeHotel::find($id);

        if (!$unidadeDeHotel) {
            return redirect()->route('unidades_de_hotel.index')
                ->with('error', 'Unidade de Hotel não encontrada.');
        }

        $unidadeDeHotel->delete();

        return redirect()->route('unidades_de_hotel.index')
            ->with('success', 'Unidade de Hotel deletada com sucesso.');
    }

}
