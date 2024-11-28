<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'cpf';
    public $incrementing = false; // CPF não é autoincrement
    protected $fillable = ['cpf', 'nome', 'sobrenome', 'telefone', 'email', 'pontos'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'fk_cpf_cliente', 'cpf');
    }
}