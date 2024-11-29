<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acomodacao extends Model
{
    use HasFactory;

    protected $table = 'acomodacoes';
    protected $primaryKey = 'registro_acomodacao';
    protected $fillable = [
        'tipo_acomodacao',
        'politica_de_uso',
        'capacidade_maxima_acomodacao',
        'status_acomodacao',
        'ponto_atribuido',
        'fk_id_hotel'
    ];

    public function unidadeDeHotel()
    {
        return $this->belongsTo(UnidadeDeHotel::class, 'fk_id_hotel', 'id_hotel');
    }
}

