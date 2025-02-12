@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="color: black;">Hikes</h2>
            @foreach ($hikes as $hike)
              <div class="card mb-4" style="border: 1px solid black; padding: 10px;">
                <div class="card-body">
                    <p><img src="#" style="border-radius:50px; border:1px solid black ; with:90px;" /> {{ $hike->user ? $hike->user->name : 'Unknown' }}</p>
                    <h3 class="card-title">{{ $hike->title }}</h3>
                    <p class="card-text">{{ $hike->description }}</p>
                    <p style="color:red;"><strong>Views:</strong> {{ $hike->views }}</p>
                    @if (!empty($recommended[$hike->id]))
                        <span class="badge bg-success">{{ $recommended[$hike->id] }}</span>
                    @endif
                    <hr>
                    <div style="border: 1px solid blue; padding: 10px; margin-left: 20px;">
                        <h5 style="color: blue;">Reviews:</h5>
                        @foreach ($hike->reviews as $review)
                            <p><strong>#{{ $review->user ? $review->user->name : 'Anonymous' }}</strong>: {{ $review->content }}</p>
                            <p class="small text-muted">Views: {{ $review->views }}</p>
                            @if ($review->suggestions->count() > 0)
                                <div style="border: 1px solid purple; padding: 10px; margin-left: 40px;">
                                    <h5 style="color: purple;">Suggestions:</h5>
                                    <ul>
                                        @foreach ($review->suggestions as $suggestion)
                                            <li>{{ $suggestion->content }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        
    </div>
@endsection
