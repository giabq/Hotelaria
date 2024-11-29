<?php

namespace App\Http\Controllers;

use App\Models\Beneficio;
use Illuminate\Http\Request;

class BeneficioController extends Controller
{
    /**
     * Exibe uma lista de benefícios.
     */
    public function index()
    {
        $beneficios = Beneficio::all();
        return view('beneficios.index', compact('beneficios'));
    }

    /**
     * Mostra o formulário para criar um novo benefício.
     */
    public function create()
    {
        return view('beneficios.create');
    }

    /**
     * Salva um novo benefício no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'empresa_beneficiaria' => 'required|string|max:255',
            'valor_ben' => 'required|numeric',
            'tipo_ben' => 'required|string|max:255|unique:beneficios,tipo_ben',
        ]);

        Beneficio::create($request->all());

        return redirect()->route('beneficios.index')->with('success', 'Benefício criado com sucesso.');
    }

    /**
     * Mostra os detalhes de um benefício específico.
     */
    public function show(Beneficio $beneficio)
    {
        return view('beneficios.show', compact('beneficio'));
    }

    /**
     * Mostra o formulário para editar um benefício existente.
     */
    public function edit(Beneficio $beneficio)
    {
        return view('beneficios.edit', compact('beneficio'));
    }

    /**
     * Atualiza um benefício no banco de dados.
     */
    public function update(Request $request, Beneficio $beneficio)
    {
        $request->validate([
            'empresa_beneficiaria' => 'required|string|max:255',
            'valor_ben' => 'required|numeric',
            'tipo_ben' => 'required|string|max:255|unique:beneficios,tipo_ben,' . $beneficio->tipo_ben,
        ]);

        $beneficio->update($request->all());

        return redirect()->route('beneficios.index')->with('success', 'Benefício atualizado com sucesso.');
    }

    /**
     * Remove um benefício do banco de dados.
     */
    public function destroy(Beneficio $beneficio)
    {
        $beneficio->delete();

        return redirect()->route('beneficios.index')->with('success', 'Benefício removido com sucesso.');
    }
}
