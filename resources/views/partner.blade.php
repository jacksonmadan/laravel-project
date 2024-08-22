@extends('layouts.app')

@section('content')
<div style="margin-top: 20px; padding: 20px; background-color: #000000; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);">
    <h1 style="font-size: 2.5rem; margin-bottom: 20px; color: #ffffff; text-align: center;">Partner with Us</h1>

    <!-- Display Flash Messages -->
    @if(session('status'))
        <div class="alert alert-success" role="alert" style="margin-bottom: 20px; color: #000000; background-color: #28a745;">
            {{ session('status') }}
        </div>
    @endif

    <div style="margin-bottom: 40px; padding: 20px; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);">
        <h2 style="font-size: 2rem; margin-bottom: 20px; color: #ffffff; border-bottom: 3px solid #007bff; padding-bottom: 10px;">Welcome to Bike Lelo Partnerships</h2>
        <p style="font-size: 16px; color: #cccccc;">
            At Bike Lelo, we value our partnerships and are excited to collaborate with businesses and individuals who share our passion for providing top-quality bike rental services. As a partner, you will be part of a dynamic network committed to excellence and customer satisfaction.
        </p>
        <!-- Be a Partner Button -->
        <div style="text-align: center;">
            <button type="button" style="display: inline-block; padding: 15px 30px; font-size: 18px; color: #ffffff; background-color: #28a745; border-radius: 5px; text-decoration: none; font-weight: bold; border: none; cursor: pointer; transition: background-color 0.3s;" data-bs-toggle="modal" data-bs-target="#partnerModal">
                Be a Partner
            </button>
        </div>
    </div>

    <div style="margin-bottom: 40px; padding: 20px; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);">
        <h2 style="font-size: 2rem; margin-bottom: 20px; color: #ffffff; border-bottom: 3px solid #28a745; padding-bottom: 10px;">Terms and Conditions</h2>
        <ul style="list-style-type: disc; margin-left: 20px; font-size: 16px; color: #cccccc;">
            <li style="margin-bottom: 15px;"><strong>Agreement Duration:</strong> The partnership agreement is valid for one year from the date of signing and can be renewed upon mutual consent.</li>
            <li style="margin-bottom: 15px;"><strong>Revenue Sharing:</strong> Partners will receive a commission based on the rental revenue generated through their referrals or services.</li>
            <li style="margin-bottom: 15px;"><strong>Quality Standards:</strong> Partners are required to adhere to our quality standards to ensure that our customers receive exceptional service.</li>
            <li style="margin-bottom: 15px;"><strong>Payment Terms:</strong> Payments will be made monthly, and partners will receive a detailed statement of earnings.</li>
            <li style="margin-bottom: 15px;"><strong>Confidentiality:</strong> Partners must maintain the confidentiality of all sensitive information shared during the partnership.</li>
            <li style="margin-bottom: 15px;"><strong>Termination:</strong> Either party may terminate the agreement with a 30-day notice if terms and conditions are not met.</li>
        </ul>
    </div>

    <div style="margin-bottom: 40px; padding: 20px; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);">
        <h2 style="font-size: 2rem; margin-bottom: 20px; color: #ffffff; border-bottom: 3px solid #ffc107; padding-bottom: 10px;">Roles and Responsibilities</h2>
        <p style="font-size: 16px; color: #cccccc;">
            As a partner, you will be expected to fulfill the following roles and responsibilities:
        </p>
        <ul style="list-style-type: disc; margin-left: 20px; font-size: 16px; color: #cccccc;">
            <li style="margin-bottom: 15px;"><strong>Promotion:</strong> Actively promote Bike Lelo's services through various channels, including your website, social media, and physical locations.</li>
            <li style="margin-bottom: 15px;"><strong>Customer Service:</strong> Provide excellent customer service and assist clients with their bike rental needs.</li>
            <li style="margin-bottom: 15px;"><strong>Reporting:</strong> Regularly report on performance metrics, including customer feedback and sales data.</li>
            <li style="margin-bottom: 15px;"><strong>Compliance:</strong> Ensure compliance with all local regulations and Bike Lelo's operational standards.</li>
            <li style="margin-bottom: 15px;"><strong>Training:</strong> Participate in any training programs offered by Bike Lelo to stay updated on our services and policies.</li>
        </ul>
    </div>

    <div style="padding: 20px; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);">
        <h2 style="font-size: 2rem; margin-bottom: 20px; color: #ffffff; border-bottom: 3px solid #dc3545; padding-bottom: 10px;">Contact Us</h2>
        <p style="font-size: 16px; color: #cccccc;">
            If you have any questions or need further information, please feel free to contact us at:
        </p>
        <p style="font-size: 16px; color: #cccccc;">
            <strong>Email:</strong> <a href="mailto:partners@bikelo.com" style="color: #007bff; text-decoration: none;">partners@bikelo.com</a><br>
            <strong>Phone:</strong> +1 (555) 123-4567<br>
            <strong>Address:</strong> 123 Bike Lane, Cycling City, CC 12345
        </p>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="partnerModal" tabindex="-1" aria-labelledby="partnerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #000000;">
            <div class="modal-header">
                <h5 class="modal-title" id="partnerModalLabel" style="color: #ffffff;">Become a Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #ffffff;"></button>
            </div>
            <div class="modal-body">
                <form action="/sendrequest" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="firstName" class="form-label" style="color: #ffffff;">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label" style="color: #ffffff;">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label" style="color: #ffffff;">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="termsConditions" name="terms" required>
                        <label class="form-check-label" for="termsConditions" style="color: #ffffff;">I agree to the 
                            <a href="#terms" data-bs-toggle="modal" data-bs-target="#termsModal" style="color: #007bff;">Terms and Conditions</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Terms Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #000000;">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel" style="color: #ffffff;">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #ffffff;"></button>
            </div>
            <div class="modal-body" style="color: #ffffff;">
                <!-- Terms and Conditions Content -->
                <ul style="list-style-type: disc; margin-left: 20px; font-size: 16px;">
                    <li style="margin-bottom: 15px;">Agreement Duration: The partnership agreement is valid for one year from the date of signing and can be renewed upon mutual consent.</li>
                    <li style="margin-bottom: 15px;">Revenue Sharing: Partners will receive a commission based on the rental revenue generated through their referrals or services.</li>
                    <li style="margin-bottom: 15px;">Quality Standards: Partners are required to adhere to our quality standards to ensure that our customers receive exceptional service.</li>
                    <li style="margin-bottom: 15px;">Payment Terms: Payments will be made monthly, and partners will receive a detailed statement of earnings.</li>
                    <li style="margin-bottom: 15px;">Confidentiality: Partners must maintain the confidentiality of all sensitive information shared during the partnership.</li>
                    <li style="margin-bottom: 15px;">Termination: Either party may terminate the agreement with a 30-day notice if terms and conditions are not met.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
