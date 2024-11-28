<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\UnidadeDeHotel;
use App\Models\Acomodacao;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $unidadesDeHotel = UnidadeDeHotel::all();
        $acomodacoes = Acomodacao::all();
        return view('reservas.create', compact('clientes', 'unidadesDeHotel', 'acomodacoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'preco_reserva' => 'required|numeric',
            'data_e_hora_checkin' => 'required|date',
            'data_e_hora_checkout' => 'required|date',
            'custos_adicionais_reserva' => 'nullable|numeric',
            'preco_total_reserva' => 'required|numeric',
            'fk_cpf_cliente' => 'required',
            'fk_id_hotel' => 'required',
            'fk_registro_acomodacao' => 'required'
        ]);

        Reserva::create($request->all());
        return redirect()->route('reservas.index')
                         ->with('success', 'Reserva criada com sucesso.');
    }

    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        $clientes = Cliente::all();
        $unidadesDeHotel = UnidadeDeHotel::all();
        $acomodacoes = Acomodacao::all();
        return view('reservas.edit', compact('reserva', 'clientes', 'unidadesDeHotel', 'acomodacoes'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'preco_reserva' => 'required|numeric',
            'data_e_hora_checkin' => 'required|date',
            'data_e_hora_checkout' => 'required|date',
            'custos_adicionais_reserva' => 'nullable|numeric',
            'preco_total_reserva' => 'required|numeric',
            'fk_cpf_cliente' => 'required',
            'fk_id_hotel' => 'required',
            'fk_registro_acomodacao' => 'required'
        ]);

        $reserva->update($request->all());
        return redirect()->route('reservas.index')
                         ->with('success', 'Reserva atualizada com sucesso.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')
                         ->with('success', 'Reserva deletada com sucesso.');
    }
}
