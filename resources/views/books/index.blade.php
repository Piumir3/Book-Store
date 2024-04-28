 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
         
        .container {
            margin-top: 25px;
        }

        .table-container {
            margin-top: 25px;
        }
    </style>
</head>
<body>
<x-app-layout>
    
<section>
    <div class="container">
         
        <div class="row mb-3">
            
            <div class="col-md-6">
                <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
            </div>
            <div class="col-md-6">
                <form action="{{ route('books.index') }}" method="GET">
                    <div class="form-group">
                        <select class="form-control" name="category_id">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request()->get('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>

        <!-- Apply margin-top to the table container -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>
                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
</x-app-layout>
</body>
</html>
