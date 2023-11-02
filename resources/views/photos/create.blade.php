<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('photos.index') }}">Back</a>
    <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Introduce la imagen</label>
        <input type="file" name="photo">
        <button type="submit">Subir foto</button>
    </form>
    @error('photo')
        <p>{{ $message }}</p>
    @enderror
</body>
</html>
