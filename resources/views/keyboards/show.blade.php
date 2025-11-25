@extends('layouts.app')

@section('content')

<h1>{{ $keyboard->name }}</h1>
@if($keyboard->description)
<p>{{ $keyboard->description }}</p>
@endif
@include('keyboards._layout', ['keyboard' => $keyboard])

@endsection