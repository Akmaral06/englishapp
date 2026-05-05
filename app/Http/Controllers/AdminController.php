<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 

class AdminController extends Controller
{
    public function users() {
        $users = User::with('roles')->get();
        return view('admin.users', compact('users'));
    }

    public function destroy(User $user) {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot delete your own admin account!');
        }

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();
        return back()->with('success', 'User permanently removed.');
    }
}