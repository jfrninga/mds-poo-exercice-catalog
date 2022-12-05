<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


</head>

<body>
    <div class="container">
        <h1>{{ config('app.name') }}</h1>
        <div class="nav">
            <button>
                <a href="/">Accueil</a>
            </button>
        </div>

        <div class="wrapper">

            <!-- movie  -->
            @isset($movies)
            @foreach ($movies as $movie)
            <div class="wrap">
                <h1>{{ $movie->originalTitle }}</h1>
                <div>
                    <a href="/movie/{{ $movie->id }}">
                        <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                    </a>
                </div>
                <div class="space-between">
                    <h4>Année de sortie : {{ $movie->startYear }}</h4>
                    <h4>Note : {{ $movie->averageRating }}</h4>
                    <h4>Durée : {{ $movie->runtimeMinutes }}min</h4>
                </div>
                <h2>Résumé :</h2>
                <p>{{ $movie->plot }}</p>
            </div>
            @endforeach
            @endisset

            <!-- serie  -->
            @isset($series)
            @foreach ($series as $serie)
            <div class="wrap">
                <h1>{{ $serie->originalTitle }}</h1>
                <div>
                    <a href="/series/{{ $serie->id }}">
                        <img src="{{ $serie->poster }}" alt="{{ $serie->primaryTitle }}">
                    </a>
                </div>
                <div class="space-between">
                    <h4>Année de sortie : {{ $serie->startYear }}</h4>
                    <h4>Note : {{ $serie->averageRating }}</h4>
                    <h4>Durée : {{ $serie->runtimeMinutes }}min</h4>
                </div>
                <h2>Résumé :</h2>
                <p>{{ $serie->plot }}</p>
            </div>
            @endforeach
            @endisset

            <!-- episode  -->
            @isset($episodes)
            @foreach ($episodes as $episode)
            <div class="wrap">
                <h1>{{ $episode->originalTitle }}</h1>
                <div>
                    <a href="/series/{{ $episode->series_id }}/season/{{ $episode->seasonNumber }}/episode/{{ $episode->episodeNumber }}">
                        <img src="{{ $episode->poster }}" alt="{{ $episode->primaryTitle }}">
                    </a>
                </div>
                <div class="space-between">
                    <h4>Année de sortie : {{ $episode->startYear }}</h4>
                    <h4>Note : {{ $episode->averageRating }}</h4>
                    <h4>Durée : {{ $episode->runtimeMinutes }}min</h4>
                </div>
                <h2>Résumé :</h2>
                <p>{{ $episode->plot }}</p>
            </div>
            @endforeach
            @endisset
        </div>

    </div>
    <!-- Styles -->
    <style>
        
        .wrapper {
            display: flex;
            column-gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 300px;
        }

        .space-between {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        p {
            overflow: hidden;
            position: relative;
            text-overflow: ellipsis;
            display: inline-block;
            max-width: 300px;
            max-height: 200px;
            text-overflow: clip;
        }

        .buttons {
            margin-top: 1rem;
            display: inline;
            margin: 0 auto;
        }

        button {
            margin: 2px;
        }

        .nav {
            display: flex;
            gap: 10px;
        }
    </style>
</body>

</html>