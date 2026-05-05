@extends('layouts.app')
@section('content')

<div class="card">
    <div style="display:flex; align-items:center; gap:15px; flex-wrap:wrap;">
        <a href="/lessons/categories" style="color:var(--primary); text-decoration:none; font-size:0.9em;">{{ __('app.back_lessons') }}</a>
        <h1 style="color:var(--primary); margin:0;">{{ __('app.vocab_title') }}</h1>
    </div>
    <p style="color:#666; margin-top:10px;">{{ __('app.vocab_desc') }}</p>
</div>

@php
$categories = [
    ['title'=>'🔢 Numbers', 'color'=>'#1565c0', 'bg'=>'#e3f2fd', 'words'=>[
        'one','two','three','four','five','six','seven','eight','nine','ten',
        'eleven','twelve','twenty','hundred','thousand'
    ]],
    ['title'=>'🌈 Colors', 'color'=>'#9c27b0', 'bg'=>'#f3e5f5', 'words'=>[
        'red','blue','green','yellow','orange','purple','pink','black','white','brown','grey'
    ]],
    ['title'=>'👨‍👩‍👧 Family', 'color'=>'#e65100', 'bg'=>'#fff3e0', 'words'=>[
        'mother','father','sister','brother','grandmother','grandfather','son','daughter','uncle','aunt','cousin'
    ]],
    ['title'=>'🍎 Food & Drinks', 'color'=>'#2e7d32', 'bg'=>'#e8f5e9', 'words'=>[
        'bread','milk','water','juice','apple','banana','rice','egg','chicken','soup','tea','coffee','cheese'
    ]],
    ['title'=>'🏠 Home & Objects', 'color'=>'#0288d1', 'bg'=>'#e1f5fe', 'words'=>[
        'table','chair','door','window','bed','book','phone','lamp','kitchen','bathroom','garden'
    ]],
    ['title'=>'🐾 Animals', 'color'=>'#6a1b9a', 'bg'=>'#ede7f6', 'words'=>[
        'cat','dog','bird','fish','horse','cow','sheep','rabbit','lion','tiger','elephant','monkey'
    ]],
    ['title'=>'📅 Days & Time', 'color'=>'#c62828', 'bg'=>'#ffebee', 'words'=>[
        'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday',
        'morning','afternoon','evening','night','today','tomorrow','yesterday'
    ]],
    ['title'=>'🌍 Places', 'color'=>'#558b2f', 'bg'=>'#f1f8e9', 'words'=>[
        'school','hospital','bank','market','park','station','airport','hotel','restaurant','library','city'
    ]],
];
@endphp

@foreach($categories as $i => $cat)
<div class="card" style="padding:0; overflow:hidden;">
    <button onclick="toggleCat({{ $i }})"
        style="width:100%; text-align:left; background:{{ $cat['bg'] }}; border:none; padding:18px 20px;
               font-size:1.05em; font-weight:700; color:{{ $cat['color'] }}; cursor:pointer;
               display:flex; justify-content:space-between; align-items:center;">
        <span>{{ $cat['title'] }}</span>
        <span id="caticon-{{ $i }}" style="font-size:1.3em;">▼</span>
    </button>
    <div id="cat-{{ $i }}" style="padding:15px 20px 20px; display:flex; flex-wrap:wrap; gap:10px;">
        @foreach($cat['words'] as $word)
        <span style="background:{{ $cat['bg'] }}; color:{{ $cat['color'] }}; padding:8px 16px;
                     border-radius:20px; font-weight:600; font-size:0.95em; border:1px solid {{ $cat['color'] }}33;">
            {{ $word }}
        </span>
        @endforeach
    </div>
</div>
@endforeach

<div class="card" style="background:#e8f5e9; text-align:center;">
    <h3 style="color:#2e7d32;">{{ __('app.vocab_tip_title') }}</h3>
    <p style="color:#555; margin-bottom:15px;">{{ __('app.vocab_tip_text') }}</p>
    <a href="/exercises" class="btn" style="background:#4caf50;">{{ __('app.vocab_go_ex') }}</a>
</div>

<script>
function toggleCat(i) {
    var el = document.getElementById('cat-' + i);
    var icon = document.getElementById('caticon-' + i);
    if (el.style.display === 'none') {
        el.style.display = 'flex';
        icon.textContent = '▲';
    } else {
        el.style.display = 'none';
        icon.textContent = '▼';
    }
}
</script>


@include('partials.teacher_lessons')

@endsection
