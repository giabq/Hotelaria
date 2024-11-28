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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('cpf'); // CPF como chave primária
            $table->string('nome', 20);
            $table->string('sobrenome', 70);
            $table->string('telefone', 15);
            $table->string('email', 50)->unique();
            $table->integer('pontos')->default(0);
            $table->timestamps(); // Cria "created_at" e "updated_at"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
