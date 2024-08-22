@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<form action="{{ url('/login') }}" method="post">
    @csrf
    <div class="container">
        <h1 class="text-center">Login</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Remember Me</label>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
  
        <a href="{{ url('/admin/login') }}">
        <button type="button" class="btn btn-secondary">Login as Admin</button>
        </a>
        <div class="mt-3">
            <a href="{{ url('/register') }}">Don't have an account? Register</a>
        </div>
    </div>
</form>


@endsection
