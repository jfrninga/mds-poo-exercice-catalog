<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        .container {
            margin: auto;
            max-width: 900px;
        }

        .menu {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 35px;
            margin-bottom: 35px;
        }

        .wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
        }
    </style>
</head>

<body>
    <!-- display the random page on the front page -->
    <!-- <iframe src="/movie/random"></iframe> -->
    <div class="container">
        <h1>{{ config('app.name') }}</h1>
        <form method="GET" action="/search">
            <label for="#">Rechercher un film, une série, ou un épisode : </label>
            <input type="text" name="q" />
        </form>
        <div class="menu">
            <h3><a href="{{route('list.movies')}}">Top 20 films</a></h3>
            <h3><a href="{{route('random.movie')}}">Random Film</a></h3>
            <h3><a href="{{route('list.genres')}}">Genre des Films</a></h3>
            <h3><a href="{{route('list.series')}}">Series</a></h3>
            <h3><a href="{{route('random.serie')}}">Random Serie</a></h3>
        </div>

        <div class="wrapper">
            @foreach ($movies as $movie)
            <div>

                <a href="/movies/{{ $movie->id }}" style="margin: 5px;">
                    <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>