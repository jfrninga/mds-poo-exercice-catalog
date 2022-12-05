<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SeriesController;
use App\Models\Movie;
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
    $movies = Movie::inRandomOrder()->whereNotNull('poster')->limit(12)->get();

    return view('home', ['movies' => $movies]);
});

Route::get('/search', [SearchController::class, 'search']);

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('show.movie');
Route::get('/movies', [MovieController::class, 'list'])->name('list.movies');
Route::get('/movie/random', [MovieController::class, 'random'])->name('random.movie');

Route::get('/genres', [GenreController::class, 'list'])->name('list.genres');

Route::get('/series/{id}', [SeriesController::class, 'show'])->name('show.serie');
Route::get('/series', [SeriesController::class, 'list'])->name('list.series');
Route::get('/series/random', [SeriesController::class, 'random'])->name('random.serie');

Route::get('/series/{id}/season/{season_num}', [SeriesController::class, 'season'])->name('season.serie');
Route::get('/series/{id}/season/{season_num}/episode/{episode_num}', [SeriesController::class, 'episode'])->name('episode.serie');