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
    @foreach(['beginner', 'moderate', 'expert'] as $category)
        @if($faqs->has($category))
            <div>
                <h2>{{ $category }}</h2>
                <div>
                    @foreach($faqs[$category] as $faq)
                        <div>
                            <h3>
                                <a href="{{ route('faqs.show', $faq) }}">{{ $faq->question }}</a>
                            </h3>
                            <p class="text-gray">{{ $faq->created_at->format('F j, Y') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endif

@endsection
