@extends('layouts.app')

@section('content')

<h1>All News</h1>
@can('create', App\Models\Newsitem::class)
    <a href="{{ route('newsitems.create') }}" class="button">Add News Item</a>
@endcan
</div>

@if($newsitems->isEmpty())
    <p class="text-gray">No news items yet.</p>
@else
    <div>
        @foreach($newsitems as $newsitem)
            <div>
                <h3>
                    <a href="{{ route('newsitems.show', $newsitem) }}">{{ $newsitem->title }}</a>
                </h3>
                <p class="text-gray">{{ $newsitem->created_at->format('F j, Y') }}</p>
            </div>
        @endforeach
    </div>
@endif

@endsection
