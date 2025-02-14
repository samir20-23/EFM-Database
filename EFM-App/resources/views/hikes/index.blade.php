@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
<div class="container">
  <h1>Hikes</h1>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Hike Title</th>
        <th>Member</th>
        <th>Hike Views</th>
        <th>Reviews</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($hikes as $hike)
    
        {{-- {{ $colors[$hike->id] ?? '#ffffff' }}; --}}

      <tr>

        <td>{{ $hike->title }}</td>
        <td>{{ $hike->user->name }}</td>
        <td>
          {{ $hike->views }}
          @if($recommended[$hike->id])
            <span class="badge badge-success">{{ $recommended[$hike->id] }}</span>
          @endif
        </td>
        <td>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Review Content</th>
                <th>Review Views</th>
                <th>Suggestions</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($hike->reviews as $review)
              <tr >
                <td style="background-color:{{$colors[$review->id]}};">{{ $review->content }}</td>
                <td style="background-color:{{$colors[$review->id]}};">{{ $review->views }}</td>
                <td style="background-color:{{$colors[$review->id]}};">
                  @foreach($review->suggestions as $suggestion)
                    <span class="badge badge-info">{{ $suggestion->content }}</span>
                  @endforeach
                </td>
                <td style="background-color:{{$colors[$review->id]}};">
                  <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info btn-sm">Show</a>
                  <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this review?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </td>
        <td>
          <a href="{{ route('hikes.show', $hike->id) }}" class="btn btn-info btn-sm">Show</a>
        </td>
      </tr> 
      @endforeach
    </tbody>
  </table>
</div>
@endsection
