<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        return response()->json(Lesson::with('user:id,name')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $lesson = Lesson::create([
            'title'   => $validated['title'],
            'content' => $validated['content'],
            'user_id' => $request->user()?->id ?? 1,
            'status'  => 'pending',
        ]);

        return response()->json($lesson, 201);
    }

    public function show(Lesson $lesson)
    {
        return response()->json($lesson->load('user:id,name'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'title'   => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'status'  => 'sometimes|in:pending,approved,rejected',
        ]);

        $lesson->update($validated);
        return response()->json($lesson);
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
