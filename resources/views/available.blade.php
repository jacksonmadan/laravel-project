@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 40px;">
<h1 style="text-align: center; color: #ffffff; margin-bottom: 30px;">Bikes Available</h1>
    <div class="row">
        @foreach ($bikes as $bike)
        <div class="col-md-4" style="display: flex; justify-content: center;">
            <div class="card mb-4" style="width: 280px; height: 380px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden;">
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
                    <!-- Book Now Button -->
                    <div style="text-align: center; margin-top: 15px;">
                    <button id="bookNowBtn" class="btn btn-primary" style="padding: 10px 20px; font-size: 16px;">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
    document.getElementById('bookNowBtn').addEventListener('click', function() {
        @auth
            // Redirect logged-in users to the book now page
            window.location.href = '{{ url('/book-now') }}';
        @else
            // Redirect unauthenticated users to the login page
            window.location.href = '{{ url('/login') }}';
        @endauth
    });
</script>
@endsection
