@extends('layouts.app')
@section('content')

<div style="display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center; padding:50px 0; gap:20px;">
    <h1 style="font-size:3em; color:var(--primary); margin:0;">{{ __('app.home_title') }}</h1>
    <p style="font-size:1.2em; color:#666; margin:0; max-width:600px;">{{ __('app.home_subtitle') }}</p>

    <div style="display:flex; gap:15px; flex-wrap:wrap; justify-content:center; margin-top:10px;">
        @guest
            <a href="/register" class="btn" style="padding:15px 40px; font-size:1.1em; text-decoration:none;">{{ __('app.home_cta') }}</a>
            <a href="/login" class="btn" style="padding:15px 40px; font-size:1.1em; text-decoration:none; background:#4caf50;">{{ __('app.nav_login') }}</a>
        @else
            <a href="/profile" class="btn" style="padding:15px 40px; font-size:1.1em; text-decoration:none;">{{ __('app.home_dashboard') }}</a>
            <a href="/charts" class="btn" style="padding:15px 40px; font-size:1.1em; text-decoration:none; background:#6c757d;">📊 Charts</a>
        @endguest
    </div>

    <div style="display:flex; gap:10px; margin-top:10px;">
        <button id="btnShowAd" class="btn" style="background:#fbc02d; color:#000; font-size:0.9em;">{{ __('app.ad_show') }}</button>
        <button id="btnSlideAd" class="btn" style="background:#6c757d; font-size:0.9em;">Slide Toggle</button>
        <button id="btnAnimAd" class="btn" style="background:#9c27b0; font-size:0.9em;">Animate</button>
        <button id="btnStopAd" class="btn" style="background:#dc3545; font-size:0.9em;">Stop</button>
    </div>

    <div id="ad" style="margin-top:20px; padding:25px 40px; background:#fff9c4; border:2px dashed #fbc02d; border-radius:12px; display:none; max-width:500px; width:100%;">
        <h3 style="margin:0 0 10px; color:#e65100;">{{ __('app.ad_title') }}</h3>
        <p style="color:#555; margin:0 0 15px;">{{ __('app.ad_text') }}</p>
        <div style="display:flex; gap:10px; justify-content:center; flex-wrap:wrap;">
            <button id="hideAd" class="btn" style="background:#fbc02d; color:black;">{{ __('app.ad_close') }}</button>
            <button id="fadeToAd" class="btn" style="background:#ff9800; color:white;">Fade to 30%</button>
            <button id="fadeFullAd" class="btn" style="background:#4caf50;">Fade to 100%</button>
        </div>
    </div>
</div>

<div style="display:flex; gap:20px; flex-wrap:wrap; justify-content:center; margin-top:20px;">
    <a href="/lessons/alphabet" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">🔤</div>
            <h3 style="color:var(--primary);">{{ __('app.cat_alphabet') }}</h3>
            <p style="color:#666; font-size:0.9em;">{{ __('app.cat_alphabet_d') }}</p>
        </div>
    </a>
    <a href="/lessons/grammar" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">📖</div>
            <h3 style="color:#4caf50;">{{ __('app.cat_grammar') }}</h3>
            <p style="color:#666; font-size:0.9em;">{{ __('app.cat_grammar_d') }}</p>
        </div>
    </a>
    <a href="/lessons/vocabulary" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">🗂️</div>
            <h3 style="color:#ff9800;">{{ __('app.cat_vocab') }}</h3>
            <p style="color:#666; font-size:0.9em;">{{ __('app.cat_vocab_d') }}</p>
        </div>
    </a>
    <a href="/lessons/phrases" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">💬</div>
            <h3 style="color:#9c27b0;">{{ __('app.cat_phrases') }}</h3>
            <p style="color:#666; font-size:0.9em;">{{ __('app.cat_phrases_d') }}</p>
        </div>
    </a>
    <a href="/exercises" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">🎯</div>
            <h3 style="color:#dc3545;">{{ __('app.ex_title') }}</h3>
            <p style="color:#666; font-size:0.9em;">{{ __('app.ex_sub') }}</p>
        </div>
    </a>
    <a href="/progress" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">📊</div>
            <h3 style="color:#1565c0;">{{ __('app.progress_title') }}</h3>
            <p style="color:#666; font-size:0.9em;">Track your learning journey with detailed statistics.</p>
        </div>
    </a>
</div>

<script>
$(document).ready(function(){

    setTimeout(function(){
        $("#ad").fadeIn(1000);
    }, 2000);

    $("#hideAd").click(function(){
        $("#ad").hide(300);
    });

    $("#btnShowAd").click(function(){
        $("#ad").show(400);
    });

    $("#btnSlideAd").click(function(){
        if($("#ad").is(":visible")){
            $("#ad").slideUp(600);
        } else {
            $("#ad").slideDown(600);
        }
    });

    $("#fadeToAd").click(function(){
        $("#ad").fadeTo(800, 0.3);
    });

    $("#fadeFullAd").click(function(){
        $("#ad").fadeTo(800, 1.0);
    });

    $("#btnAnimAd").click(function(){
        $("#ad").stop(true).animate({
            paddingTop: "40px",
            paddingBottom: "40px",
            opacity: 0.85
        }, 700).animate({
            paddingTop: "25px",
            paddingBottom: "25px",
            opacity: 1
        }, 700);
    });

    $("#btnStopAd").click(function(){
        $("#ad").stop(true, true);
    });

});
</script>

@endsection
