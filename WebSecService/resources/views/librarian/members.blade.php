@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Members</h1>
        @foreach($members as $member)
            <div style="margin-bottom:1rem; padding:0.75rem; background:#f8fafc; border-radius:0.5rem;">
                <strong>{{ $member->name }}</strong> · <span>{{ $member->email }}</span> · <span class="subtext">{{ $member->role?->name ?? 'Member' }}</span>
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
            </div>
        @endforeach
    </div>
@endsection
