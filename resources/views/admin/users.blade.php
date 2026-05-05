@extends('layouts.app')

@section('content')
<div class="card">
    <div style="display:flex; justify-content: space-between; align-items:center; margin-bottom: 20px;">
        <h2>User Management</h2>
        <span style="background: #eee; padding: 5px 15px; border-radius: 20px; font-size: 14px;">
            Total Users: {{ $users->count() }}
        </span>
    </div>

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f8f9fa; border-bottom: 2px solid #dee2e6;">
                <th style="padding:12px;">Name</th>
                <th style="padding:12px;">Email</th>
                <th style="padding:12px;">Role</th>
                <th style="padding:12px; text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td style="padding:12px;">{{ $user->name }}</td>
                <td style="padding:12px;">{{ $user->email }}</td>
                <td style="padding:12px;">
                    <span style="background: #e3f2fd; color: #0d47a1; padding: 3px 10px; border-radius: 5px; font-size: 12px; font-weight: bold;">
                        {{ strtoupper($user->roles->pluck('name')->implode(', ')) }}
                    </span>
                </td>
                <td style="padding:12px; text-align:right;">
                    @if($user->id !== Auth::id())
                        <form action="/admin/users/{{ $user->id }}" method="POST" onsubmit="return confirm('Permanently delete this user?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background:#dc3545; padding:6px 15px; font-size:12px;">Delete User</button>
                        </form>
                    @else
                        <span style="color:#999; font-size:12px; font-style: italic;">Your Account</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection