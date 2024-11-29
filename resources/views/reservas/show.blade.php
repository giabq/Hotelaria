<x-layout>
    <h2>Detalhes da Reserva</h2>

    <div class="card">

        <div class="card-body">
            <p><strong>Registro da Reserva:</strong> {{ $reserva->registro_reserva }}</p>
            <p><strong>Cliente:</strong> {{ $reserva->cliente->nome ?? 'Não informado' }}</p>
            <p><strong>Hotel:</strong> {{ $reserva->unidadeDeHotel->nome_fantasia_hot ?? 'Não informado' }}</p>
            <p><strong>Acomodação:</strong> {{ $reserva->acomodacao->tipo_acomodacao ?? 'Não informado' }}</p>
            <p><strong>Status:</strong> {{ $reserva->status_res ? 'Ativa' : 'Inativa' }}</p>
            <p><strong>Preço da Reserva:</strong> R$ {{ number_format($reserva->preco_reserva, 2, ',', '.') }}</p>
            <p><strong>Custos Adicionais:</strong> R$ {{ number_format($reserva->custos_adicionais_reserva, 2, ',', '.') ?? '0,00' }}</p>
            <p><strong>Preço Total:</strong> R$ {{ number_format($reserva->preco_total_reserva, 2, ',', '.') }}</p>
            <p><strong>Check-in:</strong> {{ $reserva->data_e_hora_checkin }}</p>
            <p><strong>Check-out:</strong> {{ $reserva->data_e_hora_checkout }}</p>
            <p><strong>Número de Pessoas:</strong> {{ $reserva->no_pessoas }}</p>
        </div>
    </div>

    <a href="{{ route('reservas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</x-layout>
