<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\UnidadeDeHotel;
use App\Models\Acomodacao;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Exibe uma lista de reservas.
     */
    public function index()
    {
        $reservas = Reserva::with(['cliente', 'unidadeDeHotel', 'acomodacao'])->get();
        return view('reservas.index', compact('reservas'));
    }

    /**
     * Mostra o formulário para criar uma nova reserva.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $unidadesDeHotel = UnidadeDeHotel::all();
        $acomodacoes = Acomodacao::all();
        return view('reservas.create', compact('clientes', 'unidadesDeHotel', 'acomodacoes'));
    }

    /**
     * Salva uma nova reserva no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status_res' => 'required|boolean',

            'preco_reserva' => 'required|numeric',
            'data_e_hora_checkin' => 'required|date',
            'data_e_hora_checkout' => 'required|date',
            'custos_adicionais_reserva' => 'nullable|numeric',
            'preco_total_reserva' => 'required|numeric',
            'no_pessoas' => 'required|integer',
            'fk_cpf_cliente' => 'required|exists:clientes,cpf',
            'fk_id_hotel' => 'required|exists:unidades_de_hotel,id_hotel',
            'fk_registro_acomodacao' => 'required|exists:acomodacoes,registro_acomodacao',
        ]);

        Reserva::create($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva criada com sucesso.');
    }

    /**
     * Mostra os detalhes de uma reserva específica.
     */
    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    /**
     * Mostra o formulário para editar uma reserva existente.
     */
    public function edit(Reserva $reserva)
    {
        $clientes = Cliente::all();
        $unidadesDeHotel = UnidadeDeHotel::all();
        $acomodacoes = Acomodacao::all();
        return view('reservas.edit', compact('reserva', 'clientes', 'unidadesDeHotel', 'acomodacoes'));
    }

    /**
     * Atualiza uma reserva no banco de dados.
     */
    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'preco_reserva' => 'required|numeric',
            'data_e_hora_checkin' => 'required|date',
            'data_e_hora_checkout' => 'required|date',
            'custos_adicionais_reserva' => 'nullable|numeric',
            'preco_total_reserva' => 'required|numeric',
            'no_pessoas' => 'required|integer',
            'fk_cpf_cliente' => 'required|exists:clientes,cpf',
            'fk_id_hotel' => 'required|exists:unidades_de_hotel,id_hotel',
            'fk_registro_acomodacao' => 'required|exists:acomodacoes,registro_acomodacao',
        ]);

        $reserva->update($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva atualizada com sucesso.');
    }

    /**
     * Remove uma reserva do banco de dados.
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva removida com sucesso.');
    }

    public function getAcomodacoesByHotel($id_hotel)
    {
        $acomodacoes = Acomodacao::where('fk_id_hotel', $id_hotel)->get();
        return response()->json($acomodacoes);
    }

}
