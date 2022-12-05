<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="./../css/app.css" rel="stylesheet" />

</head>

<body>
    <div class="container">
        <h1>{{ config('app.name') }}</h1>
        <div class="nav">
            <button>
                <a href="/series">List of series</a>
            </button>
            <button>
                <a href="/series?order_by=startYear&order=desc">Latest Serie</a>
            </button>
            <button>
                <a href="/series?order_by=startYear&order=asc">Older series</a>
            </button>
        </div>

        <div class="wrapper">
            <h1>{{ $episode->originalTitle }}</h1>
            <div>
                <a href="/series/{{ $episode->series_id }}/season/{{ $episode->seasonNumber }}/episode/{{ $episode->episodeNumber }}">
                    <img src="{{ $episode->poster }}" alt="{{ $episode->primaryTitle }}">
                </a>
            </div>
            <div class="space-between">
                <h4>Année de sortie : {{ $episode->startYear }}</h4>
                <h4>Durée : {{ $episode->runtimeMinutes }}min</h4>
            </div>
            <h2>Résumé :</h2>
            <p>{{ $episode->plot }}</p>
        </div>
    </div>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .wrapper {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .space-between {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .nav {
            display: flex;
            gap: 10px;
        }
    </style>
</body>

</html>