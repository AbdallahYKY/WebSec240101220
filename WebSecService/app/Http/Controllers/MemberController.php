<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function dashboard()
    {
        $books = Book::all();
        return view('member.dashboard', compact('books'));
    }

    public function profile()
    {
        $user = Auth::user();
        $borrows = $user->borrows()->with('book')->get();
        $borrowCount = $borrows->count();
        $borrowingLimit = $user->borrowing_limit;
        return view('member.profile', compact('user', 'borrows', 'borrowCount', 'borrowingLimit'));
    }
}
