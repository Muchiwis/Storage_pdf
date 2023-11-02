<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create pdf</title>
</head>
<style>
    body {
        width: 210mm;
        height: 297mm;
    }
    h1{
        color: darkblue;
        margin: 5px;
    }
</style>
<body>
    <h1>VENTA REGISTRADA {{ now() }}</h1>
    <h1>Codigo Product {{ $ventas->codigo }}</h1>
    <h2>Producto registrado: {{ $ventas->producto }}</h2>
    <hr>
    <h2>Precio: $/ {{ $ventas->precio }}</h2>
    <h2>Cantidad: $/ {{ $ventas->cantidad }}</h2>
    <h2>Total: $/ {{ $ventas->total }}</h2>
    <hr>
    <h2>Gracias por su preferencia!</h2>
</body>
</html>