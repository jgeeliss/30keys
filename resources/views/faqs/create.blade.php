@extends('layouts.app')

@section('content')
<div>
    <h2>Create FAQ</h2>

    <x-faq-form
        :action="route('faqs.store')"
        :categories="$categories"
        submit-text="Create FAQ"
        :cancel-route="route('faqs.index')"
    />
</div>
@endsection
