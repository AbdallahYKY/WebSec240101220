@extends('layouts.app')

@section('content')
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div><label>Name</label> <input type="text" name="name" value="{{ old('name') }}"></div>
        <div><label>Email</label> <input type="email" name="email" value="{{ old('email') }}"></div>
        <div><label>Password</label> <input type="password" name="password"></div>
        <div><label>Confirm</label> <input type="password" name="password_confirmation"></div>
        <button type="submit">Register</button>
    </form>
@endsection
