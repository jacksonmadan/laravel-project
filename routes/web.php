<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\PaymentRequestController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\BookingController;
// Public Routes
Route::get('/', function () {
    return view('welcome');
});
//pages
Route::get('/available', [HomeController::class, 'available']);
Route::get('/address', [HomeController::class, 'address']);
Route::get('/aboutus', [HomeController::class, 'aboutus']);
Route::get('/book-now', [HomeController::class, 'booknow']);
Route::get('/partner', [HomeController::class, 'partner']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [App\Http\Controllers\RegistrationController::class, 'send']);

// Authentication Routes
Route::get('/register', [RegistrationController::class, 'register']);
Route::post('/registered', [RegistrationController::class, 'registered']);
Route::get('/verify-otp', [RegistrationController::class, 'verifyOtpForm'])->name('verify-otp');
Route::post('/verify-otp', [RegistrationController::class, 'verifyOtp']);

// Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//admin routes
Route::get('/admin/login', [AdminUserController::class, 'admin_login']);
Route::post('/admin/login', [AdminUserController::class, 'authenticate']);
Route::get('/admin/showuser', [AdminUserController::class, 'user_show']);
Route::get('/admin/dashboard',[AdminUserController::class, 'admin_dashboard']);


//action routes for admin
Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/admin/users/{user_id}/login-as', [AdminUserController::class,'loginAs'])->name('admin.loginAsUser');
Route::post('/admin/approve/{user_id}', [PartnerController::class, 'approve'])->name('admin.approve');
Route::post('/admin/decline/{user_id}',[PartnerController::class,'decline'])->name('admin.decline');

//adding the bike 
Route::get('/admin/addbike', [BikeController::class, 'create'])->name('admin.bikes.create');
Route::post('/admin/addbike', [BikeController::class, 'store'])->name('admin.bikes.store');
Route::get('/admin/availablebikes', [BikeController::class, 'showAvailableBikes'])->name('admin.bikes.show');
Route::get('/available',[BikeController::class,'showbikesonuser']);
Route::get('admin/bikes/{id}/edit', [BikeController::class, 'edit'])->name('admin.bikes.edit');
Route::put('admin/bikes/{id}', [BikeController::class, 'update'])->name('admin.bikes.update');
Route::delete('admin/bikes/{id}', [BikeController::class, 'destroy'])->name('admin.bikes.destroy');


//partner controller
Route::post('/sendrequest',[PartnerController::class,'sendrequest']);
Route::get('admin/partnership',[PartnerController::class,'showrequest']);

//this was for companies project may be useful for this project
Route::get('/payment-request', [PaymentRequestController::class, 'create'])->name('payment.request.create');
Route::post('/partner', [CreditController::class, 'requestCredit'])->name('request.credit');
Route::post('/payment-request', [PaymentRequestController::class, 'store'])->name('payment.request.store');
Route::get('/payment-request/approve/{id}', [PaymentRequestController::class, 'approve'])->name('payment.request.approve');
Route::get('/approve/{id}', [PaymentRequestController::class, 'approve'])->name('payment.approve');
Route::get('/approval', function () {
    return view('approval'); // Adjust this to your actual view name
});

Route::get('/book/{id}', [BookingController::class, 'show'])->name('book.show');
