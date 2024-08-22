@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Verify OTP</h1>
    <form action="{{ route('verify-otp') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="otp">OTP</label>
            <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP">
            @error('otp')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-primary">Verify OTP</button>
    </form>
</div>
@endsection
