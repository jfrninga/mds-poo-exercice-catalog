<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('q');

        $movies = Movie::query()->where('originalTitle', 'LIKE', "%{$search}%")->get();

        $series = Series::query()->where('originalTitle', 'LIKE', "%{$search}%")->get();

        $episodes = Episode::query()->where('originalTitle', 'LIKE', "%{$search}%")->get();

        return view('search', ['movies' => $movies, 'series' => $series, 'episodes' => $episodes]);

    }
}
