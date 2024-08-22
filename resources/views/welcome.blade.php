@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@section('content')
<div class="card-container">
  <div class="card-wrapper">
    <!-- First set of cards -->
    <a href="" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
          <img src="{{ asset('images/1.jpg') }}" class="cover-image" alt="Motorcycle" />
        </div>
        <img src="{{ asset('images/2.jpg') }}" class="title" />
      </div>
    </a>

    <a href="" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
          <img src="{{ asset('images/dirt.jpg') }}" class="cover-image" />
        </div>
        <img src="{{ asset('images/3.jpg') }}" class="title" />
      </div>
    </a>

    <a href="https://www.mythrillfiction.com/the-dark-rider" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
          <img src="{{ asset('images/sports.jpg') }}" class="cover-image" />
        </div>
        <img src="{{ asset('images/4.jpg') }}" class="title" />
      </div>
    </a>

    <a href="" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
          <img src="{{ asset('images/city.jpg') }}" class="cover-image" />
        </div>
        <img src="{{ asset('images/5.jpg') }}" class="title" />
      </div>
    </a>

    <!-- Duplicate cards for seamless loop effect -->
    <a href="" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
          <img src="{{ asset('images/1.jpg') }}" class="cover-image" alt="Motorcycle" />
        </div>
        <img src="{{ asset('images/2.jpg') }}" class="title" />
      </div>
    </a>

    <a href="" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
          <img src="{{ asset('images/dirt.jpg') }}" class="cover-image" />
        </div>
        <img src="{{ asset('images/3.jpg') }}" class="title" />
      </div>
    </a>

    <a href="https://www.mythrillfiction.com/the-dark-rider" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
          <img src="{{ asset('images/sports.jpg') }}" class="cover-image" />
        </div>
        <img src="{{ asset('images/4.jpg') }}" class="title" />
      </div>
    </a>

    <a href="" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
          <img src="{{ asset('images/city.jpg') }}" class="cover-image" />
        </div>
        <img src="{{ asset('images/5.jpg') }}" class="title" />
      </div>
    </a>
  </div>
</div>

@endsection
