<x-layout>
    <h2>Detalhes do Benefício por Funcionário</h2>

    <a href="{{ route('beneficios-funcionarios.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <div class="card">
        <div class="card-body">
            <p><strong>Funcionário:</strong> {{ $beneficioFuncionario->funcionario->nome }} {{ $beneficioFuncionario->funcionario->sobrenome }}</p>
            <p><strong>Tipo de Benefício:</strong> {{ $beneficioFuncionario->beneficio->tipo_ben }}</p>
            <p><strong>Valor do Benefício:</strong> R$ {{ number_format($beneficioFuncionario->fk_valor_bens, 2, ',', '.') }}</p>
        </div>
    </div>
</x-layout>
