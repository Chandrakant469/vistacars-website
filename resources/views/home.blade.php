@extends('layouts.app')
@section('content')
<div class="page-content bg-white">
    <!-- slider css code -->
    <style>
        /* Slider container styling */
        .slider-container {
            position: relative;
            width: 100%;
            height: 350px;
            margin: 0 auto;
            overflow: hidden;
            padding-top: 0;
        }

        /* Individual slides */
        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            height: 350px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Navigation buttons */
        .prev-btn,
        .next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 100;
            font-size: 20px;
        }

        a.btn.btn-white {
            color: white !important;
            text-decoration: none;
        }

        .prev-btn {
            left: 10px;
        }

        .next-btn {
            right: 10px;
        }

        /* Indicators */
        .indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 5px;
        }

        .indicators span {
            width: 10px;
            height: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            cursor: pointer;
        }

        .indicators span.active {
            background-color: white;
        }

        @media (max-width: 768px) {

            .slider-container {
                height: 100px;
                padding-top: 0;
            }

            /* Individual slides */
            .slide {
                height: 100px;
            }

            /* Previous and Next buttons */
            .prev-btn,
            .next-btn {
                position: absolute;
                top: 40%;
                transform: translateY(-50%);
                background-color: rgba(0, 0, 0, 0.5);
                color: white;
                border: none;
                padding: 5px;
                cursor: pointer;
                z-index: 100;
                font-size: 15px;
            }

            .prev-btn {
                left: 10px;
            }

            .next-btn {
                right: 10px;
            }

            .indicators {
                position: absolute;
                bottom: 10px;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 5px;
            }

            .indicators span {
                display: none;
            }

            .slide img {
                height: auto;
                object-fit: contain;
            }
        }

        @media (max-width: 480px) {
            .slider-container {
                height: 100px;
            }

            .prev-btn,
            .next-btn {
                font-size: 12px;
                padding: 6px;
            }

            .indicators {
                bottom: 5px;
            }

            .indicators span {
                display: none;
            }

            .slide img {
                height: auto;
                object-fit: contain;
            }
        }

        @media (max-width: 768px) {
            .submenu {
                position: absolute;
                bottom: 100%;
                left: 0;
                background: white;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                min-width: 150px;
                z-index: 1000;
                display: none;
            }

            .menu li.active .submenu {
                display: block;
            }
        }
    </style>
    <!-- slider css code eof -->

    <div class="slider-container">
        <div class="slider">
            <!-- Slide 1 -->
            <div class="slide active">
                <img src="{{ asset('web_images/banner/3.jpg') }}" alt="Slide 1">
            </div>
            <!-- Slide 2 -->
            <div class="slide">
                <img src="{{ asset('web_images/banner/2.jpg') }}" alt="Slide 2">
            </div>
            <!-- Slide 3 -->
            <div class="slide">
                <img src="{{ asset('web_images/banner/1.jpg') }}" alt="Slide 3">
            </div>
        </div>
        <!-- Navigation Controls -->
        <button class="prev-btn">❮</button>
        <button class="next-btn">❯</button>
        <!-- Indicators -->
        <div class="indicators">
            <span data-slide="0" class="active"></span>
            <span data-slide="1"></span>
            <span data-slide="2"></span>
        </div>
    </div>

    <script>
        const slides = document.querySelectorAll('.slide');
        const indicators = document.querySelectorAll('.indicators span');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        let currentSlide = 0;
        const totalSlides = slides.length;

        // Function to update slider
        const updateSlider = () => {
            document.querySelector('.slider').style.transform = `translateX(-${currentSlide * 100}%)`;
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlide);
            });
        };

        // Next button click
        nextBtn.addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
        });

        // Previous button click
        prevBtn.addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
        });

        // Indicator click
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                updateSlider();
            });
        });

        // Auto slide every 3 seconds
        setInterval(() => {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
        }, 3000); // 3 seconds
    </script>

    <!-- submenu code css -->
    <style>
        nav {
            background-color: #ececec;
            color: #000;
        }

        /* Menu Container */
        .menu-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 0px;
            white-space: nowrap;
        }

        /* Menu Styles */
        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 10px;
            flex-wrap: nowrap;
        }

        /* Menu Item Styles */
        .menu li {
            position: relative;
            display: inline-block;
        }

        /* Menu Link Styles */
        .menu a {
            text-decoration: none;
            color: #444;
            padding: 10px 15px;
            display: block;
            font-size: 16px;
            font-weight: 400;
        }

        /* Hover Effect */
        .menu a:hover {
            background-color: #EE3131;
            border-radius: 5px;
        }

        /* Submenu Styles */
        .submenu {
            display: none;
            position: absolute;
            left: 0;
            top: 100%;
            background: white;
            list-style: none;
            padding: 0;
            margin: 0;
            width: max-content;
            text-align: left;
            border: 1px solid #ccc;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        .menu li:hover>.submenu,
        .menu li:focus-within>.submenu {
            display: block;
            opacity: 1;
            visibility: visible;
        }

        .submenu li {
            display: block;
        }

        .submenu a {
            display: block;
            padding: 8px 12px;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .menu-container {
                overflow-x: auto;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .menu li {
                flex: 0 0 auto;
            }

            .submenu {
                position: relative;
                width: 100%;
                display: none;
                opacity: 1;
                visibility: visible;
            }

            .submenu.open {
                display: block !important;
            }
        }

        .menu-container {
            white-space: nowrap;
            display: flex;
        }

        .menu {
            display: flex;
            gap: 10px;
        }

        .menu li {
            position: relative;
            list-style: none;
        }

        .menu li a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .menu li a i {
            margin-left: 5px;
        }

        .submenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            min-width: 150px;
            z-index: 1000;
        }

        .submenu li {
            display: block;
        }

        .submenu li a {
            display: block;
            padding: 8px 12px;
            font-size: 13px;
            background: #fff;
            color: #333;
        }

        .submenu li a:hover {
            background: #ddd;
        }

        .menu li.active .submenu {
            display: block;
        }

        @media (max-width: 768px) {
            .menu-container {
                overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .menu li {
                position: relative;
            }

            .submenu {
                position: absolute;
                top: auto;
                bottom: 100%;
                left: 0;
                background: white;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                min-width: 150px;
                z-index: 1000;
                display: none;
            }

            .submenu li {
                display: block;
            }

            .submenu li a {
                display: block;
                padding: 8px 12px;
                font-size: 13px;
                background: #fff;
                color: #333;
            }

            .submenu li a:hover {
                background: #ddd;
            }

            .menu li:hover>.submenu,
            .menu li:focus-within>.submenu {
                display: block !important;
            }
        }

        /* Default Styles for Desktop */
        @media (max-width: 768px) {
            .menu>li>a {
                display: block;
                cursor: pointer;
            }

            .submenu {
                display: none !important;
            }

            #menuModal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.7);
                z-index: 9999;
            }

            #menuModal .modal-content {
                background: white;
                border-radius: 8px;
                margin: 50px auto;
                width: 80%;
            }

            #menuModal.show {
                display: block;
            }

            #menuModal .modal-footer {
                text-align: center;
            }
        }

        @media (min-width: 769px) {
            .submenu {
                display: block;
            }
        }

        #filter_data ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #filter_data ul li {
            border-bottom: 1px solid #ddd;
        }

        #filter_data ul li:last-child {
            border-bottom: none;
        }

        #filter_data ul li a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            background: #f8f8f8;
            border-radius: 5px;
            transition: 0.3s;
        }

        #filter_data ul li a:hover {
            background: #ddd;
        }

        .modal .modal-body {
            padding: 15px !important;
        }

        #modalTitle {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 400;
            color: #EE3131;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        #modalMenu li a {
            font-family: 'Playfair Display', serif;
        }

        .menu {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 400;
        }

        .menu li a {
            color: #333;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            transition: all 0.3s ease-in-out;
        }

        .menu li a:hover {
            background-color: white;
            font-weight: 600;
        }

        .submenu li a {
            font-size: 14px;
            color: #555;
        }

        .submenu li a:hover {
            color: #EE3131;
        }

        .menu li {
            position: relative;
        }

        @media (min-width: 769px) {
            .submenu {
                display: none;
                position: absolute;
                background-color: #fff;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                z-index: 1000;
            }

            .menu>li {
                position: relative;
            }

            .menu>li:hover .submenu {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .submenu {
                display: none !important;
            }

            #menuModal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                z-index: 1000;
            }

            .modal-content {
                background: #fff;
                margin: 15% auto;
                padding: 20px;
                border-radius: 5px;
                width: 90%;
                max-width: 400px;
            }

            @media (max-width: 767px) {
                .col-sm-6:nth-child(4) .icon-bx-wraper {
                    min-width: 360px !important;
                    text-align: center;
                }
            }

        }
    </style>
    <!-- eof submenu code -->
    <style>
        #best {
            font-size: 24px;
        }

        @media (max-width: 768px) {
            #best {
                font-size: 18px;
                text-align: center;
                font-family: 'Verdana', sans-serif;
                color: #333;
            }
        }
    </style>

    <nav>
        <div class="menu-container">
            <ul class="menu">
                <li>
                    <a href="javascript:void(0)" class="menu-item" data-menu="car-brand">Car Brand<i class="fa fa-caret-down"></i></a>
                    <ul class="submenu">
                        @foreach ($topMakes as $row)
                        <li>
                            <a href="{{ url('used-cars/used-' . $row->make_url . '-cars') }}">
                                {{ $row->make_name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="menu-item" data-menu="price">Price <i class="fa fa-caret-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ url('used-cars/used-car-under-2-lakhs') }}" onclick="setActive(this)">Under 2 Lakhs</a></li>
                        <li><a href="{{ url('used-cars/used-cars-between-2-3lakhs') }}" onclick="setActive(this)">2-3 Lakhs</a></li>
                        <li><a href="{{ url('used-cars/used-cars-between-3-4lakhs') }}" onclick="setActive(this)">3-4 Lakhs</a></li>
                        <li><a href="{{ url('used-cars/used-cars-between-4-5lakhs') }}" onclick="setActive(this)">4-5 Lakhs</a></li>
                        <li><a href="{{ url('used-cars/used-cars-between-5-6lakhs') }}" onclick="setActive(this)">5-6 Lakhs</a></li>
                        <li><a href="{{ url('used-cars/used-cars-between-6-7lakhs') }}" onclick="setActive(this)">6-7 Lakhs</a></li>
                        <li><a href="{{ url('used-cars/used-cars-between-7-8lakhs') }}" onclick="setActive(this)">7-8 Lakhs</a></li>
                        <li><a href="{{ url('used-cars/used-cars-more-than-8lakhs') }}" onclick="setActive(this)">More than 8 Lakhs</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)" class="menu-item" data-menu="fuel">Fuel <i class="fa fa-caret-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ url('used-cars/used-petrol-cars') }}" onclick="setActive(this)">Petrol</a></li>
                        <li><a href="{{ url('used-cars/used-diesel-cars') }}" onclick="setActive(this)">Diesel</a></li>
                        <li><a href="{{ url('used-cars/used-cng-cars') }}" onclick="setActive(this)">CNG</a></li>
                    </ul>
                </li>
                <!-- Body Type Dropdown Menu -->
                <li>
                    <a href="javascript:void(0)" class="menu-item" data-menu="body-type">Body Type <i class="fa fa-caret-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ url('used-cars/used-hatchback-cars') }}" onclick="setActive(this)">Hatchback</a></li>
                        <li><a href="{{ url('used-cars/used-sedan-cars') }}" onclick="setActive(this)">Sedan</a></li>
                        <li><a href="{{ url('used-cars/used-suv-cars') }}" onclick="setActive(this)">SUV</a></li>
                    </ul>
                </li>
                <!-- Year Dropdown Menu -->
                <li>
                    <a href="javascript:void(0)" class="menu-item" data-menu="year">Year <i class="fa fa-caret-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ url('used-cars/used-cars-less-than-5-year') }}" onclick="setActive(this)">Less Than 5 Years</a></li>
                        <li><a href="{{ url('used-cars/used-cars-less-than-6-year') }}" onclick="setActive(this)">Less Than 6 Years</a></li>
                        <li><a href="{{ url('used-cars/used-cars-less-than-7-year') }}" onclick="setActive(this)">Less Than 7 Years</a></li>
                        <li><a href="{{ url('used-cars/used-cars-less-than-8-year') }}" onclick="setActive(this)">Less Than 8 Years</a></li>
                        <li><a href="{{ url('used-cars/used-cars-above-8-year') }}" onclick="setActive(this)">More Than 8 Years</a></li>
                    </ul>
                </li>
                <!-- Transmission Dropdown Menu -->
                <li>
                    <a href="javascript:void(0)" class="menu-item" data-menu="transmission">Transmission <i class="fa fa-caret-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ url('used-cars/transmission-manual') }}" onclick="setActive(this)">Manual</a></li>
                        <li><a href="{{ url('used-cars/transmission-automatic') }}" onclick="setActive(this)">Automatic</a></li>
                    </ul>
                </li>
                <!-- KM Driven Dropdown Menu -->
                <li>
                    <a href="javascript:void(0)" class="menu-item" data-menu="km-driven">KM Driven <i class="fa fa-caret-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ url('used-cars/km-driven-less-than-20000') }}" onclick="setActive(this)">Less than 20,000 km</a></li>
                        <li><a href="{{ url('used-cars/km-driven-less-than-40000') }}" onclick="setActive(this)">Less than 40,000 km</a></li>
                        <li><a href="{{ url('used-cars/km-driven-less-than-60000') }}" onclick="setActive(this)">Less than 60,000 km</a></li>
                        <li><a href="{{ url('used-cars/km-driven-less-than-80000') }}" onclick="setActive(this)">Less than 80,000 km</a></li>
                        <li><a href="{{ url('used-cars/km-driven-above-80000') }}" onclick="setActive(this)">Above 80,000 km</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="menuModal" class="modal">
            <div class="modal-content">
                <div class="" style="margin-left:30px; background-color: transparent; height: 40px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <h4 id="modalTitle" style="margin: 0; padding: 0; font-size: 18px;">Menu Title</h4>
                        <span class="modal-close" style="font-size: 24px; cursor: pointer; color: #333;">&times;</span>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="filter_data">
                        <ul id="modalMenu"></ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @if(!empty($topMakes))
    <script>
        var topMakes = @json($topMakes);
    </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.menu-item');
            const modal = document.getElementById('menuModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalMenu = document.getElementById('modalMenu');
            const closeModal = document.querySelector('.modal-close');

            function openModal(title, submenu) {
                modalTitle.textContent = title;
                modalMenu.innerHTML = submenu.innerHTML;
                modal.style.display = 'block';
            }

            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    const menuName = item.getAttribute('data-menu');
                    const submenu = item.nextElementSibling;

                    if (window.innerWidth <= 768) {
                        openModal(item.textContent.trim(), submenu);
                    } else {
                        submenu.classList.toggle('show');
                    }
                });
            });

            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });

        function closeModal() {
            document.getElementById('menuModal').style.display = 'none';
        }

        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                closeModal();
            }
        });

        document.querySelector('.modal-close').addEventListener('click', function() {
            closeModal();
        });

        if (window.innerWidth > 768) {
            document.querySelectorAll('.menu > li').forEach(function(menuItem) {
                menuItem.addEventListener('mouseover', function() {
                    this.querySelector('.submenu').style.display = 'block';
                });
                menuItem.addEventListener('mouseout', function() {
                    this.querySelector('.submenu').style.display = 'none';
                });
            });
        }

        function toggleModal(menuType) {
            const menuData = {
                'car-brand': topMakes.map(make => ({
                    label: make.make_name,
                    url: `used-cars/${make.make_url}`
                })),
                'price': [{
                    label: 'Under 2 Lakhs',
                    url: 'used-cars/used-car-under-2-lakhs'
                }, {
                    label: '2-3 Lakhs',
                    url: 'used-cars/used-cars-between-2-3lakhs'
                }, {
                    label: '3-4 Lakhs',
                    url: 'used-cars/used-cars-between-3-4lakhs'
                }, {
                    label: '4-5 Lakhs',
                    url: 'used-cars/used-cars-between-4-5lakhs'
                }, {
                    label: '5-6 Lakhs',
                    url: 'used-cars/used-cars-between-5-6lakhs'
                }, {
                    label: '6-7 Lakhs',
                    url: 'used-cars/used-cars-between-6-7lakhs'
                }, {
                    label: '7-8 Lakhs',
                    url: 'used-cars/used-cars-between-7-8lakhs'
                }, {
                    label: 'More than 8 Lakhs',
                    url: 'used-cars/used-cars-more-than-8lakhs'
                }],
                'fuel': [{
                    label: 'Petrol',
                    url: 'used-cars/used-petrol-cars'
                }, {
                    label: 'Diesel',
                    url: 'used-cars/used-diesel-cars'
                }, {
                    label: 'CNG',
                    url: 'used-cars/used-cng-cars'
                }],
                'body-type': [{
                    label: 'Hatchback',
                    url: 'used-cars/used-hatchback-cars'
                }, {
                    label: 'Sedan',
                    url: 'used-cars/used-sedan-cars'
                }, {
                    label: 'SUV',
                    url: 'used-cars/used-suv-cars'
                }],
                'year': [{
                    label: 'Less Than 5 Years',
                    url: 'used-cars/used-cars-less-than-5-year'
                }, {
                    label: 'Less Than 6 Years',
                    url: 'used-cars/used-cars-less-than-6-year'
                }, {
                    label: 'Less Than 7 Years',
                    url: 'used-cars/used-cars-less-than-7-year'
                }, {
                    label: 'Less Than 8 Years',
                    url: 'used-cars/used-cars-less-than-8-year'
                }, {
                    label: 'More Than 8 Years',
                    url: 'used-cars/used-cars-above-8-year'
                }],
                'transmission': [{
                    label: 'Manual',
                    url: 'used-cars/transmission-manual'
                }, {
                    label: 'Automatic',
                    url: 'used-cars/transmission-automatic'
                }],
                'km-driven': [{
                    label: 'Less than 20,000 km',
                    url: 'used-cars/km-driven-less-than-20000'
                }, {
                    label: 'Less than 40,000 km',
                    url: 'used-cars/km-driven-less-than-40000'
                }, {
                    label: 'Less than 60,000 km',
                    url: 'used-cars/km-driven-less-than-60000'
                }, {
                    label: 'Less than 80,000 km',
                    url: 'used-cars/km-driven-less-than-80000'
                }, {
                    label: 'Above 80,000 km',
                    url: 'used-cars/km-driven-above-80000'
                }]
            };
            const modalMenu = document.getElementById('modalMenu');
            const modalTitle = document.getElementById('modalTitle');
            modalMenu.innerHTML = '';
            modalTitle.innerText = menuType.charAt(0).toUpperCase() + menuType.slice(1);
            menuData[menuType].forEach(item => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="${item.url}" onclick="window.location.href='${item.url}';">${item.label}</a>`;
                modalMenu.appendChild(li);
            });

            document.getElementById('menuModal').classList.add('show');
        }

        document.querySelector('.modal-close').addEventListener('click', function() {
            document.getElementById('menuModal').classList.remove('show');
        });

        document.querySelectorAll('.menu-item').forEach(function(menuItem) {
            menuItem.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    const menuType = event.target.getAttribute('data-menu');
                    toggleModal(menuType);
                }
            });
        });

        function setActive(link) {
            document.querySelectorAll('.menu a').forEach(item => {
                item.classList.remove('clicked');
            });
            link.classList.add('clicked');
        }
    </script>

    <!-- Breadcrumb row END -->
    <div class="content-area">
        <!-- content start -->
        <div class="container">
            <!-- Image Carousel start -->
            <div class="bg-white">
                <div class="section-head inner-head text-center m-t30">
                    <h2 class="text">Featured <span class="text-primary">Vehicles</span></h2>
                    <div class="dlab-separator-outer ">
                        <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="img-carousel owl-carousel mfp-gallery gallery owl-btn-center-lr">
                        @if($featured_vehicle->isNotEmpty())
                        @foreach ($featured_vehicle as $f_vehicle)
                        <div class="product-item">
                            <div class="dlab-box">
                                <!-- Image Section -->
                                <div class="dlab-thum-bx dlab-img-effect image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $f_vehicle->product_url) }}')">
                                    <img src="{{ asset('web_images/product_images/' . ($f_vehicle->front_left_side_angle_image ?? 'default-image.jpg')) }}" alt="{{ $f_vehicle->make_name }}">
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">
                                            <a href="javascript:void(0)" class="openModal" data-value="{{ $f_vehicle->product_id }}">
                                                <i class="ti-heart icon-bx-xs heart-icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Info Section -->
                                <div class="item-info text-center">
                                    <h4 class="dlab-title m-t0 text-uppercase">
                                        <a href="{{ url('/car-details/'.$f_vehicle->product_url) }}">
                                            {{ $f_vehicle->mfg_year }} {{ $f_vehicle->make_name }} {{ $f_vehicle->model_name }}
                                            <!-- Ratings Section -->
                                            <ul class="item-review">
                                                @for ($t = 1; $t <= 5; $t++) @php $ratingClass=$t <=$f_vehicle->rating
                                                    ? ''
                                                    : ($t < $f_vehicle->rating + 1 &&
                                                        fmod($f_vehicle->rating, 1) !== 0
                                                        ? '-half-o'
                                                        : '-o');
                                                        $starColorClass =
                                                        $f_vehicle->rating >= 4 ? 'star-green' : 'star-yellow';
                                                        @endphp
                                                        <li><i class="fa fa-star{{ $ratingClass }} {{ $starColorClass }}"></i>
                                                        </li>
                                                        @endfor
                                            </ul>
                                            <!-- Price Section -->
                                            <span class="text-primary">
                                                <i class="fa fa-inr"></i> {{ number_format($f_vehicle->price) }}
                                            </span>
                                        </a>
                                        <!-- Ratings Section -->
                                    </h4>

                                    <!-- Meta Information -->
                                    <div class="dlab-post-meta image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $f_vehicle->product_url) }}')">
                                        <div class="tooltip-wrapper" style="margin-bottom:0px;">
                                            <ul>
                                                <li class="post-date">
                                                    <i class="ti-location-pin"></i><strong>{{ $f_vehicle->location }}</strong>
                                                </li>
                                                <li class="post-author">
                                                    EMI
                                                    @php
                                                    $amt = $f_vehicle->price * (20 / 100); // 20% down payment
                                                    $p1 = $f_vehicle->price - $amt;
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

                                    <!-- Tags Section -->
                                    <div class="dlab-post-tags image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $f_vehicle->product_url) }}')" style="margin-top:0px;">
                                        <div class="post-tags">
                                            <a style="color: #45423e;">{{ $f_vehicle->km_driven }} km</a>
                                            <a style="color: #45423e;">{{ $f_vehicle->fuel_type }}</a>
                                            <a style="color: #45423e;">
                                                {!! $f_vehicle->owner == 1
                                                ? '<span class="normal">1</span><span class="superscript">st</span>'
                                                : ($f_vehicle->owner == 2
                                                ? '<span class="normal">2</span><span class="superscript">nd</span>'
                                                : '2+') !!} owner
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Featured Tag -->
                                <div class="sale">
                                    <span class="site-button button-sm">{{ $f_vehicle->type }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>No vehicles found.</p>
                        @endif

                    </div>
                </div>
                <!-- Image Carousel start END-->
            </div>
        </div>
    </div>
    <!-- car just like new -->
    <div class="content-area">
        <div class="section-full bg-img-fix content overlay-white-middle ">
            <div class="container">
                <div class="section-head text-center text-black m-t30">
                    <h2 class="text">Car Just <span class="text-primary">Like New</span></h2>
                    <div class="dlab-separator-outer ">
                        <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                    </div>
                </div>
                <div class="section-content m-b50">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                            <a href="{{ route('used-cars.index') }}" class="icon-cell">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center" style="border: 2px solid black">
                                    <div class="icon-xl text-primary m-b20">
                                        <img src="web_images/just_like/top_rating_car.png" alt="Top Rated Cars" style="width: 80px; height: 80px;">
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte text-uppercase">Top Rated Cars</h5>
                                        <p style="color:#444;">Buy Highest quality cars directly from autovista</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                            <a href="{{ url('used-cars/used-cars-less-than-5-year') }}" class="icon-cell">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center" style="border: 2px solid black">
                                    <div class="icon-xl text-primary m-b20">
                                        <img src="web_images/just_like/5years_warrenty.png" alt="5 years warrenty" style="width: 80px; height: 80px;">
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte text-uppercase">Upto 5 Years Old</h5>
                                        <p style="color:#444;">You wont be able to tell if these are used cars</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                            <a href="{{ url('used-cars/km-driven-less-than-40000') }}" class="icon-cell">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center" style="border: 2px solid black">
                                    <div class="icon-xl text-primary m-b20">
                                        <img src="web_images/just_like/400000_max.png" alt="540000 Max" style="width: 80px; height: 80px;">
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte text-uppercase">Max 40000 Km</h5>
                                        <p style="color:#444;">If less driven cars are what you're looking for</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                            <a href="{{ url('used-cars/used-cars-less-than-5-year') }}" class="icon-cell">
                                <div class="icon-bx-wraper bx-style-1 p-a20 center" style="border: 2px solid black">
                                    <div class="icon-xl text-primary m-b20">
                                        <img src="web_images/just_like/five_years.png" alt="40000 and 5 + year" style="width: 80px; height: 80px;">
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte text-uppercase">Max 40000 Km + 5 Years Old</h5>
                                        <p style="color:#444;">The closest alternative to a new cars</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- car just like new End -->

    <div class="content-area">
        <!-- content start -->
        <div class="container">
            <!-- Image Carousel start -->
            <div class="bg-white">
                <div class="section-head inner-head text-center">
                    <h2 class="text">Vistacars <span class="text-primary">Certified Vehicles </span></h2>
                    <div class="dlab-separator-outer ">
                        <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="img-carousel owl-carousel mfp-gallery gallery owl-btn-center-lr">
                        @if($vehicleCertified->isNotEmpty())
                        @foreach ($vehicleCertified as $vehicle)
                        <div class="product-item">
                            <div class="dlab-box">
                                <!-- Image Section -->
                                <div class="dlab-thum-bx dlab-img-effect image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $vehicle->product_url) }}')">
                                    <img src="{{ asset('web_images/product_images/' . ($vehicle->front_left_side_angle_image ?? 'default-image.jpg')) }}" alt="{{ $vehicle->make_name }}">
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">
                                            <a href="javascript:void(0)" class="openModal" data-value="{{ $vehicle->product_id }}">
                                                <i class="ti-heart icon-bx-xs heart-icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Info Section -->
                                <div class="item-info text-center image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $vehicle->product_url) }}')">
                                    <h4 class="dlab-title m-t0 text-uppercase">
                                        <a href="{{ url('/car-details/'.$vehicle->product_url) }}">
                                            {{ $vehicle->mfg_year }} {{ $vehicle->make_name }} {{ $vehicle->model_name }}
                                        </a>
                                        <!-- Ratings Section -->
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
                                        <!-- Price Section -->
                                        <span class="text-primary">
                                            <i class="fa fa-inr"></i> {{ number_format($vehicle->price) }}
                                        </span>
                                        </a>
                                    </h4>
                                    <!-- Meta Information -->
                                    <div class="dlab-post-meta">
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
                                    <!-- Tags Section -->
                                    <div class="dlab-post-tags image-clickable" onclick="redirectToCarDetails(event, '{{ url('/car-details/' . $vehicle->product_url) }}')" style="margin-top:0px;">
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
                                <div class="sale">
                                    <span class="site-button button-sm">{{ $vehicle->type }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>No vehicles found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- sell your car  -->
    <div class="section-full overlay-black-dark bg-img-fix content-inner m-t50" style="background-image:url(images/background/bga10.jpg);">
        <div class="container">
            <div class="section-head text-center ">
                <h2 class="text-uppercase text-white" style="line-height: 10px;">Sell Your Car</h2>
                <p class="text-white">Sell Your Old Car In 30 Minutes Or Less At Vistacars!</p>
                <div class="dlab-separator-outer ">
                    <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 m-b30 d-flex">
                        <div class="p-a30 text-white text-center border-3 flex-fill">
                            <div class="icon-lg m-b20"><i class="b-advantages-4__icon fa fa-car text-white"></i></div>
                            <h5>Sell Any Car To Us</h5>
                            <span>Vistacars offers a new, safe and convenient way of selling a your used car.Guaranteed Purchase !</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 m-b30 d-flex">
                        <div class="p-a30 text-white text-center border-3 flex-fill">
                            <div class="icon-lg m-b20"><i class="b-advantages-4__icon fa fa-calendar text-white"></i></div>
                            <h5>Free Appointment</h5>
                            <span>Free Car Inspection & Evaluation !</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 m-b30 d-flex">
                        <div class="p-a30 text-white text-center border-3 flex-fill">
                            <div class="icon-lg m-b20"><i class="b-advantages-4__icon fa fa-clock-o text-white"></i></div>
                            <h5>Sell in flat 30 mins</h5>
                            <span>We guarantee to buy any car at a fair price & pay you in 30 Mins. Quick & easy all done in 30 Mins.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center m-t30">
                <div class="p-a5 text-white text-center border 3">
                    <a href="{{ route('sell-cars') }}" class="btn btn-white">Evaluate Your Car in 10 Minute</a>
                </div>
            </div>
        </div>
    </div>
    <!-- sell your car END  -->
    <!-- Our Services -->
    <div class="section-full content-inner car-services" style="background-image:url(images/background/bg11.jpg); background-repeat:no-repeat; background-position:bottom;">
        <div class="container">
            <div class="row m-b40">
                <div class="col-lg-12 col-md-6 col-sm-12 section-head align-self-center">
                    <div class="section-head inner-head text-center">
                        <h2 class="text-uppercase">Welcome To <span class="text-primary">Autovista Group</span></h2>
                        <h5 class="font-weight-400">India's Leading Pre Owned Car Destination</h5>
                        <div class="dlab-separator-outer ">
                            <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                        </div>
                    </div>
                    <p id="best">We are a Trusted Name in Auto Industry, Visited by Million of Car Buyers Every Month!</p>
                    <p class="m-b0">Vistacars is one of the largest Pre owned car dealership which boasts of having a team of over 750 personnel across its 8 state of the art setups in Mumbai, Navi Mumbai, Thane and Pune to cater to its esteemed customers seamlessly.</p>
                    <p>Vistacars is a ISO certified company and is one of the largest True Value dealers; its supported by a professional team with experienced management and systems.</p>
                    <p>It offers a one stop shop for sales, service, spares, insurance, finance, exchange, used cars, and also boasts of having a driving school. The vision of lifetime customer service for every customer who is a part of Vistacars is what sets the company apart. It is a part of the 30 year old Excell Group which has diversified business interests across various sectors and is growing its footprint constantly. </p>
                    <div class="text-center">
                        <a class="site-button m-r15" href="{{ route('contact') }}">CHECK OUR LOCATIONS</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 m-b30 d-flex">
                    <div class="icon-bx-wraper p-a20 flex-fill">
                        <div class="icon-md text-primary m-b15"> <span class="icon-cell"><i class="fa fa-car"></i></span> </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte text-uppercase">Large Car Display</h5>
                            <p>The largest car display in industry.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 m-b30 d-flex">
                    <div class="icon-bx-wraper p-a20 flex-fill">
                        <div class="icon-md text-primary m-b15"> <span class="icon-cell"><i class="fa fa-handshake-o"></i></span> </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte text-uppercase">Dedicated Relationship Officer</h5>
                            <p>Catering to your every car need.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 m-b30 d-flex">
                    <div class="icon-bx-wraper p-a20 flex-fill">
                        <div class="icon-md text-primary m-b15"> <span class="icon-cell"><i class="fa fa-files-o"></i></span> </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte text-uppercase">Online-Offline Integration</h5>
                            <p>Choose a car online before you visit our outlet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 m-b30 d-flex">
                    <div class="icon-bx-wraper p-a20 flex-fill">
                        <div class="icon-md text-primary m-b15"> <span class="icon-cell"><i class="fa fa-cogs"></i></span> </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte text-uppercase">Genuine Accesories</h5>
                            <p>Many accessories to chose from.Glam up your car with genuine accessories.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services END-->

    <!-- to buy a car -->
    <div class="section-full bg-img-fix overlay-black-middle dlab-our-project" style="background-image:url(web_images/background_img/bg-3.jpg);">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-4 offset-lg-1 offset-md-1 col-sm-12 dlab-project-left p-t30">
                    <h4 class="text-white">Are You Looking </h4>
                    <h2><span class="text-white">TO BUY A CAR?</span></h2>
                    <p class="text-white p-r10">Search Our Inventory With Thousands Of Cars And More Cars Are Adding On Daily Basis.</p>
                    <div class="d-flex justify-content-center m-t30">
                        <div class="p-a5 text-white text-center border 3">
                            <a href="{{ route('used-cars.index') }}" class="btn btn-white" style="color: white;">Search Your Car</a>
                        </div>
                    </div><br>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 p-t30 p-r0 dlab-service">
                    <h4 class="text-white">Do You Want To </h4>
                    <h2><span class="text-white">SELL YOUR CAR?</span></h2>
                    <p class="text-white p-r10">Search Our Inventory With Thousands Of Cars And More Cars Are Adding On Daily Basis.</p>
                    <div class="d-flex justify-content-center m-t30">
                        <div class="p-a5 text-center border 3">
                            <a href="{{ route('sell-cars') }}" class="btn btn-white" style="color: white;">Check Your Car Price</a>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
    <!-- to buy a car END -->
    <!-- top car makes  -->
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Section: Car Makes -->
            <div class="col-lg-6 col-md-12">
                <div class="section-content">
                    <div class="p-t30">
                        <h2 class="text-uppercase">Top Car Makes</h2>
                        <h5 class="font-weight-400">We have a large number of Cars available; here you can browse by Make!</h5>
                        <div class="dlab-separator bg-primary"></div>
                        <br>
                        <div class="content-wrapper">
                            <div class="row">
                                <!-- Car Make Buttons -->
                                <div class="col-md-4 col-sm-6 col-12 m-b15">
                                    <a href="{{ url('used-cars/used-maruti-cars') }}" class="site-button outline red w-100" type="button">Maruti</a>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 m-b15">
                                    <a href="{{ url('used-cars/used-toyota-cars') }}" class="site-button outline red w-100" type="button">Toyota</a>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 m-b15">
                                    <a href="{{ url('used-cars/used-kia-cars') }}" class="site-button outline red w-100" type="button">KIA</a>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 m-b15">
                                    <a href="{{ url('used-cars/used-hyundai-cars') }}" class="site-button outline red w-100" type="button">Hyundai</a>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 m-b15">
                                    <a href="{{ url('used-cars/used-tata-cars') }}" class="site-button outline red w-100" type="button">TATA</a>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 m-b15">
                                    <a href="{{ url('used-cars/used-honda-cars') }}" class="site-button outline red w-100" type="button">Honda</a>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 m-b15">
                                    <a href="{{ url('used-cars/used-ford-cars') }}" class="site-button outline red w-100" type="button">Ford</a>
                                </div>
                            </div>
                            <div class="p-tb30">
                                <a href="{{ url('used-cars')}}" class="site-button graphical text-uppercase" target="_blank" type="button">View Top Car List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Section: Image -->
            <div class="col-lg-5 col-md-12">
                <div class="m-b50">
                    <div class="dlab-box add-product">
                        <div class="dlab-media dlab-img-effect">
                            <img src="web_images/background_img/bg1.jpeg" alt="" class="img-fluid">
                            <div class="dlab-info-has bg-black no-hover">
                                <div class="clearfix">
                                    <h4>Complete help in</h4>
                                    <h1 class="text-primary">CAR Buying</h1>
                                    <div class="dlab-separator-outer ">
                                        <div class="dlab-separator bg-primary style-skew"></div>
                                    </div>
                                    <p class="point"> Let our relationship managers take care of all the negotiation for best car buying expertise.</p>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <ul class="list-check secondry text-white">
                                            <li>Paper Transfer</li>
                                            <li>Car Insurance</li>
                                            <li>Service Warranty</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top car makes end-->
    <!-- What Clients Says -->
    <div class="section-full content-inner" style="background-image: url(images/pattern.png);">
        <div class="container">
            <div class="section-head text-center">
                <h2 class="text">Our <span class="text-primary"> Testimonials </span></h2>
                <div class="dlab-separator-outer ">
                    <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 d-flex">
                    <div class="testimonial-one align-self-center testimonial-style8 owl-carousel owl-theme">
                        @foreach ($reviews as $review)
                        <div class="item">
                            <div class="testimonial-8">
                                <div class="testimonial-text quote-left">
                                    <p>“ {{ $review->review_description }} ”</p>
                                </div>
                                <ul class="rating-list list-inline">
                                    @for ($i = 0; $i < $review->star; $i++)
                                        <li><i class="fa fa-star"></i></li>
                                        @endfor
                                </ul>
                                <div class="testimonial-detail clearfix">
                                    <h4 class="testimonial-name m-tb0">{{ $review->name }}</h4>
                                    <!-- <span class="testimonial-position">User</span> -->
                                    <div class="testimonial-pic">
                                        <img src="{{ asset('web_images/just_like/' . $review->user_photo) }}" alt="{{ $review->name }}" width="100" height="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 testimonial-thumb m-b30">
                    <img src="{{ asset('web_images/background_img/bg-3.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- What Clients Says End -->
    <!--our partners -->
    <div class="section-full dlab-we-find m-t0">
        <div class="container">
            <div class="section-content">
                <div class="section-head text-center" style="margin-bottom: 1px">
                    <h2 class="text">Our <span class="text-primary">Partners</span></h2>
                    <div class="dlab-separator-outer ">
                        <div class="dlab-separator text-primary style-icon"><i class="fa fa-leaf"></i></div>
                    </div>
                </div>
                <div class="client-logo-carousel owl-carousel mfp-gallery gallery owl-none">
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo"><a href="#"><img src="web_images/partners/our-partners-axis.png" alt=""></a></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo"> <a href="#"><img src="web_images/partners/our-partners-citi-bank.png" alt=""></a> </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo"> <a href="#"><img src="web_images/partners/our-partners-hdfc.png" alt=""></a> </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo"> <a href="#"><img src="web_images/partners/our-partners-icici.png" alt=""></a> </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo"> <a href="#"><img src="web_images/partners/our-partners-kotak.png" alt=""></a> </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo"> <a href="#"><img src="web_images/partners/our-partners-sbi.png" alt=""></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our partners END -->
</div>
@endsection