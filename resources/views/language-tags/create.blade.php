@extends('layouts.app')

@section('content')
<div>
    <h2>Create Language Tag</h2>

    <x-language-tag-form
        :action="route('language-tags.store')"
        submit-text="Create Language Tag"
        :cancel-route="route('language-tags.index')"
    />
</div>
@endsection
