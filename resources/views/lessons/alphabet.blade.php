@extends('layouts.app')
@section('content')

<div class="card">
    <div style="display:flex; align-items:center; gap:15px; flex-wrap:wrap;">
        <a href="/lessons/categories" style="color:var(--primary); text-decoration:none; font-size:0.9em;">{{ __('app.back_lessons') }}</a>
        <h1 style="color:var(--primary); margin:0;">{{ __('app.alpha_title') }}</h1>
    </div>
    <p style="color:#666; margin-top:10px;">{{ __('app.alpha_desc') }}</p>
</div>

@php
$letters = [
    ['A','eɪ','Apple 🍎'],['B','biː','Ball ⚽'],['C','siː','Cat 🐱'],['D','diː','Dog 🐶'],
    ['E','iː','Egg 🥚'],['F','ɛf','Fish 🐟'],['G','dʒiː','Girl 👧'],['H','eɪtʃ','Hat 🎩'],
    ['I','aɪ','Ice 🧊'],['J','dʒeɪ','Juice 🥤'],['K','keɪ','Key 🔑'],['L','ɛl','Lion 🦁'],
    ['M','ɛm','Moon 🌙'],['N','ɛn','Nose 👃'],['O','oʊ','Orange 🍊'],['P','piː','Pen 🖊️'],
    ['Q','kjuː','Queen 👑'],['R','ɑːr','Rain 🌧️'],['S','ɛs','Sun ☀️'],['T','tiː','Tree 🌳'],
    ['U','juː','Umbrella ☂️'],['V','viː','Violin 🎻'],['W','ˈdʌbljuː','Water 💧'],
    ['X','ɛks','X-ray 🩻'],['Y','waɪ','Yellow 🟡'],['Z','zɛd','Zebra 🦓'],
];
@endphp

<div style="display:flex; flex-wrap:wrap; gap:12px; justify-content:center;">
    @foreach($letters as $l)
    <div style="width:130px; background:white; border-radius:12px; padding:18px 10px; text-align:center;
                box-shadow:0 4px 12px rgba(0,0,0,0.07); border:2px solid #e3f2fd;
                transition:transform 0.2s;"
         onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='#1565c0';"
         onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#e3f2fd';">
        <div style="font-size:2.8em; font-weight:bold; color:var(--primary);">{{ $l[0] }}</div>
        <div style="font-size:1.1em; color:#777; font-family:monospace;">/{{ $l[1] }}/</div>
        <div style="font-size:0.85em; color:#555; margin-top:6px;">{{ $l[2] }}</div>
    </div>
    @endforeach
</div>

<div class="card" style="margin-top:25px;">
    <h2 style="color:var(--primary);">{{ __('app.alpha_song') }}</h2>
    <p style="color:#555; line-height:2; font-size:1.1em;">
        <strong>A B C D E F G</strong><br>
        <strong>H I J K L M N O P</strong><br>
        <strong>Q R S</strong> — <strong>T U V</strong><br>
        <strong>W X Y and Z</strong><br>
        <em style="color:#888;">Now I know my ABCs, next time won't you sing with me!</em>
    </p>
</div>

<div class="card" style="background:#e8f5e9;">
    <h3 style="color:#2e7d32;">{{ __('app.alpha_tip_title') }}</h3>
    <p style="color:#555;">{{ __('app.alpha_tip_text') }}</p>
    <a href="/exercises" class="btn" style="background:#4caf50; margin-top:10px;">{{ __('app.alpha_go_ex') }}</a>
</div>

@include('partials.teacher_lessons')

@endsection
