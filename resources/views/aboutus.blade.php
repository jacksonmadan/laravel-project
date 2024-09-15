@extends('layouts.app')

@section('content')
<p style="color: white;">hello i am ankush</p>
<div class="container" style="margin-top: 40px;">
<h1 style="text-align: center; color: #ffffff; margin-bottom: 30px;">About Us</h1>
hi bro this is checking for CI/CD
    <!-- Display Flash Messages -->
    @if(session('status'))
        <div class="alert alert-success" role="alert" style="background-color: #ffffff; color: #000000;">
            {{ session('status') }}
        </div>
    @endif
hello bross how siiii am doinh
    <div style="margin-bottom: 40px; padding: 20px; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);">
        <h2 style="font-size: 2rem; margin-bottom: 20px; color: #ffffff; border-bottom: 3px solid #007bff; padding-bottom: 10px;"><i class="fa fa-smile"></i>Welcome to Bike Lelo</h2>
        <p style="font-size: 16px; color: #cccccc;">
        Bike Lelo is dedicated to providing an exceptional bike rental experience. Our mission is to offer top-quality bikes and outstanding customer service to help you enjoy your cycling adventures. Whether you need a bike for a day, a weekend, or longer, we have a range of options to meet your needs.
        </p>
    </div>

    <div style="margin-bottom: 40px; padding: 20px; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);">
        <h2 style="font-size: 2rem; margin-bottom: 20px; color: #ffffff; border-bottom: 3px solid #28a745; padding-bottom: 10px;"><i class="fas fa-map-marker-alt"></i>Directions</h2>
        <ul style="list-style-type: disc; margin-left: 20px; font-size: 16px; color: #ffffff;">
        <li style="margin-bottom: 10px;"><strong>Customer Satisfaction:</strong> We prioritize our customers' needs and strive to exceed their expectations with every interaction.</li>
            <li style="margin-bottom: 10px;"><strong>Quality:</strong> Our bikes are well-maintained and regularly serviced to ensure a smooth and enjoyable ride.</li>
            <li style="margin-bottom: 10px;"><strong>Integrity:</strong> We conduct our business with honesty and transparency, building trust with our customers and partners.</li>
            <li style="margin-bottom: 10px;"><strong>Innovation:</strong> We continuously seek new ways to enhance our services and improve the overall biking experience.</li>
        </ul>
    </div>
  
    <div style="margin-bottom: 40px; padding: 20px; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);">
        <h2 style="font-size: 2rem; margin-bottom: 20px; color: #ffffff; border-bottom: 3px solid #ffc107; padding-bottom: 10px;"><i class="fa fa-user-friends"></i>Meet Our Team</h2>
        <p style="font-size: 16px; color: #ffffff;">
        Our team is passionate about cycling and committed to delivering excellent service. From our knowledgeable staff to our skilled maintenance team, everyone at Bike Lelo plays a crucial role in ensuring you have a great experience with us.
        </p>
        <ul style="list-style-type: disc; margin-left: 20px; font-size: 16px; color: #ffffff;">
            <li style="margin-bottom: 15px;"><strong>Promotion:</strong> Actively promote Bike Lelo's services through various channels, including your website, social media, and physical locations.</li>
            <li style="margin-bottom: 15px;"><strong>Customer Service:</strong> Provide excellent customer service and assist clients with their bike rental needs.</li>
            <li style="margin-bottom: 15px;"><strong>Reporting:</strong> Regularly report on performance metrics, including customer feedback and sales data.</li>
            <li style="margin-bottom: 15px;"><strong>Compliance:</strong> Ensure compliance with all local regulations and Bike Lelo's operational standards.</li>
            <li style="margin-bottom: 15px;"><strong>Training:</strong> Participate in any training programs offered by Bike Lelo to stay updated on our services and policies.</li>
        </ul>
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
</div>   
 
@endsection
