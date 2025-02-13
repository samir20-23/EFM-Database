@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-primary text-center">Edit Suggestions for Review</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title text-success">{{ $review->content }}</h3>
            <p class="text-muted">By <strong>{{ $review->user->name }}</strong></p>

            @if($suggestions->count() > 0)
            <form action="{{ route('suggestions.updateMultiple') }}" method="POST">
                @csrf
                @method('PUT')

                @foreach ($suggestions as $suggestion)
                <div class="mb-3">
                    <label class="form-label">Suggestion by {{ $suggestion->user->name }}</label>
                    <input type="hidden" name="suggestions[{{ $suggestion->id }}][id]" value="{{ $suggestion->id }}">
                    <textarea class="form-control" name="suggestions[{{ $suggestion->id }}][content]" rows="2">{{ $suggestion->content }}</textarea>
                </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
            @else
            <p class="text-muted">No suggestions found for this review.</p>
            @endif
        </div>
    </div>
</div>
@endsection