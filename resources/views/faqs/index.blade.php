@extends('layouts.app')

@section('content')

<h1>FAQ</h1>
@can('create', App\Models\Faq::class)
    <a href="{{ route('faqs.create') }}" class="button">Add FAQ</a>
@endcan
</div>

@if($faqs->isEmpty())
    <p class="text-gray">No FAQs yet.</p>
@else
    <div>
        @foreach($faqs as $faq)
            <div>
                <h3>
                    <a href="{{ route('faqs.show', $faq) }}">{{ $faq->question }}</a>
                </h3>
                <p class="text-gray">{{ $faq->created_at->format('F j, Y') }}</p>
            </div>
        @endforeach
    </div>
@endif

@endsection
