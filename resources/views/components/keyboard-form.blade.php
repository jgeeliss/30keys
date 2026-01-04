<!-- source: https://laravel.com/docs/12.x/blade#anonymous-components -->
@props([
    'action', // form submission URL, store if creating, update if editing
    'method' => 'POST', // HTTP method for the form, POST for create, PUT for update
    'keyboard' => null, // Keyboard model instance, empty for create, populated for edit
    'languageTags' => [], // Collection of all available language tags
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
            Keyboard Name *
        </label>
        <input type="text" name="name" id="name" value="{{ old('name', $keyboard?->name) }}" required placeholder="Enter keyboard name">
    </div>

    <div>
        <label for="description">
            Description
        </label>
        <textarea name="description" id="description" rows="5" placeholder="Enter keyboard description">{{ old('description', $keyboard?->description) }}</textarea>
    </div>

    <div>
        <label for="language_tags">
            Language Tags (Optional)
        </label>
        <p class="text-small text-gray">Select the languages this keyboard layout supports</p>
        @php
            $selectedTags = old('language_tags', isset($keyboard) ? $keyboard->languageTags->pluck('id')->toArray() : []);
        @endphp
        @foreach($languageTags as $tag)
            <label style="display: inline-block; margin-right: 1rem;">
                <input type="checkbox" name="language_tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                {{ $tag->name }}
            </label>
        @endforeach
    </div>

    <div>
        <label>Keyboard Layout</label>
        @if ($errors->has('layout'))
            <li class="error-message">
                {{ $errors->first('layout') }}
            </li>
        @endif
        @php
        $qwertyLayout = [
            ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
            ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', ';'],
            ['Z', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '/']
        ];
        $defaultLayout = isset($keyboard) ? $keyboard->layout : $qwertyLayout;
        $currentLayout = old('layout', $defaultLayout);
        @endphp
        @foreach($currentLayout as $rowIndex => $row)
        <div class="keyboard-row" style="padding-left: {{ $rowIndex * 20 }}px; padding-right: {{ (3-$rowIndex) * 20 }}px;">
            @foreach($row as $colIndex => $currentKey)
            <select name="layout[{{ $rowIndex }}][{{ $colIndex }}]" class="keyboard-key{{ $colIndex == 5 ? ' keyboard-key-spacer' : '' }}">
                @foreach(array_merge(range('A', 'Z'), ['.', ',', '/', ';', '\'']) as $letter)
                <option value="{{ $letter }}" {{ $currentKey == $letter ? 'selected' : '' }}>{{ $letter }}</option>
                @endforeach
            </select>
            @endforeach
        </div>
        @endforeach
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
