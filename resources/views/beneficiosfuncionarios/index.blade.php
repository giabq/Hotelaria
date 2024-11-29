<x-layout>
    <h2>Lista de Benefícios por Funcionário</h2>

    <a href="{{ route('beneficios-funcionarios.create') }}" class="btn btn-success mb-3">Adicionar Benefício para Funcionário</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Funcionário</th>
                <th>Benefício</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficiosFuncionarios as $relacao)
            <tr>
                <td>{{ $relacao->funcionario->nome }} {{ $relacao->funcionario->sobrenome }}</td>
                <td>{{ $relacao->beneficio->tipo_ben }}</td>
                <td>{{ $relacao->fk_valor_bens }}</td>
                <td>
                    <form action="{{ route('beneficios-funcionarios.destroy', $relacao->id) }}" method="POST" style="display: inline-block;">
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
