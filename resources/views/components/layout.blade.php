<!-- resources/views/components/layout.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <!-- Botão para Voltar para Home -->
        <div class="mb-3">
            <a href="{{ url('/') }}" class="btn btn-secondary">Voltar para Home</a>
        </div>
        <!-- O conteúdo da view será injetado aqui no slot -->
        {{ $slot }}
    </div>
</body>
</html>
