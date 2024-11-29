<x-layout>
    <h2>Detalhes do Benefício</h2>

    <a href="{{ route('beneficios.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tipo de Benefício: {{ $beneficio->tipo_ben }}</h5>
            <p><strong>Empresa Beneficiária:</strong> {{ $beneficio->empresa_beneficiaria }}</p>
            <p><strong>Valor:</strong> R$ {{ number_format($beneficio->valor_ben, 2, ',', '.') }}</p>
        </div>
    </div>
</x-layout>
