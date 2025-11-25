@extends('layouts.app')

@section('content')

@foreach($keyboards as $keyboard)
<div>
    <h3><a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a></h3>

    @include('keyboards._layout', ['keyboard' => $keyboard])
</div>
@endforeach

@endsection