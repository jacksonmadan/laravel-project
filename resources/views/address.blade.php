@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 40px;">
<h1 style="text-align: center; color: #ffffff; margin-bottom: 30px;">Address</h1>
hi sir checkkk i am ankush and done edited in address
    <!-- Display Flash Messages -->
    @if(session('status'))
        <div class="alert alert-success" role="alert" style="background-color: #ffffff; color: #000000;">
            {{ session('status') }}
        </div>
    @endif
    <div style="margin-bottom: 40px; padding: 20px; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);">
        <h2 style="font-size: 2rem; margin-bottom: 20px; color: #ffffff; border-bottom: 3px solid #007bff; padding-bottom: 10px;"><i class="fas fa-map"></i>Company Address</h2>
        <p style="color: #ffffff;">
            <strong>Bike Lelo Headquarters</strong><br>
            123 Bike Avenue,<br>
            Cycling City, CC 54321<br>
            <strong>Email:</strong> <a href="mailto:info@bikelo.com" style="color: #007bff; text-decoration: none;">info@bikelo.com</a><br>
            <strong>Phone:</strong> +1 (555) 987-6543
        </p>
    </div>
    

    <div style="margin-bottom: 40px; padding: 20px; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);">
        <h2 style="font-size: 2rem; margin-bottom: 20px; color: #ffffff; border-bottom: 3px solid #dc3545; padding-bottom: 10px;"><i class="fas fa-location-arrow"></i>Directions</h2>
        <p style="font-size: 16px; color: #ffffff;">
        Our headquarters is located in the heart of Cycling City, easily accessible via major roads. If you're coming from downtown, head north on Main Street and turn left onto Bike Avenue. Our building will be on the right.
        <p style="color: #ffffff;">
        You can also find us on Google Maps: <a href="https://www.google.com/maps/@28.6246562,77.1918295,10z?entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank" style="color: #007bff; text-decoration: none;">View on Google Maps</a>
        </p>
    </div>

    <div style="margin-bottom: 40px; padding: 20px; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);">
        <h2 style="font-size: 2rem; margin-bottom: 20px; color: #ffffff; border-bottom: 3px solid #ffc107; padding-bottom: 10px;"><i class="fas fa-envelope"></i>Contact Us</h2>
        <p style="font-size: 16px; color: #ffffff;">
        <p style="color: #ffffff;">If you have any questions or need more information, feel free to reach out to us at:</p>
        <p style="color: #ffffff;">
            <strong>Email:</strong> <a href="mailto:info@bikelo.com" class="contact-link" style="color: #007bff;">info@bikelo.com</a><br>
            <strong>Phone:</strong> +1 (555) 987-6543<br>
            <strong>Address:</strong> 123 Bike Avenue, Cycling City, CC 54321
        </p>
    </div>


    <div class="section contact-form-section">
        <h2 class="section-title" style="color: #ffffff;"></h2>
       
    </div>
</div>
@endsection
