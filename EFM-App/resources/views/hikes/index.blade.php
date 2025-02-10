@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach ($hikes as $hike)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($hike->user->name ?? 'Unknown') }}&background=random&color=fff&size=50"
                                class="rounded-circle me-2" width="50" height="50" alt="User">
                            <div>
                                <h6 class="mb-0"><strong>{{ $hike->user->name ?? 'Unknown User' }}</strong></h6>
                                <small class="text-muted">{{ $hike->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>{{ $hike->title }}</h5>
                            <p>{{ $hike->description }}</p>
                            @if ($hike->img_path)
                                <img src="{{ asset($hike->img_path) }}" class="img-fluid rounded mb-3"
                                    alt="{{ $hike->title }}">
                            @endif

                            <p class="text-muted"><i class="bi bi-eye"></i> {{ $hike->views }} views</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-hand-thumbs-up"></i>
                                    Like</button>
                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="collapse"
                                    data-bs-target="#comments-{{ $hike->id }}">
                                    <i class="bi bi-chat"></i> Comment
                                </button>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <div class="collapse mt-2" id="comments-{{ $hike->id }}">
                                <h6 class="mb-2"><i class="bi bi-chat-left-text"></i> Comments</h6>

                                @foreach ($hike->reviews as $review)
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($review->user->name ?? 'User') }}&background=random&color=fff&size=40"
                                                class="rounded-circle me-2" width="40" height="40" alt="User">
                                            <div>
                                                <strong>{{ $review->user->name ?? 'Anonymous' }}</strong>
                                                <p class="mb-1">{{ $review->content }}</p>
                                                <small class="text-muted"><i class="bi bi-eye"></i> {{ $review->views }}
                                                    views</small>
                                            </div>
                                        </div>
                                        @foreach ($review->suggestions as $suggestion)
                                            <div class="ms-5 mt-2 p-2 bg-light border rounded">
                                                <small
                                                    class="text-muted"><strong>{{ $suggestion->user->name ?? 'Anonymous' }}</strong>
                                                    replied:</small>
                                                <p class="mb-1">{{ $suggestion->content }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                                <div class="d-flex align-items-center mt-3">
                                    <input type="text" class="form-control" placeholder="Write a comment...">
                                    <button class="btn btn-primary ms-2"><i class="bi bi-send"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
