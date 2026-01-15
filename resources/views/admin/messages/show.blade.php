@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>View Message</h1>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">Back to Inbox</a>
    </div>

    <div class="card">
        <div style="margin-bottom: 20px;">
            <strong>From:</strong> {{ $message->name }} ({{ $message->email }})
        </div>
        <div style="margin-bottom: 20px;">
            <strong>Subject:</strong> {{ $message->subject }}
        </div>
        <div style="margin-bottom: 20px;">
            <strong>Date:</strong> {{ $message->created_at->format('M d, Y H:i') }}
        </div>
        <hr style="margin-bottom: 20px;">
        <div style="white-space: pre-wrap;">
            {{ $message->message }}
        </div>
    </div>
@endsection
