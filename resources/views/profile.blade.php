@extends('layouts.app')

@section('content')
<div class="card">
    <div style="display:flex; align-items:center; gap:20px; flex-wrap:wrap;">
        {{-- Avatar --}}
        <div style="flex-shrink:0;">
            @if(Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                     alt="avatar"
                     style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid var(--primary);">
            @else
                <div style="width:80px;height:80px;border-radius:50%;background:#1565c0;display:flex;align-items:center;justify-content:center;color:white;font-size:2em;font-weight:bold;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            @endif
        </div>
        <div>
            <h1 style="margin:0;">{{ __('app.profile_title') }}: {{ Auth::user()->name }}</h1>
            <p style="margin:5px 0;">{{ __('app.profile_role') }}: <strong style="color:#1565c0;">{{ strtoupper(Auth::user()->roles->first()->name ?? 'No Role') }}</strong></p>
        </div>
    </div>
    <hr style="margin:20px 0;">

    <div>
        <h3>{{ __('app.profile_actions') }}</h3>
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;">
            <a href="/lessons" class="btn" style="background:#6c757d;">{{ __('app.profile_view_lessons') }}</a>
            <a href="/charts" class="btn" style="background:#17a2b8;">📊 Charts</a>

            @role('teacher')
                <a href="/lessons/create" class="btn" style="background:#4caf50;">{{ __('app.profile_add_lesson') }}</a>
            @endrole

            @role('admin')
                <a href="/admin/users" class="btn" style="background:#d32f2f;">{{ __('app.profile_manage_users') }}</a>
            @endrole

            @role('student')
                <a href="/progress" class="btn" style="background:#1565c0;">{{ __('app.profile_progress') }}</a>
            @endrole

            <a href="/send-email" class="btn" style="background:#9c27b0;">{{ __('app.profile_email_btn') }}</a>
            <button id="toggleUpload" class="btn" style="background:#ff9800;">{{ __('app.profile_upload_btn') }}</button>
        </div>
    </div>

    <div id="uploadForm" style="display:none; margin-top:20px; padding:20px; background:#f8f9fa; border-radius:8px;">
        <h4>{{ __('app.profile_upload_title') }}</h4>
        <form action="/profile/upload-avatar" method="POST" enctype="multipart/form-data">
            @csrf
            <label style="font-weight:500;">{{ __('app.profile_upload_label') }}</label>
            <input type="file" name="avatar" accept="image/*" required style="margin:10px 0;">
            <button type="submit" class="btn">{{ __('app.profile_upload_submit') }}</button>
        </form>
    </div>
</div>

@role('student')
<div class="card" style="margin-top:20px;">
    <h3>{{ __('app.profile_activity') }}</h3>
    <canvas id="myChart" style="max-height:200px;"></canvas>
</div>
@endrole

<script>
$(document).ready(function(){
    $("#toggleUpload").click(function(){
        $("#uploadForm").slideToggle(400);
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    if(ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Study Minutes',
                    data: [30, 45, 15, 90, 40, 120, 60],
                    borderColor: '#1565c0',
                    tension: 0.4,
                    fill: true,
                    backgroundColor: 'rgba(21,101,192,0.1)'
                }]
            }
        });
    }
</script>
@endsection
