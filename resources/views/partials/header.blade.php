<header class="site-header header header-style-7">
    <!-- main header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container-fluid clearfix">
                <div class="logo-header mostion logo-black" style="border-right:none;">
                    <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" width="193" height="89" alt=""></a>
                </div>
                <!-- nav toggle button -->
                <div class="header-mobile-row d-flex align-items-center">
                    <li class="call-icon-mobile">
                        <a href="tel:+91{{ constant('MOBILE_NUMBER') }}">
                            <i class="fa fa-phone"></i>
                        </a>
                    </li>
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <!-- Quik search -->
                <div class="dlab-quik-search bg-primary">
                    <form action="#">
                        <input name="search" id="searchInput" value="" type="text" class="form-control" placeholder="Search brands and models">
                        <span id="quik-search-remove"><i class="fa fa-remove"></i></span>
                    </form>
                </div>
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="nav navbar-nav">
                        <li class="navcontent" id="searchMobilesection">
                            <input name="search" id="searchInputMobile" value="" type="text" class="form-control" placeholder="Search brands and models">
                            <ul id="suggestionListMobile"></ul>
                        </li>
                        <li class="navcontent">
                            <a href="javascript:void(0);" data-toggle="modal" id="locationText" data-target="#selectLocationModal" style="font-size: 16px; margin-right: 15px;">
                                {{ session('tlocation_web', 'SELECT CITY') }}
                            </a>
                        </li>
                        <li class="navcontent">
                            <a href="{{ route('used-cars.index') }}" style="font-size: 16px; margin-right: 15px;">Buy</a>
                        </li>
                        <li class="navcontent">
                            <a href="{{ route('sell-cars') }}" style="font-size: 16px; margin-right: 15px;">Sell</a>
                        </li>
                        <li class="more-btn">
                            <a href="javascript:void(0);" style="font-size: 16px; margin-right: 15px;">More<i class="fa fa-chevron-down" style="font-size: 16px;"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('blog') }}" id="blogs" style="font-size: 16px;">BLOG</a></li>
                                <li><a href="{{ route('contact') }}" style="font-size: 16px;">CONTACT US</a></li>
                                <li><a href="{{ route('faqs') }}" style="font-size: 16px;">FAQ'S</a></li>
                            </ul>
                        </li>
                        <li class="search-or-blog">
                            <a href="javascript:void(0);" class="search-btn" id="quik-search-btn" style="border: none; font-size: 16px; margin-right: 15px; border-left: 1px solid rgba(0, 0, 0, .1);">
                                <i class="fa fa-search desktop-only" id="searchBox" style="font-size: 16px; color:#EE3131;"></i>
                                <span class="mobile-only" style="color: inherit;">Blog</span>
                            </a>
                        </li>
                        <!-- Favorites for Mobile / Heart Icon for Desktop -->
                        <li class="favorite-or-heart">
                            <a href="" style="border: none; font-size: 16px; margin-right: 15px; border-left: 1px solid rgba(0, 0, 0, .1);" class="cart-btn">
                                <i class="fa fa-heart desktop-only" style="font-size: 16px; color:#EE3131;"></i>
                                <span class="mobile-only" style="color: inherit;">Favourites</span>
                            </a>
                        </li>
                        <!-- SignUp | Login for Mobile / User Icon for Desktop -->

                        <li style="position: relative;" class="navcontent">
                            @if (session('user_logged_in'))
                            <!-- Check if user is logged in -->
                            <a href="javascript:void(0);" class="login-btn" style="border: none; display: inline-block; font-size: 16px; margin-right: 15px; border-left: 1px solid rgba(0, 0, 0, .1);" onclick="toggleDropdown()">
                                <i class="fa fa-user desktop-only" style="font-size: 16px; color:#EE3131;"></i>
                                <span class="mobile-only" style="color: inherit;">My Profile</span>
                            </a>
                            <!-- Dropdown Menu for Desktop (for logged-in users) -->
                            <div id="dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; background: white; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);border-radius: 4px; min-width: 200px; z-index: 10;padding-left: 20px;">
                                <!-- My Profile Link -->
                                <div style="padding: 10px 0;">
                                    <a href="{{ url('/dashboard') }}" style="text-decoration: none; color: black; font-size: 16px; display: block;">MY
                                        PROFILE</a>
                                </div>
                                <!-- Logout Link -->
                                <div style="padding: 10px 0;">
                                    <a href="{{ route('logout') }}" style="text-decoration: none; color: black; font-size: 16px; display: block;">LOGOUT</a>
                                </div>
                            </div>
                            @else
                            <!-- If the user is not logged in -->
                            <a href="javascript:void(0);" class="login-btn" style="border: none; display: inline-block; font-size: 16px; margin-right: 15px; border-left: 1px solid rgba(0, 0, 0, .1);" onclick="toggleDropdown()">
                                <i class="fa fa-user desktop-only" style="font-size: 16px; color:#EE3131;"></i>
                                <span class="mobile-only openModal" style="color: inherit;">SignUp | Login</span>
                            </a>
                            <!-- Dropdown Menu for Desktop (for logged-out users) -->
                            <div id="dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; background: white; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);border-radius: 4px; min-width: 200px; z-index: 10;padding-left: 40px;">
                                <!-- SignUp Link -->
                                <div style="padding: 8px 0;">
                                    <a href="javascript:void(0);" class="openModal" style="background-color: white;">SIGNUP
                                        | LOGIN</a>
                                </div>
                            </div>
                            @endif
                        </li>
                        <li class="call-icon call-btn site-button" id="mobile-icon">
                            <a id="whatsapp-link" href="tel:+91{{ constant('MOBILE_NUMBER') }}" target="_blank" style="border: none; font-size: 16px; margin-right: 15px; color: white;" class="cart-btn">
                                <i class="fa fa-phone" style="font-size: 16px; color: white;"></i>
                                +91 {{ constant('MOBILE_NUMBER') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>
<ul id="suggestionList" style="display:none;"></ul>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var phoneNumber = "9594005337";
        var message = "Hello I am interested in Autovista Group!";
        var encodedMessage = encodeURIComponent(message);
        var whatsappURL = "https://wa.me/" + phoneNumber + "?text=" + encodedMessage;

        document.getElementById("whatsapp-link").href = whatsappURL;
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownMenu = document.getElementById("dropdown-menu");
        window.toggleDropdown = function() {
            if (window.innerWidth <= 767) {
                if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
                    dropdownMenu.style.display = 'block';
                } else {
                    dropdownMenu.style.display = 'none';
                }
            } else {
                if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
                    dropdownMenu.style.display = 'block';
                } else {
                    dropdownMenu.style.display = 'none';
                }
            }
        };

        document.addEventListener('click', function(event) {
            if (!dropdownMenu.contains(event.target) && !event.target.closest('.login-btn')) {
                dropdownMenu.style.display = 'none';
            }
        });
    });

    function updateIdBasedOnViewport() {
        const searchBlogElement = document.getElementById('quik-search-btn');
        if (window.innerWidth <= 768) {
            if (searchBlogElement) {
                searchBlogElement.removeAttribute('id');
            }
        } else {
            if (searchBlogElement && !searchBlogElement.id) {
                searchBlogElement.setAttribute('id', 'quik-search-btn');
            }
        }
    }

    function fetchLocation() {
        fetch('/fetch-location', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                let locationText = document.getElementById("locationText");
                if (locationText.innerText !== data.location) {
                    locationText.innerText = data.location;
                }
            })
            .catch(error => console.error('Error:', error));
    }
    setInterval(fetchLocation, 1000);
</script>