@extends('layouts.app')
@section('content')

<div class="card">
    <h1 style="color:var(--primary); margin-bottom:10px;">{{ __('app.about_title') }}</h1>
    <p style="color:#555; font-size:1.05em; line-height:1.7;">
        <strong>EnglishApp</strong> is a free online platform designed to help complete beginners start learning English from scratch.
        Whether you are a child, a student, or an adult with no prior knowledge of English — this platform is for you.
    </p>
</div>

<div style="display:flex; gap:20px; flex-wrap:wrap; margin-top:0;">
    <div class="card" style="flex:1; min-width:260px;">
        <h2 style="color:var(--primary);">🎯 Our Mission</h2>
        <p style="color:#555; line-height:1.7;">
            Our mission is to make English learning accessible, fun, and effective for everyone.
            We provide structured lessons, interactive exercises, and progress tracking — all for free.
        </p>
    </div>
    <div class="card" style="flex:1; min-width:260px;">
        <h2 style="color:var(--primary);">👥 Who Is It For?</h2>
        <ul style="color:#555; line-height:2; padding-left:20px;">
            <li>Children starting school</li>
            <li>Adults with no English background</li>
            <li>Students preparing for basic exams</li>
            <li>Anyone who wants to refresh their basics</li>
        </ul>
    </div>
</div>

<div class="card">
    <h2 style="color:var(--primary);">💡 Tips for Learning English</h2>
    <div style="display:flex; gap:15px; flex-wrap:wrap; margin-top:15px;">
        <div style="flex:1; min-width:200px; background:#e3f2fd; border-radius:10px; padding:18px;">
            <div style="font-size:2em;">🗓️</div>
            <h4 style="margin:8px 0 4px;">Practice Daily</h4>
            <p style="color:#555; font-size:0.9em; margin:0;">Even 15 minutes a day makes a huge difference over time.</p>
        </div>
        <div style="flex:1; min-width:200px; background:#e8f5e9; border-radius:10px; padding:18px;">
            <div style="font-size:2em;">📺</div>
            <h4 style="margin:8px 0 4px;">Watch & Listen</h4>
            <p style="color:#555; font-size:0.9em; margin:0;">Watch English videos or cartoons to improve your listening skills.</p>
        </div>
        <div style="flex:1; min-width:200px; background:#fff3e0; border-radius:10px; padding:18px;">
            <div style="font-size:2em;">📝</div>
            <h4 style="margin:8px 0 4px;">Write Every Day</h4>
            <p style="color:#555; font-size:0.9em; margin:0;">Keep a short diary in English — even simple sentences help a lot.</p>
        </div>
        <div style="flex:1; min-width:200px; background:#fce4ec; border-radius:10px; padding:18px;">
            <div style="font-size:2em;">🗣️</div>
            <h4 style="margin:8px 0 4px;">Speak Out Loud</h4>
            <p style="color:#555; font-size:0.9em; margin:0;">Don't be afraid to speak, even if you make mistakes. Practice makes perfect!</p>
        </div>
    </div>
</div>

<div class="card" style="text-align:center;">
    <h2 style="color:var(--primary);">Ready to start?</h2>
    <p style="color:#666; margin-bottom:20px;">Join thousands of learners today and begin your English journey.</p>
    @guest
        <a href="/register" class="btn" style="font-size:1.1em; padding:14px 40px; margin-right:10px;">Get Started Free</a>
        <a href="/login" class="btn" style="font-size:1.1em; padding:14px 40px; background:#4caf50;">Login</a>
    @else
        <a href="/lessons" class="btn" style="font-size:1.1em; padding:14px 40px;">Go to Lessons</a>
    @endguest
</div>

@endsection
