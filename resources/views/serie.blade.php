<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{$serie->primaryTitle}}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



</head>

<body>
    <a href="http://127.0.0.1:8000/">Retour sur la liste des films</a>
    <div class="container">

        <h1>{{$serie->primaryTitle}}</h1>
        <div>
            <img src="{{$serie->poster}}" alt="{{$serie->primaryTitle}}">
        </div>

        <a href="http://www.imdb.com/title/{{$serie->tconst}}">View on IMDB</a>

        <h2>{{$serie->originalTitle}}</h2>

        <p><strong>Date de sortie : </strong>{{$serie->startYear}}</p>

        <p><strong>Durée du film : </strong>{{$serie->runtimeMinutes}} minutes.</p>

        <p><strong>Résumé : </strong>{{$serie->plot}}</p>

        <p><strong>Note : </strong>{{$serie->averageRating}} / 10</p>

        <p><strong>Nombres de votes : </strong>{{$serie->numVotes}} votes</p>

    </div>
    <div class="series">
        @for ($i = 1; $i <= $seasonNumber; $i++) <a href="/series/{{ $serie->id }}/season/{{ $i }}">Saison {{ $i }}</a><br><br>

            @foreach($episodes as $episode)

            @if($episode->seasonNumber === $i)

            <a href="/series/{{ $serie->id }}/season/{{ $i }}/episode/{{ $episode->episodeNumber }}">Episode {{ $episode->episodeNumber }}</a><br>

            @endif

            @endforeach

         @endfor
    </div>
</body>

<!-- Styles -->

<style>
    .container {
        margin: auto;
        max-width: 900px;
    }
</style>

</html>