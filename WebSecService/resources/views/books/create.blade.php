@extends('layouts.app')

@section('content')
    <h1>Add Book</h1>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div><label>Title</label> <input type="text" name="title" value="{{ old('title') }}"></div>
        <div><label>Author</label> <input type="text" name="author" value="{{ old('author') }}"></div>
        <div><label>ISBN</label> <input type="text" name="isbn" value="{{ old('isbn') }}"></div>
        <div><label>Copies</label> <input type="number" name="copies" value="{{ old('copies', 1) }}"></div>
        <button type="submit">Save</button>
    </form>
@endsection
