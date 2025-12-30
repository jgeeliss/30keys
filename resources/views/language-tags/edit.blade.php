@extends('layouts.app')

@section('content')
<div>
    <h2>Edit Language Tag</h2>

    <x-language-tag-form
        :action="route('language-tags.update', $languageTag)"
        method="PUT"
        :language-tag="$languageTag"
        submit-text="Update Language Tag"
        :cancel-route="route('language-tags.index')"
    />
</div>
@endsection
