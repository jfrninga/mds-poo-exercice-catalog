<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;
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
        $genre = $request->query('genre');

        $query = Movie::query();
        //filter startYear and averageRate
        if ($order_by && $order){
            $query->orderBy($order_by, $order);
        } 

        
        //filter genre
        if (request('genre')) {
            $genre = Genre::where('label', $genre)->first();
            $genre_id = $genre->id;
            $query->whereHas('genres', function (Builder $movieQuery) use ($genre_id) {
                $movieQuery->where('genre_id', $genre_id);
            });
        }

        Paginator::useBootstrap();
        $movies = $query->paginate(20); //requete
        return view('movies', ['movies' => $movies, 'request' => $request]);
    }

    public function random()
    {
        $movie = Movie::inRandomOrder()->first();

        return view('movie', ['movie' => $movie]);
    }

}
