<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show(Movie $movie, $id)
    {
        $movie = Movie::find($id);

        // dd($movie);

        return view('movie', ['movie' => $movie]);
    }
}
