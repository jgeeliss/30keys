@extends('layouts.app')

@section('content')

<div>
    <h1>{{ $newsitem->title }}</h1>
    <p class="text-gray">Published on {{ $newsitem->created_at->format('F j, Y') }}</p>

    @if($newsitem->image)
        <div>
            <img src="{{ asset('storage/' . $newsitem->image) }}" alt="{{ $newsitem->title }}" style="max-width: 50%; height: auto;">
        </div>
    @endif

    <div>
        <p>{{ $newsitem->body }}</p>
    </div>

    <div>
        <a href="{{ route('newsitems.index') }}">← Back to News</a>
        @can('update', $newsitem)
            <a href="{{ route('newsitems.edit', $newsitem) }}" class="button">Edit</a>
        @endcan
        @can('delete', $newsitem)
            <form action="{{ route('newsitems.destroy', $newsitem) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this news item?')">Delete</button>
            </form>
        @endcan
    </div>
</div>

@endsection
