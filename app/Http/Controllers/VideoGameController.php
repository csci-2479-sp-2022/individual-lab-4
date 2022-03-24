<?php

namespace App\Http\Controllers;

use App\Models\VideoGame;
use Illuminate\Http\Request;

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
