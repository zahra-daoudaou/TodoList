<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List des taches</title>
    <!--<style>
        .pagination {
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>-->
</head>
<body>
    <div>
        <ul>
            <li>
                <a href="{{route('taches.index')}}"> List des taches </a>
            </li>
            <li>
                <a href="{{route('taches.create')}}"> Ajouter une tache </a>
            </li>
        </ul>
    </div>

    <!--<input type="search" name="search" id="search" value="{{request('search')}}">

    <ul>
        @forelse($taches as $tache)
        <li>{{$tache->titre}}</li>
        <li>{{$tache->description}}</li>
        <li>{{$tache->etat}}</li>
        @empty
        <li>Tache non trouvable!</li>
        @endforelse
    </ul>-->

    <form action="{{ route('taches.index') }}" method="get">

        <label for="filter">Filtrer par état :</label>

        <select name="filter" id="filter">
            <option value="">Tous</option>
            <option value="terminé" {{ $filter === 'termine' ? 'selected' : '' }}>Terminées</option>
            <option value="not_completed" {{ $filter === 'non termine' ? 'selected' : '' }}>Non terminées</option>
        </select>

        <button type="submit">Filtrer</button>
    </form>

    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>

    <h3>List des Taches</h3>

    <table rules="all" border="1" >
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>état</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @forelse($taches as $tache)
    <tr>
        <td> {{$tache->id}} </td>
        <td>{{$tache->titre}}</td>
        <td>{{$tache->description}}</td>
        <td>{{$tache->etat}}</td>
        <td>
        <a href="{{ route('taches.edit', $tache->id) }}">modifier</a>
        </td>
        <td>
        <form method="post" action="{{route('taches.destroy',$tache->id)}}">
            @csrf
            @method('delete')
            <input type="submit" value="supprimer">
        </form>
        </td>
        @empty
        <td>tache non trouvable!</td>
        </tr>
    @endforelse
    </table>
    <form action="{{route('taches.create')}}">
        <input type="submit" value="Ajouter une tache">
    </form>

    {{ $taches->links() }}
</body>
</html>