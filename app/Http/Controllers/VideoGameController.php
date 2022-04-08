<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\System;
use Illuminate\Http\Request;
use App\Models\VideoGame;
use Illuminate\Http\UploadedFile;

class VideoGameController extends Controller
{
    public function show()
    {
        return view('video-games', [
            'games' => self::getGames(),
        ]);
    }

    public function index()
    {
        return view('game-form', [
            'systems' => self::getSystems(),
        ]);
    }

    public function create(GameRequest $request)
    {
        // should be $this->videoGameService->saveGame()
        self::saveGame($request);

        // redirect to game list page
        return response()->redirectToRoute('gamelist');
    }

    // should be in VideoGameService, cut corners for demo purposes
    private static function saveGame(GameRequest $request): void
    {
        // find the system parent record
        $system = System::find($request->getSystemId());

        // initialize a game object (not saved yet)
        $game = VideoGame::make([
            'title' => $request->getTitle(),
            'release_year' => $request->getReleaseYear(),
            'completed' => $request->getCompletedBoolean(),
        ]);

        // establish the parent-child relationship between system and game
        $game->system()->associate($system);

        // if there's an image, move it and set the path on the game record
        if ($request->hasBoxart()) {
            $game['boxart'] = self::uploadFile($request->getBoxart());
        }

        // save to database
        $game->save();
    }

    // should be in VideoGameService, cut corners for demo purposes
    private static function getGames()
    {
        return VideoGame::with(['system', 'categories'])->get();

    }

    // should be in VideoGameService, cut corners for demo purposes
    private static function getSystems()
    {
        return System::orderBy('name')->get();
    }

    private static function uploadFile(UploadedFile $file): string
    {
        return $file->store('public');
    }
}
