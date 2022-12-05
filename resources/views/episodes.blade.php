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
       
            <h2>Liste des épisodes</h2>
        
        <div>
            <button>
                <a href="/series?order_by=startYear&order=desc">Latest Serie</a>
            </button>
            <button>
                <a href="/series?order_by=startYear&order=asc">Older series</a>
            </button>
            <button>
                <a href="/series?order_by=averageRating&order=desc">Best Series</a>
            </button>
        </div>

        <div class="wrapper">
            @foreach ($episodes as $episode)
            <div class="wrap">
                <h1>{{ $episode->originalTitle }}</h1>
                <div>
                    <a href=href="/series/{{ $episode->series_id }}/season/{{ $episode->seasonNumber }}/episode/{{ $episode->episodeNumber }}">
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
        </div>
        <div class="pagination">
            {{ $episodes->appends(request()->query())->links() }}
        </div>

    </div>
    <!-- Styles -->
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

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

        .pagination {
            display: flex;
            list-style: none;
            justify-content: center;
            font-size: 20px;
            text-align: center;
        }

        .pagination li {
            margin: 5px;
        }

        button {
            margin: 2px;
        }
    </style>
</body>

</html>