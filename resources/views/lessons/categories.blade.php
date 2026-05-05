@extends('layouts.app')
@section('content')

<div class="card">
    <h1 style="color:var(--primary);">{{ __('app.cat_title') }}</h1>
    <p style="color:#666; font-size:1.05em;">{{ __('app.cat_subtitle') }}</p>
</div>

<div style="display:flex; gap:20px; flex-wrap:wrap;">

    <a href="/lessons/alphabet" style="flex:1; min-width:220px; text-decoration:none;">
        <div class="card" style="text-align:center; transition:transform 0.2s; cursor:pointer;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
            <div style="font-size:3em;">🔤</div>
            <h2 style="color:var(--primary);">{{ __('app.cat_alphabet') }}</h2>
            <p style="color:#666; font-size:0.9em;">{{ __('app.cat_alphabet_d') }}</p>
            <span class="btn" style="margin-top:10px; background:#1565c0;">{{ __('app.cat_start') }}</span>
        </div>
    </a>

    <a href="/lessons/grammar" style="flex:1; min-width:220px; text-decoration:none;">
        <div class="card" style="text-align:center; transition:transform 0.2s; cursor:pointer;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
            <div style="font-size:3em;">📖</div>
            <h2 style="color:#4caf50;">{{ __('app.cat_grammar') }}</h2>
            <p style="color:#666; font-size:0.9em;">{{ __('app.cat_grammar_d') }}</p>
            <span class="btn" style="margin-top:10px; background:#4caf50;">{{ __('app.cat_start') }}</span>
        </div>
    </a>

    <a href="/lessons/vocabulary" style="flex:1; min-width:220px; text-decoration:none;">
        <div class="card" style="text-align:center; transition:transform 0.2s; cursor:pointer;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
            <div style="font-size:3em;">🗂️</div>
            <h2 style="color:#ff9800;">{{ __('app.cat_vocab') }}</h2>
            <p style="color:#666; font-size:0.9em;">{{ __('app.cat_vocab_d') }}</p>
            <span class="btn" style="margin-top:10px; background:#ff9800;">{{ __('app.cat_start') }}</span>
        </div>
    </a>

    <a href="/lessons/phrases" style="flex:1; min-width:220px; text-decoration:none;">
        <div class="card" style="text-align:center; transition:transform 0.2s; cursor:pointer;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
            <div style="font-size:3em;">💬</div>
            <h2 style="color:#9c27b0;">{{ __('app.cat_phrases') }}</h2>
            <p style="color:#666; font-size:0.9em;">{{ __('app.cat_phrases_d') }}</p>
            <span class="btn" style="margin-top:10px; background:#9c27b0;">{{ __('app.cat_start') }}</span>
        </div>
    </a>

</div>

<div class="card" style="margin-top:5px; background:#f8f9fa;">
    <h3 style="color:var(--primary);">{{ __('app.cat_all') }}</h3>
    <p style="color:#666; margin-bottom:15px;">{{ __('app.cat_all_desc') }}</p>
    <a href="/lessons" class="btn" style="background:#6c757d;">{{ __('app.cat_all_btn') }}</a>
</div>

@endsection
