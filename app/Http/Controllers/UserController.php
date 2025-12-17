<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of all users (admin only).
     */
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to access this page.');
        }

        // Use policy to authorize
        if (!auth()->user()->can('manageUsers', User::class)) {
            return redirect()->route('home')->with('status', 'You must be an admin to access this page.');
        }

        $users = User::orderBy('created_at', 'desc')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Toggle admin status for a user.
     */
    public function toggleAdmin(User $user)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to perform this action.');
        }

        // Use policy to authorize
        if (!auth()->user()->can('toggleAdmin', $user)) {
            return back()->with('status', 'You cannot perform this action.');
        }

        $user->is_admin = !$user->is_admin;
        $user->save();

        return back()->with('status', "Admin privileges updated for {$user->user_alias}.");
    }
}
