@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Profile: {{ $user->name }}</h1>

        <div class="card" style="padding:0.75rem; background:#f8fafc;">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role?->name ?? 'Member' }}</p>
            <p><strong>Borrowing Status:</strong> {{ $borrowCount }} / {{ $borrowingLimit }} books</p>
        </div>

        <h2>Your Borrowed Books</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Borrowed At</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->book->title }}</td>
                        <td>{{ $borrow->book->author }}</td>
                        <td>{{ $borrow->borrowed_at }}</td>
                        <td>{{ $borrow->returned_at ? 'Returned' : 'Borrowed' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No borrowed books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
