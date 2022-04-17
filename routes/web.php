<?php

use App\Http\Controllers\VideoGameController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/video-games', [VideoGameController::class, 'show'])
    // ->middleware(['auth'])
    ->name('gamelist');

Route::get('/video-game', [VideoGameController::class, 'index'])
    ->middleware(['auth']);

Route::post('/video-game', [VideoGameController::class, 'create'])
    ->middleware(['auth'])
    ->name('gameform');

require __DIR__.'/auth.php';
