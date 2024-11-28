<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('registro_reserva'); // Chave primária
            $table->float('preco_reserva');
            $table->timestamp('data_e_hora_checkin');
            $table->timestamp('data_e_hora_checkout');
            $table->float('custos_adicionais_reserva')->nullable();
            $table->float('preco_total_reserva');
            $table->foreignId('fk_cpf_cliente')->constrained('clientes', 'cpf'); // Relaciona com Cliente
            $table->foreignId('fk_id_hotel')->constrained('unidades_de_hotel', 'id_hotel'); // Relaciona com Unidade de Hotel
            $table->foreignId('fk_registro_acomodacao')->constrained('acomodacoes', 'registro_acomodacao'); // Relaciona com Acomodação
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
