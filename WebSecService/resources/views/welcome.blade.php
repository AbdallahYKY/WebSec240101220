@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Welcome to the Library Management System</h1>
        <p class="subtext">Sign in to manage books, members and borrowings. All actions are secure and role-based.</p>

        @guest
            <div class="mt-4">
                <a href="{{ route('login') }}" class="btn">Login</a>
                <a href="{{ route('register') }}" class="btn" style="background:#1f9d6e;">Register</a>
            </div>
        @else
            <p class="mt-4">Go to your dashboard:</p>
            <a href="{{ route('dashboard') }}" class="btn">Dashboard</a>
        @endguest
    </div>
@endsection
