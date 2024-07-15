<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>livre</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <h1>Liste des Livres</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>author</th>
                <th>isbn</th>
                <th>published_date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livres as $livre)
            <tr>
                <td>{{ $livre->id }}</td>
                <td>{{ $livre->title }}</td>
                <td>{{ $livre->author }}</td>
                <td>{{ $livre->isbn }}</td>
                <td>{{ $livre->published_date}}</td>
                <td>
                    <a href="{{ route('livres.edit', $livre->id) }}">Éditer</a> |
                    <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: red; padding: 0; cursor: pointer;">Suppr</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="aa">
    <a href="{{ route('livres.create') }}">Ajouter un nouveau Livre</a>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

</body>

</html>