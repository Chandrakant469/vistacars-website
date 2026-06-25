<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="author" content="" />
    <meta name="robots" content="" />
    <!-- PAGE TITLE -->
    <title>{{ $title ?? 'Vistacars True Value' }}</title>

    <meta name="facebook-domain-verification" content="6mrj7mnv3txq7zyez72uaj65403pi3" />
    <meta name="keywords" content="{{ $keywords ?? 'used cars, buy cars, Vistacars' }}" />
    <meta name="description" content="{{ $description ?? 'Find the best used cars at Vistacars True Value.' }}" />

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $title ?? 'Vistacars True Value' }}" />
    <meta property="og:description" content="{{ $description ?? ' ' }}" />
    <meta property="og:image" content="{{ $image ?? asset('default-image.jpg') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@vistacars" />
    <meta name="twitter:title" content="{{ $title ?? 'Vistacars True Value' }}" />
    <meta name="twitter:description" content="{{ $description ?? 'Discover a wide range of certified used cars at Vistacars.' }}" />
    <meta name="twitter:image" content="{{ $image ?? asset('default-image.jpg') }}" />

    <!-- Additional Meta Tags -->
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="HyBVp7CFmikbBJlVV7yAz0g1Yrh30FSsb8x-j42rNWo" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-211447256-1"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-211447256-1');
    </script>

    @include('partials.style')
    <!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
 <![endif]-->
</head>

<body id="bg">
    {{-- If Logout user try to access the Dashboard --}}
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div id="loading-area" class="loader2"></div>
    <div class="page-wraper">
        <!-- header -->
        @include('partials.header')
        <!-- header END -->
        <!-- Content -->
        @yield('content')
        <!-- Content END-->
        @yield('scripts')
        <!-- Footer -->
        @include('partials.footer')
        <!-- Footer END-->
        <!-- scroll top button -->
        <button class="scroltop fa fa-arrow-up style4"></button>
    </div>
    <!-- JavaScript  files ========================================= -->
    @include('partials.script')
</body>

</html>