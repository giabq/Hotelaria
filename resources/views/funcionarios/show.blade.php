<x-layout>
    <h2>Detalhes do Funcionário</h2>

    <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $funcionario->nome }} {{ $funcionario->sobrenome }}</h5>
            <p><strong>CPF:</strong> {{ $funcionario->cpf_func }}</p>
            <p><strong>Cargo:</strong> {{ $funcionario->funcao_func }}</p>
            <p><strong>Tipo de Contrato:</strong> {{ $funcionario->tipo_contrato }}</p>
            <p><strong>Salário:</strong> R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</p>
            <p><strong>Carga Horária:</strong> {{ $funcionario->carga_horaria }}</p>
        </div>
    </div>
</x-layout>
