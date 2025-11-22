@extends('layouts.app')

@section('content')

<h1>Keyboards layouts</h1>

@foreach($keyboards as $keyboard)
<div>
    <h2>{{ $keyboard->name }}</h2>
    <p>{{ $keyboard->description }}</p>
</div>
@endforeach

@endsection