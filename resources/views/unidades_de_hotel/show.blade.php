@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detalhes da Unidade de Hotel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('unidades_de_hotel.index') }}"> Voltar</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                {{ $unidadeDeHotel->id_hotel }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Registro Imobiliário:</strong>
                {{ $unidadeDeHotel->registro_imobiliario }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Caixa Entrada:</strong>
                {{ $unidadeDeHotel->caixa_entrada }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Caixa Saída:</strong>
                {{ $unidadeDeHotel->caixa_saida }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Número de Vagas:</strong>
                {{ $unidadeDeHotel->num_vagas }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Local:</strong>
                {{ $unidadeDeHotel->local_hot }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria:</strong>
                {{ $unidadeDeHotel->categoria_hot }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome Fantasia:</strong>
                {{ $unidadeDeHotel->nome_fantasia_hot }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tamanho:</strong>
                {{ $unidadeDeHotel->tamanho_hot }}
            </div>
        </div>
    </div>
</div>
@endsection
