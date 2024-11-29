<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    protected $table = 'beneficios'; // Nome exato da tabela
    protected $primaryKey = 'tipo_ben'; // Chave primária personalizada

    protected $fillable = [
        'empresa_beneficiaria',
        'valor_ben',
        'tipo_ben',
    ];

    public function funcionarios()
    {
        return $this->belongsToMany(Funcionario::class, 'beneficios_funcionarios', 'fk_tipo_bens', 'fk_cpf_func')
                    ->withPivot('fk_valor_bens')
                    ->withTimestamps();
    }
}

