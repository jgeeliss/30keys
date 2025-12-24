@extends('layouts.app')

@section('content')
<div>
    <h2>Edit FAQ</h2>

    <x-faq-form
        :action="route('faqs.update', $faq)"
        method="PUT"
        :faq="$faq"
        :categories="$categories"
        submit-text="Update FAQ"
        :cancel-route="route('faqs.show', $faq)"
    />
</div>
@endsection
