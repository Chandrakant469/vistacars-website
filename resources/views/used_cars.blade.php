@extends('layouts.app')
@section('content')
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle section-title-page">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">CAR</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Used Cars</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- contact area -->
    <div class="section-full bg-white content-inner">
        <!-- About Company -->
        <div class="container">
            <div class="row">
                {{-- Deskstop Filter section --}}
                <div class="col-lg-3 col-md-4 col-sm-6 sticky-sidebar filter-section" id="filter-section">
                    <a class="visible-xs visible-sm pull-left" href="#" id="close-filter" style="display:none;">X</a>
                    <h3 class="b-filter-2__title">SEARCH OPTIONS</h3>
                    <div class="centered-content">
                        <a class="b-car-details__link" id="reset-btn" href="">RESET</a>
                    </div>
                    <div class="widget_services style-2 m-b30" style="margin-top: 20px;">
                        <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#locationDiv" style="cursor:pointer;">
                            LOCATION
                        </h5>
                        <div id="locationDiv" class="collapse show">
                            <ul>
                                @if (count($showrooms))
                                <input type="hidden" id="location_count" value="{{ count($showrooms) }}">
                                @foreach ($showrooms as $key => $showroom)
                                <li>
                                    <input type="checkbox" name="locations[]" id="location_{{ $key }}" value="{{ $showroom->showroom_url }}">
                                    {{ $showroom->showroom_name }}
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="widget_services style-2 m-b30">
                        <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#vehicleDiv" style="cursor: pointer;">
                            VEHICLE TYPE
                        </h5>
                        <div id="vehicleDiv" class="collapse show">
                            <ul>
                                <li>
                                    <input type="checkbox" name="services[]" value="Featured" class="">
                                    Featured Car
                                </li>
                                <li>
                                    <input type="checkbox" name="services[]" value="Certified">
                                    Vistacars Certified
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Search Input and List -->
                    <div class="widget_services style-2 m-b30">
                        <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#modelDiv" style="cursor: pointer;">
                            MODEL
                        </h5>
                        <div id="modelDiv">
                            <input class="form-control" type="text" id="model_search" onkeyup="search_model_data()" placeholder="Search Model">
                        </div>
                        <div id="all_model_list" class="scroll-content" style="height:200px;display:none;margin-top:15px;">
                            <ul>
                                @if (count($select_models))
                                @php $i = 0; @endphp
                                @foreach ($select_models as $model)
                                @php $i++; @endphp
                                <li style="position: relative;margin-bottom:0px;">
                                    <input class="forms__check" id="model_{{ $i }}" value="{{ $model->model_id . '#' . $model->model_name }}" type="checkbox" style="display: none;">
                                    <label class="forms__label forms__label-check forms__label-check-2" for="model_{{ $i }}" style="font-weight: normal;margin-bottom: 0px;">
                                        {{ $model->make_name }} {{ $model->model_name }}
                                    </label>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="widget_services style-2 m-b30">
                        <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#yearDiv" style="cursor: pointer;">
                            YEAR
                        </h5>
                        <div id="yearDiv" class="collapse show">
                            <ul>
                                <li>
                                    <input type="radio" name="year" value="5" class="">
                                    Less Than 5 Year
                                </li>
                                <li>
                                    <input type="radio" name="year" value="6">
                                    Less Than 6 Year
                                </li>
                                <li>
                                    <input type="radio" name="year" value="7">
                                    Less Than 7 Year
                                </li>
                                <li>
                                    <input type="radio" name="year" value="8">
                                    Less Than 8 Year
                                </li>
                                <li>
                                    <input type="radio" name="year" value="9">
                                    More Than 8 Year
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget_services style-2 m-b30">
                        <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#fuelDiv" style="cursor: pointer;">
                            FUEL TYPE
                        </h5>
                        <div id="fuelDiv" class="collapse show">
                            <ul>
                                @if (count($fuel_types))
                                @php $i = 0; @endphp
                                @foreach ($fuel_types as $fuel_type)
                                @php $i++; @endphp
                                <li>
                                    <input type="checkbox" name="fuel_type[]" id="fuel_{{ $i }}" value="{{ $fuel_type->fuel_type }}" class="">{{ $fuel_type->fuel_type }}
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="widget_services style-2 m-b30">
                        <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#priceDiv" style="cursor: pointer;">
                            FILTER PRICE
                        </h5>
                        <div id="priceDiv" class="collapse show">
                            <ul>
                                <input type="range" id="range-slider" min="50000" max="1500000" step="100" value="50000" />
                                PRICE RANGE:
                                <span class="ui-filter-slider__current" id="slider-snap-value-lower">₹50,000
                                </span>-
                                <span class="ui-filter-slider__current" id="slider-snap-value-upper">₹15,00,000
                                </span>
                            </ul>
                        </div>
                    </div>
                    <div class="widget_services style-2 m-b30">
                        <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#bodyDiv" style="cursor: pointer;">
                            BODY STYLE
                        </h5>
                        <div id="bodyDiv" class="collapse show">
                            <div class="b-filter-type-2">
                                <div class="b-filter-type-2__item">
                                    <input class="b-filter-type-2__input" id="body_type_1" value="Hatchback" type="checkbox">
                                    <label class="b-filter-type-2__label" for="body_type_1">
                                        <i class="b-filter-type-2__icon flaticon-car-of-hatchback-model"></i>
                                        <span class="b-filter-type-2__title">Hatchback</span>
                                    </label>
                                </div>
                                <div class="b-filter-type-2__item">
                                    <input class="b-filter-type-2__input" id="body_type_2" value="Sedan" type="checkbox">
                                    <label class="b-filter-type-2__label" for="body_type_2">
                                        <i class="b-filter-type-2__icon flaticon-sedan-car-model"></i>
                                        <span class="b-filter-type-2__title">Sedan</span>
                                    </label>
                                </div>
                                <div class="b-filter-type-2__item">
                                    <input class="b-filter-type-2__input" id="body_type_3" value="MPV" type="checkbox">
                                    <label class="b-filter-type-2__label" for="body_type_3">
                                        <i class="b-filter-type-2__icon flaticon-car-1"></i>
                                        <span class="b-filter-type-2__title">MPV</span>
                                    </label>
                                </div>
                                <div class="b-filter-type-2__item">
                                    <input class="b-filter-type-2__input" id="body_type_4" value="SUV" type="checkbox">
                                    <label class="b-filter-type-2__label" for="body_type_4">
                                        <i class="b-filter-type-2__icon flaticon-car-of-hatchback-model"></i>
                                        <span class="b-filter-type-2__title">SUV</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="widget_services style-2 m-b40" style="margin-top:20px;">
                            <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#ownerDiv" style="cursor: pointer;">
                                OWNER
                            </h5>
                            <div id="ownerDiv" class="collapse show">
                                <ul>
                                    <li>
                                        <input type="checkbox" name="owner[]" value="1" class="owner-filter">
                                        1st Owner
                                    </li>
                                    <li>
                                        <input type="checkbox" name="owner[]" value="2" class="owner-filter">
                                        2nd Owner
                                    </li>
                                    <li>
                                        <input type="checkbox" name="owner_more" value="true" class="owner-filter"> 2+ Owner
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget_services style-2 m-b30 kilometer">
                            <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#kmDiv" style="cursor: pointer;">
                                KILOMETERS DRIVEN
                            </h5>
                            <div id="kmDiv" class="collapse show">
                                <ul class="kilometer">
                                    <li>
                                        <input type="radio" name="km" value="20000">
                                        Less than 20,000 km
                                    </li>
                                    <li>
                                        <input type="radio" name="km" value="40000">
                                        Less than 40,000 km
                                    </li>
                                    <li>
                                        <input type="radio" name="km" value="60000">
                                        Less than 60,000 km
                                    </li>
                                    <li>
                                        <input type="radio" name="km" value="80000">
                                        Less than 80,000 km
                                    </li>
                                    <li>
                                        <input type="radio" name="km" value="more">
                                        Above 80,000 km
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget_services style-2 m-b30">
                            <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#transmissionDiv" style="cursor: pointer;">
                                TRANSMISSION
                            </h5>
                            <div id="transmissionDiv" class="collapse show">
                                <ul>
                                    <li>
                                        <input type="checkbox" name="transmission[]" value="Manual" class="">
                                        Manual
                                    </li>
                                    <li>
                                        <input type="checkbox" name="transmission[]" value="Automatic">Automatic
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget_services style-2 m-b30">
                            <h5 class="b-goods-1__title" data-toggle="collapse" data-target="#colorDiv" style="cursor: pointer;">
                                COLOR
                            </h5>
                            <div id="colorDiv" class="collapse show">
                                <ul>
                                    <li>
                                        <input type="checkbox" name="colors[]" value="Dark Blue" class="">
                                        <span style="width: 20px; height: 20px; border-radius: 50%; background-color: #3A434C; border: 1px solid; display: inline-block; margin-right: 10px;"></span>
                                        Dark Blue
                                    </li>
                                    <li>
                                        <input type="checkbox" name="colors[]" value="Sky Blue" class="">
                                        <span style="width: 20px; height: 20px; border-radius: 50%; background-color: #6A8AB0; border: 1px solid; display: inline-block; margin-right: 10px;"></span>
                                        Sky Blue
                                    </li>
                                    <li>
                                        <input type="checkbox" name="colors[]" value="White" class="">
                                        <span style="width: 20px; height: 20px; border-radius: 50%; background-color: #ffffff; border: 1px solid; display: inline-block; margin-right: 10px;"></span>
                                        White
                                    </li>
                                    <li>
                                        <input type="checkbox" name="colors[]" value="Orange" class="">
                                        <span style="width: 20px; height: 20px; border-radius: 50%; background-color: #EE8D56; border: 1px solid; display: inline-block; margin-right: 10px;"></span>
                                        Orange
                                    </li>
                                    <li>
                                        <input type="checkbox" name="colors[]" value="Gray" class="">
                                        <span style="width: 20px; height: 20px; border-radius: 50%; background-color: #C6C6CE; border: 1px solid; display: inline-block; margin-right: 10px;"></span>
                                        Gray
                                    </li>
                                    <li>
                                        <input type="checkbox" name="colors[]" value="Red Blue" class="">
                                        <span style="width: 20px; height: 20px; border-radius: 50%; background-color: #AA5A63; border: 1px solid; display: inline-block; margin-right: 10px;"></span>
                                        Red Blue
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6" id="new-container">
                    <div class="filter-goods">
                        <div class="filter-goods__info" style="font-size: 17px; font-family: 'Poppins', sans-serif; font-style: italic; font-weight: 600; color: #4CAF50; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2); letter-spacing: 0.5px; margin-top: 10px;margin-left:10px;">
                            <strong>
                                <input type="hidden" value="{{ count($usedCars) }}" id="car_count" />
                            </strong>
                            <span id="car_count_label">
                                @if(session()->has('carCount'))
                                {{ session()->get('carCount') }} Used Cars Found
                                @else
                                @if (count($usedCars) == 0)
                                No Used Cars Found
                                @else
                                {{ count($usedCars) }} Used Cars Found
                                @endif
                                @endif
                            </span>
                        </div>
                        <div class="filter-goods__select">
                            <span>Sort</span>
                            <div class="custom-dropdown">
                                <span id="selected-option">Select Filter Options</span>
                                <div class="dropdown-options" style="display: none;">
                                    <div class="option" data-value="1">Select Filter Options</div>
                                    <div class="option" data-value="most">Most Relevant</div>
                                    <div class="option" data-value="Newly_added">Newly Added</div>
                                    <div class="option" data-value="hprice">High Price</div>
                                    <div class="option" data-value="lprice">Low Price</div>
                                    <div class="option" data-value="year">Year</div>
                                    <div class="option" data-value="km">Less Driven</div>
                                </div>
                            </div>
                            <div class="btns-switch" id="filter-btn">
                                <a>
                                    <i class="btns-switch__item js-view-list icon fa fa-filter" aria-hidden="true"></i>
                                    <span>Filter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if(session()->has('usedCars'))
                    @php
                    $usedCars = session()->get('usedCars');
                    @endphp
                    <ul id="masonry" class="row dlab-gallery-listing gallery-grid-4 gallery lightgallery m-b0">
                        @foreach ($usedCars as $key => $prow)
                        <li class="home card-container col-lg-6 col-xl-4 col-md-6 col-sm-6 col-12" style="position: absolute; margin-top:15px;">
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
                                            <h5 class="dlab-title m-t0 text-uppercase">
                                                {{ $prow->mfg_year }} {{ $prow->make_name }}
                                                {{ $prow->model_name }}
                                                <span class="heart-symbol">❤</span>
                                            </h5>
                                            <ul class="item-review">
                                                @for ($t = 1; $t <= 5; $t++) @php $ratingClass=$t <=$prow->rating
                                                    ? ''
                                                    : ($t < $prow->rating + 1 &&
                                                        fmod($prow->rating, 1) !== 0
                                                        ? '-half-o'
                                                        : '-o');
                                                        $starColorClass =
                                                        $prow->rating >= 4 ? 'star-green' : 'star-yellow';
                                                        @endphp
                                                        <li><i class="fa fa-star{{ $ratingClass }} {{ $starColorClass }}"></i>
                                                        </li>
                                                        @endfor
                                            </ul>
                                            <h4>
                                                <span class="text-primary">
                                                    <i class="fa fa-inr"></i> {{ number_format($prow->price) }}
                                                </span>
                                            </h4>
                                            <!-- Meta Information -->
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
                                                            $emi = round($emi); // rounding to the nearest whole number
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
                                    </a>
                                    <!-- Km driven, Fuel type, Owner -->
                                    <div class="m-b10 image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $prow->product_url) }}')">
                                        <div class="dlab-post-tags">
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
                                <!-- Car type badge -->
                                <div class="sale">
                                    <span class="site-button button-sm">{{ $prow->type }}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <ul id="masonry" class="row dlab-gallery-listing gallery-grid-4 gallery lightgallery m-b0">
                        @foreach ($usedCars as $key => $prow)
                        <li class="home card-container col-lg-6 col-xl-4 col-md-6 col-sm-6 col-12" style="position: absolute; margin-top:15px;">
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
                                            <h5 class="dlab-title m-t0 text-uppercase">
                                                {{ $prow->mfg_year }} {{ $prow->make_name }}
                                                {{ $prow->model_name }}
                                                <span class="heart-symbol">❤</span>
                                            </h5>
                                            <ul class="item-review">
                                                @for ($t = 1; $t <= 5; $t++) @php $ratingClass=$t <=$prow->rating
                                                    ? ''
                                                    : ($t < $prow->rating + 1 &&
                                                        fmod($prow->rating, 1) !== 0
                                                        ? '-half-o'
                                                        : '-o');
                                                        $starColorClass =
                                                        $prow->rating >= 4 ? 'star-green' : 'star-yellow';
                                                        @endphp
                                                        <li><i class="fa fa-star{{ $ratingClass }} {{ $starColorClass }}"></i>
                                                        </li>
                                                        @endfor
                                            </ul>
                                            <h4>
                                                <span class="text-primary">
                                                    <i class="fa fa-inr"></i> {{ number_format($prow->price) }}
                                                </span>
                                            </h4>
                                            <!-- Meta Information -->
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
                                                            $emi = round($emi); // rounding to the nearest whole number
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
                                    </a>
                                    <!-- Km driven, Fuel type, Owner -->
                                    <div class="m-b10 image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $prow->product_url) }}')">
                                        <div class="dlab-post-tags">
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
                                <!-- Car type badge -->
                                <div class="sale">
                                    <span class="site-button button-sm">{{ $prow->type }}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="section-head text-center" id="related-cars" style="margin-top:30px;">
                <h3 class="text-uppercase">Related Cars</h3>
                <div class="dlab-separator-outer ">
                    <div class="dlab-separator bg-primary style-skew"></div>
                </div>
                <div class="section-content">
                    <div class="img-carousel owl-carousel mfp-gallery gallery owl-btn-center-lr">
                        @foreach ($relatedCars as $key => $prow)
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
                                        <h5 class="dlab-title m-t0 text-uppercase">
                                            {{ $prow->mfg_year }} {{ $prow->make_name }} {{ $prow->model_name }}
                                            <span class="heart-symbol">❤</span>
                                        </h5>
                                        <ul class="item-review">
                                            @for ($t = 1; $t <= 5; $t++) @php $ratingClass=$t <=$prow->rating
                                                ? ''
                                                : ($t < $prow->rating + 1 &&
                                                    fmod($prow->rating, 1) !== 0
                                                    ? '-half-o'
                                                    : '-o');
                                                    $starColorClass =
                                                    $prow->rating >= 4 ? 'star-green' : 'star-yellow';
                                                    @endphp
                                                    <li><i class="fa fa-star{{ $ratingClass }} {{ $starColorClass }}"></i>
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
                                                        $amt = $prow->price * (20 / 100);
                                                        $p1 = $prow->price - $amt;
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
                                </a>
                                <div class="m-b5 image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $prow->product_url) }}')">
                                    <div class="dlab-post-tags">
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
                    </div>
                    @endforeach
                </div>
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- About Company END -->
</div>
<!-- contact area  END -->
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".custom-dropdown").click(function() {
            $(".dropdown-options").toggle();
        });
        $(".dropdown-options .option").click(function(e) {
            e.stopPropagation();
            const selectedText = $(this).text();
            const selectedValue = $(this).data("value");
            $("#selected-option").text(selectedText).data("value", selectedValue);
            $(".dropdown-options").hide();
        });
        $("#resetButton").click(function() {
            $("#selected-option").text("Select Filter Options").data("value", "1");
        });
        $(document).click(function(e) {
            if (!$(e.target).closest(".custom-dropdown").length) {
                $(".dropdown-options").hide();
            }
        });
    });

    $(document).ready(function() {
        $('#reset-btn').click(function(e) {
            e.preventDefault();
            $('input[type="checkbox"]').prop('checked', false);
            $('input[type="radio"]').prop('checked', false);
            $('input[type="text"]').val('');
            $('input[type="range"]').val(0);
        });
    });

    function search_model_data() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("model_search");
        filter = input.value.toUpperCase();
        ul = document.getElementById("all_model_list");
        ul.style.display = 'block';
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("label")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    // // PRICE RANGE SLIDER
    document.addEventListener("DOMContentLoaded", function() {
        var slider = document.getElementById("range-slider");
        var lowerValue = document.getElementById("slider-snap-value-lower");
        var upperValue = document.getElementById("slider-snap-value-upper");
        var maxPrice = slider.max;
        var currentMin = parseInt(slider.value);
        var currentMax = maxPrice;
        lowerValue.innerHTML = "₹" + currentMin;
        upperValue.innerHTML = "₹" + currentMax;
        slider.addEventListener("input", function() {
            var value = parseInt(slider.value);
            currentMin = value;
            lowerValue.innerHTML = "₹" + currentMin;
            upperValue.innerHTML = "₹" + currentMax;
            refine_search(currentMin, currentMax);
        });

        function refine_search(min, max) {
            console.log("Filtering search with price range: ₹" + min + " to ₹" + max);
        }
    });

    ////////// Filters /////////
    $(document).ready(function() {
        let location = [];
        let type = [];
        let model = [];
        let year = '';
        let fuel = [];
        let priceLower = '';
        let priceUpper = '';
        let bodyStyle = [];
        let owner = [];
        let km = '';
        let transmission = [];
        let color = [];

        // Location filter change
        $('#locationDiv').on('change', 'input[type="checkbox"]', function() {
            location = [];
            $('#locationDiv input[type="checkbox"]:checked').each(function() {
                location.push($(this).val());
            });
            triggerFilterRequest();
        });

        // Vehicle type filter change
        $('#vehicleDiv').on('change', 'input[type="checkbox"]', function() {
            type = [];
            $('#vehicleDiv input[type="checkbox"]:checked').each(function() {
                type.push($(this).val());
            });
            triggerFilterRequest();
        });

        // Model filter change
        $('#all_model_list').on('change', 'input[type="checkbox"]', function() {
            model = [];
            $('#all_model_list input[type="checkbox"]:checked').each(function() {
                model.push($(this).val());
            });
            triggerFilterRequest();
        });

        // Year filter change
        $('#yearDiv').on('change', 'input[type="radio"]', function() {
            year = $(this).val();
            triggerFilterRequest();
        });

        // Fuel filter change
        $('#fuelDiv').on('change', 'input[type="checkbox"]', function() {
            fuel = [];
            $('#fuelDiv input[type="checkbox"]:checked').each(function() {
                fuel.push($(this).val());
            });
            triggerFilterRequest();
        });

        // Price range slider change (trigger on mouse release after slider is moved)
        $('#range-slider').on('mouseup', function() {
            var priceLower = $('#slider-snap-value-lower').text().replace('₹', '').trim();
            var priceUpper = $('#slider-snap-value-upper').text().replace('₹', '').trim();
            triggerFilterRequest(priceLower, priceUpper);
        });

        $('#range-slider').on('input', function() {
            var priceLower = $('#slider-snap-value-lower').text().replace('₹', '').trim();
            var priceUpper = $('#slider-snap-value-upper').text().replace('₹', '').trim();
            $('#price-range-display').text('₹' + priceLower + ' - ₹' + priceUpper);
        });

        // Body style filter change
        $('#bodyDiv').on('change', 'input[type="checkbox"]', function() {
            bodyStyle = [];
            $('#bodyDiv input[type="checkbox"]:checked').each(function() {
                bodyStyle.push($(this).val());
            });
            triggerFilterRequest();
        });

        // Owner filter change
        $('#ownerDiv').on('change', 'input[type="checkbox"]', function() {
            owner = [];
            $('#ownerDiv input[type="checkbox"]:checked').each(function() {
                owner.push($(this).val());
            });
            triggerFilterRequest();
        });

        // Kilometer filter change
        $('#kmDiv').on('change', 'input[type="radio"]', function() {
            km = $(this).val();
            triggerFilterRequest();
        });

        // Transmission filter change
        $('#transmissionDiv').on('change', 'input[type="checkbox"]', function() {
            transmission = [];
            $('#transmissionDiv input[type="checkbox"]:checked').each(function() {
                transmission.push($(this).val());
            });
            triggerFilterRequest();
        });

        // Color filter change
        $('#colorDiv').on('change', 'input[type="checkbox"]', function() {
            color = [];
            $('#colorDiv input[type="checkbox"]:checked').each(function() {
                color.push($(this).val());
            });
            triggerFilterRequest();
        });

        // Sort dropdown change
        $(".dropdown-options .option").on("click", function(e) {
            e.stopPropagation();
            const selectedText = $(this).text();
            const sortValue = $(this).data("value");
            $("#selected-option").text(selectedText).data("value", sortValue);
            triggerFilterRequest(priceLower, priceUpper, sortValue);
            $(".dropdown-options").hide();
        });

        // Reset button click handler
        $('#reset-btn').on('click', function(e) {
            e.preventDefault();
            location = [];
            type = [];
            model = [];
            year = '';
            fuel = [];
            priceLower = '';
            priceUpper = '';
            bodyStyle = [];
            owner = [];
            km = '';
            transmission = [];
            color = [];

            $('#locationDiv input[type="checkbox"]').prop('checked', false);
            $('#vehicleDiv input[type="checkbox"]').prop('checked', false);
            $('#all_model_list input[type="checkbox"]').prop('checked', false);
            $('#yearDiv input[type="radio"]').prop('checked', false);
            $('#fuelDiv input[type="checkbox"]').prop('checked', false);
            $('#bodyDiv input[type="checkbox"]').prop('checked', false);
            $('#ownerDiv input[type="checkbox"]').prop('checked', false);
            $('#kmDiv input[type="radio"]').prop('checked', false);
            $('#transmissionDiv input[type="checkbox"]').prop('checked', false);
            $('#colorDiv input[type="checkbox"]').prop('checked', false);
            $("#selected-option").text("Select Filter Options").data("value", 1);
            const min = parseInt($('#range-slider').attr('min'));
            const max = parseInt($('#range-slider').attr('max'));
            $('#range-slider').val(min);
            $('#slider-snap-value-lower').html(`<b>₹${min}</b>`);
            $('#slider-snap-value-upper').html(`<b>₹${max}</b>`);
            $('#range-slider').trigger('input');
            $('#activeFilters').html('');
            $('#contentArea').html('<p>Please select filters to see results.</p>');
            toastr.success('Filters Reset Successfully.');
            triggerFilterRequest();
        });

        function triggerFilterRequest(priceLower, priceUpper, sortValue) {
            $.ajax({
                url: '/used-cars/filter'
                , type: 'POST'
                , data: {
                    location: location
                    , type: type
                    , model: model
                    , year: year
                    , fuel: fuel
                    , priceLower: priceLower
                    , priceUpper: priceUpper
                    , bodyStyle: bodyStyle
                    , owner: owner
                    , km: km
                    , transmission: transmission
                    , color: color
                    , sortValue: sortValue
                    , _token: $('meta[name="csrf-token"]').attr('content')
                }
                , success: function(response) {
                    $('#masonry').html(response.html);
                    $('#related-cars').hide();
                    $('.selectpicker').selectpicker('destroy');
                    $('.selectpicker').selectpicker();
                    if ($.data($('#masonry')[0], 'masonry')) {
                        $('#masonry').masonry('reloadItems').masonry('layout');
                    } else {
                        $('#masonry').masonry({
                            itemSelector: '.card-container'
                            , columnWidth: '.card-container'
                            , percentPosition: true
                        });
                    }
                    if (response.car_count === 0) {
                        $('#car_count_label').text('No Used Cars Found');
                    } else {
                        $('#car_count_label').text(response.car_count + ' Used Cars Found');
                    }
                    if ($(window).width() <= 991) {
                        $('body').removeClass('filter-active');
                        $('#filter-section').hide();
                    }
                    $('#filter-btn').on('click', function() {
                        $('body').toggleClass('filter-active');
                        $('#filter-section').show();
                    });
                }
                , error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    });

</script>
@endsection
