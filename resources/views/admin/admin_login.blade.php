@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<form action="{{ url('/admin/login') }}" method="post">
    @csrf
    <div class="container">
        <h1 class="text-center">Admin Login</h1>

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
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="" required>
        </div>

        <button type="submit" class="btn btn-primary">Login as Admin</button>

        <div class="mt-3">
            <a href="{{ url('/login') }}">Back to Login</a>
        </div>
    </div>
</form>
@endsection
