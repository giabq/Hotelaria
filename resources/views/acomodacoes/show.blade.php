<x-layout>
    <h2>Detalhes da Acomodação</h2>

    <div class="card">
        <div class="card-header">
            <h4>Acomodação ID: {{ $acomodacao->registro_acomodacao }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Tipo:</strong> {{ $acomodacao->tipo_acomodacao }}</p>
            <p><strong>Política de Uso:</strong> {{ $acomodacao->politica_de_uso }}</p>
            <p><strong>Capacidade Máxima:</strong> {{ $acomodacao->capacidade_maxima_acomodacao }}</p>
            <p><strong>Status:</strong> {{ $acomodacao->status_acomodacao }}</p>
            <p><strong>Ponto Atribuído:</strong> {{ $acomodacao->ponto_atribuido ?? 'Não atribuído' }}</p>
            <p><strong>Hotel Associado:</strong> {{ $acomodacao->unidadeDeHotel->nome_fantasia_hot ?? 'Não associado' }}</p>
        </div>
    </div>

    <a href="{{ route('acomodacoes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</x-layout>
