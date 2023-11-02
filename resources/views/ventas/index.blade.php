<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>

</head>
<body>
    <a href="{{ route('ventas.create') }}">Create a new sale</a>
    <a href="{{ route('ventas.show', ['venta' => 'see']) }}">View sales record.</a>
    <h1>welcome to my store with Laravel</h1>
</body>
</html>