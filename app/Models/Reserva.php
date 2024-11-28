<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';
    protected $primaryKey = 'registro_reserva';
    protected $fillable = [
        'preco_reserva',
        'data_e_hora_checkin',
        'data_e_hora_checkout',
        'custos_adicionais_reserva',
        'preco_total_reserva',
        'fk_cpf_cliente',
        'fk_id_hotel',
        'fk_registro_acomodacao',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_cpf_cliente', 'cpf');
    }

    public function unidadeDeHotel()
    {
        return $this->belongsTo(UnidadeDeHotel::class, 'fk_id_hotel', 'id_hotel');
    }

    public function acomodacao()
    {
        return $this->belongsTo(Acomodacao::class, 'fk_registro_acomodacao', 'registro_acomodacao');
    }
}