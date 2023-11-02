<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secction photos</title>
</head>
<style>
    .content {
        display: flex;
        flex-wrap: wrap; /* Permitir que los elementos se envuelvan en filas */
        justify-content: center;
        align-items: center;
    }

    .img_resize {
        width: 350px;
        height: 300px;
        margin: 10px; /* Añade un pequeño espacio entre las imágenes */
    }

    .img_one {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        width: 50%; /* Cada .img_one ocupa el 50% del ancho */
        box-sizing: border-box; /* Asegura que el padding no incremente el ancho total */
        padding: 10px; /* Añade un pequeño espacio entre las imágenes */
    }
</style>
<body>
    <a href="{{ route('photos.create') }}">Create new</a>
    <h1>Best artist :3</h1>
    <div class="content">
        @foreach ($photos as $photo)
            <div class="img_one">
                <img class="img_resize" src="{{ asset('storage/Photo_images/'.$photo->photo_uri ) }}" >
            </div>
        @endforeach
    </div>
</body>
</html>