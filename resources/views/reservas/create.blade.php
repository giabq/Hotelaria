<x-layout>
    <h2>Criar Nova Reserva</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Verifique os erros abaixo:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf

        <!-- Cliente -->
        <div class="form-group">
            <label for="fk_cpf_cliente">Cliente</label>
            <select name="fk_cpf_cliente" class="form-control" required>
                <option value="">Selecione um Cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->cpf }}" {{ old('fk_cpf_cliente') == $cliente->cpf ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Hotel -->
        <div class="form-group">
            <label for="fk_id_hotel">Hotel</label>
            <select name="fk_id_hotel" class="form-control" required>
                <option value="">Selecione um Hotel</option>
                @foreach ($unidadesDeHotel as $hotel)
                    <option value="{{ $hotel->id_hotel }}" {{ old('fk_id_hotel') == $hotel->id_hotel ? 'selected' : '' }}>
                        {{ $hotel->nome_fantasia_hot }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Acomodação -->
        <div class="form-group">
            <label for="fk_registro_acomodacao">Acomodação</label>
            <select name="fk_registro_acomodacao" class="form-control" required>
                <option value="">Selecione uma Acomodação</option>
                @foreach ($acomodacoes as $acomodacao)
                    <option value="{{ $acomodacao->registro_acomodacao }}" {{ old('fk_registro_acomodacao') == $acomodacao->registro_acomodacao ? 'selected' : '' }}>
                        {{ $acomodacao->tipo_acomodacao }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status_res">Status da Reserva</label>
            <select name="status_res" class="form-control" required>
                <option value="1" {{ old('status_res') == '1' ? 'selected' : '' }}>Ativa</option>
                <option value="0" {{ old('status_res') == '0' ? 'selected' : '' }}>Inativa</option>
            </select>
        </div>

        <!-- Preço da Reserva -->
        <div class="form-group">
            <label for="preco_reserva">Preço da Reserva</label>
            <input type="number" step="0.01" name="preco_reserva" value="{{ old('preco_reserva') }}" class="form-control" required>
        </div>

        <!-- Custos Adicionais -->
        <div class="form-group">
            <label for="custos_adicionais_reserva">Custos Adicionais (Opcional)</label>
            <input type="number" step="0.01" name="custos_adicionais_reserva" value="{{ old('custos_adicionais_reserva') }}" class="form-control">
        </div>

        <!-- Preço Total -->
        <div class="form-group">
            <label for="preco_total_reserva">Preço Total</label>
            <input type="number" step="0.01" name="preco_total_reserva" value="{{ old('preco_total_reserva') }}" class="form-control" required>
        </div>

        <!-- Data e Hora do Check-in -->
        <div class="form-group">
            <label for="data_e_hora_checkin">Data e Hora de Check-in</label>
            <input type="datetime-local" name="data_e_hora_checkin" value="{{ old('data_e_hora_checkin') }}" class="form-control" required>
        </div>

        <!-- Data e Hora do Check-out -->
        <div class="form-group">
            <label for="data_e_hora_checkout">Data e Hora de Check-out</label>
            <input type="datetime-local" name="data_e_hora_checkout" value="{{ old('data_e_hora_checkout') }}" class="form-control" required>
        </div>

        <!-- Número de Pessoas -->
        <div class="form-group">
            <label for="no_pessoas">Número de Pessoas</label>
            <input type="number" name="no_pessoas" value="{{ old('no_pessoas', 1) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Reserva</button>
    </form>

    <a href="{{ route('reservas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</x-layout>
