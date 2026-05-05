<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index() {
        $user = Auth::user();
        if ($user && $user->hasRole('student')) {
            $lessons = Lesson::where('status', 'approved')->with('user')->get();
        } else {
            $lessons = Lesson::with('user')->get();
        }
        return view('lessons.index', compact('lessons'));
    }

    public function show(Lesson $lesson) {
        if ($lesson->status !== 'approved' &&
            !Auth::user()->hasAnyRole(['admin', 'reviewer']) &&
            Auth::id() !== $lesson->user_id) {
            abort(403, 'Access denied.');
        }
        return view('lessons.show', compact('lesson'));
    }

    public function create() {
        return view('lessons.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'        => 'required|string|max:255',
            'subtitle'     => 'nullable|string|max:255',
            'type'         => 'required|in:alphabet,grammar,vocabulary,phrases,general',
            'icon'         => 'nullable|string|max:10',
            'color_theme'  => 'nullable|string|max:20',
            'content'      => 'required',
            'key_points'   => 'nullable|string',
            'examples'     => 'nullable|string',
            'practice_tip' => 'nullable|string|max:500',
            'document'     => 'nullable|file|max:51200', // 50 MB
        ]);

        $path = $request->hasFile('document')
            ? $request->file('document')->store('uploads', 'public')
            : null;

        Lesson::create([
            'title'        => $request->title,
            'subtitle'     => $request->subtitle,
            'type'         => $request->type,
            'icon'         => $request->icon ?: '📝',
            'color_theme'  => $request->color_theme ?: '#1565c0',
            'content'      => $request->content,
            'key_points'   => $request->key_points,
            'examples'     => $request->examples,
            'practice_tip' => $request->practice_tip,
            'user_id'      => Auth::id(),
            'status'       => 'pending',
            'file_path'    => $path,
        ]);

        return redirect('/lessons')->with('success', 'Lesson submitted for review!');
    }

    public function edit(Lesson $lesson) {
        if (Auth::id() !== $lesson->user_id) {
            abort(403, 'You cannot edit someone else\'s lesson.');
        }
        return view('lessons.edit', compact('lesson'));
    }

    public function update(Request $request, Lesson $lesson) {
        if (Auth::id() !== $lesson->user_id) abort(403);

        $request->validate([
            'title'        => 'required|string|max:255',
            'subtitle'     => 'nullable|string|max:255',
            'type'         => 'required|in:alphabet,grammar,vocabulary,phrases,general',
            'icon'         => 'nullable|string|max:10',
            'color_theme'  => 'nullable|string|max:20',
            'content'      => 'required',
            'key_points'   => 'nullable|string',
            'examples'     => 'nullable|string',
            'practice_tip' => 'nullable|string|max:500',
            'document'     => 'nullable|file|max:51200',
        ]);

        $data = $request->only('title', 'subtitle', 'type', 'icon', 'color_theme', 'content', 'key_points', 'examples', 'practice_tip');
        $data['icon'] = $data['icon'] ?: '📝';
        $data['color_theme'] = $data['color_theme'] ?: '#1565c0';

        if ($request->hasFile('document')) {
            if ($lesson->file_path) Storage::disk('public')->delete($lesson->file_path);
            $data['file_path'] = $request->file('document')->store('uploads', 'public');
        }

        $data['status'] = 'pending';
        $lesson->update($data);

        return redirect('/lessons')->with('success', 'Lesson updated and resubmitted for review!');
    }

    public function destroy(Lesson $lesson) {
        if (Auth::id() === $lesson->user_id || Auth::user()->hasRole('admin')) {
            if ($lesson->file_path) Storage::disk('public')->delete($lesson->file_path);
            $lesson->delete();
            return back()->with('success', 'Deleted successfully.');
        }
        abort(403);
    }

    public function moderate(Request $request, Lesson $lesson, $status = null) {
        $finalStatus = $status ?? $request->route('status');
        if (!Auth::user()->hasRole('reviewer')) abort(403);
        $lesson->update(['status' => $finalStatus]);
        return back()->with('success', 'Status updated to: ' . $finalStatus);
    }
}
