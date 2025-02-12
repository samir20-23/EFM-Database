{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Suggestions</h2>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            @foreach($suggestions as $suggestion)
            <div>
                <input type="checkbox" name="suggestions[]" value="{{ $suggestion->id }}"
                {{ $review->suggestions->contains($suggestion->id) ? 'checked' : '' }}>
                {{ $suggestion->content }}
            </div>
            @endforeach
        </div>
        <button type="submit">Save</button>
    </form>
</div>
@endsection --}}
