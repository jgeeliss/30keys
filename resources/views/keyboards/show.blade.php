@extends('layouts.app')

@section('content')

<h2>{{ $keyboard->name }}</h2>
<p><small>by {{ $keyboard->user->user_alias ?? 'Unknown' }}</small></p>
@if($keyboard->description)
<p>{{ $keyboard->description }}</p>
@endif
@include('keyboards._layout', ['keyboard' => $keyboard])

@endsection