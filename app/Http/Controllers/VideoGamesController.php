<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoGames;

class VideoGamesController extends Controller
{
    public function show()
    {
        return view('video-games', [
            'games' => self::getGames(),
        ]);
    }

    private static function getGames()
    {
        return VideoGames::with(['system', 'categories'])->get();
    }
}
