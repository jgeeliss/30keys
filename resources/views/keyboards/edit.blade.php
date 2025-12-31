@extends('layouts.app')

@section('content')
<div>
    <h2>Edit Keyboard Layout</h2>

    <x-keyboard-form
        :action="route('keyboards.update', $keyboard)"
        method="PUT"
        :keyboard="$keyboard"
        :language-tags="$languageTags"
        submit-text="Update Keyboard"
        :cancel-route="route('keyboards.show', $keyboard)"
    />
</div>
@endsection
