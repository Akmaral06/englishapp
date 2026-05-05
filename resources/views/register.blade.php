@extends('layouts.app')
@section('content')
<div class="card" style="max-width:450px; margin:auto;">
    <h2 style="text-align:center;">{{ __('app.reg_title') }}</h2>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="login" placeholder="{{ __('app.reg_username') }}" required>
        <input type="email" name="email" placeholder="{{ __('app.reg_email') }}" required>
        <input type="password" name="password" placeholder="{{ __('app.reg_password') }}" required>
        <select name="role" required>
            <option value="" disabled selected>{{ __('app.reg_role') }}...</option>
            <option value="student">{{ __('app.reg_student') }}</option>
            <option value="teacher">{{ __('app.reg_teacher') }}</option>
        </select>
        <button type="submit" class="btn" style="width:100%; margin-top:5px;">{{ __('app.reg_submit') }}</button>
    </form>
    <p style="text-align:center; margin-top:15px;">
        {{ __('app.reg_have_acc') }} <a href="/login">{{ __('app.reg_login_link') }}</a>
    </p>
</div>
@endsection
