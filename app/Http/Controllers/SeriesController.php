<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function show(Series $serie, $id)
    {
        $serie = Series::find($id);

        // dd($movie);
        return view('serie', ['serie' => $serie]);
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
        $serie = Series::inRandomOrder()->first();

        return view('serie', ['serie' => $serie]);
    }
}
