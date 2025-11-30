@extends('layouts.app')

@section('content')
    <h1>
        Welcome to the Keyboard Layout Lounge Home Page!
    </h1>

    @if($topKeyboards->isNotEmpty())
        <section style="margin-top: 30px;">
            <h2>Top Rated Layouts</h2>
            @foreach($topKeyboards as $keyboard)
                <div style="margin-bottom: 20px;">
                    <h3>
                        <a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a>
                        <span style="font-size: medium;">&nbsp;&nbsp;&nbsp;by {{ $keyboard->user->user_alias ?? 'Unknown' }}</span>
                        @if($keyboard->totalRatings() > 0)
                            <span style="font-size: medium; color: #666;">&nbsp;&nbsp;&nbsp;★ {{ number_format($keyboard->averageRating(), 1) }} ({{ $keyboard->totalRatings() }} {{ $keyboard->totalRatings() === 1 ? 'rating' : 'ratings' }})</span>
                        @endif
                        <span style="font-size: medium; color: #999;">&nbsp;&nbsp;&nbsp;{{ $keyboard->created_at->diffForHumans() }}</span>
                    </h3>
                    @include('keyboards._layout', ['keyboard' => $keyboard])
                </div>
            @endforeach
        </section>
    @endif

    @if($latestKeyboards->isNotEmpty())
        <section style="margin-top: 30px;">
            <h2>Latest Layouts</h2>
            @foreach($latestKeyboards as $keyboard)
                <div style="margin-bottom: 20px;">
                    <h3>
                        <a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a>
                        <span style="font-size: medium;">&nbsp;&nbsp;&nbsp;by {{ $keyboard->user->user_alias ?? 'Unknown' }}</span>
                        @if($keyboard->totalRatings() > 0)
                            <span style="font-size: medium; color: #666;">&nbsp;&nbsp;&nbsp;★ {{ number_format($keyboard->averageRating(), 1) }} ({{ $keyboard->totalRatings() }} {{ $keyboard->totalRatings() === 1 ? 'rating' : 'ratings' }})</span>
                        @endif
                        <span style="font-size: medium; color: #999;">&nbsp;&nbsp;&nbsp;{{ $keyboard->created_at->diffForHumans() }}</span>
                    </h3>
                    @include('keyboards._layout', ['keyboard' => $keyboard])
                </div>
            @endforeach
        </section>
    @endif
@endsection