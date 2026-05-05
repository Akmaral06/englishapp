@extends('layouts.app')
@section('content')
<div class="card" style="max-width:400px; margin:auto;">
    <h2 style="text-align:center;">{{ __('app.login_title') }}</h2>

    @if(session('message'))
        <div class="alert" style="background:#f8d7da; color:#721c24; border-radius:8px; padding:12px; margin-bottom:15px;">
            ❌ {{ session('message') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <input type="text" name="username" placeholder="{{ __('app.login_username') }}" required>
        <input type="password" name="password" placeholder="{{ __('app.login_password') }}" required>
        <button type="submit" class="btn" style="width:100%; margin-top:5px;">{{ __('app.login_submit') }}</button>
    </form>
    <p style="text-align:center; margin-top:15px;">
        {{ __('app.login_no_acc') }} <a href="/register">{{ __('app.login_create') }}</a>
    </p>
    <p style="text-align:center;">
        <a href="{{ route('password.request') }}">{{ __('app.login_forgot') }}</a>
    </p>
</div>
@endsection
