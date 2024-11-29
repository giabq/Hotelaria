<x-layout>
    <h2>Editar Benefício do Funcionário</h2>

    <a href="{{ route('beneficios-funcionarios.index') }}" class="btn btn-secondary mb-3">Voltar</a>

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

    <form action="{{ route('beneficios-funcionarios.update', [$beneficioFuncionario->fk_cpf_func, $beneficioFuncionario->fk_tipo_bens]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="fk_cpf_func">Funcionário</label>
            <select name="fk_cpf_func" class="form-control" required>
                @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->cpf_func }}" 
                        {{ $funcionario->cpf_func == $beneficioFuncionario->fk_cpf_func ? 'selected' : '' }}>
                        {{ $funcionario->nome }} {{ $funcionario->sobrenome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fk_tipo_bens">Tipo de Benefício</label>
            <select name="fk_tipo_bens" class="form-control" required>
                @foreach ($beneficios as $beneficio)
                    <option value="{{ $beneficio->tipo_ben }}" 
                        {{ $beneficio->tipo_ben == $beneficioFuncionario->fk_tipo_bens ? 'selected' : '' }}>
                        {{ $beneficio->tipo_ben }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fk_valor_bens">Valor do Benefício</label>
            <input type="number" step="0.01" name="fk_valor_bens" class="form-control" value="{{ $beneficioFuncionario->fk_valor_bens }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>
