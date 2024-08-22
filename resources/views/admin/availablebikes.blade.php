
@extends('layouts.portal')
@section('content')
<div class="container" style="margin-top: 40px;">
    <h1 style="text-align: center; color: #007bff; margin-bottom: 30px;">Available Bikes</h1>
    <div class="row">
        @foreach ($bikes as $bike)
        <div class="col-md-4" style="display: flex; justify-content: center;">
            <div class="card mb-4" style="width: 280px; height: 440px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden;">
                @if ($bike->image_url)
                    <img src="{{ asset('storage/bike_images/' . $bike->image_url) }}" class="card-img-top" alt="Bike Image" style="height: 140px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/280x140" class="card-img-top" alt="Placeholder Image" style="height: 140px; object-fit: cover;">
                @endif
                <div class="card-body" style="background-color: #f8f9fa;">
                    <h5 class="card-title" style="color: #343a40; font-size: 18px;">{{ $bike->name }}</h5>
                    <p class="card-text" style="color: #6c757d; font-size: 14px;">
                        <strong>Rate per Hour:</strong> ${{ $bike->rate_per_hour }}<br>
                        <strong>CC:</strong> {{ $bike->cc }}<br>
                        <strong>Weight:</strong> {{ $bike->weight }} kg<br>
                        <strong>Description:</strong> {{ $bike->description }}
                    </p>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('admin.bikes.edit', $bike->id) }}" class="btn btn-primary btn-lg" style="flex: 1; margin-right: 5px;">Edit</a>
                        <form action="{{ route('admin.bikes.destroy', $bike->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this bike?');" style="flex: 1; margin-left: 5px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg" style="width: 100%;">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
