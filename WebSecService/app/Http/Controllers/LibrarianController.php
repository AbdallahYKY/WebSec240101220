<?php

namespace App\Http\Controllers;

use App\Models\User;

class LibrarianController extends Controller
{
    public function members()
    {
        $members = User::whereHas('role', fn($q) => $q->where('name', 'Member'))->with('borrows.book')->get();
        return view('librarian.members', compact('members'));
    }
}
