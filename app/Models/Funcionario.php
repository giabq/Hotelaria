<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios'; // Nome exato da tabela no banco de dados
    protected $primaryKey = 'cpf_func'; // Nome da chave primária
    public $incrementing = false; // Define que a chave primária não é auto-incrementada, se for o caso
    protected $keyType = 'string'; // Tipo da chave primária (ex: string ou int)

    protected $fillable = [
        'cpf_func',
        'nome',
        'sobrenome',
        'funcao_func',
        'salario',
        'carga_horaria',
        'tipo_contrato',
        'fk_id_hotel',
    ];

    public function beneficios()
    {
        return $this->belongsToMany(Beneficio::class, 'beneficios_funcionarios', 'fk_cpf_func', 'fk_tipo_bens')
                    ->withPivot('fk_valor_bens')
                    ->withTimestamps();
    }
}
