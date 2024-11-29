<x-layout>
    <h2>Editar Reserva</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Algo deu errado.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservas.update', $reserva->registro_reserva) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="fk_cpf_cliente">Cliente</label>
            <select name="fk_cpf_cliente" class="form-control" required>
                <option value="">Selecione</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->cpf }}" 
                        {{ $cliente->cpf == $reserva->fk_cpf_cliente ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fk_id_hotel">Hotel</label>
            <select name="fk_id_hotel" class="form-control" required>
                <option value="">Selecione</option>
                @foreach ($unidadesDeHotel as $hotel)
                    <option value="{{ $hotel->id_hotel }}" 
                        {{ $hotel->id_hotel == $reserva->fk_id_hotel ? 'selected' : '' }}>
                        {{ $hotel->nome_fantasia_hot }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fk_registro_acomodacao">Acomodação</label>
            <select name="fk_registro_acomodacao" class="form-control" required>
                <option value="">Selecione</option>
                @foreach ($acomodacoes as $acomodacao)
                    <option value="{{ $acomodacao->registro_acomodacao }}" 
                        {{ $acomodacao->registro_acomodacao == $reserva->fk_registro_acomodacao ? 'selected' : '' }}>
                        {{ $acomodacao->tipo_acomodacao }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status_res">Status</label>
            <select name="status_res" class="form-control" required>
                <option value="1" {{ $reserva->status_res ? 'selected' : '' }}>Ativa</option>
                <option value="0" {{ !$reserva->status_res ? 'selected' : '' }}>Inativa</option>
            </select>
        </div>

        <div class="form-group">
            <label for="preco_reserva">Preço da Reserva</label>
            <input type="text" name="preco_reserva" value="{{ $reserva->preco_reserva }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="custos_adicionais_reserva">Custos Adicionais</label>
            <input type="text" name="custos_adicionais_reserva" value="{{ $reserva->custos_adicionais_reserva }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="preco_total_reserva">Preço Total</label>
            <input type="text" name="preco_total_reserva" value="{{ $reserva->preco_total_reserva }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data_e_hora_checkin">Check-in</label>
            <input type="datetime-local" name="data_e_hora_checkin" value="{{ \Carbon\Carbon::parse($reserva->data_e_hora_checkin)->format('Y-m-d\TH:i') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data_e_hora_checkout">Check-out</label>
            <input type="datetime-local" name="data_e_hora_checkout" value="{{ \Carbon\Carbon::parse($reserva->data_e_hora_checkout)->format('Y-m-d\TH:i') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="no_pessoas">Número de Pessoas</label>
            <input type="number" name="no_pessoas" value="{{ $reserva->no_pessoas }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</x-layout>
