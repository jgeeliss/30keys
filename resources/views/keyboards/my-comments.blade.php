@extends('layouts.app')

@section('content')

<h1>My Comments</h1>

@if($comments->isEmpty())
    <p>You haven't posted any comments yet. <a href="{{ route('keyboards.index') }}">Browse keyboard layouts</a> to share your thoughts!</p>
@else
    @foreach($comments as $comment)
        <div style="margin: 20px 0; padding: 20px; background-color: var(--accent-bg); border-radius: 5px;">
            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 10px;">
                <div>
                    <h3 style="margin: 0 0 5px 0;">
                        <a href="{{ route('keyboards.show', $comment->keyboard) }}">{{ $comment->keyboard->name }}</a>
                    </h3>
                    <small style="color: var(--text-light);">by {{ $comment->keyboard->user->user_alias ?? 'Unknown' }}</small>
                </div>
                <small style="color: var(--text-light);">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
            <p style="margin: 10px 0 0 0; padding-top: 10px; border-top: 1px solid var(--border);">{{ $comment->comment }}</p>
        </div>
    @endforeach
@endif

@endsection
