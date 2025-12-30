@extends('layouts.app')

@section('content')

<h1>Language Tags</h1>

@if($languageTags->isEmpty())
    <p class="text-gray">No language tags yet.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languageTags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a class="button" href="{{ route('language-tags.show', $tag) }}">View</a>
                        @can('update', $tag)
                            <a class="button" href="{{ route('language-tags.edit', $tag) }}">Edit</a>
                        @endcan
                        @can('delete', $tag)
                            <form action="{{ route('language-tags.destroy', $tag) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<div>
    <div>
        <a href="{{ route('home') }}">← Back to Home</a>
        @can('create', App\Models\LanguageTag::class)
            <a href="{{ route('language-tags.create') }}" class="button">Add Language Tag</a>
        @endcan
    </div>
</div>

@endsection
