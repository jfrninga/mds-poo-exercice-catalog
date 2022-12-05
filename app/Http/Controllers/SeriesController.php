<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function show(Series $serie, $id)
    {
        // $serie = Series::find($id);

        // return view('serie', ['serie' => $serie]);

        $serie = Series::where('id', $id)->first();

        $episodes = Series::find($serie->id)->episodes()->orderBy('episodeNumber', 'ASC')->get();
        $seasonNumber = Series::find($serie->id)->episodes()->max('seasonNumber');

        return view('serie', ['serie' => $serie, 'episodes' => $episodes, 'seasonNumber' => $seasonNumber]);
    }


    public function season($id, $seasonNumber)
    {
        $episodes = Episode::where('series_id', $id)->where('seasonNumber', $seasonNumber)->simplePaginate(20);
        return view('episodes', ['episodes' => $episodes]);
    }

    public function episode($id, $seasonNumber, $episodeNumber)
    {
        $serie = Series::where('id', $id)->first();
        $serieId = $serie->id;
        $episode = Episode::where('series_id', $serieId)->where('seasonNumber', $seasonNumber)->where('episodeNumber', $episodeNumber)->first();

        return view('episode', ['episode' => $episode]);
    }

    public function list(Request $request)
    {
        $order_by = $request->query('order_by');
        $order = $request->query('order');

        $query = Series::query();
        if (request('order_by') && request('order')) {
            $series = $query->orderBy($order_by, $order);
        }

        if (request('genre') || request('order_by')) {
            $series = $series->simplePaginate(20);
        } else {
            $series = $query->simplePaginate(20);
        }
        return view('series', ['series' => $series]);
    }


    public function random()
    {
        $series = Series::inRandomOrder()->first();

        return view('series', ['series' => $series]);
    }
}
