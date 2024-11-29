<x-layout>
    <h2>Lista de Funcionários</h2>

    <a href="{{ route('funcionarios.create') }}" class="btn btn-success mb-3">Adicionar Funcionário</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Cargo</th>
                <th>Salário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
            <tr>
                <td>{{ $funcionario->cpf_func }}</td>
                <td>{{ $funcionario->nome }}</td>
                <td>{{ $funcionario->sobrenome }}</td>
                <td>{{ $funcionario->funcao_func }}</td>
                <td>{{ $funcionario->salario }}</td>
                <td>
                    <a href="{{ route('funcionarios.show', $funcionario->cpf_func) }}" class="btn btn-info">Mostrar</a>
                    <a href="{{ route('funcionarios.edit', $funcionario->cpf_func) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('funcionarios.destroy', $funcionario->cpf_func) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
