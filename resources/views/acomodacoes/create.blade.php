<x-layout>
    <h2>Nova Acomodação</h2>
    <form action="{{ route('acomodacoes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipo_acomodacao">Tipo</label>
            <input type="text" name="tipo_acomodacao" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="politica_de_uso">Política de Uso</label>
            <textarea name="politica_de_uso" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="capacidade_maxima_acomodacao">Capacidade Máxima</label>
            <input type="number" name="capacidade_maxima_acomodacao" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status_acomodacao">Status</label>
            <input type="text" name="status_acomodacao" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fk_id_hotel">Hotel</label>
            <select name="fk_id_hotel" class="form-control" required>
                <option value="">Selecione</option>
                @foreach ($unidadesDeHotel as $hotel)
                    <option value="{{ $hotel->id_hotel }}">{{ $hotel->nome_fantasia_hot }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>
