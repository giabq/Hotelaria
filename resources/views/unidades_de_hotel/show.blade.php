<x-layout>
    <h2>Detalhes da Unidade de Hotel</h2>
    <a class="btn btn-primary" href="{{ route('unidades_de_hotel.index') }}">Voltar</a>

    <div class="mt-3">
        <p><strong>ID:</strong> {{ $unidadeDeHotel->id_hotel }}</p>
        <p><strong>Registro Imobiliário:</strong> {{ $unidadeDeHotel->registro_imobiliario }}</p>
        <p><strong>Caixa Entrada:</strong> {{ $unidadeDeHotel->caixa_entrada }}</p>
        <p><strong>Caixa Saída:</strong> {{ $unidadeDeHotel->caixa_saida }}</p>
        <p><strong>Número de Vagas:</strong> {{ $unidadeDeHotel->num_vagas }}</p>
        <p><strong>Local:</strong> {{ $unidadeDeHotel->local_hot }}</p>
        <p><strong>Categoria:</strong> {{ $unidadeDeHotel->categoria_hot }}</p>
        <p><strong>Nome Fantasia:</strong> {{ $unidadeDeHotel->nome_fantasia_hot }}</p>
        <p><strong>Tamanho:</strong> {{ $unidadeDeHotel->tamanho_hot }}</p>
    </div>
</x-layout>
