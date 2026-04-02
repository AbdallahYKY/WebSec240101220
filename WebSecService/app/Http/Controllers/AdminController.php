<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $members = User::whereHas('role', fn($q) => $q->where('name', 'Member'))->with('borrows.book')->get();
        $librarians = User::whereHas('role', fn($q) => $q->where('name', 'Librarian'))->get();
        return view('admin.dashboard', compact('roles', 'members', 'librarians'));
    }

    public function createLibrarian()
    {
        return view('admin.create-librarian');
    }

    public function storeLibrarian(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $role = Role::where('name', 'Librarian')->firstOrFail();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $role->id,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Librarian created.');
    }

    public function destroyUser(User $user)
    {
        // Prevent deleting self or other admins
        if ($user->id === auth()->id() || $user->isAdmin()) {
            return back()->with('error', 'Cannot delete this user.');
        }

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }
}
