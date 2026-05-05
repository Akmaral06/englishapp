@extends('layouts.app')
@section('content')
<div class="card" style="max-width: 500px; margin: auto;">
    <h2 style="text-align:center;">{{ __('app.email_title') }}</h2>

    <form action="/send-email" method="POST">
        @csrf
        <label>{{ __('app.email_receiver') }}</label>
        <input type="text" name="receiver" placeholder="{{ __('app.email_receiver') }}" required>

        <label>{{ __('app.email_address') }}</label>
        <input type="email" name="address" placeholder="example@mail.com" required>

        <button type="submit" class="btn" style="width:100%; margin-top:10px;">
            {{ __('app.email_submit') }}
        </button>
    </form>
</div>
@endsection
