@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Your Book Catalog</h1>
        <p class="subtext">Browse and borrow available books.</p>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Copies</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->copies }}</td>
                    <td>
                        @if($book->copies > 0)
                            <form method="POST" action="{{ route('borrow.book', $book) }}" style="margin:0;">
                                @csrf
                                <button class="btn">Borrow</button>
                            </form>
                        @else
                            <span style="color:var(--danger); font-weight:600;">Book currently unavailable</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
