<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UnidadeDeHotelController;
use App\Http\Controllers\AcomodacaoController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return view('home');
});

Route::resource('clientes', ClienteController::class);
Route::resource('unidades_de_hotel', UnidadeDeHotelController::class);

Route::resource('acomodacoes', AcomodacaoController::class);
Route::resource('reservas', ReservaController::class);

Route::get('reservas/acomodacoes/{id_hotel}', [ReservaController::class, 'getAcomodacoesByHotel'])->name('reservas.acomodacoes');

