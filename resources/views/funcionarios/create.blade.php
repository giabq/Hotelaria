<x-layout>
    <h2>Cadastrar Funcionário</h2>

    <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary mb-3">Voltar</a>

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

    <form action="{{ route('funcionarios.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cpf_func">CPF</label>
            <input type="text" name="cpf_func" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="funcao_func">Função</label>
            <input type="text" name="funcao_func" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tipo_contrato">Tipo de Contrato</label>
            <input type="text" name="tipo_contrato" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="salario">Salário</label>
            <input type="number" name="salario" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="carga_horaria">Carga Horária</label>
            <input type="time" name="carga_horaria" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>
