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
            'registro_imobiliario' => 'required',
            'caixa_entrada' => 'required|numeric',
            'caixa_saida' => 'required|numeric',
            'num_vagas' => 'required|integer',
            'local_hot' => 'required',
            'categoria_hot' => 'required',
            'nome_fantasia_hot' => 'required',
            'tamanho_hot' => 'required'
        ]);

        UnidadeDeHotel::create($request->all());
        return redirect()->route('unidades_de_hotel.index')
                         ->with('success', 'Unidade de Hotel cadastrada com sucesso.');
    }

    public function show(UnidadeDeHotel $unidadeDeHotel)
    {
        return view('unidades_de_hotel.show', compact('unidadeDeHotel'));
    }

    public function edit(UnidadeDeHotel $unidadeDeHotel)
    {
        return view('unidades_de_hotel.edit', compact('unidadeDeHotel'));
    }

    public function update(Request $request, UnidadeDeHotel $unidadeDeHotel)
    {
        $request->validate([
            'registro_imobiliario' => 'required',
            'caixa_entrada' => 'required|numeric',
            'caixa_saida' => 'required|numeric',
            'num_vagas' => 'required|integer',
            'local_hot' => 'required',
            'categoria_hot' => 'required',
            'nome_fantasia_hot' => 'required',
            'tamanho_hot' => 'required'
        ]);

        $unidadeDeHotel->update($request->all());
        return redirect()->route('unidades_de_hotel.index')
                         ->with('success', 'Unidade de Hotel atualizada com sucesso.');
    }

    public function destroy(UnidadeDeHotel $unidadeDeHotel)
    {
        $unidadeDeHotel->delete();
        return redirect()->route('unidades_de_hotel.index')
                         ->with('success', 'Unidade de Hotel deletada com sucesso.');
    }
}
