<x-layout>
    <h2>Editar Benefício</h2>

    <a href="{{ route('beneficios.index') }}" class="btn btn-secondary mb-3">Voltar</a>

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

    <form action="{{ route('beneficios.update', $beneficio->tipo_ben) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tipo_ben">Tipo de Benefício</label>
            <input type="text" name="tipo_ben" class="form-control" value="{{ $beneficio->tipo_ben }}" required>
        </div>

        <div class="form-group">
            <label for="empresa_beneficiaria">Empresa Beneficiária</label>
            <input type="text" name="empresa_beneficiaria" class="form-control" value="{{ $beneficio->empresa_beneficiaria }}" required>
        </div>

        <div class="form-group">
            <label for="valor_ben">Valor</label>
            <input type="number" step="0.01" name="valor_ben" class="form-control" value="{{ $beneficio->valor_ben }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>
