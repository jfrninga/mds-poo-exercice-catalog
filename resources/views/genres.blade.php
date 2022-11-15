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

    <h2 style="text-align: center;">Tous les genres</h2>

    <div class="container">
        <!-- affichage de 20 films -->
        @foreach ($genres as $genre)
        <div>
        <a href="/movies?genre={{ $genre->label }}"><h3>{{ $genre->label }}</h3></a>
        </div>
        @endforeach
    </div>

</body>

<!-- Styles -->

<style>
    .container {
        margin: auto;
        max-width: 1300px;
    }

</style>

</html>