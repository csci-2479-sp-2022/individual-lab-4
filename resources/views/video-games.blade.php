<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lab4</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Title</th>
                <th>System</th>
                <th>Release year</th>
                <th>Completed</th>
                <th>Categories</th>
            </tr> 
            @foreach($games as $game)
            <tr>
                <td>{{$game->title}}</td>
                <td>{{$game->system->name}}</td>
                <td>{{$game->release_year}}</td>
                <td>{{$game->completed_yes_no}}</td>
                <td>{{$game->categoryList()}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
