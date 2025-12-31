@extends('layouts.app')

@section('content')
<div>
    <h2>Create Keyboard Layout</h2>

    <x-keyboard-form
        :action="route('keyboards.store')"
        :language-tags="$languageTags"
        submit-text="Create Keyboard"
        :cancel-route="route('keyboards.index')"
    />
</div>
@endsection