@extends('layouts.app')

@section('content')

<div>
    <h1>{{ $faq->question }}</h1>
    <p class="text-gray">Published on {{ $faq->created_at->format('F j, Y') }}</p>

    <div>
        <p>{{ $faq->answer }}</p>
    </div>

    <div>
        <a href="{{ route('faqs.index') }}">← Back to FAQ</a>
        @can('update', $faq)
            <a href="{{ route('faqs.edit', $faq) }}" class="button">Edit</a>
        @endcan
        @can('delete', $faq)
            <form action="{{ route('faqs.destroy', $faq) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
            </form>
        @endcan
    </div>
</div>

@endsection
