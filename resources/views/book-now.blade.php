@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 40px;">
    <h1 style="text-align: center; color: #007bff; margin-bottom: 30px;">Terms and Conditions</h1>
    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <p>Please read the following terms and conditions carefully before proceeding to book a bike:</p>
        <ul style="list-style-type: disc; margin-left: 20px; color: #343a40;">
            <li style="margin-bottom: 10px;">You must be at least 18 years old to rent a bike.</li>
            <li style="margin-bottom: 10px;">A valid driver's license is required to rent a bike.</li>
            <li style="margin-bottom: 10px;">The bike must be returned in the same condition as it was rented.</li>
            <li style="margin-bottom: 10px;">Any damage to the bike will be the renter's responsibility.</li>
            <li style="margin-bottom: 10px;">Rental fees must be paid in full before the rental period begins.</li>
            <li style="margin-bottom: 10px;">The renter agrees to abide by all traffic laws and regulations while using the bike.</li>
            <li style="margin-bottom: 10px;">The rental period begins at the time the bike is picked up and ends when it is returned.</li>
        </ul>
        <div style="text-align: center; margin-top: 20px;">
            <button id="agreeBtn" class="btn btn-success">I Agree to All Terms</button>
        </div>
    </div>

    <!-- Bike Listing Section -->
    <div id="bike-listing" style="display: none;">
        <h2 style="color:white;">Available Bikes</h2>
        <div class="row">
            @foreach ($bikes as $bike)
            <div class="col-md-4" style="display: flex; justify-content: center;">
                <div class="card mb-4" style="width: 280px; height: 380px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden;">
                    @if ($bike->image_url)
                        <img src="{{ asset('storage/bike_images/' . $bike->image_url) }}" class="card-img-top" alt="Bike Image" style="height: 140px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/280x140" class="card-img-top" alt="Placeholder Image" style="height: 100px; object-fit: cover;">
                    @endif
                    <div class="card-body" style="background-color: #f8f9fa;">
                        <h5 class="card-title" style="color: #343a40; font-size: 18px;">{{ $bike->name }}</h5>
                        <p class="card-text" style="color: #6c757d; font-size: 14px;">
                            <strong>Rate per Hour:</strong> ${{ $bike->rate_per_hour }}<br>
                            <strong>CC:</strong> {{ $bike->cc }}<br>
                            <strong>Weight:</strong> {{ $bike->weight }} kg<br>
                            <strong>Description:</strong> {{ $bike->description }}
                        </p>
                        <div style="text-align: center;">
                            <a href="{{ url('/book/'.$bike->id) }}" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Hidden Input for Authentication Status -->
<input type="hidden" id="isAuthenticated" value="{{ Auth::check() ? '1' : '0' }}">

<script>
    document.getElementById('agreeBtn').addEventListener('click', function() {
        var isAuthenticated = document.getElementById('isAuthenticated').value;
        if (isAuthenticated === '1') {
            document.getElementById('bike-listing').style.display = 'block';
        } else {
            window.location.href = '{{ url('/login') }}';
        }
    });
</script>
@endsection
