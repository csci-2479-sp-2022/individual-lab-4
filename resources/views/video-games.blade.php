<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <p>
        @if (auth()->user()->isAdmin())
            <a href="{{route('gameform')}}">Create new game</a>
        @endif
    </p>
    <table style=" margin: 15% auto 0 auto; padding: 10px;   border: 2px solid black;">
        <tr>
            <th>Title</th>
            <th>System</th>
            <th>Release year</th>
            <th>Completed</th>
            <th>Categories</th>
            <th>Boxart</th>
        </tr>
        @foreach($games as $game)
        <tr>
            <td>{{$game->title}}</td>
            <td>{{$game->system->name}}</td>
            <td>{{$game->release_year}}</td>
            <td>{{$game->completed_yes_no}}</td>
            <td>{{$game->categoryList()}}</td>
            <td>
                @if($game->boxart !== null)
                    <img src="{{$game->boxart_url}}" alt="{{$game->title}}" height="100">
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>
