<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadeDeHotel extends Model
{
    use HasFactory;

    protected $table = 'unidades_de_hotel';
    protected $primaryKey = 'id_hotel';
    public $incrementing = true;
protected $keyType = 'int';
    protected $fillable = [
        'registro_imobiliario',
        'caixa_entrada',
        'caixa_saida',
        'num_vagas',
        'local_hot',
        'categoria_hot',
        'nome_fantasia_hot',
        'tamanho_hot',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'fk_id_hotel', 'id_hotel');
    }
}
