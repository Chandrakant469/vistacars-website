@foreach ($usedCars as $key => $prow)
<li class="home card-container col-lg-6 col-xl-4 col-md-6 col-sm-6 col-12" style="position: absolute; margin-top:15px;">
    <div class="product-item">
        <div class="dlab-box">
            <div class="dlab-thum-bx dlab-img-effect">
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
                    <h4 class="dlab-title m-t0 text-uppercase">
                        {{ $prow->mfg_year }} {{ $prow->make_name }}
                        {{ $prow->model_name }}
                        <span class="heart-symbol">❤</span>
                    </h4>
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
            <!-- Km driven, Fuel type, Owner -->
            <div class="m-b10">
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
@include('partials.script')
