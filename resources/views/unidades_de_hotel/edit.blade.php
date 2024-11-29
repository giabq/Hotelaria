<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar Unidade de Hotel</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('unidades_de_hotel.index') }}"> Voltar</a>
                </div>
            </div>
        </div>

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

        <form action="{{ route('unidades_de_hotel.update', $unidadeDeHotel->id_hotel) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Registro Imobiliário:</strong>
                        <input type="text" name="registro_imobiliario"
                            value="{{ $unidadeDeHotel->registro_imobiliario }}" class="form-control"
                            placeholder="Registro Imobiliário">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Caixa Entrada:</strong>
                        <input type="text" name="caixa_entrada" value="{{ $unidadeDeHotel->caixa_entrada }}"
                            class="form-control" placeholder="Caixa Entrada">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Caixa Saída:</strong>
                        <input type="text" name="caixa_saida" value="{{ $unidadeDeHotel->caixa_saida }}"
                            class="form-control" placeholder="Caixa Saída">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Número de Vagas:</strong>
                        <input type="text" name="num_vagas" value="{{ $unidadeDeHotel->num_vagas }}"
                            class="form-control" placeholder="Número de Vagas">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Local:</strong>
                        <input type="text" name="local_hot" value="{{ $unidadeDeHotel->local_hot }}"
                            class="form-control" placeholder="Local">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Categoria:</strong>
                        <input type="text" name="categoria_hot" value="{{ $unidadeDeHotel->categoria_hot }}"
                            class="form-control" placeholder="Categoria">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome Fantasia:</strong>
                        <input type="text" name="nome_fantasia_hot" value="{{ $unidadeDeHotel->nome_fantasia_hot }}"
                            class="form-control" placeholder="Nome Fantasia">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tamanho:</strong>
                        <input type="text" name="tamanho_hot" value="{{ $unidadeDeHotel->tamanho_hot }}"
                            class="form-control" placeholder="Tamanho">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>