<x-layout>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Clientes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clientes.create') }}"> Adicionar Cliente</a>
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
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->sobrenome }}</td>
                <td>{{ $cliente->email }}</td>
                <td>
                    <form action="{{ route('clientes.destroy', $cliente->cpf) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('clientes.show', $cliente->cpf) }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('clientes.edit', $cliente->cpf) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</x-layout>