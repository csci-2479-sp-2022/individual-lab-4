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