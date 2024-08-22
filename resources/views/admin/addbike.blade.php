@extends('layouts.portal')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.3/parsley.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.3/parsley.min.js"></script>

@section('content')
<div class="container">
    <h1>Add Bike</h1>
    <form action="{{ url('/admin/addbike') }}" method="post" enctype="multipart/form-data" data-parsley-validate>
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" required data-parsley-required="true" data-parsley-maxlength="255">
    </div>

    <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image_url" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="rate">Rate per Hour:</label>
        <input type="number" id="rate" name="rate_per_hour" step="0.01" class="form-control" required data-parsley-required="true" data-parsley-type="number">
    </div>

    <div class="form-group">
        <label for="cc">CC:</label>
        <input type="number" id="cc" name="cc" class="form-control" required data-parsley-required="true" data-parsley-type="integer">
    </div>

    <div class="form-group">
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" step="0.01" class="form-control" required data-parsley-required="true" data-parsley-type="number">
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Add Bike</button>
</form>

</div>
@endsection
