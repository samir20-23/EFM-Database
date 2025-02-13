@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-primary text-center">Hiking Proposals</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Views</th>
                    <th>Reviews</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hikes as $index => $hike)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $hike->title }}</td>
                    <td>{{ $hike->user->name }}</td>
                    <td>{{ $hike->views }}</td>
                    <td>
                        @if (!empty($recommended[$hike->id]))
                        <p style="color: orange; font-weight: bold; font-family: sans-serif;">{{$recommended[$hike->id]}}</p>
                        @endif
                        @foreach ($hike->reviews as $review)
                        <p style="font-weight: bold;">{{ $review->user->name }}:</p> {{ $review->content }} <br>
                        @endforeach
                    </td>
                    <td>
                        <a type="submit" class="btn btn-sm btn-primary" href="{{ route('hikes.show', $hike->id) }}">Show more details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
