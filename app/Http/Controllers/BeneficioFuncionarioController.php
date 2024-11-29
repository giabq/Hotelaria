<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Beneficio;
use App\Models\BeneficioFuncionario;
use Illuminate\Http\Request;

class BeneficioFuncionarioController extends Controller
{
    /**
     * Exibe uma lista de relações entre funcionários e benefícios.
     */
    public function index()
    {
        $beneficiosFuncionarios = BeneficioFuncionario::with(['funcionario', 'beneficio'])->get();
        return view('beneficios_funcionarios.index', compact('beneficiosFuncionarios'));
    }

    /**
     * Mostra o formulário para criar uma nova relação.
     */
    public function create()
    {
        $funcionarios = Funcionario::all();
        $beneficios = Beneficio::all();
        return view('beneficios_funcionarios.create', compact('funcionarios', 'beneficios'));
    }

    /**
     * Salva uma nova relação no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fk_cpf_func' => 'required|exists:funcionarios,cpf_func',
            'fk_tipo_bens' => 'required|exists:beneficios,tipo_ben',
            'fk_valor_bens' => 'required|numeric',
        ]);

        BeneficioFuncionario::create($request->all());

        return redirect()->route('beneficios-funcionarios.index')->with('success', 'Benefício atribuído ao funcionário com sucesso.');
    }

    /**
     * Mostra os detalhes de uma relação específica.
     */
    public function show(BeneficioFuncionario $beneficioFuncionario)
    {
        return view('beneficios_funcionarios.show', compact('beneficioFuncionario'));
    }

    /**
     * Mostra o formulário para editar uma relação existente.
     */
    public function edit(BeneficioFuncionario $beneficioFuncionario)
    {
        $funcionarios = Funcionario::all();
        $beneficios = Beneficio::all();
        return view('beneficios_funcionarios.edit', compact('beneficioFuncionario', 'funcionarios', 'beneficios'));
    }

    /**
     * Atualiza uma relação no banco de dados.
     */
    public function update(Request $request, BeneficioFuncionario $beneficioFuncionario)
    {
        $request->validate([
            'fk_cpf_func' => 'required|exists:funcionarios,cpf_func',
            'fk_tipo_bens' => 'required|exists:beneficios,tipo_ben',
            'fk_valor_bens' => 'required|numeric',
        ]);

        $beneficioFuncionario->update($request->all());

        return redirect()->route('beneficios-funcionarios.index')->with('success', 'Relação atualizada com sucesso.');
    }

    /**
     * Remove uma relação do banco de dados.
     */
    public function destroy(BeneficioFuncionario $beneficioFuncionario)
    {
        $beneficioFuncionario->delete();

        return redirect()->route('beneficios-funcionarios.index')->with('success', 'Relação removida com sucesso.');
    }
}
