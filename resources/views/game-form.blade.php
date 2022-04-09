<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form > div {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Game form</h1>
    <p>
        <a href="{{route('gamelist')}}">Back to game list</a>
    </p>
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/video-game" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
            </div>
            <div>
                <label for="year">Release year</label>
                <input type="text" name="year" id="year">
            </div>
            <div>
                <label for="system">System</label>
                <select name="system" id="system">
                    <option value=""></option>
                    @foreach($systems as $system)
                        <option value="{{$system->id}}">{{$system->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="completed">
                    <input type="checkbox" name="completed" id="completed">
                    Completed
                </label>
            </div>
            <div>
                <label for="boxart">
                    <input type="file" name="boxart" id="boxart">
                </label>
            </div>
            <div>
                <button type="submit">Save game</button>
            </div>
        </form>
    </div>
</body>
</html>
