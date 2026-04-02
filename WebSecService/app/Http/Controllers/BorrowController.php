<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function borrow(Request $request, Book $book)
    {
        if ($book->copies <= 0) {
            return back()->with('error', 'Book currently unavailable');
        }

        $user = Auth::user();

        $currentBorrows = $user->borrows()->whereNull('returned_at')->count();
        if ($currentBorrows >= $user->borrowing_limit) {
            return back()->with('error', 'You have reached your borrowing limit');
        }

        Borrow::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
        ]);

        $book->decrement('copies');

        return back()->with('success', 'Book borrowed successfully');
    }
}
