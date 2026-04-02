@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Create Librarian</h1>
        <form method="POST" action="{{ route('admin.librarian.store') }}" class="form-grid" style="max-width:480px;">
            @csrf
            <div class="form-field">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-field">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-field">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-field">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <button class="btn" type="submit">Create</button>
        </form>
    </div>
@endsection
