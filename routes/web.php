<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UnidadeDeHotelController;
use App\Http\Controllers\AcomodacaoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\BeneficioController;
use App\Http\Controllers\BeneficioFuncionarioController;




Route::get('/', function () {
    return view('home');
});

Route::resource('clientes', ClienteController::class);
Route::resource('unidades_de_hotel', UnidadeDeHotelController::class);

Route::resource('acomodacoes', AcomodacaoController::class);
Route::resource('reservas', ReservaController::class);

Route::resource('funcionarios', FuncionarioController::class);
Route::resource('beneficios', BeneficioController::class);
Route::resource('beneficios-funcionarios', BeneficioFuncionarioController::class);

Route::get('reservas/acomodacoes/{id_hotel}', [ReservaController::class, 'getAcomodacoesByHotel'])->name('reservas.acomodacoes');

