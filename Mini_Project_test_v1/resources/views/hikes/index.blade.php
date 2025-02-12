@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Hike Proposals</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Hike Name</th>
                    <th>User</th>
                    <th>Views</th>
                    <th>Reviews (Views)</th>
                    <th>Suggestions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hikes as $hike)
                <tr>
                    <td>{{ $hike->title }}</td>
                    <td>{{ $hike->user ? $hike->user->name : 'Unknown' }}</td>
                    <td>{{ $hike->views }}</td>
                    <td>
                        @foreach($hike->reviews as $review)
                        <div class="mb-2 p-2 border rounded bg-light">
                            <p class="mb-1"><strong>{{ $review->content }}</strong> ({{ $review->views }} views)</p>
                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                        @endforeach
                    </td>
                    <td>
                        <ul class="list-unstyled">
                            @foreach($hike->reviews as $review)
                                @foreach($review->suggestions as $suggestion)
                                    <li class="p-1 border-bottom">{{ $suggestion->content }}</li>
                                @endforeach
                            @endforeach
                        </ul>
                        @if(!empty($recommended[$hike->id]))
                            <div class="alert alert-info mt-2"><strong>{{ $recommended[$hike->id] }}</strong></div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
