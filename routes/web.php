<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsedCarsController;
// routes/web.php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarDetailsController;
use App\Http\Controllers\SellCarsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\BlogDetailsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\FaqsController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/used-cars/{slug}', [UsedCarsController::class, 'index']);
Route::resource('/used-cars', UsedCarsController::class);
// car details page 
Route::get('/car-details/{product_url}', [CarDetailsController::class, 'carDetails']);

Route::get('/car-details/{product_url}', [CarDetailsController::class, 'carDetails']);

Route::post('/used-cars/filter', [UsedCarsController::class, 'prepareUsedCarsData'])->name('used-cars.filter');

Route::post('register', [RegistrationController::class, 'store'])->name('user-register');

Route::post('resend-otp', [RegistrationController::class, 'resendOTP'])->name('resend-otp');

Route::post('verify-otp', [RegistrationController::class, 'verifyOTP'])->name('verify-otp');

Route::post('/change-number', [RegistrationController::class, 'changeNumber'])->name('change-number');

Route::get('/check-session', [RegistrationController::class, 'checkSession'])->name('check-session');

// Middlewear(group) for Logged In User
Route::middleware(['dashboard'])->group(function () {
    Route::get('/logout', [RegistrationController::class, 'Logout'])->name('logout');
    Route::post('/store-in-session', [DashboardController::class, 'storeProductId'])->name('store-product-id');
    Route::post('/remove-from-wishlist', [DashboardController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::post('/cancel-test-drive', [DashboardController::class, 'cancelTestDrive']);
    Route::post('/reschedule-update', [DashboardController::class, 'updateReschedule']);
    Route::post('/booktestdrive-insert', [CarDetailsController::class, 'bookTestDrive']);
    Route::post('/requestCallBack-insert', [CarDetailsController::class, 'requestCallBack']);
});

Route::resource('/dashboard', DashboardController::class);

Route::get('/car-details/{product_url}', [CarDetailsController::class, 'carDetails']);
Route::post('/submit-contact-form', [CarDetailsController::class, 'submitContactForm'])->name('submitContactForm');
Route::post('/used-cars/filter', [UsedCarsController::class, 'prepareUsedCarsData'])->name('used-cars.filter');
//certified vehicle and featured vehicle//
Route::get('/', [HomeController::class, 'home'])->name('home');
//reviews data show
Route::get('/reviews', [HomeController::class, 'review'])->name('reviews');
// sell car page
Route::get('/sell-your-car', [SellCarsController::class, 'sellCars'])->name('sell-cars');
// blog page 
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');

// contact us page 
Route::get('/contact-us', [ContactUsController::class, 'contactUs'])->name('contact');

// contact us page form submit
Route::get('/submit-lead', [ContactUsController::class, 'submitLead'])->name('submit.lead');
Route::post('/submit-contact', [ContactUsController::class, 'submitContactForm'])->name('submit.contact');
// blog details page
Route::get('/blog-details/{blog_url}', [BlogDetailsController::class, 'blogDetails']);
//faq's
Route::get('/faq-view', [FaqsController::class, 'faqs'])->name('faqs');
// Location modal 
Route::post('/set-location', [HomeController::class, 'setLocation']);
// To fetch the city value from session
Route::post('/fetch-location', function (Request $request) {
    return response()->json(['location' => Session::get('tlocation_web', 'SELECT CITY')]);
});
//blod details leave comment
Route::post('/store-comment', [BlogDetailsController::class, 'storeComment']);
// search route
// search suggestion route
Route::post('search/suggestions', [HomeController::class, 'suggestions']);
// Search record route
Route::post('/used-cars/searchfilter', [UsedCarsController::class, 'searchUsedCarsData']);
// clear the search session value
Route::get('/clear-session', function () {
    session()->forget('usedCars');
    session()->forget('carCount');
    return response()->json(['status' => 'success']);
});
