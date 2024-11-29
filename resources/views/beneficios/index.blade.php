<x-layout>
    <h2>Lista de Benefícios</h2>

    <a href="{{ route('beneficios.create') }}" class="btn btn-success mb-3">Adicionar Benefício</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Empresa Beneficiária</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficios as $beneficio)
            <tr>
                <td>{{ $beneficio->empresa_beneficiaria }}</td>
                <td>{{ $beneficio->tipo_ben }}</td>
                <td>{{ $beneficio->valor_ben }}</td>
                <td>
                    <a href="{{ route('beneficios.show', $beneficio->id) }}" class="btn btn-info">Mostrar</a>
                    <a href="{{ route('beneficios.edit', $beneficio->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('beneficios.destroy', $beneficio->id) }}" method="POST" style="display: inline-block;">
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
