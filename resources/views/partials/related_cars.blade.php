@foreach ($relatedCars as $key => $prow)
<li class="home card-container col-lg-6 col-xl-4 col-md-6 col-sm-6 col-12" style="position: absolute;">
    <div class="dlab-box dlab-gallery-box">
        <div class="dlab-media dlab-img-overlay1 dlab-img-effect zoom-slow">
            <a href="">
                <img src="{{ asset('web_images/product_images/' . ($prow->front_left_side_angle_image ?? 'featured-5.jpg')) }}" alt="Image">
                <span class="b-goods-feat__label transparent">
                    @for ($t = 1; $t <= 5; $t++) @php $ratingClass=$t <=$prow->rating
                        ? ''
                        : ($t < $prow->rating + 1 && fmod($prow->rating, 1) !== 0
                            ? '-half-o'
                            : '-o');
                            @endphp
                            <span class="fa fa-star{{ $ratingClass }}"></span>
                            @endfor
                </span>
            </a>
        </div>
        <h5 class="m-b10">
            <a href="#" class="red-strip" style="pointer-events:none;">
                {{ $prow->mfg_year }} {{ $prow->make_name }} {{ $prow->model_name }}
                <span class="heart-symbol">❤</span>
            </a>
        </h5>
        <div class="ow-entry-content" style="margin-top: 0;padding-top: 0;">
            <div class="service-prices m-b5" style="margin-top: 0;padding-top: 0;">
                <span class="service-new-price" style="margin-right: 10px;">₹{{ number_format($prow->price) }}</span>
                <span class="service-new-price text-primary" style="font-size: 12px;">EMI
                    ₹{{ round(($prow->price * 0.8 * (13 / (12 * 100)) * pow(1 + 13 / (12 * 100), 36)) / (pow(1 + 13 / (12 * 100), 36) - 1)) }}</span>
                <div class="tooltip-wrapper" style="display: inline-block; position: relative; margin-left: 5px;">
                    <i class="fa fa-exclamation-circle tooltip-icon"></i>
                    <span class="tooltiptext">
                        <b>EMI Calculated</b><br>
                        10% - Down Payment,<br>
                        13% - Interest,<br>
                        3 Years - Tenure.
                    </span>
                    <span style="margin-left: 7px; font-family: Arial, sans-serif; font-size: 14px;">
                        <b>{{ $prow->location }}</b>
                    </span>
                </div>
            </div>
            <div class="ow-entry-text m-b15">
                <p>
                    <span class="dot"></span> {{ $prow->km_driven }} km
                    <span class="dot"></span> {{ $prow->fuel_type }}
                    <span class="dot"></span>
                    <span class="owner">
                        {!! $prow->owner == 1
                        ? '<span class="normal">1</span><span class="superscript">st</span>'
                        : ($prow->owner == 2
                        ? '<span class="normal">2</span><span class="superscript">nd</span>'
                        : '2+') !!} owner
                    </span>
                </p>
            </div>
            <ul class="b-goods-feat__desc list-unstyled mb0 border0 pt5">
                <li style="margin-bottom:0px;">
                    <span class="label label-default">{{ $prow->type }}</span>
                </li>
            </ul>
        </div>
    </div>
</li>
@endforeach
