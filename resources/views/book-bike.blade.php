<!-- resources/views/book-bike.blade.php -->
@extends('layouts.app')

@section('content')
<div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 20px;">
    <!-- Bike Details Section -->
    <div style="flex: 1; color: white;">
        <h2 style="font-size: 32px; margin-bottom: 10px;">{{ $bike->name }}</h2>
        <p style="font-size: 18px; margin-bottom: 8px;"><strong>Price:</strong> ${{ $bike->price }}</p>
        <p style="font-size: 18px; margin-bottom: 8px;"><strong>Description:</strong> {{ $bike->description }}</p>
        <p style="font-size: 18px; margin-bottom: 16px;"><strong>Available:</strong> {{ $bike->available ? 'Yes' : 'No' }}</p>
        <a href="#" class="btn btn-primary" style="font-size: 18px; padding: 10px 20px;">Book Now</a>
    </div>

    <!-- Money Calculation Section -->
    <div style="flex: 1; background-color: #f8f9fa; padding: 20px; border-radius: 8px; color: #333;">
        <h3 style="margin-bottom: 15px;">Calculate Your Cost</h3>
        <form id="costCalculator">
            <div class="form-group" style="margin-bottom: 10px;">
                <label for="rentalDays"><strong>Rental Days:</strong></label>
                <input type="number" id="rentalDays" class="form-control" style="width: 100%;" min="1" placeholder="Enter number of days" required>
            </div>
            <div class="form-group" style="margin-bottom: 10px;">
                <label for="insurance"><strong>Insurance:</strong></label>
                <input type="checkbox" id="insurance" class="form-control" style="margin-left: 10px;">
            </div>
            <p style="margin-top: 10px;"><strong>Total Cost:</strong> $<span id="totalCost">0.00</span></p>
            <button type="button" class="btn btn-secondary" style="margin-top: 15px;" onclick="calculateCost()">Calculate</button>
        </form>
    </div>

    <!-- Bike Image Section -->
    <div style="flex: 1; text-align: center;">
        @if ($bike->image_url)
            <img src="{{ asset('storage/bike_images/' . $bike->image_url) }}" alt="Bike Image" style="width: 400px;">
        @else
            <img src="https://via.placeholder.com/300x300" alt="Placeholder Image">
        @endif
    </div>
</div>

<script>
    function calculateCost() {
        var rentalDays = document.getElementById('rentalDays').value;
        var pricePerDay = {{ $bike->price }};
        var insuranceChecked = document.getElementById('insurance').checked;
        var insuranceCost = insuranceChecked ? 10 : 0; // Assuming $10 insurance per rental

        var totalCost = (rentalDays * pricePerDay) + (insuranceChecked ? insuranceCost * rentalDays : 0);
        document.getElementById('totalCost').innerText = totalCost.toFixed(2);
    }
</script>


@endsection
