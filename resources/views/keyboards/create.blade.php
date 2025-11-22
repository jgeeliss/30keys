@extends('layouts.app')

@section('content')
<div>
    <h1>Add New Keyboard</h1>

    <form action="{{ route('keyboards.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">
                Keyboard Name <span>*</span>
            </label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                required
                placeholder="Enter keyboard name">
        </div>

        <div>
            <label for="description">
                Description
            </label>
            <textarea
                name="description"
                id="description"
                rows="5"
                placeholder="Enter keyboard description">{{ old('description') }}</textarea>
        </div>

        <div>
            <button
                type="submit">
                Create Keyboard
            </button>
            <a
                href="{{ route('keyboards.index') }}">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection