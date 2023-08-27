<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<form action="{{ route('livres.store') }}" method="post">
    @csrf
    <!-- Champs du formulaire -->

    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" required>
    </div>
    <div>
        <label for="isbn">Isbn:</label>
        <input type="text" name="isbn" id="isbn" required>
    </div>
    <div>
        <label for="published_date">Published_date:</label>
        <input type="date" name="published_date" id="published_date" required>
        <button type="submit">Ajoutez</button>
    </div>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
</form>