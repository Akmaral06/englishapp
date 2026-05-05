<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()    { return view('about'); }
    public function faq()      { return view('faq'); }
    public function exercises() { return view('exercises'); }

    public function contact() { return view('contact'); }
    public function contactSend(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|max:2000',
        ]);
        return redirect('/contact')->with('contact_success', true);
    }

    public function lessonCategories() { return view('lessons.categories'); }

    public function lessonAlphabet()
    {
        $teacherLessons = \App\Models\Lesson::where('type', 'alphabet')
            ->where('status', 'approved')->with('user')->get();
        return view('lessons.alphabet', compact('teacherLessons'));
    }

    public function lessonGrammar()
    {
        $teacherLessons = \App\Models\Lesson::where('type', 'grammar')
            ->where('status', 'approved')->with('user')->get();
        return view('lessons.grammar', compact('teacherLessons'));
    }

    public function lessonVocabulary()
    {
        $teacherLessons = \App\Models\Lesson::where('type', 'vocabulary')
            ->where('status', 'approved')->with('user')->get();
        return view('lessons.vocabulary', compact('teacherLessons'));
    }

    public function lessonPhrases()
    {
        $teacherLessons = \App\Models\Lesson::where('type', 'phrases')
            ->where('status', 'approved')->with('user')->get();
        return view('lessons.phrases', compact('teacherLessons'));
    }

    public function register() { return view('register'); }

    public function login() { return view('login'); }

    public function profile()
    {
        if (!Auth::check()) return redirect('/login');
        return view('profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'login'    => 'required|string|max:255|unique:users,name',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:student,teacher',
        ]);

        $user = User::create([
            'name'     => $request->login,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);
        Auth::login($user);

        return redirect('/profile')->with('success', 'Welcome!');
    }

    
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = trim($request->username);
        $password = $request->password;

        $user = User::where('name', $username)
                    ->orWhere('email', $username)
                    ->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user, true); 
            $request->session()->regenerate();
            return redirect()->intended('/profile');
        }

        return back()
            ->withInput($request->only('username'))
            ->with('message', 'Invalid login or password. Please try again.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function uploadAvatar(Request $request)
    {
        if (!Auth::check()) return redirect('/login');

        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:20480',
        ]);

        $user = Auth::user();

        if ($user->avatar) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($user->avatar);
        }

        $path = $request->file('avatar')->store('avatars', 'public');
        $user->update(['avatar' => $path]);

        return redirect('/profile')->with('success', 'Avatar uploaded successfully!');
    }

    public function charts()
    {
        if (!Auth::check()) return redirect('/login');
        return view('charts');
    }
}