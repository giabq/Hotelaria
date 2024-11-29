<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cpf' => 'required|unique:clientes',
            'nome' => 'required',
            'sobrenome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email|unique:clientes',
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente cadastrado com sucesso.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email'
        ]);

        $cliente->update($request->all());
        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente deletado com sucesso.');
    }
}
