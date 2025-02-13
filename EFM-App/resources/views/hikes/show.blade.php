@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
<div class="container">
  <h2>Hike Details</h2>
  <p><strong>Title:</strong> {{ $hike->title }}</p>
  <p><strong>Description:</strong> {{ $hike->description }}</p>
  <p><strong>Location:</strong> {{ $hike->location }}</p>
  <p><strong>Views:</strong> {{ $hike->views }}</p>
  <p><strong>Member:</strong> {{ $hike->user->name }}</p>
  <hr>
  <h3>Reviews</h3>
  <ul>
    @foreach($hike->reviews as $review)
      <li>
        {{ $review->content }} (Views: {{ $review->views }})
        <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info btn-sm">Show Review</a>
      </li>
    @endforeach
  </ul>
  <a href="{{ route('hikes.index') }}" class="btn btn-secondary">Back to Hikes</a>
</div>
@endsection
