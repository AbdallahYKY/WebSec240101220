@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Admin Dashboard</h1>
        <div style="display:grid; gap:1rem; grid-template-columns:repeat(auto-fit,minmax(240px,1fr));">
            <div class="card" style="background:#f0f5ff; border-color:#d7e2ff;">
                <h2>Roles</h2>
                <ul>
                    @foreach($roles as $role)
                        <li>{{ $role->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card" style="background:#ecfdf5; border-color:#c6f6d5;">
                <h2>Total Members</h2>
                <p style="font-size:1.4rem; font-weight:700;">{{ $members->count() }}</p>
            </div>
        </div>

        <div class="card" style="margin-top:1rem;">
            <h2>Members</h2>
            @foreach($members as $member)
                <div style="margin-bottom:1rem; padding:0.75rem; background:#f8fafc; border-radius:0.5rem;">
                    <strong>{{ $member->name }}</strong> ({{ $member->email }})
                    <div style="margin-top:0.5rem;">
                        <strong>Borrowed Books:</strong>
                        @if($member->borrows->count() > 0)
                            <ul style="margin:0; padding-left:1rem;">
                                @foreach($member->borrows as $borrow)
                                    <li>{{ $borrow->book->title }} by {{ $borrow->book->author }} (Borrowed: {{ $borrow->borrowed_at }})</li>
                                @endforeach
                            </ul>
                        @else
                            <span>No books borrowed.</span>
                        @endif
                    </div>
                    <div style="margin-top:0.5rem;">
                        <form method="POST" action="{{ route('admin.users.destroy', $member) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn" style="background:#dc2626;" onclick="return confirm('Are you sure you want to delete this user?')">Delete User</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card" style="margin-top:1rem;">
            <h2>Librarians</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($librarians as $librarian)
                        <tr>
                            <td>{{ $librarian->name }}</td>
                            <td>{{ $librarian->email }}</td>
                            <td>Password set (hashed for security)</td>
                            <td>
                                <form method="POST" action="{{ route('admin.users.destroy', $librarian) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" style="background:#dc2626;" onclick="return confirm('Are you sure you want to delete this librarian?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No librarians yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a class="btn" href="{{ route('admin.librarian.create') }}">Create Librarian</a>
    </div>
@endsection
