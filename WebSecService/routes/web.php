<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\MemberController;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::aliasMiddleware('role', \App\Http\Middleware\RoleMiddleware::class);

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [MemberController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [MemberController::class, 'profile'])->name('profile');
    Route::post('/borrow/{book}', [BorrowController::class, 'borrow'])->name('borrow.book');

    Route::middleware('role:Admin,Librarian')->group(function () {
        Route::resource('books', BookController::class)->except(['show']);
    });

    Route::middleware('role:Admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/librarian/create', [AdminController::class, 'createLibrarian'])->name('admin.librarian.create');
        Route::post('/admin/librarian', [AdminController::class, 'storeLibrarian'])->name('admin.librarian.store');
        Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    });

    Route::middleware('role:Admin,Librarian')->group(function () {
        Route::get('/members', [LibrarianController::class, 'members'])->name('members.index');
    });
});

