@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
<div class="container">
  <h2>Review Details</h2>
  <p><strong>Content:</strong> {{ $review->content }}</p>
  <p><strong>Views:</strong> {{ $review->views }}</p>
  <p><strong>Suggestions:</strong></p>
  <ul>
    @foreach($review->suggestions as $suggestion)
      <li>{{ $suggestion->content }}</li>
    @endforeach
  </ul>
  <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning">Edit Suggestions</a>
  <a href="{{ route('hikes.index') }}" class="btn btn-secondary">Back to Hikes</a>
</div>
@endsection
