@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Unidades de Hotel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('unidades_de_hotel.create') }}"> Adicionar Unidade de Hotel</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Registro Imobiliário</th>
            <th>Caixa Entrada</th>
            <th>Caixa Saída</th>
            <th>Num Vagas</th>
            <th>Local</th>
            <th>Categoria</th>
            <th>Nome Fantasia</th>
            <th>Tamanho</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($unidades_de_hotel as $unidade)
        <tr>
            <td>{{ $unidade->id_hotel }}</td>
            <td>{{ $unidade->registro_imobiliario }}</td>
            <td>{{ $unidade->caixa_entrada }}</td>
            <td>{{ $unidade->caixa_saida }}</td>
            <td>{{ $unidade->num_vagas }}</td>
            <td>{{ $unidade->local_hot }}</td>
            <td>{{ $unidade->categoria_hot }}</td>
            <td>{{ $unidade->nome_fantasia_hot }}</td>
            <td>{{ $unidade->tamanho_hot }}</td>
            <td>
                <form action="{{ route('unidades_de_hotel.destroy', $unidade->id_hotel) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('unidades_de_hotel.show', $unidade->id_hotel) }}">Mostrar</a>
                    <a class="btn btn-primary" href="{{ route('unidades_de_hotel.edit', $unidade->id_hotel) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
