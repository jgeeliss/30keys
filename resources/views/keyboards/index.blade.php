@extends('layouts.app')

@section('content')

@foreach($keyboards as $keyboard)
<div>
    <h3><a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a><span style="font-size: medium;">&nbsp;&nbsp;&nbsp;by {{ $keyboard->user->user_alias ?? 'Unknown' }}</span></h3>

    @include('keyboards._layout', ['keyboard' => $keyboard])
</div>
@endforeach

@endsection