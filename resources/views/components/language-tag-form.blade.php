<!-- source: https://laravel.com/docs/12.x/blade#anonymous-components -->
@props([
    'action', // form submission URL, store if creating, update if editing
    'method' => 'POST', // HTTP method for the form, POST for create, PUT for update
    'languageTag' => null, // Language Tag model instance, empty for create, populated for edit
    'submitText' => 'Submit', // text for the submit button
    'cancelRoute' // URL for the cancel button
])

<form action="{{ $action }}" method="POST">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="name">
            Name *
        </label>
        <input type="text" name="name" id="name" value="{{ old('name', $languageTag?->name) }}" required placeholder="Enter language tag name">
    </div>

    <div>
        <button type="submit">
            {{ $submitText }}
        </button>
        <a href="{{ $cancelRoute }}">
            Cancel
        </a>
    </div>
</form>
