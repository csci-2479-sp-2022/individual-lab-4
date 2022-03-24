<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoGame;

class VideoGameController extends Controller
{
    public function show()
    {
        return view('video-games', [
            'games' => self::getGames(),
        ]);
    }
   
    private static function getGames()
    {
        return VideoGame::with(['system', 'categories'])->get();

    }
}
