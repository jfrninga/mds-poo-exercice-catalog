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

    <a href="http://127.0.0.1:8000/">Retour sur la liste des films</a>

    <h2 style="text-align: center;">Series</h2>

    <h1>{{ config('app.name') }}</h1>
    <button>
        <a href="/series?order_by=startYear&order=desc">Série récentes</a>
    </button>
    <button>
        <a href="/series?order_by=startYear&order=asc">Série anciennes</a>
    </button>
    <button>
        <a href="/series?order_by=averageRating&order=desc">Meilleures Séries</a>
    </button>
    <button>
        <a href="{{route('random.serie')}}">Random Serie</a>
    </button>
    <div class="container">

        @foreach ($series as $serie)
        <div class="title-serie">
            <h1>{{ $serie->originalTitle }}</h1>
            <div>
                <a href="/series/{{ $serie->id }}">
                    <img src="{{ $serie->poster }}" alt="{{ $serie->primaryTitle }}">
                </a>
            </div>
            <div class="space-between">
                <h4>Année de sortie : {{ $serie->startYear }}</h4>
                <h4>Note : {{ $serie->averageRating }}</h4>
                <!-- <h4>Durée : {{ $serie->runtimeMinutes }}min</h4> -->
            </div>
            <!-- <h2>Résumé :</h2>
            <p>{{ $serie->plot }}</p> -->
        </div>
        @endforeach
    </div>

    <div class="pagination">
        {{ $series->appends(request()->query())->links() }}
    </div>

</body>

<!-- Styles -->

<style>
    .container {
        display: flex;
        margin: auto;
        justify-content: center;
        max-width: 1300px;
        flex-wrap: wrap;
    }

    .title-serie {
        padding: 10px;
        margin: auto;
    }

    a.img-card {
        margin: 7px;
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

    .filter {
        text-align: center;
    }

    button {
        margin-bottom: 15px;
    }
</style>

</html>