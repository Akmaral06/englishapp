@extends('layouts.app')
@section('content')
<div class="card" style="max-width: 600px; margin: auto;">
    <h2>Track Your Progress</h2>
    <form action="/progress" method="POST">
        @csrf
        <label>Select the last lesson you finished:</label>
        <select name="lesson" required>
            <option value="" disabled selected>-- Choose Lesson --</option>
            @foreach($allLessons as $l)
                <option value="{{ $l }}" {{ (isset($currentLesson) && $currentLesson == $l) ? 'selected' : '' }}>{{ $l }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn" style="width: 100%; margin-top: 10px;">Show What's Next</button>
    </form>

    @if(isset($remaining))
        <div style="margin-top: 30px; border-top: 2px solid #eee; padding-top: 20px;">
            <h3>Remaining Lessons:</h3>
            @if(count($remaining) > 0)
                <ul>
                    @foreach($remaining as $r)
                        <li style="padding: 5px 0; color: #d32f2f; font-weight: bold;">{{ $r }}</li>
                    @endforeach
                </ul>
            @else
                <p style="color: green; font-weight: bold;">🎉 You have completed all lessons!</p>
            @endif
        </div>
    @endif
</div>
@endsection