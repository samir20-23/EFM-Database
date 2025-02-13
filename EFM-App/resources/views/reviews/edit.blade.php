@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
<div class="container">
  <h2>Edit Review Suggestions</h2>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <form action="{{ route('reviews.update', $review->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="suggestions">Select Suggestions</label>
      <select name="suggestions[]" id="suggestions" multiple class="form-control">
        @foreach($allSuggestions as $suggestion)
          <option value="{{ $suggestion->id }}"
            {{ in_array($suggestion->id, $review->suggestions->pluck('id')->toArray()) ? 'selected' : '' }}>
            {{ $suggestion->content }}
          </option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Update Suggestions</button>
  </form>
</div>
@endsection
