<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{$movie->primaryTitle}}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



</head>

<body>
    <div class="container">
        
        <h1>{{$movie->primaryTitle}}</h1>
        <div>
            <img src="{{$movie->poster}}" alt="{{$movie->primaryTitle}}">
        </div>

        <a href="http://www.imdb.com/title/{{$movie->tconst}}">View on IMDB</a>

        <h2>{{$movie->originalTitle}}</h2>

        <p><strong>Date de sortie : </strong>{{$movie->startYear}}</p>

        <p><strong>Durée du film : </strong>{{$movie->runtimeMinutes}} minutes.</p>

        <p><strong>Résumé : </strong>{{$movie->plot}}</p>

        <p><strong>Note : </strong>{{$movie->averageRating}} / 10</p>

        <p><strong>Nombres de votes : </strong>{{$movie->numVotes}} votes</p>

        <a href="http://127.0.0.1:8000/">Retour sur la liste de films</a>

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