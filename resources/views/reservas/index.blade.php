<x-layout>
    <h2>Reservas</h2>
    <a href="{{ route('reservas.create') }}" class="btn btn-success mb-3">Nova Reserva</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Hotel</th>
                <th>Acomodação</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Pessoas</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->registro_reserva }}</td>
                    <td>{{ $reserva->cliente->nome ?? 'Não informado' }}</td>
                    <td>{{ $reserva->unidadeDeHotel->nome_fantasia_hot ?? 'Não informado' }}</td>
                    <td>{{ $reserva->acomodacao->tipo_acomodacao ?? 'Não informado' }}</td>
                    <td>{{ $reserva->data_e_hora_checkin }}</td>
                    <td>{{ $reserva->data_e_hora_checkout }}</td>
                    <td>{{ $reserva->no_pessoas }}</td>
                    <td>{{ $reserva->status_res ? 'Ativa' : 'Inativa' }}</td>
                    <td>
                        <a href="{{ route('reservas.show', $reserva->registro_reserva) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('reservas.edit', $reserva->registro_reserva) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva->registro_reserva) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
