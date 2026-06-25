@extends('layouts.app')
@section('content')
<style>
    @media (max-width: 767px) {
        .dlab-post-tags {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .post-tags {
            display: inline-flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .post-tags a {
            margin: 5px 0;
        }
    }

    .dlab-post-tags {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dlab-post-tags .post-tags a {
        display: inline-block;
        max-width: 100px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-right: 10px;
        color: #45423e;
        text-decoration: none;
    }

    .test-drive-details {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        transition: transform 0.3s ease;
    }

    .test-drive-details:hover {
        transform: translateY(-5px);
    }

    .test-drive-header {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }

    .test-drive-icon {
        font-size: 20px;
        color: #007bff;
        margin-right: 10px;
    }

    .test-drive-date {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-right: 10px;
    }

    .test-drive-time {
        font-size: 16px;
        color: #555;
    }

    .test-drive-location {
        font-size: 22px;
        font-weight: 600;
        color: #333;
        margin: 15px 0;
    }

    .test-drive-info {
        font-size: 16px;
        color: #777;
        margin-bottom: 20px;
    }

    .test-drive-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn {
        font-size: 14px;
        border-radius: 5px;
        text-align: center;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    @media (max-width: 767px) {
        .test-drive-details {
            padding: 15px;
        }

        .test-drive-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .test-drive-date,
        .test-drive-time {
            margin-bottom: 5px;
        }

        .test-drive-actions {
            align-items: center;
        }

        .btn {
            width: 100%;
            margin-bottom: 10px;
        }
    }

    .b-about-main__subtitle {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 20px;
        font-weight: 300;
        line-height: 1.6;
        max-width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-see-cars {
        font-size: 16px;
        font-weight: 600;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border-radius: 30px;
        transition: background-color 0.3s ease, transform 0.3s ease;
        text-decoration: none;
    }

    .btn-see-cars:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .text-center {
        text-align: center;
    }

    .b-about-main__subtitle {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 20px;
        font-weight: 400;
        line-height: 1.7;
        max-width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-schedule-test-drive {
        font-size: 18px;
        font-weight: 600;
        padding: 12px 30px;
        background-color: #007bff;
        color: white;
        border-radius: 50px;
        transition: background-color 0.3s ease, transform 0.3s ease;
        text-decoration: none;
        box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);
    }

    .btn-schedule-test-drive:hover {
        background-color: #0056b3;
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 123, 255, 0.4);
    }

    .text-center {
        text-align: center;
    }

    .test-drive-header {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin: 10px 0;
    }

    .test-drive-icon {
        margin-right: 10px;
        font-size: 1.5rem;
    }

    .test-drive-date,
    .test-drive-time {
        font-family: 'Roboto', sans-serif;
        font-size: 1rem;
    }

    .test-drive-date {
        font-weight: 600;
        color: #007bff;
    }

    .test-drive-time {
        font-weight: 400;
        color: #495057;
    }

    @media (max-width: 576px) {
        .test-drive-header {
            flex-direction: column;
            text-align: center;
        }

        .test-drive-icon {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .test-drive-date,
        .test-drive-time {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 768px) {
        #welcome-heading {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        #welcome-heading {
            font-size: 1.5rem;
            line-height: 1.3;
            word-break: break-word;
        }
    }

    @media (max-width: 768px) {
        .nav-tabs {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .nav-tabs::-webkit-scrollbar {
            display: none;
        }

        .nav-tabs .nav-item {
            flex: 1 0 auto;
            text-align: center;
        }

        .nav-tabs .nav-link {
            display: block;
            padding: 10px;
        }

        .test-drive-details {
            margin-top: 15px;
        }
    }

</style>
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle section-title-page">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h2 id="welcome-heading" style="color: #f39c12; font-family: 'Arial, Helvetica, sans-serif'; text-transform: uppercase; font-size: 2.5rem; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); letter-spacing: 1px;">
                    HI <span style="font-family: 'Courier New, Courier, monospace';"> {{ session('user_name') }} </span>,
                    WELCOME TO VISTACARS
                </h2>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Dashboard</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- contact area -->
    <div class="section-full bg-white content-inner">
        <!-- About Company -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="dlab-tabs product-description border-tp bg-tabs tabs-site-button">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link active" href="#shortlisted">
                                    SHORTLISTED</a></li>
                            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#testdrive">
                                    TEST DRIVE</a></li>
                            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#contactrequested">
                                    CONTACT REQUESTED</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="shortlisted" class="tab-pane active show">
                                @if(!empty($usedCars) && $usedCars->count() > 0)
                                <ul class="row dlab-gallery-listing gallery-grid-4 gallery lightgallery m-b0">
                                    @foreach ($usedCars as $prow)
                                    <li class="home card-container col-lg-6 col-xl-4 col-md-6 col-sm-6 col-12" style="position: relative; margin-top: 15px;">
                                        <div class="product-item">
                                            <div class="dlab-box">
                                                <div class="dlab-thum-bx dlab-img-effect image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $prow->product_url) }}')">
                                                    <img src="{{ asset('web_images/product_images/' . ($prow->front_left_side_angle_image ?? 'featured-5.jpg')) }}" alt="">
                                                    <div class="overlay-bx">
                                                        <div class="overlay-icon">
                                                            <a href="javascript:void(0);" class="remove-from-wishlist" data-product-id="{{ $prow->product_id }}">
                                                                <i class="remove-product"></i> <button class="site-button button-sm m-r15" type="button">REMOVE</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ url('/car-details/' . $prow->product_url) }}" style="text-decoration: none; color: inherit;">
                                                    <div class="item-info text-center">
                                                        <h5 class="dlab-title m-l5 text-uppercase" style="white-space: nowrap; overflow: hidden; display: block;">
                                                            {{ $prow->mfg_year }} {{ $prow->make_name }} {{ $prow->model_name }}
                                                            <span class="heart-symbol">❤</span>
                                                        </h5>
                                                        <ul class="item-review">
                                                            @for ($t = 1; $t <= 5; $t++) @php $ratingClass=$t <=$prow->rating ? '' : ($t < $prow->rating + 1 && fmod($prow->rating, 1) !== 0 ? '-half-o' : '-o');
                                                                    $starColorClass = $prow->rating >= 4 ? 'star-green' : 'star-yellow';
                                                                    @endphp
                                                                    <li>
                                                                        <i class="fa fa-star{{ $ratingClass }} {{ $starColorClass }}"></i>
                                                                    </li>
                                                                    @endfor
                                                        </ul>
                                                        <h4>
                                                            <span class="text-primary">
                                                                <i class="fa fa-inr"></i> {{ number_format($prow->price) }}
                                                            </span>
                                                        </h4>
                                                        <div class="dlab-post-meta">
                                                            <div class="tooltip-wrapper" style="margin-bottom:0px;">
                                                                <ul>
                                                                    <li class="post-date">
                                                                        <i class="ti-location-pin"></i><strong>{{ $prow->location }}</strong>
                                                                    </li>
                                                                    <li class="post-author">
                                                                        EMI
                                                                        @php
                                                                        $amt = $prow->price * (20 / 100); // 20% down payment
                                                                        $p1 = $prow->price - $amt;
                                                                        $interestRate = 13; // 13% annual interest
                                                                        $rate = $interestRate / (12 * 100); // monthly interest rate
                                                                        $months = 36; // loan tenure in months
                                                                        $emi = $p1 * $rate * pow(1 + $rate, $months) / (pow(1 + $rate, $months) - 1);
                                                                        $emi = round($emi);
                                                                        @endphp
                                                                        <i class="fa fa-inr"></i>{{ $emi }}
                                                                        <i class="fa fa-exclamation-circle tooltip-icon"></i>
                                                                        <span class="tooltiptext">
                                                                            <b>EMI Calculated</b><br>
                                                                            10% - Down Payment,<br>
                                                                            13% - Interest,<br>
                                                                            3 Years - Tenure.
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="">
                                                    <div class="dlab-post-tags image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $prow->product_url) }}')">
                                                        <div class="post-tags" style="margin-left: 3px;">
                                                            <a style="color: #45423e;">{{ $prow->km_driven }} km</a>
                                                            <a style="color: #45423e;">{{ $prow->fuel_type }}</a>
                                                            <a style="color: #45423e;">
                                                                {!! $prow->owner == 1
                                                                ? '<span class="normal">1</span><span class="superscript">st</span>'
                                                                : ($prow->owner == 2
                                                                ? '<span class="normal">2</span><span class="superscript">nd</span>'
                                                                : '2+') !!} owner
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sale">
                                                <span class="site-button button-sm" style="cursor: default;">{{ $prow->type }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <p class="b-about-main__subtitle">No products found in your wishlist.</p>
                                @endif
                            </div>
                            <div id="testdrive" class="tab-pane">
                                <div class="row">
                                    <!-- Loop through Test Drives -->
                                    @if (count($testDrives) > 0)
                                    @foreach ($testDrives as $index => $testDrive)
                                    @php
                                    $makeName = $testDrive->make_name ?? '';
                                    $modelName = $testDrive->model_name ?? '';
                                    $variantName = $testDrive->variant_name ?? '';
                                    $price = $testDrive->price ?? 0;
                                    $emi = round(($price - ($price * 0.2)) * (13 / (12 * 100)) * pow(1 + (13 / (12 * 100)), 36) / (pow(1 + (13 / (12 * 100)), 36) - 1));
                                    @endphp
                                    <!-- Car Box -->
                                    <div id="test-drive-{{ $testDrive->test_drive_id }}" class="col-md-6 col-sm-12 test-drive-block">
                                        <div class="product-item" style="margin-top:10px;">
                                            <div class="dlab-box">
                                                <div class="dlab-thum-bx dlab-img-effect image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $testDrive->product_url) }}')">
                                                    <img src="{{ asset('web_images/product_images/' . ($testDrive->front_left_side_angle_image ?: 'featured-5.jpg')) }}" alt="">
                                                    <div class="overlay-bx">
                                                        <div class="overlay-icon">
                                                            <a href="javascript:void(0)" class="openModal" data-value="{{ $testDrive->product_id }}">
                                                                <i class="ti-heart icon-bx-xs heart-icon"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ url('/car-details/' . $testDrive->product_url) }}" style="text-decoration: none; color: inherit;">
                                                    <div class="item-info text-center">
                                                        <h5 class="dlab-title m-t0 text-uppercase" style="white-space: nowrap; overflow: hidden; display: block;">
                                                            {{ $testDrive->mfg_year }} {{ $makeName }} {{ $modelName }}
                                                            <span class="heart-symbol">❤</span>
                                                        </h5>
                                                        <ul class="item-review">
                                                            @for ($t = 1; $t <= 5; $t++) @php $ratingClass=$t <=$testDrive->rating
                                                                ? ''
                                                                : ($t < $testDrive->rating + 1 &&
                                                                    fmod($testDrive->rating, 1) !== 0
                                                                    ? '-half-o'
                                                                    : '-o');
                                                                    $starColorClass =
                                                                    $testDrive->rating >= 4 ? 'star-green' : 'star-yellow';
                                                                    @endphp
                                                                    <li><i class="fa fa-star{{ $ratingClass }} {{ $starColorClass }}"></i>
                                                                    </li>
                                                                    @endfor
                                                        </ul>
                                                        <h4>
                                                            <span class="text-primary">
                                                                <i class="fa fa-inr"></i> {{ number_format($price) }}
                                                            </span>
                                                        </h4>
                                                        <div class="dlab-post-meta">
                                                            <div class="tooltip-wrapper" style="margin-bottom:0px;">
                                                                <ul>
                                                                    <li class="post-date">
                                                                        <i class="ti-location-pin"></i><strong>{{ $testDrive->location }}</strong>
                                                                    </li>
                                                                    <li class="post-author">
                                                                        EMI
                                                                        @php
                                                                        $amt = $testDrive->price * (20 / 100);
                                                                        $p1 = $testDrive->price - $amt;
                                                                        $interestRate = 13;
                                                                        $rate = $interestRate / (12 * 100);
                                                                        $months = 36;
                                                                        $emi = $p1 * $rate * pow(1 + $rate, $months) / (pow(1 + $rate, $months) - 1);
                                                                        $emi = round($emi);
                                                                        @endphp
                                                                        <i class="fa fa-inr"></i>{{ $emi }}
                                                                        <i class="fa fa-exclamation-circle tooltip-icon"></i>
                                                                        <span class="tooltiptext">
                                                                            <b>EMI Calculated</b><br>
                                                                            10% - Down Payment,<br>
                                                                            13% - Interest,<br>
                                                                            3 Years - Tenure.
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="">
                                                    <div class="dlab-post-tags image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $testDrive->product_url) }}')">
                                                        <div class="post-tags" style="margin-left:58px;">
                                                            <a style="color: #45423e;">{{ $testDrive->km_driven }} km</a>
                                                            <a style="color: #45423e;">{{ $testDrive->fuel_type }}</a>
                                                            <a style="color: #45423e;">
                                                                {!! $testDrive->owner == 1
                                                                ? '<span class="normal">1</span><span class="superscript">st</span>'
                                                                : ($testDrive->owner == 2
                                                                ? '<span class="normal">2</span><span class="superscript">nd</span>'
                                                                : '2+') !!} owner
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sale">
                                                <span class="site-button button-sm" style="cursor:default;">{{ $testDrive->type }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Test Drive Scheduling -->
                                    <div id="test-drive-schedule-{{ $testDrive->test_drive_id }}" class='col-md-6 col-sm-12 text-center test-drive-block'>
                                        <section class="test-drive-details">
                                            <div class="test-drive-header">
                                                <i class="test-drive-icon fa fa-calendar"></i>
                                                <span class="test-drive-date" style="font-family: 'Roboto', sans-serif; font-size: 1rem; font-weight: 600; color: #007bff; margin-right: 10px;">
                                                    {{ date("d M", strtotime($testDrive->test_drive_date)) }}
                                                </span>
                                                <span class="test-drive-time" style="font-family: 'Roboto', sans-serif; font-size: 1rem; font-weight: 400; color: #495057;">
                                                    {{ $testDrive->test_drive_time }}
                                                </span>
                                            </div>
                                            <h4 class="test-drive-location text-uppercase text-secondary" style="font-family: 'Roboto', sans-serif; font-size: 1.25rem; font-weight: 700; letter-spacing: 1px; color: #4a4a4a;">
                                                {{ $testDrive->showroom_location }}
                                            </h4>
                                            <div class="test-drive-info" style="font-family: 'Roboto', sans-serif; font-size: 1rem; font-weight: 400; line-height: 1.5; color: #6c757d;">
                                                {{ $testDrive->address }}
                                            </div>
                                        </section>
                                        <div class="test-drive-actions">
                                            <a class="btn btn-primary" href="javascript:void(0);" onclick="test_drive('{{ $testDrive->showroom_location }}','{{ date("d/m/Y", strtotime($testDrive->test_drive_date)) }}','{{ $testDrive->test_drive_time }}','{{ $testDrive->address }}','{{ $testDrive->test_drive_id }}')">Reschedule</a>
                                            <a class="btn btn-danger" href="javascript:void(0);" onclick="cancelTestDrive('{{ $testDrive->test_drive_id }}')">Cancel</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    @else
                                    <div class="text-center">
                                        <div class="b-about-main__subtitle">
                                            Experience the next generation of car buying
                                        </div>
                                        <a class="btn btn-primary btn-schedule-test-drive" href="{{ url('/') }}">Schedule Test Drive</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div id="contactrequested" class="tab-pane">
                                @if(!empty($contact_requesteds) && $contact_requesteds->count() > 0)
                                <ul class="row dlab-gallery-listing gallery-grid-4 gallery lightgallery m-b0">
                                    @foreach ($contact_requesteds as $prow)
                                    <li class="home card-container col-lg-6 col-xl-4 col-md-6 col-sm-6 col-12" style="margin-top: 15px;">
                                        <div class="product-item">
                                            <div class="dlab-box">
                                                <div class="dlab-thum-bx dlab-img-effect image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $prow->product_url) }}')">
                                                    <img src="{{ asset('web_images/product_images/' . ($prow->front_left_side_angle_image ?? 'featured-5.jpg')) }}" alt="">
                                                    <div class="overlay-bx">
                                                        <div class="overlay-icon">
                                                            <a href="javascript:void(0)" class="openModal" data-value="{{ $prow->product_id }}">
                                                                <i class="ti-heart icon-bx-xs heart-icon"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ url('/car-details/' . $prow->product_url) }}" style="text-decoration: none; color: inherit;">
                                                    <div class="item-info text-center">
                                                        <h5 class="dlab-title m-t0 text-uppercase" style="white-space: nowrap; overflow: hidden; display: block;">
                                                            {{ $prow->mfg_year }} {{ $prow->make_name }}
                                                            {{ $prow->model_name }}
                                                            <span class="heart-symbol">❤</span>
                                                        </h5>
                                                        <ul class="item-review">
                                                            @for ($t = 1; $t <= 5; $t++) @php $ratingClass=$t <=$prow->rating ? '' : ($t < $prow->rating + 1 && fmod($prow->rating, 1) !== 0 ? '-half-o' : '-o');
                                                                    $starColorClass = $prow->rating >= 4 ? 'star-green' : 'star-yellow';
                                                                    @endphp
                                                                    <li>
                                                                        <i class="fa fa-star{{ $ratingClass }} {{ $starColorClass }}"></i>
                                                                    </li>
                                                                    @endfor
                                                        </ul>
                                                        <h4>
                                                            <span class="text-primary">
                                                                <i class="fa fa-inr"></i> {{ number_format($prow->price) }}
                                                            </span>
                                                        </h4>
                                                        <div class="dlab-post-meta">
                                                            <div class="tooltip-wrapper" style="margin-bottom:0px;">
                                                                <ul>
                                                                    <li class="post-date">
                                                                        <i class="ti-location-pin"></i><strong>{{ $prow->location }}</strong>
                                                                    </li>
                                                                    <li class="post-author">
                                                                        EMI
                                                                        @php
                                                                        $amt = $prow->price * (20 / 100); // 20% down payment
                                                                        $p1 = $prow->price - $amt;
                                                                        $interestRate = 13; // 13% annual interest
                                                                        $rate = $interestRate / (12 * 100); // monthly interest rate
                                                                        $months = 36; // loan tenure in months
                                                                        $emi = $p1 * $rate * pow(1 + $rate, $months) / (pow(1 + $rate, $months) - 1);
                                                                        $emi = round($emi);
                                                                        @endphp
                                                                        <i class="fa fa-inr"></i>{{ $emi }}
                                                                        <i class="fa fa-exclamation-circle tooltip-icon"></i>
                                                                        <span class="tooltiptext">
                                                                            <b>EMI Calculated</b><br>
                                                                            10% - Down Payment,<br>
                                                                            13% - Interest,<br>
                                                                            3 Years - Tenure.
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="">
                                                    <div class="dlab-post-tags image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $prow->product_url) }}')">
                                                        <div class="post-tags">
                                                            <a style="color: #45423e;">{{ $prow->km_driven }} km</a>
                                                            <a style="color: #45423e;">{{ $prow->fuel_type }}</a>
                                                            <a style="color: #45423e;">
                                                                {!! $prow->owner == 1
                                                                ? '<span class="normal">1</span><span class="superscript">st</span>'
                                                                : ($prow->owner == 2
                                                                ? '<span class="normal">2</span><span class="superscript">nd</span>'
                                                                : '2+') !!} owner
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sale">
                                                <span class="site-button button-sm">{{ $prow->type }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <div class="text-center">
                                    <div class="b-about-main__subtitle">
                                        Ask for the contact of the sellers of the cars you like and buy before someone else does
                                    </div>
                                    <a class="btn btn-primary btn-see-cars" href="{{ url('/used-cars') }}">See all recently visited cars</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <button type="button" class="site-button" style="color: white; background-color: black; width: 100%; margin-bottom: 10px;" id="editprofile">
                        <span>EDIT PROFILE</span>
                    </button>
                    <div class="col-lg-12">
                        <div class="p-a30 bg-gray clearfix m-b30 ">
                            <h2 class="text-danger text-center">BOOK NOW</h2>
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
                                                <input name="contact" type="tel" class="form-control book_contact" placeholder="Enter Contact No" maxlength="10" onkeypress="return isNumberKey(event)" onkeyup="return limitlength(this, 10)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="email" type="email" class="form-control book_email" placeholder="Enter Email Id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="recaptcha-container">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="g-recaptcha" data-sitekey="{{ RECAPTCHA_SITE_KEY }}" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback">
                                                </div>
                                                <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">
                                            </div>
                                        </div>
                                    </div>
                                    <input type='hidden' name='enq' class='enq' value='Book Now'>
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
        </div>
    </div>
</div>
{{-- Reschedule Modal --}}
<div id="book_a_test_drive" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close pull-right" data-dismiss="modal">X</button>
                <h5 class="modal-title text-center text-danger" style="font-family: 'Lora', serif; font-weight:300; font-size: 32px; color: #333; padding-top: 20px;">Reschedule Test Drive</h5>
                <div class="row" style="padding-top: 10px;">
                    <input type='hidden' id='test_drive_id'>
                    <div class="col-md-12">
                        <div class="form-group">
                            <select class="selectpicker" id="showroom_location" name="showroom_location" data-width="100%">
                                <option value="">Select location</option>
                                @foreach ($locations as $location)
                                <option value="{{ $location->location_name }}">
                                    {{ $location->location_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" name="test_drive_date" type="text" id="datepicker" placeholder="Pick Date" required="required" />
                    </div>
                    <div class="form-group col-md-6">
                        <select class="selectpicker" name="test_drive_time" id="test_drive_time" data-width="100%">
                            <option value="">Select Time</option>
                            <option value="10 AM - 12 PM">10 AM - 12 PM</option>
                            <option value="12 PM - 02 PM">12 PM - 02 PM</option>
                            <option value="02 PM - 04 PM">02 PM - 04 PM</option>
                            <option value="04 PM - 06 PM">04 PM - 06 PM</option>
                            <option value="06 PM - 08 PM">06 PM - 08 PM</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-primary" style="margin-left:30px; margin-top:20px;" onclick="return updateReschedule()">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', '.remove-from-wishlist', function() {
        var productId = $(this).data('product-id');
        var productElement = $(this).closest('li');

        Swal.fire({
            title: 'Are you sure?'
            , text: "You won't be able to revert this!"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/remove-from-wishlist'
                    , type: 'POST'
                    , data: {
                        product_id: productId
                        , _token: $('meta[name="csrf-token"]').attr('content')
                    }
                    , success: function(response) {
                        if (response.success) {
                            productElement.remove();
                            Swal.fire(
                                'Removed!', response.message, 'success'
                            );
                        } else {
                            Swal.fire(
                                'Error!', response.message, 'error'
                            );
                        }
                    }
                    , error: function() {
                        Swal.fire(
                            'Error!', 'Something went wrong. Please try again later.', 'error'
                        );
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        $(".nav-tabs .nav-link").on("click", function(e) {
            e.preventDefault();
            $(".nav-tabs .nav-link").removeClass("active");
            $(".tab-content .tab-pane").removeClass("active show");
            $(this).addClass("active");
            $($(this).attr("href")).addClass("active show");
        });
    });

    function cancelTestDrive(testDriveId) {
        Swal.fire({
            title: 'Are you sure?'
            , text: "You won't be able to revert this!"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Yes, cancel it!'
            , cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/cancel-test-drive'
                    , type: 'POST'
                    , data: {
                        test_drive_id: testDriveId
                        , _token: '{{ csrf_token() }}'
                    }
                    , success: function(response) {
                        if (response.success) {
                            let element1 = $(`#test-drive-${testDriveId}`);
                            let element2 = $(`#test-drive-schedule-${testDriveId}`);
                            if (element1.length) {
                                element1.fadeOut('slow', function() {
                                    $(this).remove();
                                    console.log(`Test drive #${testDriveId} removed.`);
                                });
                            } else {
                                console.error(`Test drive block #${testDriveId} not found in DOM.`);
                            }
                            if (element2.length) {
                                element2.fadeOut('slow', function() {
                                    $(this).remove();
                                    console.log(`Test drive #${testDriveId} removed.`);
                                });
                            } else {
                                console.error(`Test drive block #${testDriveId} not found in DOM.`);
                            }
                            Swal.fire(
                                'Cancelled!', 'The test drive has been cancelled successfully.', 'success'
                            );
                        } else {
                            Swal.fire(
                                'Error!', 'Failed to cancel the test drive. Please try again.', 'error'
                            );
                        }
                    }
                    , error: function(xhr) {
                        console.error(xhr.responseText);
                        Swal.fire(
                            'Error!', 'An error occurred. Please try again later.', 'error'
                        );
                    }
                });
            }
        });
    }

    function test_drive(showroom_location, date, time, address, test_drive_id) {
        $('#test_drive_id').val(test_drive_id);
        $('#showroom_location').selectpicker('val', showroom_location);
        $('#test_drive_time').selectpicker('val', time);
        $('#datepicker').val(date);
        $('#address').val(address);
        $('#showroom_location').selectpicker('refresh');
        $('#test_drive_time').selectpicker('refresh');
        $('#book_a_test_drive').modal('show');
    }

    $('#book_a_test_drive').on('hidden.bs.modal', function() {
        $(this).find('input, textarea').val('');
        $('#showroom_location, #test_drive_time').selectpicker('val', '');
    });

    function updateReschedule() {
        var test_drive_id = $('#test_drive_id').val();
        var showroom_location = $('#showroom_location').val();
        var test_drive_date = $('#datepicker').val();
        var test_drive_time = $('#test_drive_time').val();
        var address = $('#address').val();
        var errors = [];

        if (!showroom_location) {
            errors.push("Please select a showroom location.");
        }

        if (!test_drive_date) {
            errors.push("Please select a test drive date.");
        } else {
            var datePattern = /^\d{2}\/\d{2}\/\d{4}$/;
            if (!datePattern.test(test_drive_date)) {
                errors.push("Invalid date format. Use dd/mm/yyyy.");
            }
        }

        if (!test_drive_time) {
            errors.push("Please select a test drive time.");
        }

        if (!address || address.trim().length === 0) {
            errors.push("Please enter an address.");
        } else if (address.length > 500) {
            errors.push("Address cannot exceed 500 characters.");
        }

        if (errors.length > 0) {
            errors.forEach((error) => toastr.error(error));
            return false;
        }

        $.ajax({
            url: '/reschedule-update'
            , type: 'POST'
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , data: {
                test_drive_id: test_drive_id
                , showroom_location: showroom_location
                , test_drive_date: test_drive_date
                , test_drive_time: test_drive_time
                , address: address
            }
            , success: function(response) {
                if (response.success) {
                    $('#book_a_test_drive').modal('hide');
                    toastr.success(response.message);
                    window.location.reload();
                }
            }
            , error: function(xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    for (var field in errors) {
                        toastr.error(errors[field][0]);
                    }
                } else {
                    toastr.error(xhr.responseJSON.message || 'An error occurred');
                }
            }
        });
    }

</script>
@endsection
