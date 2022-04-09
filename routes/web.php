<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoGameController;
use App\Models\VideoGame;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return phpinfo();
});

Route::get('/video-games', [VideoGameController::class, 'show'])
    ->name('gamelist');
Route::get('/video-game', [VideoGameController::class, 'index']);
Route::post('/video-game', [VideoGameController::class, 'create'])
    ->name('gameform');
