<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<form action="{{ route('livres.update', $livre->id) }}" method="post">
    @csrf
    @method('PUT')
    <!-- Champs du formulaire -->

    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $livre->title }}" required>
    </div>
    <div>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="{{ $livre->author }}" required>
    </div>
    <div>
        <label for="isbn">Isbn:</label>
        <input type="text" name="isbn" id="isbn" value="{{ $livre->isbn}}" required>
    </div>
    <div>
        <label for="published_date">Published_date:</label>
        <input type="date" name="published_date" id="published_date" value="{{ $livre->published_date }}" required>
        <button type="submit">Modifier</button>
    </div>
</form>