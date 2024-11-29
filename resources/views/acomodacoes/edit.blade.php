<x-layout>
    <h2>Editar Acomodação</h2>

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

    <form action="{{ route('acomodacoes.update', $acomodacao->registro_acomodacao) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tipo_acomodacao">Tipo</label>
            <input type="text" name="tipo_acomodacao" value="{{ $acomodacao->tipo_acomodacao }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="politica_de_uso">Política de Uso</label>
            <textarea name="politica_de_uso" class="form-control" required>{{ $acomodacao->politica_de_uso }}</textarea>
        </div>

        <div class="form-group">
            <label for="capacidade_maxima_acomodacao">Capacidade Máxima</label>
            <input type="number" name="capacidade_maxima_acomodacao" value="{{ $acomodacao->capacidade_maxima_acomodacao }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status_acomodacao">Status</label>
            <input type="text" name="status_acomodacao" value="{{ $acomodacao->status_acomodacao }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ponto_atribuido">Ponto Atribuído</label>
            <input type="number" name="ponto_atribuido" value="{{ $acomodacao->ponto_atribuido }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="fk_id_hotel">Hotel</label>
            <select name="fk_id_hotel" class="form-control" required>
                <option value="">Selecione</option>
                @foreach ($unidadesDeHotel as $hotel)
                    <option value="{{ $hotel->id_hotel }}" 
                        {{ $acomodacao->fk_id_hotel == $hotel->id_hotel ? 'selected' : '' }}>
                        {{ $hotel->nome_fantasia_hot }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</x-layout>
