@extends('layouts.app')
@section('content')
<style>
    /* right side search desig  */
    .b-car-info__desc-dt {
        border-bottom: 1px dotted #ccc;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }

    .box-container {
        border: 1px solid #ccc;
        padding: 20px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .b-car-info__desc dl {
        display: flex;
        flex-wrap: wrap;
    }

    .info-item {
        display: flex;
        margin-bottom: 10px;
        width: 100%;
    }

    .b-car-info__desc-dt {
        font-weight: bold;
        width: 100px;
    }

    .b-car-info__desc-dd {
        margin-left: 60px;
    }

    /* right side search design end  */

    /* modal design  */
    #bookTestDriveModal .left-section {
        display: block;
    }

    #bookTestDriveModal .right-section {
        display: block;
    }

    /* Mobile View */
    @media (max-width: 768px) {
        #bookTestDriveModal .left-section {
            display: none;
        }

        #bookTestDriveModal .right-section {
            width: 100%;
            border-right: none;
        }
    }

    /*modal design end  */

    /* EMI calculator design  */
    body {
        background-color: #f8f9fa;
    }

    .b-calculator__header {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .b-calculator {
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    .b-calculator__header i {
        font-size: 2.5rem;
        margin-right: 10px;
    }

    .b-calculator__name {
        font-size: 1.8rem;
        color: #343a40;
    }

    .b-calculator__info {
        font-size: 1rem;
        color: #6c757d;
    }

    .b-calculator__label {
        font-size: 1rem;
        color: #495057;
        margin-bottom: 8px;
        display: block;
    }

    .b-calculator__input {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 10px 15px;
        font-size: 1.1rem;
    }

    .btn {
        border-radius: 5px;
    }

    .table {
        border: 1px solid #dee2e6;
        background: #fff;
        margin-top: 0.5rem;
    }

    .table thead {
        background-color: #343a40;
        color: #fff;
    }

    .table td {
        font-size: 1rem;
        padding: 15px;
    }

    .b-calculator__group {
        margin-bottom: 1rem;
    }

    /* calculator design end  */

    .fa-times:before {
        color: red;
    }

    .fa-check:before {
        color: green;
    }

    .fa-inr:before {
        color: white;
    }

    .fa-exclamation-circle:before {
        color: white;
    }

    .item-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        text-align: center;
    }

    .item-review li {
        display: inline-block;
        margin: 0 3px;
    }

    .callback-link {
        display: none;
    }

    @media (max-width: 768px) {
        .callback-link {
            display: inline-block;
        }
    }

    .modal-title {
        text-align: center;
    }

    .btn-close {
        position: absolute;
        top: 15px;
        right: 15px;
    }
</style>

<style>
    .b-car-details__address {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    @media (max-width: 768px) {
        .b-car-details__address {
            flex-direction: column;
            align-items: flex-start;
        }

        /* .b-car-details__address div {
            margin-bottom: 10px;
        } */

        .b-car-details__address a {
            margin-top: 5px;
        }
    }
</style>
<style>
    .check-icon {
        color: green;
        font-weight: bold;
    }

    .cross-icon {
        color: red;
        font-weight: bold;
    }
</style>
<style>
    @media (max-width: 767px) {

        .dlab-bnr-inr,
        .breadcrumb-row {
            display: none;
        }
    }
</style>
<style>
    @media (max-width: 767px) {
        .mobile-hide {
            display: none !important;
        }

        .mobile-show {
            display: block !important;
        }
    }

    @media (min-width: 768px) {
        .mobile-show {
            display: none !important;
        }
    }
</style>
<style>
    .dlab-post-media img {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 5px;
    }
</style>
<style>
    .modal-content {
        box-shadow: none !important;
        /* Shadow remove karne ke liye */
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="page-wraper">
    <div class="page-content bg-white">
        <div class="dlab-bnr-inr overlay-black-middle section-title-page">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">CAR DETAILS</h1>
                </div>
            </div>
        </div>
        @if ($popularVehicles->isNotEmpty())
        @foreach ($popularVehicles as $vehicle)
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ url('/used-cars') }}">Used Cars in</a></li>
                    <li><a href="{{ url('/used-cars') }}">{{ $vehicle->make_name }} </a></li>
                    <li><a href=""> {{ $vehicle->mfg_year }} {{ $vehicle->model_name }} {{ $vehicle->variant_name }} </a></li>
                </ul>
            </div>
        </div>
        <!-- New code implement start -->
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- left sidebar start  -->
                    <div class="col-lg-8 col-md-7 col-sm-6" style="margin-top: 20px">
                        <div class="section-head text-center" style="margin-bottom: 20px">
                            <h2 class="text-uppercase">{{ $vehicle->mfg_year }} {{ $vehicle->make_name }} {{ $vehicle->model_name }} {{ $vehicle->variant_name }}</h2>
                            <div class="dlab-separator-outer ">
                                <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                            </div>
                        </div>
                        <div class="b-car-details__address">
                            <div>
                                <i class="ti-location-pin" style="color: #EE3131 !important;"></i>
                                Stock Location: {{ $vehicle->location }} | RTO: {{ $vehicle->rto }}
                                <!-- <a href="javascript:void(0);" class="callback-link" data-bs-toggle="modal" data-bs-target="#callbackModal">
                                    <i class="icon fa fa-phone"></i>
                                    <span style="color: black;"> Request A Callback </span>
                                </a> -->
                                <!-- Pricing Details for Mobile -->
                                <div class="pricingtable-title mobile-show" style="display: flex; align-items: center; justify-content: space-between; padding: 0px; border-radius: 5px; gap: 15px; background: none !important;">
                                    <span style="font-size: 22px; color: black; font-weight: 500; display: flex; align-items: center; background: none !important;">
                                        <i class="text" style="margin-right: 5px;"></i> ₹
                                        @php
                                        $price = (string) $vehicle->price;
                                        @endphp

                                        @if(strlen($price) == 7)
                                        {{ $price[0] . $price[1] . ' L' }}
                                        @elseif(strlen($price) == 6)
                                        {{ $price[0] . '.' . $price[1] . ' L' }}
                                        @else
                                        {{ $price }}
                                        @endif
                                        <span style="font-size: 14px; color: #666; display: flex; align-items: center; background: none !important;background-color: #aaaaaa">
                                            <i class="fa fa-inr" style="margin-right: 5px;"></i> ₹ EMI:
                                            @php
                                            $r = 13;
                                            $amt = ($vehicle->price * (20 / 100));
                                            $p = ($vehicle->price - $amt);
                                            $a = $r / (12 * 100);
                                            $t = 36;
                                            $c = 1 + $a;
                                            $b = pow($c, $t);
                                            $emi = $p * $a * $b / ($b - 1);
                                            @endphp
                                            {{ round($emi) }} /-
                                        </span>
                                        <li class="post-author" style="list-style: none; margin-left: 10px;">
                                            <i id="open_emi_calculator" style="font-size:18px; color: #EE3131;" class="fa tooltip-icon">&#xf06a;</i>
                                        </li>
                                </div>
                            </div>
                            <div>
                                <a href="javascript:void(0);" class="{{ session('user_logged_in') ? 'bookDriveModal' : 'openModal' }}">
                                    <i class="fa fa-car" style="color: #EE3131 !important;"></i>
                                    <span style="color: black; text-decoration: underline;">Book a Test Drive</span>
                                </a>
                                <!-- <a href="javascript:void(0);">
                                    <i class="fa fa-share-alt" style="color: #EE3131 !important;"></i>
                                    <span style="color: black; text-decoration: underline;"> Share </span>
                                </a> -->
                                <a href="javascript:void(0);" class="callback-link" data-bs-toggle="modal" data-bs-target="#callbackModal">
                                    <i class="icon fa fa-phone"></i>
                                    <span style="color: black;"> Request A Callback </span>
                                </a>
                            </div>
                        </div>
                        <!-- <div class="blog-post blog-lg date-style-2">
                            <div class="dlab-post-media dlab-img-effect zoom-slow">
                                <a href="">
                                    <img src="{{ asset('web_images/product_images/' . $vehicle->front_left_side_angle_image) }}" alt="">
                                </a>
                            </div>
                        </div> -->
                        <div class="product-item">
                            <div class="dlab-box">
                                <div class="dlab-post-media dlab-img-effect zoom-slow">
                                    <img src="{{ asset('web_images/product_images/' . ($vehicle->front_left_side_angle_image ?? 'featured-5.jpg')) }}" alt="">
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">
                                            <a href="javascript:void(0)" class="openModal" data-value="{{ $vehicle->product_id }}">
                                                <i class="ti-heart icon-bx-xs heart-icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                    <div class="col-lg-4 col-md-5 col-sm-6 sticky-top" style="margin-top: 20px">
                        <aside class="side-bar">
                            <div class="widget">
                                <div class="search-bx">
                                    <form role="search" method="post">
                                        <div class="pricingtable-title mobile-hide" style="display: flex; align-items: center; justify-content: center;padding: 10px; border-radius: 5px;">
                                            <h2 style="margin: 0; color: white;">
                                                <i class="fa fa-inr" style="margin-right: 5px;"></i>
                                                @php
                                                $price = (string) $vehicle->price;
                                                @endphp

                                                @if(strlen($price) == 7)
                                                {{ $price[0] . $price[1] . ' L' }}
                                                @elseif(strlen($price) == 6)
                                                {{ $price[0] . '.' . $price[1] . ' L' }}
                                                @else
                                                {{ $price }}
                                                @endif

                                            </h2>
                                            <div class="tooltip-wrapper" style="display: flex; align-items: center; gap: 15px; margin-left: 20px;">
                                                <ul style="display: flex; list-style: none; margin: 0; padding: 0; align-items: center; gap: 15px; color: white;">
                                                    <li style="margin: 0; display: flex; align-items: center;">
                                                        <i class="fa fa-inr" style="margin-right: 5px;"></i> EMI
                                                        @php
                                                        $r = 13; // Annual interest rate (in percentage)
                                                        $amt = ($vehicle->price * (20 / 100)); // Down payment (20% of price)
                                                        $p = ($vehicle->price - $amt); // Principal amount after down payment
                                                        $a = $r / (12 * 100); // Monthly interest rate
                                                        $t = 36; // Tenure in months
                                                        $c = 1 + $a; // Rate factor
                                                        $b = pow($c, $t); // Power factor
                                                        $emi = $p * $a * $b / ($b - 1); // EMI calculation
                                                        @endphp
                                                        {{ round($emi) }}
                                                    </li>
                                                    <ul>
                                                        <li class="post-author"><i class="fa fa-exclamation-circle tooltip-icon"></i>
                                                            <span class="tooltiptext">
                                                                <b>EMI Calculated</b><br>
                                                                10% - Down Payment,<br>
                                                                13 % - Interest,<br>
                                                                3 Years - Tenure.
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="box-container">
                                            <dl class="b-car-info__desc dl-horizontal bg-grey" style="margin-bottom: -10px;">
                                                <div class="info-item">
                                                    <dt class="b-car-info__desc-dt">Body</dt>
                                                    <dd class="b-car-info__desc-dd">{{ $vehicle->body_type }}</dd>
                                                </div>
                                                <div class="info-item">
                                                    <dt class="b-car-info__desc-dt">Engine</dt>
                                                    <dd class="b-car-info__desc-dd">{{ $vehicle->engine }}</dd>
                                                </div>
                                                <div class="info-item">
                                                    <dt class="b-car-info__desc-dt">Transmission</dt>
                                                    <dd class="b-car-info__desc-dd">{{ $vehicle->transmission_type }}</dd>
                                                </div>
                                                <div class="info-item">
                                                    <dt class="b-car-info__desc-dt">Fuel</dt>
                                                    <dd class="b-car-info__desc-dd">{{$vehicle->fuel_type}}</dd>
                                                </div>
                                                <div class="info-item">
                                                    <dt class="b-car-info__desc-dt">KM Driven</dt>
                                                    <dd class="b-car-info__desc-dd">{{ $vehicle->km_driven }} km</dd>
                                                </div>
                                                <div class="info-item">
                                                    <dt class="b-car-info__desc-dt">Color</dt>
                                                    <dd class="b-car-info__desc-dd">{{ $vehicle->color }}</dd>
                                                </div>
                                                <div class="info-item">
                                                    <dt class="b-car-info__desc-dt">Owner</dt>
                                                    <dd class="b-car-info__desc-dd">{{ $vehicle->owner }}</dd>
                                                </div>
                                                <div class="info-item">
                                                    <dt class="b-car-info__desc-dt">RC Type</dt>
                                                    <dd class="b-car-info__desc-dd">{{ $vehicle->rc_type}}</dd>
                                                </div>
                                                <div class="info-item">
                                                    <dt class="b-car-info__desc-dt">Insurance</dt>
                                                    <dd class="b-car-info__desc-dd">{{ $vehicle->insurance }}</dd>
                                                </div>
                                                <div class="info-item">
                                                    <dt class="b-car-info__desc-dt">Validity</dt>
                                                    <dd class="b-car-info__desc-dd">
                                                        {{ $vehicle->insurance_validity == '0000-00-00' ? '-' : $vehicle->insurance_validity }}
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <!-- Side bar END -->
                </div>
            </div>
        </div>
        <!-- new code implements end  -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- left sidebar start  -->
                    <div class="col-lg-8 col-md-7 col-sm-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-head text-center text-black">
                                    <h2 class="text-uppercase">features</h2>
                                    <div class="dlab-separator-outer ">
                                        <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                                    </div>
                                </div>
                                <div class="dlab-tabs product-description border-tp bg-tabs tabs-site-button">
                                    <ul class="nav nav-tabs ">
                                        <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#web-design-1">
                                                <i class="fa fa-globe"></i> SAFETY</a></li>
                                        <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#graphic-design-1">
                                                <i class="fa fa-photo"></i> COMFORT</a></li>
                                        <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#developement-1">
                                                <i class="fa fa-cog"></i> ACCESSORIES</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="web-design-1" class="tab-pane active">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->abs == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->abs == 'Yes' ? '✔' : 'X' }}
                                                        </span> ABS
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->child_safety == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->child_safety == 'Yes' ? '✔' : 'X' }}
                                                        </span> Child safety locks
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->seat_belt == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->seat_belt == 'Yes' ? '✔' : 'X' }}
                                                        </span> Seat belt warning
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->door_ajar_warning == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->door_ajar_warning == 'Yes' ? '✔' : 'X' }}
                                                        </span> Door ajar warning
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->anti_theft_alarm == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->anti_theft_alarm == 'Yes' ? '✔' : 'X' }}
                                                        </span> Anti-theft alarm
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->rear_parking_sensor == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->rear_parking_sensor == 'Yes' ? '✔' : 'X' }}
                                                        </span> Rear parking sensor
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->central_locking == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->central_locking == 'Yes' ? '✔' : 'X' }}
                                                        </span> Central locking
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->rear_camera == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->rear_camera == 'Yes' ? '✔' : 'X' }}
                                                        </span> Rear camera
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->airbag == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->airbag == 'Yes' ? '✔' : 'X' }}
                                                        </span> Airbags
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div id="graphic-design-1" class="tab-pane">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->tilt_streering == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->tilt_streering == 'Yes' ? '✔' : 'X' }}
                                                        </span> Tilt steering
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->audio_controls == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->audio_controls == 'Yes' ? '✔' : 'X' }}
                                                        </span> Audio controls on steering
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->air_conditioner == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->air_conditioner == 'Yes' ? '✔' : 'X' }}
                                                        </span> Air Conditioner
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->rear_defogger == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->rear_defogger == 'Yes' ? '✔' : 'X' }}
                                                        </span> Rear Defogger
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->power_window_front == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->power_window_front == 'Yes' ? '✔' : 'X' }}
                                                        </span> Power Window Front
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->adjustable_seats == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->adjustable_seats == 'Yes' ? '✔' : 'X' }}
                                                        </span> Automatic Adjustable seats
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->power_window_back == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->power_window_back == 'Yes' ? '✔' : 'X' }}
                                                        </span> Power Window Back
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->remote_truck_opener == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->remote_truck_opener == 'Yes' ? '✔' : 'X' }}
                                                        </span> Remote trunk opener
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->keyless_start == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->keyless_start == 'Yes' ? '✔' : 'X' }}
                                                        </span> Keyless start
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->power_folding_orvm == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->power_folding_orvm == 'Yes' ? '✔' : 'X' }}
                                                        </span> Power Folding ORVM
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->sun_proof == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->sun_proof == 'Yes' ? '✔' : 'X' }}
                                                        </span> Sun Roof
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->cruise_control == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->cruise_control == 'Yes' ? '✔' : 'X' }}
                                                        </span> Cruise Control
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->rear_ac == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->rear_ac == 'Yes' ? '✔' : 'X' }}
                                                        </span> Rear AC vent
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->remote_fuel_lid_opener == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->remote_fuel_lid_opener == 'Yes' ? '✔' : 'X' }}
                                                        </span> Remote fuel lid opener
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->power_steering == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->power_steering == 'Yes' ? '✔' : 'X' }}
                                                        </span> Power steering
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div id="developement-1" class="tab-pane">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->music_system == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->music_system == 'Yes' ? '✔' : 'X' }}
                                                        </span> Music system
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->leather_seats == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->leather_seats == 'Yes' ? '✔' : 'X' }}
                                                        </span> Leather seats
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->alloy_wheels == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->alloy_wheels == 'Yes' ? '✔' : 'X' }}
                                                        </span> Alloy wheels
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->fog_lamps == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->fog_lamps == 'Yes' ? '✔' : 'X' }}
                                                        </span> Fog lamps
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list-check secondry">
                                                        <span class="{{ $vehicle->tubeless_tyres == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->tubeless_tyres == 'Yes' ? '✔' : 'X' }}
                                                        </span> Tubeless tyres
                                                    </td>
                                                    <td class="list-times-circle red">
                                                        <span class="{{ $vehicle->navigation_system == 'Yes' ? 'check-icon' : 'cross-icon' }}">
                                                            {{ $vehicle->navigation_system == 'Yes' ? '✔' : 'X' }}
                                                        </span> GPS Navigation system
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="b-calculator container py-4">
                            <div class="b-calculator__header d-flex align-items-center justify-content-center mb-4">
                                <i class="icon flaticon-calculator text-primary display-4 mr-3"></i>
                                <div>
                                    <h3 class="b-calculator__name text-dark font-weight-bold mb-1">EMI Calculator</h3>
                                    <div class="b-calculator__info text-muted">Calculate Your Used Car EMI</div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Left Section -->
                                <div class="col-md-6">
                                    <div class="b-calculator__group mb-3">
                                        <label for="loanamount" class="b-calculator__label font-weight-semibold">Loan Amount</label>
                                        <input class="b-calculator__input form-control form-control-lg" id="loanamount" value="400000" type="text" placeholder="Enter Loan Amount">
                                    </div>
                                    <div class="b-calculator__group mb-3">
                                        <label for="interest" class="b-calculator__label font-weight-semibold">Interest Rate (%)</label>
                                        <input class="b-calculator__input form-control form-control-lg" id="interest" type="text" value="13">
                                    </div>
                                    <div class="b-calculator__group mb-3">
                                        <button class="site-button m-r15" onclick="emical()"> Calculate EMI </button>
                                    </div>
                                </div>
                                <!-- Right Section -->
                                <div class="col-md-6">
                                    <table class="table table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Months</th>
                                                <th>EMI per Month</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>12</td>
                                                <td id="monthly1"></td>
                                            </tr>
                                            <tr>
                                                <td>24</td>
                                                <td id="monthly2"></td>
                                            </tr>
                                            <tr>
                                                <td>36</td>
                                                <td id="monthly3"></td>
                                            </tr>
                                            <tr>
                                                <td>48</td>
                                                <td id="monthly4"></td>
                                            </tr>
                                            <tr>
                                                <td>60</td>
                                                <td id="monthly5"></td>
                                            </tr>
                                            <tr>
                                                <td>72</td>
                                                <td id="monthly6"></td>
                                            </tr>
                                            <tr>
                                                <td>84</td>
                                                <td id="monthly7"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Left part END -->
                    <!-- right Side bar start -->
                    <div class="col-lg-4 col-md-5 col-sm-6 sticky-top">
                        <aside class="side-bar">
                            <div class="p-a30 bg-gray clearfix m-t50 box-container">
                                <h2>Book Now</h2>
                                <div class="dlab-separator-outer ">
                                    <div class="dlab-separator bg-primary style-skew"></div>
                                </div>
                                <form method="post" class="bookTestBookNowForm" action="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input name="booktestdrive_name" type="text" class="form-control book_test_name" placeholder="Enter Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input name="booktestdrive_email" type="email" class="form-control book_test_email" placeholder="Enter Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input name="booktestdrive_contact" type="tel" class="form-control book_test_contact" placeholder="Enter Contact No" maxlength="10" onkeypress="return isNumberKey(event)" onkeyup="return limitlength(this, 10)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="book_now">
                                                <div class="input-group">
                                                    <div class="g-recaptcha" data-sitekey="{{ RECAPTCHA_SITE_KEY }}" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                                    <input class="form-control d-none" style="display:none;" data-recaptcha="true" data-error="Please complete the Captcha">
                                                </div>
                                            </div>
                                        </div>
                                        <input type='hidden' name='bookenq' value='Book Now'>
                                        <div class="col-lg-12">
                                            <button name="submit" type="submit" value="Submit" class="site-button "> <span>Submit</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </aside>
                    </div>
                    <!-- right Side bar END -->
                </div>
                @endforeach
                @endif
                <!-- Modal -->
                <div class="modal fade" id="callbackModal" tabindex="-1" aria-labelledby="callbackModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="margin-top: 100px;">
                        <div class="modal-content">
                            <h3 class="modal-title text-uppercase m-t20" id="callbackModalLabel">Request To Callback</h3>
                            <div class="modal-body">
                                <form id="callbackForm">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control request_name" name="name" placeholder="Enter name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control request_email" name="email" placeholder="Enter email">
                                    </div>
                                    <div class="mb-3">
                                        <input type="tel" class="form-control request_phone" name="contact" placeholder="Enter phone number" maxlength="10" onkeypress="return isNumberKey(event)" onkeyup="return limitlength(this, 10)">
                                    </div>
                                    <div class="col-lg-4" id="requestForm">

                                    </div>
                                    <button name="submit" type="submit" class="site-button" value="Submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-head text-center" id="related-cars" style="margin-top:30px;">
                    <h3 class="text-uppercase">Related Cars</h3>
                    <div class="dlab-separator-outer ">
                        <div class="dlab-separator bg-primary style-skew"></div>
                    </div>
                    <div class="section-content">
                        <div class="img-carousel owl-carousel mfp-gallery gallery owl-btn-center-lr">
                            @foreach ($relatedCars as $key => $vehicle)
                            <div class="product-item">
                                <div class="dlab-box">
                                    <div class="dlab-thum-bx dlab-img-effect image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $vehicle->product_url) }}')">
                                        <img src="{{ asset('web_images/product_images/' . ($vehicle->front_left_side_angle_image ?? 'featured-5.jpg')) }}" alt="">
                                        <div class="overlay-bx">
                                            <div class="overlay-icon">
                                                <a href="javascript:void(0)" class="openModal" data-value="{{ $vehicle->product_id }}">
                                                    <i class="ti-heart icon-bx-xs"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ url('/car-details/'.$vehicle->product_url) }}" style="text-decoration: none; color: inherit;">
                                        <div class="item-info text-center">
                                            <h4 class="dlab-title m-t10 text-uppercase">
                                                {{ $vehicle->mfg_year }} {{ $vehicle->make_name }} {{ $vehicle->model_name }}
                                                <span class="heart-symbol">❤</span>
                                            </h4>
                                            <ul class="item-review">
                                                @for ($t = 1; $t <= 5; $t++) @php $ratingClass=$t <=$vehicle->rating
                                                    ? ''
                                                    : ($t < $vehicle->rating + 1 &&
                                                        fmod($vehicle->rating, 1) !== 0
                                                        ? '-half-o'
                                                        : '-o');
                                                        $starColorClass =
                                                        $vehicle->rating >= 4 ? 'star-green' : 'star-yellow';
                                                        @endphp
                                                        <li><i class="fa fa-star{{ $ratingClass }} {{ $starColorClass }}"></i>
                                                        </li>
                                                        @endfor
                                            </ul>
                                            <h4 class="item-price">
                                                <span class="text-primary">
                                                    <i class="text-primary"></i> ₹ {{ number_format($vehicle->price) }}
                                                </span>

                                    </a>
                                    </h4>
                                    <!-- Meta Information -->
                                    <div class="dlab-post-meta image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $vehicle->product_url) }}')">
                                        <div class="tooltip-wrapper" style="margin-bottom:0px;">
                                            <ul>
                                                <li class="post-date">
                                                    <i class="ti-location-pin"></i><strong>{{ $vehicle->location }}</strong>
                                                </li>
                                                <li class="post-author">
                                                    EMI
                                                    @php
                                                    $amt = $vehicle->price * (20 / 100); // 20% down payment
                                                    $p1 = $vehicle->price - $amt;

                                                    $interestRate = 13; // 13% annual interest
                                                    $rate = $interestRate / (12 * 100); // monthly interest rate
                                                    $months = 36; // loan tenure in months

                                                    $emi = $p1 * $rate * pow(1 + $rate, $months) / (pow(1 + $rate, $months) - 1);
                                                    $emi = round($emi); // rounding to the nearest whole number
                                                    @endphp
                                                    <i class="text-primary"></i> ₹ {{ $emi }}
                                                    <i class="fa tooltip-icon">&#xf06a;</i>
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
                                    <div class="m-b5 image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $vehicle->product_url) }}')">
                                        <div class="dlab-post-tags">
                                            <div class="post-tags">
                                                <a style="color: #45423e;">{{ $vehicle->km_driven }} km</a>
                                                <a style="color: #45423e;">{{ $vehicle->fuel_type }}</a>
                                                <a style="color: #45423e;">
                                                    {!! $vehicle->owner == 1
                                                    ? '<span class="normal">1</span><span class="superscript">st</span>'
                                                    : ($vehicle->owner == 2
                                                    ? '<span class="normal">2</span><span class="superscript">nd</span>'
                                                    : '2+') !!} owner
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sale">
                                    <span class="site-button button-sm">{{ $vehicle->type }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="bookDriveModal" tabindex="-1" role="dialog" aria-labelledby="bookDriveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h2 class="modal-title m-t10" id="bookDriveModalLabel">Book a Test Drive</h2>
            <div class="modal-body">
                <form class="submitbookaTestDriveForm">
                    <div class="form-group">
                        <input type="hidden" id="test_drive_product_id" name="product_id" value="{{ $relatedCars[0]->product_id; }}">
                        <label for="location">Select Location</label>
                        <select class="form-control" id="showroom_location" name="showroom_location">
                            <option value="">-- Select Location --</option>
                            @foreach ($locations as $location_type)
                            <option value="{{ $location_type->location_name }}">{{ $location_type->location_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Pick Date</label>
                        <input class="form-control" name="test_drive_date" type="text" id="datepicker" placeholder="Select Date">
                    </div>
                    <div class="form-group">
                        <label for="time">Select Time</label>
                        <select class="selectpicker" name="test_drive_time" id="book_test_drive_time" data-width="100%">
                            <option value="">Select Time</option>
                            <option value="10 AM - 12 PM"> 10 AM - 12 PM</option>
                            <option value="12 PM - 02 PM"> 01 PM - 02 PM</option>
                            <option value="02 PM - 04 PM"> 02 PM - 04 PM</option>
                            <option value="04 PM - 06 PM"> 04 PM - 06 PM</option>
                            <option value="06 PM - 08 PM"> 06 PM - 08 PM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="bookaddress" name="address" rows="3"></textarea>

                        <div class="p-tb30">
                            <button class="site-button m-r15" id="testDriveSubmit" form="testDriveForm" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="emi_cal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body" style="margin-bottom: 0px; padding: 50px;">
                <div class="row">
                    <div class="b-calculatorr" style="margin-top: -15px;padding-left:20px;padding-right: 20px">
                        <div class="b-calculator__header d-flex align-items-center justify-content-center mb-4">
                            <i class="icon flaticon-calculator text-primary display-4 mr-3"></i>
                            <div>
                                <h4 class="b-calculator__name">EMI Calculator</h4>
                                <div class="b-calculator__info text-muted">Calculate Your Used Car EMI</div>
                            </div>
                        </div>
                        <div class="b-calculator__group">
                            <div class="b-calculator__label">Loan Amount</div>
                            <input class="b-calculator__input form-control" onkeyup="change_downpayment(this.value)" id="eloanamount" value="400000" type="text" placeholder="Enter Loan Amount">
                        </div>
                        <div class="b-calculator__group">
                            <div class="b-calculator__label">Total Downpayment: <span id="downpayment_details" style="opacity: 0.8;margin-left: 15px;"></span></div>
                        </div>
                        <div class="b-calculator__group col-xs-6">
                            <div class="b-calculator__label">INTEREST RATE (%)</div>
                            <input class="b-calculator__input form-control" id="einterest" type="text" value="13">
                        </div>
                        <div class="b-calculator__group col-xs-6">
                            <div class="selectpicker b-calculator__label">Tenure (Months)</div>
                            <select class="selectpicker b-calculator__input form-control" id="etenure">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                                <option value="48">48</option>
                            </select>
                        </div>
                        <div class="b-calculator__group">
                            <button class="btn btn-dark" style='width:100%' onclick="emical1()">Calculate EMI</button>
                        </div>
                        <div class="b-calculator__group">
                            <div class="site-button col-xs-12"> Approx EMI <span id="emonthly"></span> per month</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.bookTestBookNowForm').submit(function(e) {
            e.preventDefault();
            const name = $('.book_test_name').val().trim();
            const email = $('.book_test_email').val().trim();
            const contact = $('.book_test_contact').val().trim();
            const message = $('.book_message').length ? $('.book_message').val().trim() : '';

            toastr.clear();
            let isValid = true;

            if (!validateRecaptcha()) {
                return false;
            }

            if (name === '') {
                toastr.error('Name is required!');
                return false;
            } else if (!/^[a-zA-Z\s]+$/.test(name)) {
                toastr.error('Name must contain only letters and spaces!');
                return false;
            }

            if (email === '') {
                toastr.error('Email is required!');
                return false;
            } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email)) {
                toastr.error('Please enter a valid email!');
                return false;
            }

            if (contact === '') {
                toastr.error('Contact number is required!');
                return false;
            } else if (!/^[7-9]\d{9}$/.test(contact)) {
                toastr.error('Please enter a valid mobile number!');
                return false;
            }

            let formData = {
                _token: "{{ csrf_token() }}",
                name: name,
                email: email,
                contact: contact,
                recaptcha: $('.g-recaptcha-response').val(),
                enq: $('.enq').val(),
                message: message
            };

            $.ajax({
                url: "{{ route('dashboard.store') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $('.bookTestBookNowForm')[0].reset();
                        grecaptcha.reset();
                        $('.g-recaptcha-response').val('');
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Failed to submit form. Please try again.');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#testDriveSubmit').on('click', function(e) {
            e.preventDefault();
            var test_drive_id = $('#test_drive_product_id').val();
            var showroom_location = $('#showroom_location').val();
            var test_drive_date = $('#datepicker').val();
            var test_drive_time = $('#book_test_drive_time').val();
            var address = $('#bookaddress').val();

            toastr.clear();
            if (!showroom_location) {
                toastr.error('Please select a location.');
                return;
            }

            if (!test_drive_date) {
                toastr.error('Please select a date.');
                return;
            }

            if (!test_drive_time) {
                toastr.error('Please select a time.');
                return;
            }

            if (!address) {
                toastr.error('Please enter address');
                return;
            }

            if (address.length > 500) {
                toastr.error('Address cannot exceed 500 characters.');
                return;
            }
            $.ajax({
                url: '/booktestdrive-insert',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    product_id: test_drive_id,
                    showroom_location: showroom_location,
                    test_drive_date: test_drive_date,
                    test_drive_time: test_drive_time,
                    address: address,
                },
                success: function(response) {
                    if (response.success) {
                        $('#bookDriveModal').modal('hide');
                        toastr.success(response.message);
                        $('.submitbookaTestDriveForm')[0].reset();
                        window.location.reload();
                    } else {
                        toastr.error(response.message || 'An unexpected error occurred.');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        for (var field in errors) {
                            toastr.error(errors[field][0]);
                        }
                    } else {
                        toastr.error(xhr.responseJSON.message || 'An error occurred while submitting the form.');
                    }
                },
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.bookDriveModal, .openModal').forEach(function(btn) {
            btn.addEventListener('click', function(event) {
                if (btn.classList.contains('bookDriveModal')) {
                    $('#bookDriveModal').modal('show');
                } else if (btn.classList.contains('openModal')) {
                    $('#openModal').modal('show');
                }
            });
        });
    });
</script>
<script>
    document.querySelectorAll('.tab-pane table td').forEach((td, index) => {
        if (index % 2 === 0) {
            td.classList.add('list-check', 'secondry');
        } else {
            td.classList.add('list-times-circle', 'red');
        }
    });
</script>
<script>
    function emivalue(x) {
        document.getElementById("loanamount").value = x;
        emical();
    }

    function emical() {
        var amount = document.getElementById('loanamount').value;
        var interest = document.getElementById('interest').value;
        var intr = interest / 100 / 12;

        var years = [12, 24, 36, 48, 60, 72, 84];
        years.forEach((months, index) => {
            var x = Math.pow(1 + intr, months);
            var monthly = (amount * x * intr) / (x - 1);
            var roundedMonthly = Math.round(monthly);
            document.getElementById(`monthly${index + 1}`).innerHTML = roundedMonthly;
        });
    }
    window.onload = function() {
        emical();
    };
</script>
<script>
    $(document).ready(function() {
        $('#callbackForm').submit(function(e) {
            e.preventDefault();
            const name = $('.request_name').val().trim();
            const email = $('.request_email').val().trim();
            const contact = $('.request_phone').val().trim();

            toastr.clear();
            let isValid = true;

            if (!validateRecaptcha()) {
                return false;
            }

            if (name === '') {
                toastr.error('Name is required!');
                return false;
            } else if (!/^[a-zA-Z\s]+$/.test(name)) {
                toastr.error('Name must contain only letters and spaces!');
                return false;
            }

            if (email === '') {
                toastr.error('Email is required!');
                return false;
            } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email)) {
                toastr.error('Please enter a valid email!');
                return false;
            }

            if (contact === '') {
                toastr.error('Contact number is required!');
                return false;
            } else if (!/^[7-9]\d{9}$/.test(contact)) {
                toastr.error('Please enter a valid mobile number!');
                return false;
            }

            let formData = {
                _token: "{{ csrf_token() }}",
                name: name,
                email: email,
                contact: contact,
                recaptcha: $('.g-recaptcha-response').val(),
                enq: $('.enq').val(),
            };

            $.ajax({
                url: "{{ route('dashboard.store') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $('#callbackForm')[0].reset();
                        grecaptcha.reset();
                        $('.g-recaptcha-response').val('');
                        $('#callbackModal').modal('hide');
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Failed to submit form. Please try again.');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        function moveRecaptcha() {
            var recaptcha = $('#book_now');

            if ($(window).width() <= 768) {
                if ($('#requestForm').find(recaptcha).length === 0) {
                    $('#requestForm').prepend(recaptcha);
                    grecaptcha.reset();
                }
                if ($('.bookTestBookNowForm').find(recaptcha).length === 0) {
                    $('.bookTestBookNowForm .site-button').closest('.col-lg-12').before(recaptcha);
                    grecaptcha.reset();
                }
            } else {
                if ($('.bookTestBookNowForm').find(recaptcha).length === 0) {
                    $('.bookTestBookNowForm .site-button').closest('.col-lg-12').before(recaptcha);
                    grecaptcha.reset();
                }
                $('#requestForm').find(recaptcha).remove();
            }
        }
        moveRecaptcha();
        $(window).resize(function() {
            moveRecaptcha();
        });
        $('#callbackModal').on('show.bs.modal', function() {
            if ($(window).width() <= 768) {
                var recaptcha = $('#book_now');
                if ($('#requestForm').find(recaptcha).length === 0) {
                    $('#requestForm').prepend(recaptcha);
                    grecaptcha.reset();
                }
            }
        });
        $('#callbackModal').on('hidden.bs.modal', function() {
            if ($(window).width() <= 768) {
                var recaptcha = $('#book_now');
                if ($('.bookTestBookNowForm').find(recaptcha).length === 0) {
                    $('.bookTestBookNowForm .site-button').closest('.col-lg-12').before(recaptcha);
                    grecaptcha.reset();
                }
            }
        });

        function onRecaptchaLoad() {
            if (typeof grecaptcha !== "undefined") {
                grecaptcha.reset();
            }
        }

        if (typeof grecaptcha !== "undefined") {
            grecaptcha.reset();
        } else {
            setTimeout(onRecaptchaLoad, 1000);
        }
    });
</script>
<script>
    $(document).ready(function() {
        $("#open_emi_calculator").click(function() {
            $("#emi_cal").modal('show');
        });
    });
</script>
<script>
    function change_downpayment(amt) {
        var downpayment = ((amt) * (20 / 100));
        document.getElementById('downpayment_details').innerHTML = downpayment;
    }
    $(document).ready(function() {
        <?php $amt1 = (($popularVehicles[0]->price) * (20 / 100));
        $p1 = (($popularVehicles[0]->price) - ($amt1)); ?>
        var loan_amt = '<?php echo $p1; ?>';
        var downpymt = '<?php echo $amt1; ?>';
        document.getElementById('eloanamount').value = loan_amt;
        document.getElementById('downpayment_details').innerHTML = downpymt;
        emical1();
    });

    function emical1() {
        var amount = document.getElementById('eloanamount').value;
        var interest = document.getElementById('einterest').value;
        var month = document.getElementById('etenure').value;
        var intr = interest / 100 / month;
        var years = month;
        var x = Math.pow(1 + intr, years);
        var monthly1 = (amount * x * intr) / (x - 1);
        var monthly1 = Math.round(monthly1);
        document.getElementById('emonthly').innerHTML = monthly1;
    }
</script>
@endsection