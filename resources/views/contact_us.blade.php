@extends('layouts.app')
@section('content')
<style>
    .location-title {
        font-family: "Poppins", sans-serif;
        font-weight: 600;
        color: #333;
        letter-spacing: 0.5px;
    }
</style>
<style>
   .icon-cells img {
    filter: brightness(0) saturate(100%) invert(17%) sepia(89%) saturate(3400%) hue-rotate(359deg);
}
</style>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="page-wraper">
    <!-- Content -->
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle section-title-page">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">CONTACT US</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact us</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <!-- content start -->
            <div class="container">
                <!-- Title separator style 8 -->
                <div class="p-a20 bg-white m-t30">
                    <div class="section-head text-left">
                        <h2 class="text-uppercase">WELCOME TO VISTACARS</h2>
                        <div class="dlab-separator-outer ">
                            <div class="dlab-separator bg-primary style-skew"></div>
                        </div>
                        <h6>Vistacars is revolutionizing the way that people buy and sell cars by making a traditionally painful experience fast, easy and even fun.</h6>
                        <p>It is supported by a professional team with experienced management and systems.Vistacars is a well established and renowned dealer of pre-owned cars in Kharghar. We also provide car finance plans from partners, insurance renewal, genuine and certified spare parts. Book a test drive and experience the comfort of driving in a driver centered cockpit design. Select the car model and get a quote to get the on-road . Visit Vistacars in Kharghar, Navi Mumbai and Pune for an insider experience.</p>
                    </div>
                </div>
                <!-- Title separator style 8 END -->
                <!-- icon box style 1 aligh center -->
                <div class="p-a20 bg-white m-b10">
                    <div class="section-content m-b10">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 m-b30 d-flex">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center flex-fill">
                                    <div class="icon-xl text-primary m-b20"> <a href="#" class="icon-cell"><i class="b-advantages-2__icon  flaticon-steering-wheel"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte text-uppercase">6+ SHOWROOMS</h5>
                                        <p>We’re here to offer you the best and latest, brand new Maruti Suzuki car models.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 m-b30 d-flex">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center flex-fill">
                                    <div class="icon-xl text-primary m-b20"> <a href="#" class="icon-cell"><i class="b-advantages-2__icon flaticon-gears"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte text-uppercase">7+ WORKSHOPS</h5>
                                        <p>With Autovista, you can choose from a wide assortment of car services. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 m-b30 d-flex">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center flex-fill">
                                    <div class="icon-xl text-primary m-b20">
                                        <a href="#" class="icon-cells">
                                            <!-- <i class="b-advantages-2__icon flaticon-suitcase-with-white-details"></i> -->
                                            <img src="{{ asset('images/icons/suitcase.png') }}" alt="Car Finance Icon" width="50"> 
                                        </a>
                                    </div>
                                    <div class="icon-content" style="margin-top: 48px;">
                                        <h5 class="dlab-tilte text-uppercase">CAR FINANCE</h5>
                                        <p>We offer Car loan for New Car, Pre-Owned Car and even Loan Against Car. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 m-b30 d-flex">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center flex-fill">
                                    <div class="icon-xl text-primary m-b20"> <a href="#" class="icon-cell"><i class="b-advantages-2__icon flaticon-inspection"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte text-uppercase">CAR INSURANCE</h5>
                                        <p>We’re offering Buy/Renew Car Insurance Online. and Enjoy total hassle-free claim.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- icon box style 1 aligh center END -->
                <div class="p-a30 m-b40">
                    <div class="section-head text-center" style="margin-bottom: 0px;">
                        <h2 class="text-uppercase">LOCATIONS</h2>
                        <div class="dlab-separator-outer">
                            <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                        </div>
                    </div>
                    @foreach ($locations as $city => $cityLocations)
                    <h2 class="text-center text-uppercase text-primary">{{ $city }}</h2>
                    <div class="row">
                        @foreach ($cityLocations as $location)
                        <div class="col-md-6 col-lg-3 wow fadeInUp d-flex" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="icon-bx-wraper bx-style-1 m-t30 m-b30 p-a10 center flex-fill">
                                <div class="icon-xl text-primary m-b20">
                                    <a href="#" class="icon-cell">
                                        <i class="b-advantages-3__icon 
       {{ $location->location_type == 'Workshop' ? 'flaticon-gears' : 'flaticon-steering-wheel' }}">
                                        </i>
                                    </a>

                                </div>
                                <div class=" icon-content">
                                    <h3 class="dlab-tilte location-title">{{ $location->location_name }}</h3>
                                    <p>{{ $location->address }}</p>
                                    <p>Contact: {{ $location->contact }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="p-a30 bg-white clearfix m-b30">
                        <div class="section-head text-center">
                            <h2 class="text-uppercase">Get in touch</h2>
                            <div class="dlab-separator-outer">
                                <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                            </div>
                        </div>
                        <div class="dzFormMsg"></div>
                        <form method="post" class="bookNowForm" action="">
                            @csrf
                            <div class="row">
                                <!-- Row with 4 fields -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="name" type="text" class="form-control book_name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="email" type="email" class="form-control book_email" placeholder="Enter Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="contact" type="tel" class="form-control book_contact" placeholder="Enter Contact No" maxlength="10" onkeypress="return isNumberKey(event)" onkeyup="return limitlength(this, 10)">
                                        </div>
                                    </div>
                                </div>
                                <!-- Message Field -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="message" type="text" class="form-control book_message" placeholder="Enter Message..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- reCAPTCHA -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="g-recaptcha" data-sitekey="{{ RECAPTCHA_SITE_KEY }}" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                            <input class="form-control d-none" style="display:none;" data-recaptcha="true">
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="col-lg-12">
                                    <button name="submit" type="submit" value="Submit" class="site-button"> <span>Submit</span> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content END -->
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $secretKey = "6Lf3ZpYqAAAAAEEZsVoy2FETjAFiYochYTQWgJd9";
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $url = "https://www.google.com/recaptcha/api/siteverify";
    $response = file_get_contents($url . "?secret=" . $secretKey . "&response=" . $responseKey . "&remoteip=" . $userIP);
    $response = json_decode($response);

    if ($response->success) {
        echo "reCAPTCHA verification successful!";
    } else {
        echo "reCAPTCHA verification failed. Please try again.";
    }
}
?>
@endsection