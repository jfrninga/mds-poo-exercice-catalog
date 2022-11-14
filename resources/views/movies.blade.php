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

    <h2>Top 20 films</h2>
    <div class="container">
        <!-- affichage de 20 films -->
        @foreach ($movies as $movie)
        <div>
            <a href="/movies/{{ $movie->id }}" class="img-card">
                <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
            </a>
        </div>
        @endforeach
    </div>
    {{$movies->links()}}
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
    a.img-card{
        margin: 7px;
    }
    .pagination {
        display: flex;
        list-style: none;
        justify-content: center;
        font-size: 20px;
    }
    .pagination li {
        margin: 5px;
    }
</style>

</html>