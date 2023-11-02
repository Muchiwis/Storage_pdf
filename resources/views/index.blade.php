<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
    <a href="{{ route('create')}}">Create new elements</a>
    <ul>
        @forelse ($infos as $info)
            <li><img src="{{ asset('storage/images/'.$info->file_uri) }}" width="200px" /> <a href="{{route('donwload', ['id' => $info->id])}}">download</a></li>
        @empty
            <li>No data</li>
        @endforelse
    </ul>
</body>
</html>