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

    public function list(Request $request)
    {
        $order_by = $request->query('order_by');
        $order = $request->query('order');

        if ($order_by && $order){
            $movies = Movie::orderBy($order_by, $order)->paginate(20);
        } else {
            $movies = Movie::paginate(20);
        }

        Paginator::useBootstrap();

        return view('movies', ['movies' => $movies, 'request' => $request]);
    }

  

}
