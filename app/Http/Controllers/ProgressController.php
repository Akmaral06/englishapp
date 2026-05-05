<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class ProgressController extends Controller
{
    public function showForm() {
        $allLessons = Lesson::where('status', 'approved')->pluck('title')->toArray();
        return view('progress', compact('allLessons'));
    }

    public function showRemaining(Request $request) {
        $allLessons = Lesson::where('status', 'approved')->pluck('title')->toArray();
        $currentLesson = $request->input('lesson');

        if (empty($allLessons)) {
            return view('progress', ['allLessons' => [], 'remaining' => []]);
        }

        $index = array_search($currentLesson, $allLessons);
        $remaining = ($index !== false) ? array_slice($allLessons, $index + 1) : $allLessons;

        return view('progress', compact('allLessons', 'currentLesson', 'remaining'));
    }
}