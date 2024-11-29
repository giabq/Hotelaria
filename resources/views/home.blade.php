<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistema de Gestão Hoteleira</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Sistema de Gestão Hoteleira</h1>
        <p class="lead">Bem-vindo! Use os atalhos abaixo para gerenciar o sistema.</p>
        <div class="row mt-4">
            <div class="col-md-3">
                <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-lg btn-block">Clientes</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('reservas.index') }}" class="btn btn-success btn-lg btn-block">Reservas</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('unidades_de_hotel.index') }}" class="btn btn-warning btn-lg btn-block">Unidades de Hotel</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('acomodacoes.index') }}" class="btn btn-info btn-lg btn-block">Acomodações</a>
            </div>
        </div>
    </div>
</body>
</html>
