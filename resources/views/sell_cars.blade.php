@extends('layouts.app')
@section('content')
<style>
    .icon-bx-sm {
        margin-top: 10px;
    }
</style>
<div class="page-wraper">
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle section-title-page">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Sell Your Car</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Sell Your Car</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-area">
            <!-- who we are -->
            <div class="section-head text-center" style="margin-top: 30px;">
                <h2 class="text-uppercase">Why Sell to <span class="text-primary">Vistacars</span></h2>
                <div class="dlab-separator-outer ">
                    <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!-- Side Bar -->
                    <div class="col-lg-8 col-md-12">
                        <!-- <div class="section-full bg-white bg-img-fix content-inner" style="padding-top: 0px;"> -->
                        <div class="container">
                            <div class="section-content">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                        <div class="icon-bx-wraper center m-t20">
                                            <div class="icon-bx-sm radius bg-primary m-b20"> <a href="#" class="icon-cell"><i class="b-advantages-4__icon1 fa fa-bullseye"></i></a> </div>
                                            <div class="icon-content">
                                                <h5 class="dlab-tilte text-uppercase">Best Price Guarantee</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                        <div class="icon-bx-wraper center m-t20">
                                            <div class="icon-bx-sm radius bg-primary m-b20"> <a href="#" class="icon-cell"><i class="b-advantages-4__icon1 fa fa-credit-card"></i></a> </div>
                                            <div class="icon-content">
                                                <h5 class="dlab-tilte text-uppercase">Instant Payment</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                        <div class="icon-bx-wraper center m-t20">
                                            <div class="icon-bx-sm radius bg-primary m-b20"> <a href="#" class="icon-cell"><i class="b-advantages-4__icon1 fa fa-external-link"></i></a> </div>
                                            <div class="icon-content">
                                                <h5 class="dlab-tilte text-uppercase">Assured RC Transfer</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                        <div class="icon-bx-wraper center m-t20">
                                            <div class="icon-bx-sm radius bg-primary m-b20"> <a href="#" class="icon-cell"><i class="b-advantages-4__icon1 fa fa-smile-o"></i></a> </div>
                                            <div class="icon-content">
                                                <h5 class="dlab-tilte text-uppercase">50,000+ Happy Sellers</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                        <div class="icon-bx-wraper center m-t20">
                                            <div class="icon-bx-sm radius bg-primary m-b20"> <a href="#" class="icon-cell"><i class="b-advantages-4__icon1 fa fa-gears"></i></a> </div>
                                            <div class="icon-content">
                                                <h5 class="dlab-tilte text-uppercase">EMI Option</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 m-b10">
                                        <div class="icon-bx-wraper center m-t20">
                                            <div class="icon-bx-sm radius bg-primary m-b20"> <a href="#" class="icon-cell"><i class="b-advantages-4__icon1 fa fa-handshake-o"></i></a> </div>
                                            <div class="icon-content">
                                                <h5 class="dlab-tilte text-uppercase">Park And Sale</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                    <!-- Side Bar END -->
                    <!-- Right Bar -->
                    <div class="col-lg-4 col-md-6">
                        <div class="p-a30 bg-gray clearfix m-t0">
                            <h5 class="text-uppercase">Sell Car at Our Nearest Branch</h5>
                            <form method="post" class="bookNowForm" action="">
                                <input type="hidden" value="Contact" name="dzToDo">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="name" type="text" class="form-control book_name" placeholder="Enter Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="email" type="email" class="form-control book_email" placeholder="Enter Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="contact" type="tel" class="form-control book_contact" placeholder="Enter contact" maxlength="10" onkeypress="return isNumberKey(event)" onkeyup="return limitLength(this, 10)"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="g-recaptcha" data-sitekey="{{ RECAPTCHA_SITE_KEY }}" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                                <input class="form-control d-none" style="display:none;" data-recaptcha="true" data-error="Please complete the Captcha">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button name="submit" type="submit" value="Submit" class="site-button "> <span>Get Price</span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Right Bar END -->
                </div>
                <!-- About Company -->
                <div class="section-full content-inner bg-white">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-head text-left">
                                    <h2> Sell Your Old Car In 30 Minutes Or Less At Vistacars!</h2><br>
                                    <h5>Benefits Of Selling Your Car To Us</h5>
                                    <div class="aon-separator bg-primary"></div>
                                    <p>We are part of the Excell Group of Industries, which is more than 30 years old. You know now that you can put your faith in us to give you the best quote for your car. Take advantage of our free car valuation service to determine the best price for your used car. If you decide not to sell your car to us after we’ve done our valuation, it’s still all right. Our valuation service is free of cost to you. So how about it? No more time-consuming buyer-interviews and Ads in the newspaper to sell your car.No more hassles. A free on-the-spot car valuation by vistacars at your doorstep. It doesn’t get better than this, does it?</p>
                                    <h4>Sell Your Car To Us In Just 3 Simple Steps-</h4>
                                    <p>Selling your car to us is a matter of following 3 simple steps. Just do this and you’re on your way to selling your car to a trusted buyer.</p>
                                    <ul class="list-check-circle primary">
                                        <li>Sign Up on our sell your car page Fill Car Details</li>
                                        <li>Fill your name, phone number and email Id into the Contact Form and submit it to us.</li>
                                        <li>sell your car contact with us</li>
                                    </ul>
                                    <h3>What Next?</h3>
                                    <p>What happens after you’ve submitted your contact form? This is what happens:</p>
                                    <ul class="list-check-circle primary">
                                        <li>One of our representatives will get in touch with you immediately. Be sure to give clear and accurate information on car brand, model, year, current mileage, previous owners if any and so on</li>
                                        <li>We’ll give you a primary quote for your car within 30 minutes.</li>
                                        <li>If you’re happy with our quote, book an appointment with us for a free car valuation and we’ll pay a visit to our location.</li>
                                        <li>We’ll assess your car thoroughly and determine the amount we can pay for it.</li>
                                        <li>If you’re happy with the final price we quote, we can hand over your cheque right there and then. The entire valuation and payment process will not take more than 30 minutes.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content END-->
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function verifyRecaptchaCallback(response) {
        console.log('reCAPTCHA verified:', response);
        document.querySelector('[data-recaptcha="true"]').value = response;
    }

    function expiredRecaptchaCallback() {
        console.log('reCAPTCHA expired');
        document.querySelector('[data-recaptcha="true"]').value = '';
    }
</script>
<script>
    function isNumberKey(evt) {
        var charCode = evt.which ? evt.which : evt.keyCode;
        if (charCode < 48 || charCode > 57) {
            return false;
        }
        return true;
    }

    function limitLength(element, maxLength) {
        if (element.value.length > maxLength) {
            element.value = element.value.slice(0, maxLength);
        }
    }
</script>
<script>
    document.querySelector(".bookNowForm").addEventListener("submit", function() {
        let now = new Date();
        let hours = now.getHours();
        let minutes = now.getMinutes();
        let ampm = hours >= 12 ? 'PM' : 'AM';

        hours = hours % 12;
        hours = hours ? hours : 12; // 0 ko 12 banana
        minutes = minutes < 10 ? '0' + minutes : minutes;

        let currentTime = hours + ":" + minutes + " " + ampm;
        document.getElementById("current_time").value = currentTime;
    });
</script>
@endsection