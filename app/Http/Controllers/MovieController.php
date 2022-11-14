<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class MovieController extends Controller
{
    public function show(Movie $movie, $id)
    {
        $movie = Movie::find($id);

        // dd($movie);
        return view('movie', ['movie' => $movie]);
    }

    public function list()
    {
        Paginator::useBootstrap();

        // $movies = Movie::all()->take(20);
        $movies = Movie::paginate(20);

        return view('movies', ['movies' => $movies]);
    }

}
