@extends('layouts.app')
@section('content')
<div class="page-wraper">
    <!-- Content -->
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle section-title-page">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white text-uppercase">Frequently Asked Questions</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Faq's</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content bg-white">
            <!-- Faq -->
            <section class="section-full content-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            <div class="row">
                                <div class="col-md-12 m-b30">
                                    <div class="dez-accordion space" id="accordion1">
                                        <div class="panel">
                                            @if ($faqs->isNotEmpty())
                                            @foreach ($faqs as $key => $faq)
                                            <div class="acod-head">
                                                <h6 class="acod-title">
                                                    <a data-toggle="collapse" href="#collapse{{ $key }}"
                                                        @if($key===0) aria-expanded="true" @else aria-expanded="false" @endif>
                                                        <i class="fa fa-question-circle"></i> {{ $faq->que }}
                                                    </a>
                                                </h6>
                                            </div>
                                            <div id="collapse{{ $key }}"
                                                class="acod-body collapse @if($key === 0) show @endif"
                                                data-parent="#accordion1">
                                                <div class="acod-content"> {!! $faq->ans !!}</div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Faq END -->
                        </div>
                        <div class="col-lg-4 col-md-5 contact-style-1 faqs-form">
                            <div class="p-a30 bg-gray clearfix m-b30 sticky-top">
                                <h2 class="text-uppercase">Get in Touch</h2>
                                <div class="dzFormMsg"></div>
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
                                                    <input name="contact" type="tel" class="form-control book_contact" placeholder="Enter Contact No" maxlength="10" onkeypress="return isNumberKey(event)" onkeyup="return limitlength(this, 10)">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="g-recaptcha" data-sitekey="{{ RECAPTCHA_SITE_KEY }}" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback">
                                                    </div>
                                                    <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">
                                                </div>
                                            </div>
                                        </div>
                                        <input type='hidden' name='enq' class='enq' value='Contact Us'>
                                        <div class="col-lg-12">
                                            <button name="submit" type="submit" value="Submit" class="site-button">
                                                <span>Submit</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Faq END -->
        </div>
        <!-- contact area  END -->
    </div>
    <!-- Content END-->
</div>
@endsection