@extends('layouts.app')
@section('content')

@php
$color = $lesson->color_theme ?? '#1565c0';
$icon  = $lesson->icon ?? '📝';
$typeLabels = ['alphabet'=>'Alphabet','grammar'=>'Grammar','vocabulary'=>'Vocabulary','phrases'=>'Phrases','general'=>'General'];
$typeLabel  = $typeLabels[$lesson->type ?? 'general'] ?? 'Lesson';
$backUrl    = match($lesson->type ?? 'general') {
    'alphabet'   => '/lessons/alphabet',
    'grammar'    => '/lessons/grammar',
    'vocabulary' => '/lessons/vocabulary',
    'phrases'    => '/lessons/phrases',
    default      => '/lessons',
};

$keyPoints = $lesson->key_points_array;
$examples  = $lesson->examples_array;
@endphp

<div class="card" style="border-top:5px solid {{ $color }};">
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:12px; flex-wrap:wrap;">
        <a href="{{ $backUrl }}" style="color:{{ $color }}; text-decoration:none; font-size:0.9em;">← Back to {{ $typeLabel }}</a>
        <span style="background:{{ $color }}20; color:{{ $color }}; padding:3px 12px; border-radius:20px; font-size:0.8em; font-weight:600;">
            {{ $icon }} {{ $typeLabel }}
        </span>
        <span style="padding:3px 12px; border-radius:20px; font-size:0.8em; font-weight:600; color:white;
                     background:{{ $lesson->status == 'approved' ? '#28a745' : ($lesson->status == 'rejected' ? '#dc3545' : '#ffc107') }}">
            {{ strtoupper($lesson->status) }}
        </span>
    </div>

    <h1 style="color:{{ $color }}; margin:0 0 8px; font-size:2em;">{{ $icon }} {{ $lesson->title }}</h1>
    @if($lesson->subtitle)
        <p style="color:#666; font-size:1.1em; margin:0 0 12px;">{{ $lesson->subtitle }}</p>
    @endif
    <p style="color:#aaa; font-size:0.85em; margin:0;">
        👤 By <strong style="color:#555;">{{ $lesson->user->name ?? 'Teacher' }}</strong>
        &nbsp;·&nbsp;
        📅 {{ $lesson->created_at->format('d M Y') }}
    </p>
</div>

<div class="card">
    <div style="font-size:1.05em; line-height:1.9; color:#333; white-space:pre-wrap;">{{ $lesson->content }}</div>
</div>

@if(count($keyPoints) > 0)
<div class="card" style="border-left:4px solid {{ $color }};">
    <h2 style="color:{{ $color }}; margin-top:0;">📌 Key Points</h2>
    <div style="display:flex; flex-direction:column; gap:10px;">
        @foreach($keyPoints as $point)
        <div style="display:flex; align-items:flex-start; gap:12px; background:{{ $color }}0d; padding:12px 16px; border-radius:8px;">
            <span style="color:{{ $color }}; font-size:1.2em; min-width:24px; font-weight:bold;">✅</span>
            <p style="margin:0; color:#333; line-height:1.6; font-size:1em;">{{ $point }}</p>
        </div>
        @endforeach
    </div>
</div>
@endif

@if(count($examples) > 0)
<div class="card">
    <h2 style="color:#ff9800; margin-top:0;">💡 Examples</h2>
    <div style="display:flex; flex-direction:column; gap:10px;">
        @foreach($examples as $example)
        @php
            $parts = explode(' — ', $example, 2);
            $ex    = trim($parts[0]);
            $trans = isset($parts[1]) ? trim($parts[1]) : null;
        @endphp
        <div style="display:flex; align-items:center; gap:15px; background:#fff8e1; padding:14px 18px; border-radius:10px; border-left:3px solid #fbc02d; flex-wrap:wrap;">
            <span style="font-weight:700; color:#333; font-size:1.05em; font-style:italic; flex:1; min-width:200px;">{{ $ex }}</span>
            @if($trans)
                <span style="color:#777; font-size:0.92em; flex:1; min-width:150px;">{{ $trans }}</span>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endif

@if($lesson->practice_tip)
<div class="card" style="background:#e8f5e9; border-left:4px solid #4caf50;">
    <h3 style="color:#2e7d32; margin-top:0;">✅ Practice Tip</h3>
    <p style="color:#555; margin:0; line-height:1.7;">{{ $lesson->practice_tip }}</p>
    <a href="/exercises" class="btn" style="background:#4caf50; margin-top:15px; display:inline-block;">Go to Exercises →</a>
</div>
@else
<div class="card" style="background:#e8f5e9; text-align:center;">
    <a href="/exercises" class="btn" style="background:#4caf50;">Go to Exercises →</a>
</div>
@endif

@if($lesson->file_path)
<div class="card" style="background:#e3f2fd; border:1px solid #bbdefb;">
    <h3 style="margin:0 0 12px; color:#1565c0;">📎 Attached File</h3>
    <a href="{{ asset('storage/' . $lesson->file_path) }}" target="_blank" class="btn" style="background:{{ $color }}; text-decoration:none;">
        📥 Open / Download File
    </a>
    <p style="font-size:0.8em; color:#666; margin-top:8px;">{{ basename($lesson->file_path) }}</p>
</div>
@endif

@if(Auth::id() == $lesson->user_id || Auth::user()->hasRole('admin'))
<div class="card" style="background:#f8f9fa; display:flex; gap:12px; flex-wrap:wrap; align-items:center;">
    <strong style="color:#555;">Actions:</strong>
    @if(Auth::id() == $lesson->user_id)
        <a href="/lessons/{{ $lesson->id }}/edit" class="btn" style="background:#007bff;">✏️ Edit</a>
    @endif
    <form action="/lessons/{{ $lesson->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this lesson?')">
        @csrf @method('DELETE')
        <button type="submit" class="btn" style="background:#dc3545;">🗑️ Delete</button>
    </form>
</div>
@endif

@role('reviewer')
@if($lesson->status == 'pending')
<div class="card" style="background:#fff9c4; border:1px solid #fbc02d;">
    <h3 style="color:#e65100; margin:0 0 12px;">🔍 Reviewer Actions</h3>
    <div style="display:flex; gap:12px; flex-wrap:wrap;">
        <a href="/lessons/{{ $lesson->id }}/approve" class="btn" style="background:#28a745;">✅ Approve</a>
        <a href="/lessons/{{ $lesson->id }}/reject" class="btn" style="background:#dc3545;">❌ Reject</a>
    </div>
</div>
@endif
@endrole

@endsection
