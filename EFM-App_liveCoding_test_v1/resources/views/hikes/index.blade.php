@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($hikes as $hike)
                <div style="border: 1px solid #000000;">
                    <div class="card mb-4 shadow-sm border" style="border: 2px solid #000000;"> <!-- Border for hike card -->
                        <div class="card-header d-flex align-items-center">     
                            <div>
                                <h6 class="mb-0"><strong>{{ $hike->user->name ?? 'Unknown User' }}</strong></h6>
                                <small class="text-muted">{{ $hike->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>{{ $hike->title }}</h5>
                            <p>{{ $hike->description }}</p>
                             

                            <p class="text-muted"><i class="bi bi-eye"></i> {{ $hike->views }} views</p>
                        </div>

                        <div class="card-footer bg-light">
                            <h6 class="mb-2"><i class="bi bi-chat-left-text"></i> Reviews</h6>

                            @foreach ($hike->reviews as $review)
                            <div style="border: 1px solid #ff0000;">
                                <div class="mb-3 p-3 border rounded" > <!-- Border for review -->
                                    <div class="d-flex align-items-center"> 
                                        <div>
                                            <strong>{{ $review->user->name ?? 'Anonymous' }}</strong>
                                            <p class="mb-1">{{ $review->content }}</p>
                                            <small class="text-muted"><i class="bi bi-eye"></i> {{ $review->views }} views</small>
                                        </div>
                                    </div>

                                    <!-- Suggestions -->
                                    @foreach ($review->suggestions as $suggestion)
                                    <div style="border: 1px solid #4000ff;">
                                        <div class="ms-5 mt-2 p-2 bg-light border rounded">
                                            <small class="text-muted"><strong class="text-primary" style="font-size: 0.9em;">{{ $suggestion->user->name ?? 'Anonymous' }}</strong> replied:</small>
                                            <p class="mb-1">{{ $suggestion->content }}</p>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
