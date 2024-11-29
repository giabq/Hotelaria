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
        Schema::create('acomodacoes', function (Blueprint $table) {
            $table->id('registro_acomodacao'); // Chave primária
            $table->string('tipo_acomodacao', 50);
            $table->text('politica_de_uso');
            $table->integer('capacidade_maxima_acomodacao');
            $table->string('status_acomodacao', 50);
            $table->integer('ponto_atribuido')->nullable(); // Pontuação atribuída
            $table->foreignId('fk_id_hotel')->constrained('unidades_de_hotel', 'id_hotel'); // Relaciona com Unidade de Hotel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acomodacaos');
    }
};
