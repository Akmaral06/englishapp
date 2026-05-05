@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 400px; margin: auto;">
    <h2>Create New Password</h2>
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email" placeholder="Confirm Email" required>
        <input type="password" name="password" placeholder="New Password" required>
        <input type="password" name="password_confirmation" placeholder="Repeat Password" required>
        <button type="submit" class="btn" style="width: 100%; margin-top: 10px;">Update Password</button>
    </form>
</div>
@endsection