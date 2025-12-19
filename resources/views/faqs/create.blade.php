@extends('layouts.app')

@section('content')
<div>
    <h2>Create FAQ</h2>

    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf

        <div>
            <label for="category">
                Category <span>*</span>
            </label>
            <select name="category" id="category" required>
                <option value="">Select a category</option>
                <option value="beginner" {{ old('category') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="moderate" {{ old('category') == 'moderate' ? 'selected' : '' }}>Moderate</option>
                <option value="expert" {{ old('category') == 'expert' ? 'selected' : '' }}>Expert</option>
            </select>
        </div>

        <div>
            <label for="question">
                Question <span>*</span>
            </label>
            <input
                type="text"
                name="question"
                id="question"
                value="{{ old('question') }}"
                required
                placeholder="Enter question">
        </div>

        <div>
            <label for="answer">
                Answer <span>*</span>
            </label>
            <textarea
                name="answer"
                id="answer"
                rows="10"
                required
                placeholder="Enter answer">{{ old('answer') }}</textarea>
        </div>

        <div>
            <button type="submit">
                Create FAQ
            </button>
            <a href="{{ route('faqs.index') }}">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
