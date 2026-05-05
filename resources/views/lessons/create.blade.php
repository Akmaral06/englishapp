@extends('layouts.app')
@section('content')

<div class="card">
    <div style="display:flex; align-items:center; gap:15px; flex-wrap:wrap;">
        <a href="/lessons" style="color:var(--primary); text-decoration:none; font-size:0.9em;">← Back to Lessons</a>
        <h1 style="color:var(--primary); margin:0;">➕ Create New Lesson</h1>
    </div>
    <p style="color:#666; margin-top:8px;">Fill in the details below. Your lesson will be reviewed before it appears on the lesson page.</p>
</div>

<form action="/lessons/store" method="POST" enctype="multipart/form-data">
    @csrf

    
    <div class="card">
        <h2 style="color:var(--primary); margin-top:0;">📋 Basic Information</h2>

        <label style="font-weight:600; display:block; margin-bottom:5px;">Lesson Title <span style="color:red;">*</span></label>
        <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g. How to Use Articles: A, An, The" required
               style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box; font-size:1em;">

        <label style="font-weight:600; display:block; margin-top:15px; margin-bottom:5px;">Subtitle / Short Description</label>
        <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="e.g. Learn when to use definite and indefinite articles"
               style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box; font-size:1em;">
    </div>

    
    <div class="card">
        <h2 style="color:var(--primary); margin-top:0;">📚 Lesson Category <span style="color:red;">*</span></h2>
        <p style="color:#666; margin-bottom:15px;">Choose which section this lesson belongs to. It will appear on that lesson page.</p>

        <div style="display:flex; gap:12px; flex-wrap:wrap;">
            @php
            $types = [
                ['value'=>'alphabet',   'label'=>'🔤 Alphabet',    'color'=>'#1565c0', 'bg'=>'#e3f2fd', 'desc'=>'Letters, sounds, pronunciation'],
                ['value'=>'grammar',    'label'=>'📖 Grammar',     'color'=>'#4caf50', 'bg'=>'#e8f5e9', 'desc'=>'Grammar rules and structure'],
                ['value'=>'vocabulary', 'label'=>'🗂️ Vocabulary', 'color'=>'#ff9800', 'bg'=>'#fff3e0', 'desc'=>'Word lists by topic'],
                ['value'=>'phrases',    'label'=>'💬 Phrases',     'color'=>'#9c27b0', 'bg'=>'#f3e5f5', 'desc'=>'Useful everyday phrases'],
                ['value'=>'general',    'label'=>'📝 General',     'color'=>'#6c757d', 'bg'=>'#f8f9fa', 'desc'=>'Other / mixed content'],
            ];
            @endphp
            @foreach($types as $t)
            <label style="flex:1; min-width:140px; cursor:pointer;">
                <input type="radio" name="type" value="{{ $t['value'] }}" {{ old('type','general') == $t['value'] ? 'checked' : '' }}
                       style="display:none;" onchange="updateTheme('{{ $t['color'] }}','{{ $t['value'] }}')">
                <div class="type-card" id="tc-{{ $t['value'] }}"
                     style="border:2px solid {{ old('type','general') == $t['value'] ? $t['color'] : '#ddd' }};
                            background:{{ old('type','general') == $t['value'] ? $t['bg'] : 'white' }};
                            border-radius:10px; padding:15px; text-align:center; transition:all 0.2s;">
                    <div style="font-size:1.8em;">{{ explode(' ',$t['label'])[0] }}</div>
                    <div style="font-weight:600; color:{{ $t['color'] }}; margin-top:5px;">{{ implode(' ', array_slice(explode(' ',$t['label']),1)) }}</div>
                    <div style="font-size:0.8em; color:#777; margin-top:3px;">{{ $t['desc'] }}</div>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    
    <div class="card">
        <h2 style="color:var(--primary); margin-top:0;">🎨 Appearance</h2>
        <div style="display:flex; gap:20px; flex-wrap:wrap; align-items:flex-end;">
            <div style="flex:1; min-width:200px;">
                <label style="font-weight:600; display:block; margin-bottom:5px;">Icon / Emoji for this lesson</label>
                <input type="text" name="icon" id="iconInput" value="{{ old('icon','📝') }}" placeholder="📝"
                       style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box; font-size:1.5em; text-align:center;">
                <p style="font-size:0.8em; color:#888; margin-top:5px;">Paste any emoji — shown on the lesson card</p>
            </div>
            <div style="flex:1; min-width:200px;">
                <label style="font-weight:600; display:block; margin-bottom:5px;">Theme Color</label>
                <div style="display:flex; gap:8px; flex-wrap:wrap;">
                    @foreach(['#1565c0'=>'Blue','#4caf50'=>'Green','#ff9800'=>'Orange','#9c27b0'=>'Purple','#dc3545'=>'Red','#6c757d'=>'Grey'] as $color=>$name)
                    <label style="cursor:pointer;" title="{{ $name }}">
                        <input type="radio" name="color_theme" value="{{ $color }}" {{ old('color_theme','#1565c0') == $color ? 'checked' : '' }}
                               style="display:none;">
                        <div style="width:36px; height:36px; background:{{ $color }}; border-radius:50%; border:3px solid {{ old('color_theme','#1565c0') == $color ? '#333' : 'transparent' }};
                                    transition:border 0.2s;" title="{{ $name }}"></div>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    
    <div class="card">
        <h2 style="color:var(--primary); margin-top:0;">✏️ Lesson Introduction <span style="color:red;">*</span></h2>
        <p style="color:#666; margin-bottom:10px;">Write an introduction or explanation for this lesson. This is the main text students will read.</p>
        <textarea name="content" rows="6" required placeholder="e.g. Articles are small words placed before nouns. In English there are two types: definite (the) and indefinite (a, an). We use 'a' before consonant sounds and 'an' before vowel sounds..."
               style="width:100%; padding:14px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box;
                      font-family:'Segoe UI',sans-serif; font-size:0.95em; resize:vertical; line-height:1.6;">{{ old('content') }}</textarea>
    </div>

    
    <div class="card" style="border-left:4px solid #1565c0;">
        <h2 style="color:var(--primary); margin-top:0;">📌 Key Points <span style="color:#888; font-weight:400; font-size:0.8em;">(optional but recommended)</span></h2>
        <p style="color:#666; margin-bottom:10px;">List the main rules or facts — one per line. These will be shown as highlighted bullet points.</p>
        <textarea name="key_points" rows="6" placeholder="Use 'a' before consonant sounds (a cat, a book, a university)
Use 'an' before vowel sounds (an apple, an egg, an hour)
Use 'the' when referring to a specific thing (the sun, the book on the table)
Do NOT use an article with general plural nouns (Dogs are loyal)
Do NOT use an article with most country names (France, Russia)"
               style="width:100%; padding:14px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box;
                      font-family:'Segoe UI',sans-serif; font-size:0.95em; resize:vertical; line-height:1.8;">{{ old('key_points') }}</textarea>
        <p style="color:#aaa; font-size:0.8em; margin-top:5px;">💡 Each line = one key point shown with ✅ bullet</p>
    </div>

    
    <div class="card" style="border-left:4px solid #ff9800;">
        <h2 style="color:#ff9800; margin-top:0;">💡 Examples <span style="color:#888; font-weight:400; font-size:0.8em;">(optional)</span></h2>
        <p style="color:#666; margin-bottom:10px;">Provide example sentences or word pairs — one per line. You can use a dash to separate the example from its translation or explanation.</p>
        <textarea name="examples" rows="6" placeholder="I have a cat. — using 'a' before consonant
She is an engineer. — using 'an' before vowel
Please close the door. — specific door we both know about
I love music. — no article with abstract nouns
The Eiffel Tower is in Paris. — specific famous place"
               style="width:100%; padding:14px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box;
                      font-family:'Segoe UI',sans-serif; font-size:0.95em; resize:vertical; line-height:1.8;">{{ old('examples') }}</textarea>
        <p style="color:#aaa; font-size:0.8em; margin-top:5px;">💡 Use " — " (dash) to separate example from explanation. Each line = one example card.</p>
    </div>

    
    <div class="card" style="border-left:4px solid #4caf50;">
        <h2 style="color:#4caf50; margin-top:0;">✅ Practice Tip <span style="color:#888; font-weight:400; font-size:0.8em;">(optional)</span></h2>
        <p style="color:#666; margin-bottom:10px;">Give students one actionable tip to practice this lesson.</p>
        <textarea name="practice_tip" rows="3" placeholder="e.g. Try reading a short English text and circle all the articles you find. Ask yourself: why did the author use 'a', 'an', or 'the' here?"
               style="width:100%; padding:14px; border:1px solid #ddd; border-radius:8px; box-sizing:border-box;
                      font-family:'Segoe UI',sans-serif; font-size:0.95em; resize:vertical; line-height:1.6;">{{ old('practice_tip') }}</textarea>
    </div>

   
    <div class="card">
        <h2 style="color:var(--primary); margin-top:0;">📎 Attach File <span style="color:#888; font-weight:400; font-size:0.85em;">(optional)</span></h2>
        <p style="color:#666; margin-bottom:15px;">You can attach a PDF, Word document, image, or any other file (up to <strong>50 MB</strong>).</p>

        <div id="dropzone"
             style="border:2px dashed #1565c0; border-radius:12px; padding:30px; text-align:center; background:#f8fbff; cursor:pointer; transition:background 0.2s;"
             onclick="document.getElementById('fileInput').click()"
             ondragover="event.preventDefault(); this.style.background='#e3f2fd';"
             ondragleave="this.style.background='#f8fbff';"
             ondrop="handleDrop(event)">
            <div style="font-size:3em;">📁</div>
            <p style="color:#1565c0; font-weight:600; margin:10px 0 5px;">Click to choose a file or drag & drop here</p>
            <p style="color:#888; font-size:0.85em;">PDF, DOC, DOCX, JPG, PNG, and more · Max 50 MB</p>
            <p id="fileName" style="color:#4caf50; font-weight:600; margin-top:10px; display:none;"></p>
        </div>
        <input type="file" name="document" id="fileInput" style="display:none;" onchange="showFileName(this)">

        <div style="margin-top:12px; padding:12px; background:#fff3cd; border-radius:8px; font-size:0.85em; color:#856404;">
            ⚠️ <strong>If upload fails:</strong> Open <code>php.ini</code> and set <code>upload_max_filesize = 50M</code> and <code>post_max_size = 55M</code>, then restart Apache/PHP.
        </div>
    </div>

    
    <div class="card" style="background:#e8f5e9; text-align:center;">
        <p style="color:#555; margin-bottom:15px;">
            ⏳ After submission, your lesson will be <strong>reviewed by a reviewer</strong> before it becomes visible to students.
        </p>
        <button type="submit" class="btn" style="background:#4caf50; font-size:1.1em; padding:14px 40px;">
            🚀 Submit Lesson for Review
        </button>
        <a href="/lessons" style="margin-left:15px; color:#666; text-decoration:none;">Cancel</a>
    </div>

</form>

<script>
const typeColors = {
    alphabet: '#1565c0', grammar: '#4caf50',
    vocabulary: '#ff9800', phrases: '#9c27b0', general: '#6c757d'
};
const typeBgs = {
    alphabet: '#e3f2fd', grammar: '#e8f5e9',
    vocabulary: '#fff3e0', phrases: '#f3e5f5', general: '#f8f9fa'
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
    const checked = document.querySelector('input[name="type"]:checked');
    if (checked) updateTheme(typeColors[checked.value], checked.value);

    document.querySelectorAll('input[name="type"]').forEach(r => {
        r.addEventListener('change', function() {
            updateTheme(typeColors[this.value], this.value);
        });
    });

    document.querySelectorAll('input[name="color_theme"]').forEach(r => {
        r.addEventListener('change', function() {
            document.querySelectorAll('input[name="color_theme"]').forEach(x => {
                x.nextElementSibling.style.border = '3px solid transparent';
            });
            this.nextElementSibling.style.border = '3px solid #333';
        });
    });
});

function showFileName(input) {
    const p = document.getElementById('fileName');
    if (input.files.length > 0) {
        const size = (input.files[0].size / 1024 / 1024).toFixed(2);
        p.textContent = '✅ Selected: ' + input.files[0].name + ' (' + size + ' MB)';
        p.style.display = 'block';
    }
}

function handleDrop(e) {
    e.preventDefault();
    document.getElementById('dropzone').style.background = '#f8fbff';
    const file = e.dataTransfer.files[0];
    if (file) {
        const dt = new DataTransfer();
        dt.items.add(file);
        document.getElementById('fileInput').files = dt.files;
        showFileName(document.getElementById('fileInput'));
    }
}
</script>

@endsection
