@extends('layouts.app')

@section('content')
    <div class="card">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h1>Books Management</h1>
            <a class="btn" href="{{ route('books.create') }}">Add Book</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Copies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->copies }}</td>
                        <td style="display:flex; gap:0.5rem;">
                            <a class="btn" style="background:#10b981;" href="{{ route('books.edit', $book) }}">Edit</a>
                            <form method="POST" action="{{ route('books.destroy', $book) }}" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button class="btn" style="background:#ef4444;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
