<x-layout>
    <h2>Acomodações</h2>
    <a href="{{ route('acomodacoes.create') }}" class="btn btn-success mb-3">Nova Acomodação</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Capacidade</th>
                <th>Status</th>
                <th>Hotel</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($acomodacoes as $acomodacao)
                <tr>
                    <td>{{ $acomodacao->registro_acomodacao }}</td>
                    <td>{{ $acomodacao->tipo_acomodacao }}</td>
                    <td>{{ $acomodacao->capacidade_maxima_acomodacao }}</td>
                    <td>{{ $acomodacao->status_acomodacao }}</td>
                    <td>{{ $acomodacao->unidadeDeHotel->nome_fantasia_hot ?? 'Não associado' }}</td>
                    <td>
                        <a href="{{ route('acomodacoes.show', $acomodacao->registro_acomodacao) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('acomodacoes.edit', $acomodacao->registro_acomodacao) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('acomodacoes.destroy', $acomodacao->registro_acomodacao) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
