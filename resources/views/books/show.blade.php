  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Book Details</title>
    <style>
        body {
            padding: 20px;
        }
        .book-details {
            margin-bottom: 20px;
        }
        .btn-group {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Book Details</h1>
    <div class="book-details">
        <strong>Title:</strong> {{ $book->title }} <br>
        <strong>Author:</strong> {{ $book->author }} <br>
        <strong>Price:</strong> {{ $book->price }} <br>
        <strong>Stock:</strong> {{ $book->stock }} <br>
        <strong>Category:</strong> {{ $book->category->name }} <br>
    </div>

    <div class="btn-group">
        <form action="{{ route('books.borrow', ['user' => $user->id, 'book' => $book->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary">Borrow</button>
        </form>

        <form action="{{ route('books.return', ['user' => $user->id, 'book' => $book->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success">Return</button>
        </form>
    </div>
</div>

</body>
</html>
