@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<form action="{{ url('/registered') }}" method="post">
    @csrf
   
    <div class="container">
        <h1 class="text-center">Registration</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="" value="{{ old('name') }}">
            <span class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="" value="{{ old('email') }}">
            <span class="text-danger">
                @error('email')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="" value="{{ old('address') }}">
            <span class="text-danger">
                @error('address')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}">
            <span class="text-danger">
                @error('dob')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                <option value="O" {{ old('gender') == 'O' ? 'selected' : '' }}>Other</option>
            </select>
            <span class="text-danger">
                @error('gender')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="">
            <span class="text-danger">
                @error('password')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="">
            <span class="text-danger">
                @error('password_confirmation')
                {{ $message }}
                @enderror
            </span>
        </div>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
