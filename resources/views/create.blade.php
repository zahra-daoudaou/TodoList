<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter des taches</title>
</head>
<body>
<div>
        <ul>
            <li>
                <a href="{{route('taches.index')}}"> List des taches </a>
            </li>
        </ul>
    </div>

    <h3>Ajouter une tache</h3>

    <form method="post" action="{{route('taches.store')}}">
        @csrf
        @method('post')
        <label for="titre">Titre:</label>
        <input type="text" name="titre">
        <label for="description">Description:</label>
        <input type="text" name="description">

        <input type="radio" id="termine" name="etat" value="termine">
        <label for="Terminé">Terminé</label>
        <input type="radio" id="non termine" name="etat" value="non termine">
        <label for="Non terminé">Non terminé</label>

        <div>
            <input type="submit" value="Ajouter la tache">
        </div>

        <div>
            @if($errors->all())
            <ul>
                @foreach($errors->all() as $error)
                <li> {{$error}} </li>
                @endforeach
            </ul>
            @endif
        </div>

    </form>
</body>
</html>