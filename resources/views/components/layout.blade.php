<!-- resources/views/components/layout.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <!-- O conteúdo da view será injetado aqui no slot -->
        {{ $slot }}
    </div>
</body>
</html>
