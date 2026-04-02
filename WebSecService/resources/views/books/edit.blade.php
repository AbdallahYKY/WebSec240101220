@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PUT')
        <div><label>Title</label> <input type="text" name="title" value="{{ old('title', $book->title) }}"></div>
        <div><label>Author</label> <input type="text" name="author" value="{{ old('author', $book->author) }}"></div>
        <div><label>ISBN</label> <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}"></div>
        <div><label>Copies</label> <input type="number" name="copies" value="{{ old('copies', $book->copies) }}"></div>
        <button type="submit">Update</button>
    </form>
@endsection
