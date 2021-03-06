<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\System;
use Illuminate\Http\Request;
use App\Models\VideoGame;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class VideoGameController extends Controller
{
    public function show()
    {
        $this->authorize('viewAny', VideoGame::class);

        return view('video-games', [
            'games' => self::getGames(),
        ]);
    }

    public function index(Request $request)
    {
        // if (Gate::denies('access-game-form', $request->user())) {
        //     return response()->redirectToRoute('gamelist');
        // }
        Gate::denyIf(!$request->user()->isAdmin());

        return view('game-form', [
            'systems' => self::getSystems(),
        ]);
    }

    public function create(GameRequest $request)
    {
        if ($request->user()->cannot('create', VideoGame::class)) {
            abort(403);
        }
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

        // clear cache
        Cache::forget('gamelist');
        Log::debug('gamelist cache cleared');
    }

    // should be in VideoGameService, cut corners for demo purposes
    private static function getGames()
    {
        $dayInSeconds = 86400; // == 24 hours
        Log::debug('trying to get gamelist from cache');

        // THE OLDSKOOL WAY OF CHECKING CACHE
        // $games = Cache::get('gamelist');

        // if ($games === null) {
        //     $games = VideoGame::with(['system', 'categories'])->get();
        //     Cache::put('gamelist', $games, $dayInSeconds);
        // }

        // return $games;

        return Cache::remember('gamelist', $dayInSeconds,
            function () {
                $games = VideoGame::with(['system', 'categories'])->get();
                Log::debug('gamelist not found in cache, querying db...');

                return $games;
            });
    }

    // should be in VideoGameService, cut corners for demo purposes
    private static function getSystems()
    {
        return Cache::rememberForever('systems', fn () => System::orderBy('name')->get());
    }

    private static function uploadFile(UploadedFile $file): string
    {
        return $file->store('public');
    }
}
