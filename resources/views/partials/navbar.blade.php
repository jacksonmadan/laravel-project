<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/ionicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather/4.28.0/feather.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/15.1.0/octicons.min.css">

<nav class="navbar navbar-expand-custom navbar-mainbg">
    <a class="navbar-brand navbar-logo" href="{{ url('/') }}">Bike Lelo</a>
    <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
            <li class="nav-item {{ request()->is('available') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/available') }}">
                <i class="fas fa-bicycle"></i>Bikes Available
                </a>
            </li>
            <li class="nav-item {{ request()->is('address') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/address') }}">
                <i class="fas fa-map-marker-alt"></i>Address
                </a>
            </li>
            <li class="nav-item {{ request()->is('aboutus') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/aboutus') }}">
                <i class="fas fa-info-circle"></i>About us
                </a>
            </li>
            <li class="nav-item {{ request()->is('book-now') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/book-now') }}">
                <i class="fas fa-dollar-sign"></i>Book Now
                </a>
            </li>
            <li class="nav-item {{ request()->is('partner') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/partner') }}">
                <i class="fas fa-handshake"></i>Partner with us
                </a>
            </li>
        </ul>
    </div>

   
    @if (Auth::check())
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul>
            <li class="nav-item">
                <span class="nav-link" style="color:white;">Welcome, {{ Auth::user()->name }}</span>
            </li>
            <li class="nav-item" style="color:white " >
            <button type="submit" class="nav-link btn btn-link" style="margin-left: 20px;"><i class="fas fa-wallet"></i></button>
            </li>
            <li class="nav-item">
                
                <form action="{{ url('/logout') }}" method="POST" style="margin-left: 50px;">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link" style="color:white;" >Logout</button>
                </form>
            </li>
        </ul>
    </div>
    @else
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i>Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}"><i class="fas fa-user-plus"></i>Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/contact') }}"><i class="fas fa-envelope"></i>Contact Us</a>
            </li>
        </ul>
    </div>
    @endif
</nav>
