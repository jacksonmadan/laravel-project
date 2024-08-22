@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@section('content')
<h1>Contact Us</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ url('/contact') }}" method="post">
        @csrf 
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br>

        <button type="submit">Submit</button>
    </form>
@endsection
