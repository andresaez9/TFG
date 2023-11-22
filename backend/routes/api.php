<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TorrentController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/films', [FilmController::class, 'showAll']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/films/random', [FilmController::class, 'showRandom']);
    Route::get('/films/category/{id}', [FilmController::class, 'getByIdCategory']);
    Route::get('/films/search/{title}', [FilmController::class, 'search']);
    Route::get('/film/{id}', [FilmController::class, 'showOne']);
    Route::get('/category/{id}', [CategoryController::class, 'findNameById']);
    Route::get('/torrent/{id}', [TorrentController::class, 'findMagnetLinkById']);
    Route::get('/film/torrent/{id}', [TorrentController::class, 'getMagnetLinkById']);
    
    Route::middleware(['admin'])->group(function () {
        Route::get('/categories', [CategoryController::class, 'showAll']);
        Route::get('/torrents', [TorrentController::class, 'showAll']);
        Route::post('/film/create', [FilmController::class, 'create']);
        Route::put('/film/update/{id}', [FilmController::class, 'update']);
        Route::delete('/film/delete/{id}', [FilmController::class, 'delete']);
    });
//});