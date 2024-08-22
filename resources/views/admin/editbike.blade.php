<!-- resources/views/admin/editbike.blade.php -->

@extends('layouts.portal')
@section('content')
<div class="container" style="margin-top: 40px;">
    <h1 style="text-align: center; color: #007bff; margin-bottom: 30px;">Edit Bike</h1>

    <form action="{{ route('admin.bikes.update', $bike->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Bike Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $bike->name }}" required>
        </div>

        <div class="form-group">
            <label for="rate_per_hour">Rate per Hour</label>
            <input type="number" step="0.01" class="form-control" id="rate_per_hour" name="rate_per_hour" value="{{ $bike->rate_per_hour }}" required>
        </div>

        <div class="form-group">
            <label for="cc">CC</label>
            <input type="number" class="form-control" id="cc" name="cc" value="{{ $bike->cc }}" required>
        </div>

        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="{{ $bike->weight }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $bike->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image_url">Image</label>
            <input type="file" class="form-control-file" id="image_url" name="image_url">
            @if($bike->image_url)
                <img src="{{ asset('storage/bike_images/' . $bike->image_url) }}" class="img-thumbnail mt-2" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Bike</button>
    </form>
</div>
@endsection
