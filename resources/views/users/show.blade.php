@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profile-header">
            <h1>{{ $user->user_alias }}'s Profile</h1>

            <div class="profile-info">
                <p><strong>Email:</strong> {{ $user->email }}</p>

                @if($user->birthday)
                    <p><strong>Birthday:</strong> {{ $user->birthday->format('F j, Y') }}</p>
                @else
                    <p><strong>Birthday:</strong> No idea</p>
                @endif
            </div>
        </div>
    </div>
@endsection
