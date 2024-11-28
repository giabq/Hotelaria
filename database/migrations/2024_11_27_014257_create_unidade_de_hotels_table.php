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
        Schema::create('unidades_de_hotel', function (Blueprint $table) {
            $table->id('id_hotel'); // Chave primária
            $table->integer('registro_imobiliario')->nullable();
            $table->float('caixa_entrada')->nullable();
            $table->float('caixa_saida')->nullable();
            $table->integer('num_vagas')->nullable();
            $table->string('local_hot', 50);
            $table->string('categoria_hot', 50);
            $table->string('nome_fantasia_hot', 50);
            $table->string('tamanho_hot', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidade_de_hotels');
    }
};
