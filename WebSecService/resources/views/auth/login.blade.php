@extends('layouts.app')

@section('content')
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div><label>Email</label> <input type="email" name="email" value="{{ old('email') }}"></div>
        <div><label>Password</label> <input type="password" name="password"></div>
        <button type="submit">Login</button>
    </form>
@endsection
