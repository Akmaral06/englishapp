@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Moderation Queue</h2>
    <p>Below are the lessons submitted by teachers that need approval.</p>
    
    <div style="background: #fff9c4; padding: 15px; border-left: 5px solid #fbc02d; margin-top: 20px;">
        <h4>Pending: "Irregular Verbs Part 1"</h4>
        <p>Submitted by: Teacher_Ali</p>
        <button class="btn" style="background: #4caf50;">Approve</button>
        <button class="btn" style="background: #f44336;">Reject</button>
    </div>
</div>
@endsection