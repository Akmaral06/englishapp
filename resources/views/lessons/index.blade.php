@extends('layouts.app')

@section('content')
<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:10px;">
        <h2 style="margin:0;">{{ __('app.lessons_title') }}</h2>
        @role('teacher')
            <a href="/lessons/create" class="btn" style="background:#4caf50;">{{ __('app.lessons_add') }}</a>
        @endrole
    </div>

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f8f9fa; border-bottom:2px solid #dee2e6; text-align:left;">
                <th style="padding:12px;">{{ __('app.lessons_col_title') }}</th>
                <th style="padding:12px;">{{ __('app.lessons_col_author') }}</th>
                <th style="padding:12px;">{{ __('app.lessons_col_status') }}</th>
                <th style="padding:12px; text-align:right;">{{ __('app.lessons_col_actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lessons as $lesson)
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:12px;">
                    <a href="/lessons/{{ $lesson->id }}" style="font-weight:bold; color:#1565c0; text-decoration:none;">
                        {{ $lesson->title }}
                    </a>
                </td>
                <td style="padding:12px;">{{ $lesson->user->name ?? 'System' }}</td>
                <td style="padding:12px;">
                    <span style="font-size:11px; padding:4px 8px; border-radius:12px; color:white; background:{{ $lesson->status == 'approved' ? '#28a745' : ($lesson->status == 'rejected' ? '#dc3545' : '#ffc107') }}">
                        {{ strtoupper($lesson->status) }}
                    </span>
                </td>
                <td style="padding:12px; text-align:right;">
                    @role('reviewer')
                        @if($lesson->status == 'pending')
                            <a href="/lessons/{{ $lesson->id }}/approve" class="btn" style="padding:5px 10px; font-size:11px; background:#28a745;">{{ __('app.lessons_approve') }}</a>
                            <a href="/lessons/{{ $lesson->id }}/reject" class="btn" style="padding:5px 10px; font-size:11px; background:#ffc107; color:black;">{{ __('app.lessons_reject') }}</a>
                        @endif
                    @endrole

                    @if(Auth::id() == $lesson->user_id)
                        <a href="/lessons/{{ $lesson->id }}/edit" class="btn" style="padding:5px 10px; font-size:11px; background:#007bff;">{{ __('app.lessons_edit') }}</a>
                    @endif

                    @if(Auth::id() == $lesson->user_id || Auth::user()->hasRole('admin'))
                        <form action="/lessons/{{ $lesson->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this lesson?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn" style="padding:5px 10px; font-size:11px; background:#dc3545;">{{ __('app.lessons_delete') }}</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
