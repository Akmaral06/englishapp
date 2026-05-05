@extends('layouts.app')
@section('content')

<div class="card">
    <div style="display:flex; align-items:center; gap:15px; flex-wrap:wrap;">
        <a href="/lessons" style="color:var(--primary); text-decoration:none; font-size:0.9em;">← Back to Lessons</a>
        <h1 style="color:var(--primary); margin:0;">✏️ Edit Lesson</h1>
    </div>
</div>

<form action="/lessons/{{ $lesson->id }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

   
    <div class="card">
        <h2 style="color:var(--primary); margin-top:0;">📋 Basic Information</h2>

        <label style="font-weight:600; display:block; margin-bottom:5px;">Lesson Title <span style="color:red;">*</span></label>
        <input type="text" name="title" value="{{ old('title', $lesson->title) }}" required
               style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box; font-size:1em;">

        <label style="font-weight:600; display:block; margin-top:15px; margin-bottom:5px;">Subtitle / Short Description</label>
        <input type="text" name="subtitle" value="{{ old('subtitle', $lesson->subtitle) }}"
               style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box; font-size:1em;">
    </div>

    
    <div class="card">
        <h2 style="color:var(--primary); margin-top:0;">📚 Lesson Category</h2>
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
            @php
            $types = [
                ['value'=>'alphabet',   'label'=>'🔤 Alphabet',    'color'=>'#1565c0', 'bg'=>'#e3f2fd'],
                ['value'=>'grammar',    'label'=>'📖 Grammar',     'color'=>'#4caf50', 'bg'=>'#e8f5e9'],
                ['value'=>'vocabulary', 'label'=>'🗂️ Vocabulary', 'color'=>'#ff9800', 'bg'=>'#fff3e0'],
                ['value'=>'phrases',    'label'=>'💬 Phrases',     'color'=>'#9c27b0', 'bg'=>'#f3e5f5'],
                ['value'=>'general',    'label'=>'📝 General',     'color'=>'#6c757d', 'bg'=>'#f8f9fa'],
            ];
            $cur = old('type', $lesson->type ?? 'general');
            @endphp
            @foreach($types as $t)
            <label style="flex:1; min-width:120px; cursor:pointer;">
                <input type="radio" name="type" value="{{ $t['value'] }}" {{ $cur == $t['value'] ? 'checked' : '' }}
                       style="display:none;" onchange="updateTheme('{{ $t['color'] }}','{{ $t['value'] }}')">
                <div class="type-card" id="tc-{{ $t['value'] }}"
                     style="border:2px solid {{ $cur == $t['value'] ? $t['color'] : '#ddd' }};
                            background:{{ $cur == $t['value'] ? $t['bg'] : 'white' }};
                            border-radius:10px; padding:12px; text-align:center; transition:all 0.2s; font-size:0.9em;">
                    <div style="font-size:1.5em;">{{ explode(' ',$t['label'])[0] }}</div>
                    <div style="font-weight:600; color:{{ $t['color'] }}; margin-top:3px;">{{ implode(' ', array_slice(explode(' ',$t['label']),1)) }}</div>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    
    <div class="card">
        <h2 style="color:var(--primary); margin-top:0;">🎨 Appearance</h2>
        <div style="display:flex; gap:20px; flex-wrap:wrap; align-items:flex-end;">
            <div style="flex:1; min-width:200px;">
                <label style="font-weight:600; display:block; margin-bottom:5px;">Icon / Emoji</label>
                <input type="text" name="icon" value="{{ old('icon', $lesson->icon ?? '📝') }}"
                       style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box; font-size:1.5em; text-align:center;">
            </div>
            <div style="flex:1; min-width:200px;">
                <label style="font-weight:600; display:block; margin-bottom:5px;">Theme Color</label>
                <div style="display:flex; gap:8px; flex-wrap:wrap;">
                    @foreach(['#1565c0'=>'Blue','#4caf50'=>'Green','#ff9800'=>'Orange','#9c27b0'=>'Purple','#dc3545'=>'Red','#6c757d'=>'Grey'] as $color=>$name)
                    <label style="cursor:pointer;" title="{{ $name }}">
                        <input type="radio" name="color_theme" value="{{ $color }}"
                               {{ old('color_theme', $lesson->color_theme ?? '#1565c0') == $color ? 'checked' : '' }}
                               style="display:none;">
                        <div style="width:36px; height:36px; background:{{ $color }}; border-radius:50%;
                                    border:3px solid {{ old('color_theme', $lesson->color_theme ?? '#1565c0') == $color ? '#333' : 'transparent' }};
                                    transition:border 0.2s;"></div>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    
    <div class="card">
        <h2 style="color:var(--primary); margin-top:0;">✏️ Lesson Introduction <span style="color:red;">*</span></h2>
        <textarea name="content" rows="6" required
               style="width:100%; padding:14px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box;
                      font-family:'Segoe UI',sans-serif; font-size:0.95em; resize:vertical; line-height:1.6;">{{ old('content', $lesson->content) }}</textarea>
    </div>

    
    <div class="card" style="border-left:4px solid #1565c0;">
        <h2 style="color:var(--primary); margin-top:0;">📌 Key Points <span style="color:#888; font-weight:400; font-size:0.8em;">(one per line)</span></h2>
        <textarea name="key_points" rows="6"
               style="width:100%; padding:14px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box;
                      font-family:'Segoe UI',sans-serif; font-size:0.95em; resize:vertical; line-height:1.8;">{{ old('key_points', $lesson->key_points) }}</textarea>
        <p style="color:#aaa; font-size:0.8em; margin-top:5px;">💡 Each line = one key point shown with ✅ bullet</p>
    </div>

    
    <div class="card" style="border-left:4px solid #ff9800;">
        <h2 style="color:#ff9800; margin-top:0;">💡 Examples <span style="color:#888; font-weight:400; font-size:0.8em;">(one per line, use " — " to add translation)</span></h2>
        <textarea name="examples" rows="6"
               style="width:100%; padding:14px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box;
                      font-family:'Segoe UI',sans-serif; font-size:0.95em; resize:vertical; line-height:1.8;">{{ old('examples', $lesson->examples) }}</textarea>
        <p style="color:#aaa; font-size:0.8em; margin-top:5px;">💡 Format: <code>Example sentence — explanation or translation</code></p>
    </div>

    
    <div class="card" style="border-left:4px solid #4caf50;">
        <h2 style="color:#4caf50; margin-top:0;">✅ Practice Tip</h2>
        <textarea name="practice_tip" rows="3"
               style="width:100%; padding:14px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box;
                      font-family:'Segoe UI',sans-serif; font-size:0.95em; resize:vertical; line-height:1.6;">{{ old('practice_tip', $lesson->practice_tip) }}</textarea>
    </div>

    
    <div class="card">
        <h2 style="color:var(--primary); margin-top:0;">📎 Replace Attached File <span style="color:#888; font-weight:400; font-size:0.85em;">(optional)</span></h2>
        @if($lesson->file_path)
            <div style="margin-bottom:12px; padding:12px; background:#e8f5e9; border-radius:8px;">
                <span style="color:#2e7d32;">📎 Current file: <strong>{{ basename($lesson->file_path) }}</strong></span>
            </div>
        @endif
        <p style="color:#666; margin-bottom:15px;">Upload a new file to replace the current one (Max 50 MB). Leave empty to keep existing file.</p>
        <input type="file" name="document" style="padding:8px; border:1px solid #ddd; border-radius:8px; width:100%; box-sizing:border-box;">
    </div>

    <div class="card" style="background:#e8f5e9; text-align:center;">
        <p style="color:#555; margin-bottom:15px;">Saving will resubmit the lesson for review.</p>
        <button type="submit" class="btn" style="background:#4caf50; font-size:1.1em; padding:14px 40px;">
            💾 Save Changes
        </button>
        <a href="/lessons" style="margin-left:15px; color:#666; text-decoration:none;">Cancel</a>
    </div>

</form>

<script>
const typeBgs = {
    alphabet: '#e3f2fd', grammar: '#e8f5e9',
    vocabulary: '#fff3e0', phrases: '#f3e5f5', general: '#f8f9fa'
};
const typeColors = {
    alphabet: '#1565c0', grammar: '#4caf50',
    vocabulary: '#ff9800', phrases: '#9c27b0', general: '#6c757d'
};

function updateTheme(color, type) {
    document.querySelectorAll('.type-card').forEach(c => {
        c.style.border = '2px solid #ddd';
        c.style.background = 'white';
    });
    const card = document.getElementById('tc-' + type);
    if (card) {
        card.style.border = '2px solid ' + color;
        card.style.background = typeBgs[type] || '#f0f0f0';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('input[name="color_theme"]').forEach(r => {
        r.addEventListener('change', function() {
            document.querySelectorAll('input[name="color_theme"]').forEach(x => {
                x.nextElementSibling.style.border = '3px solid transparent';
            });
            this.nextElementSibling.style.border = '3px solid #333';
        });
    });
});
</script>

@endsection
