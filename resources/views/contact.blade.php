@extends('layouts.app')
@section('content')

<div class="card">
    <h1 style="color:var(--primary);">{{ __('app.contact_title') }}</h1>
    <p style="color:#666;">{{ __('app.contact_sub') }}</p>
</div>

<div style="display:flex; gap:20px; flex-wrap:wrap;">
    <div class="card" style="flex:2; min-width:280px;">
        <h2 style="color:var(--primary); margin-bottom:20px;">{{ __('app.contact_form_h') }}</h2>

        @if(session('contact_success'))
            <div class="alert" style="background:#d4edda; color:#155724;">
                {{ __('app.contact_ok') }}
            </div>
        @endif

        <form method="POST" action="/contact">
            @csrf
            <label style="font-weight:600;">{{ __('app.contact_name') }}</label>
            <input type="text" name="name" placeholder="{{ __('app.contact_name') }}" required
                   value="{{ old('name', Auth::check() ? Auth::user()->name : '') }}">

            <label style="font-weight:600;">{{ __('app.contact_email') }}</label>
            <input type="email" name="email" placeholder="{{ __('app.contact_email') }}" required
                   value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}">

            <label style="font-weight:600;">{{ __('app.contact_msg') }}</label>
            <textarea name="message" rows="5" placeholder="{{ __('app.contact_msg') }}..." required
                      style="resize:vertical;">{{ old('message') }}</textarea>

            <button type="submit" class="btn" style="margin-top:10px; font-size:1em; padding:12px 30px;">
                📨 {{ __('app.contact_send') }}
            </button>
        </form>
    </div>

    <div style="flex:1; min-width:220px; display:flex; flex-direction:column; gap:15px;">
        <div class="card" style="background:#e3f2fd;">
            <div style="font-size:2em; margin-bottom:8px;">📧</div>
            <h3 style="margin:0 0 5px;">Email</h3>
            <p style="color:#555; margin:0;">support@englishapp.com</p>
        </div>
        <div class="card" style="background:#e8f5e9;">
            <div style="font-size:2em; margin-bottom:8px;">⏰</div>
            <h3 style="margin:0 0 5px;">Working Hours</h3>
            <p style="color:#555; margin:0;">Mon–Fri: 9:00 – 18:00<br>Weekend: 10:00 – 14:00</p>
        </div>
        <div class="card" style="background:#fff3e0;">
            <div style="font-size:2em; margin-bottom:8px;">❓</div>
            <h3 style="margin:0 0 5px;">Quick Help</h3>
            <p style="color:#555; margin:0;">Check our <a href="/faq" style="color:var(--primary);">FAQ page</a> for instant answers.</p>
        </div>
    </div>
</div>

@endsection
