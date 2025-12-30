@extends('layouts.app')

@section('content')

<h1>{{ $languageTag->name }}</h1>

<p class="text-gray">Keyboards using this language tag</p>

@if($keyboards->isEmpty())
    <p class="text-muted">No keyboards are tagged with this language yet.</p>
@else
    <div class="keyboards-grid">
        @foreach($keyboards as $keyboard)
            <div class="card">
                <h3><a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a></h3>
                <p class="text-small">
                    by 
                    @if($keyboard->user)
                        <a href="{{ route('users.show', $keyboard->user) }}">{{ $keyboard->user->user_alias }}</a>
                    @else
                        Unknown
                    @endif
                </p>
                @if($keyboard->description)
                    <p class="text-small">{{ Str::limit($keyboard->description, 100) }}</p>
                @endif
                @php
                    $avgRating = $keyboard->averageRating();
                    $totalRatings = $keyboard->totalRatings();
                @endphp
                @if($avgRating)
                    <p class="text-small text-gray">★ {{ number_format($avgRating, 1) }} ({{ $totalRatings }} {{ $totalRatings == 1 ? 'rating' : 'ratings' }})</p>
                @endif
            </div>
        @endforeach
    </div>
@endif

<div style="margin-top: 2rem;">
    <a href="{{ route('language-tags.index') }}">← Back to Language Tags</a>
</div>

@endsection
