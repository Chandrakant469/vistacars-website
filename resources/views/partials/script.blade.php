<script src="{{ asset('js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
<script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script><!-- FORM JS -->
<script src="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script><!-- FORM JS -->
<script src="{{ asset('plugins/magnific-popup/magnific-popup.js') }}"></script><!-- MAGNIFIC POPUP JS -->
<script src="{{ asset('plugins/counter/waypoints-min.js') }}"></script><!-- WAYPOINTS JS -->
<script src="{{ asset('plugins/counter/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
<script src="{{ asset('plugins/imagesloaded/imagesloaded.js') }}"></script><!-- IMAGESLOADED -->
<script src="{{ asset('plugins/masonry/masonry-3.1.4.js') }}"></script><!-- MASONRY -->
<script src="{{ asset('plugins/masonry/masonry.filter.js') }}"></script><!-- MASONRY -->
<script src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script><!-- OWL SLIDER -->
<script src="{{ asset('plugins/rangeslider/rangeslider.js') }}"></script><!-- Rangeslider -->
<script src="{{ asset('js/custom.min.js') }}"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{ asset('js/dz.carousel.min.js') }}"></script><!-- SORTCODE FUCTIONS  -->

<script src="{{ asset('js/dz.ajax.js') }}"></script><!-- CONTACT JS  -->
<!-- REVOLUTION JS FILES -->
<script src="{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('js/rev.slider.js') }}"></script>
<script src="{{ asset('plugins/lightgallery/js/lightgallery-all.js') }}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-211447256-1"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- Recaptcha --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
{{-- Sweet Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.23/dist/sweetalert2.min.js"></script>
{{-- Datepicker --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            dateFormat: 'dd/mm/yy'
            , minDate: 0
            , changeMonth: true
            , changeYear: true
        });
    });

</script>
<script>
    jQuery(document).ready(function() {
        'use strict';
        dz_rev_slider_1();
    }); /*ready*/

</script>
<script>
    $(document).ready(function() {
        $('.openModal').on('click', function() {
            var productId = $(this).data('value');
            $.ajax({
                url: "{{ route('check-session') }}"
                , method: 'GET'
                , success: function(response) {
                    if (response.is_logged_in) {
                        $.ajax({
                            url: "{{ route('store-product-id') }}"
                            , method: 'POST'
                            , data: {
                                product_id: productId
                                , _token: $('meta[name="csrf-token"]').attr('content')
                            }
                            , success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: "Success!"
                                        , text: "Product has been added to your wishlist."
                                        , icon: "success"
                                        , confirmButtonText: "OK"
                                    });
                                    $('a[data-value="' + productId + '"] .heart-icon').addClass('heart-filled');
                                } else {
                                    Swal.fire({
                                        title: "Product Already Saved"
                                        , text: "This product is already in your wishlist."
                                        , icon: "info"
                                        , confirmButtonText: "OK"
                                    });
                                }
                            }
                            , error: function() {
                                Swal.fire({
                                    title: "Error"
                                    , text: "Unable to add product to your session. Please try again."
                                    , icon: "error"
                                    , confirmButtonText: "Try Again"
                                });
                            }
                        });
                    } else {
                        $('#loginModal form')[0].reset();
                        $('#loginModal .text-danger').text('');
                        $('#loginModal input').removeClass('is-invalid');
                        $('#loginModal').modal('show');
                    }
                }
                , error: function() {
                    toastr.error('Unable to verify session status. Please try again.');
                }
            });
        });
    });

</script>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="bookTestDriveLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column flex-md-row">
                <input type="hidden" id="prevmoblienumber" name="moblienumber" value="" />
                <!-- Left Section -->
                <div class="p-3 left-section" style="border-right: 1px solid #ddd;">
                    <h3 class="mb-3">Why Login?</h3>
                    <div class="dlab-separator-outer">
                        <div class="dlab-separator bg-primary style-skew"></div>
                    </div>
                    <ul style="list-style-type: disc; padding-left: 10px;">
                        <li><b>Fill Forms Faster</b></li>
                        <li>One click submits on all forms</li>
                        <li><b>Hot Deals Alerts!</b></li>
                        <li>Access to price drops and hot deals</li>
                        <li><b>Everything at one place</b></li>
                        <li>See shortlists, sellers contacted and more</li>
                    </ul>
                </div>
                <!-- Right Section -->
                <div class="p-3 right-section">
                    <h3 class="mb-3">Login with OTP</h3>
                    <input type="hidden" id="prevmoblienumber" name="moblienumber" value="" />
                    <div class="dlab-separator-outer">
                        <div class="dlab-separator bg-primary style-skew"></div>
                    </div>
                    <form id="loginForm" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact No</label>
                            <input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter your contact number" maxlength="10" onkeypress="return isNumberKey(event)" onkeyup="return limitlength(this, 10)">
                        </div>
                        <button type="submit" class="site-button m-r15">LOGIN WITH OTP</button>
                    </form><br>
                    <p class="fa fa-lock"> We never share your contact info without asking you</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Edit Profile Modal --}}
<div class="modal fade" role="dialog" id="editProfileModal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close pull-right" data-dismiss="modal">
                    X
                </button>
                <div class='row'>
                    <div id="send_otp_div" class="login-form col-md-12">
                        <div class="otp col-md-12 col-xs-12">
                            <section>
                                <h2 class="ui-title-block-2 modalmargintop text-info text-center">EDIT PROFILE</h2>
                                <div class="ui-decor"></div>
                                <div id="success"></div>
                                <div class="row">
                                    <!-- CSRF Token -->
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="update_name" name="name" type="text" placeholder="Your Name" value="{{ session('user_name') }}">
                                            <p id="name_error" class="text-danger" style="display: none;"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="tel" placeholder="Mobile Number" id="update_moblie_number" value="{{ session('user_contact') }}" name="mobile_number" maxlength="10" onkeypress="return isNumberKey(event)" onkeyup="return limitlength(this, 10)">
                                            <p id="contact_error" class="text-danger" style="display: none;"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="email" placeholder="Email Address" name="email" id="update_email" value="{{ session('user_email') }}">
                                            <p id="email_error" class="text-danger" style="display: none;"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="display: flex; gap: 15px; align-items: center; margin-top: 0; padding-top: 0;">
                                        <div class="form-group" style="display: flex; gap: 15px; align-items: center;">
                                            <div>
                                                <input class="forms__radio hidden" id="forms__radio-3" type="radio" name="city" value="Mumbai" {{ session('user_location') === 'Mumbai' ? 'checked' : '' }}>
                                                <label class="forms__label forms__label-radio forms__label-radio-2" for="forms__radio-3">MUMBAI</label>
                                            </div>
                                            <div>
                                                <input class="forms__radio hidden" id="forms__radio-4" type="radio" name="city" value="Navi Mumbai" {{ session('user_location') === 'Navi Mumbai' ? 'checked' : '' }}>
                                                <label class="forms__label forms__label-radio forms__label-radio-2" for="forms__radio-4">NAVI MUMBAI</label>
                                            </div>
                                            <div>
                                                <input class="forms__radio hidden" id="forms__radio-5" type="radio" name="city" value="Pune" {{ session('user_location') === 'Pune' ? 'checked' : '' }}>
                                                <label class="forms__label forms__label-radio forms__label-radio-2" for="forms__radio-5">PUNE</label>
                                            </div>
                                        </div>
                                        <p class="text-primary error" id='update_city_error' style="display: none;"></p>
                                    </div>
                                    <p>
                                        <input class="col-md-offset-1 col-md-9" type="hidden" id="update_login_id" value="{{ session('login_id') }}" name="update_login_id">
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="site-button" id="updateProfileButton" onclick="return updateProfile();">
                                            Update Account
                                        </button>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Select Location Modal --}}
<div id="selectLocationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border-radius: 12px; border: 1px solid #ccc; padding: 20px;">
            <div style="display: flex; justify-content: center; align-items: center; position: relative;">
                <h5 class="modal-title text-info" id="locationModalLabel" style="font-family: 'Poppins', sans-serif; font-weight: 600; margin: 0; text-align: center;">
                    SELECT YOUR LOCATION
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none; border: none; background: none; padding: 0; position: absolute; right: 0;">
                    <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row text-center">
                    <!-- Pune -->
                    <div class="col-4" style="padding: 10px;">
                        <a href="javascript:void(0);" onclick="setLocation('Pune')" class="location-box {{ session('tlocation_web') == 'Pune' ? 'active' : '' }}" style="text-decoration: none;">
                            <img src="{{ asset('web_images/cities/pune.jpg') }}" class="img-fluid rounded shadow-sm mb-2" alt="Pune" style="width: 100%; max-width: 150px; height: auto;">
                            <h6 style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 14px; color: #333; margin: 0;">PUNE</h6>
                        </a>
                    </div>
                    <!-- Mumbai -->
                    <div class="col-4" style="padding: 10px;">
                        <a href="javascript:void(0);" onclick="setLocation('Mumbai')" class="location-box {{ session('tlocation_web') == 'Mumbai' ? 'active' : '' }}" style="text-decoration: none;">
                            <img src="{{ asset('web_images/cities/mumbai.jpg') }}" class="img-fluid rounded shadow-sm mb-2" alt="Mumbai" style="width: 100%; max-width: 150px; height: auto;">
                            <h6 style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 14px; color: #333; margin: 0;">MUMBAI</h6>
                        </a>
                    </div>
                    <!-- Navi Mumbai -->
                    <div class="col-4" style="padding: 10px; text-align: center;">
                        <a href="javascript:void(0);" onclick="setLocation('Navi Mumbai')" class="location-box {{ session('tlocation_web') == 'Navi Mumbai' ? 'active' : '' }}" style="text-decoration: none; display: inline-block; width: 100%;">
                            <img src="{{ asset('web_images/cities/kharghar.jpg') }}" class="img-fluid rounded shadow-sm mb-2" alt="Navi Mumbai" style="width: 100%; max-width: 150px; height: auto;">
                            <h6 style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 12px; color: #333; margin: 0;">
                                NAVI MUMBAI
                            </h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault();

            var name = $('#name').val().trim();
            var email = $('#email').val().trim();
            var contact = $('#contact').val().trim();
            toastr.clear();
            if (name === '') {
                toastr.error('Name is required!');
                return;
            } else if (!/^[a-zA-Z\s]+$/.test(name)) {
                toastr.error('Name must contain only letters and spaces!');
                return;
            }

            if (email === '') {
                toastr.error('Email is required!');
                return;
            } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email)) {
                toastr.error('Please enter a valid email!');
                return;
            }

            if (contact === '') {
                toastr.error('Contact number is required!');
                return;
            } else if (!/^[7-9]\d{9}$/.test(contact)) {
                toastr.error('Please enter a valid mobile number!');
                return;
            }

            $.ajax({
                url: "{{ route('user-register') }}"
                , type: 'POST'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , name: name
                    , email: email
                    , contact: contact
                , }
                , success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $('#prevmoblienumber').val(contact);
                        var otpSection = `
                    <section>
                          <h3 class="mb-3">Login with OTP</h3>
                          <div class="dlab-separator-outer">
                              <div class="dlab-separator bg-primary style-skew"></div>
                          </div>
                          <div class="ui-decor"></div>
                          <div id="success"></div>
                          <p style="padding-top: 40px;">We have sent an OTP to XXX XXX ${contact.slice(-4)}</p>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <input class="form-control" placeholder="Enter OTP" name="user_otp" id="user_otp" type="password">
                                      <p class="text-primary error" id='otp_error' style='display: none'></p>
                                  </div>
                                  <input type="hidden" id="moblienumber" name="moblienumber" value="${contact}" />
                              </div>
                              <div class="col-md-12">
                                  <a class="resend-otp-btn" href="#">Resend OTP</a>
                              </div>
                          </div>
                          <p>Not your number? <span><b><a href="#" class="change_mobile_number" style="#F76D2B;">change it</a></b></span></p>
                          <br>
                          <div class="row">
                              <div class="col-xs-12" style="margin-left:30px;">
                                  <button class="site-button m-r15 text-uppercase verify-otp">Log in</button>
                              </div>
                          </div>
                      </section>
                    `;
                        $('#loginModal .right-section').html(otpSection);
                        $('#loginModal').modal('show');
                    } else {
                        toastr.error(response.message || 'Something went wrong!');
                    }
                }
                , error: function(xhr) {
                    var errors = xhr.responseJSON ? xhr.responseJSON.errors : null;
                    if (errors) {
                        for (const [key, messages] of Object.entries(errors)) {
                            toastr.error(messages[0]);
                        }
                    } else {
                        toastr.error('An unexpected error occurred!');
                    }
                }
            , });
        });
    });


    $(document).on('click', '.resend-otp-btn', function(e) {
        e.preventDefault();
        resend_otp()
    });

    function resend_otp() {
        var contact = $('#moblienumber').val();
        if (contact === '') {
            isValid = false;
            toastr.error('Contact number is required!');
        } else if (!/^[7-9]\d{9}$/.test(contact)) {
            isValid = false;
            toastr.error('Please enter valid mobile number');
        }
        toastr.clear();
        $.ajax({
            url: "{{ route('resend-otp') }}"
            , type: 'POST'
            , data: {
                _token: "{{ csrf_token() }}"
                , contact: contact
            }
            , success: function(response) {
                if (response.status === 'success') {
                    $('#user_otp').val('');
                    toastr.success(response.message);
                    $('#otp').val(response.otp)
                    $('#moblienumber').val(response.contact)
                    $('#prevmoblienumber').val(response.contact)
                } else {
                    toastr.error(response.message || 'Failed to resend OTP!');
                }
            }
            , error: function(xhr) {
                toastr.error('An unexpected error occurred!');
            }
        });
    }

    $(document).on('click', '.change_mobile_number', function(e) {
        e.preventDefault();
        var changeNumberSection =
            `<section>
			<h3 class="mb-3">Login with OTP</h3>
            <div class="dlab-separator-outer">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
			<div class="ui-decor"></div>
			<div id="success"></div>
			<div class="row" style="padding-top: 40px;">
				<div class="col-md-12">
					<div class="form-group">
						<input class="form-control" id="customer_name" name="customer_name" type="text" placeholder="Your Name">
						<p class="text-primary error" id='customer_name_error' style='display: none'></p>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<input class="form-control" type="tel" id="new_moblienumber" name="mobile" placeholder="Phone" maxlength="10" onkeypress="return isNumberKey(event)">
						<p class="text-primary error" id='customer_phone_error' style='display: none'></p>
					</div>
				</div>
			</div>
			<p class="h-otp"><i class="fa fa-lock" aria-hidden="true"></i> We never share your contact info without asking you</p>
			<br>
			<div class="row">
				<div class="col-xs-12" style="margin-left:30px;">
					<button class="site-button m-r15 text-uppercase change_mobilenumber">Login with OTP</button>
				</div>
			</div>
		</section>`;
        $('#loginModal .right-section').html(changeNumberSection);
    });

    $(document).on('click', '.change_mobilenumber', function(e) {
        e.preventDefault();
        changeMobileNumber();
    });

    function changeMobileNumber() {
        var prevcontact = $('#prevmoblienumber').val().trim();
        var latestcontact = $('#new_moblienumber').val().trim();
        var name = $('#customer_name').val().trim();
        var isValid = true;
        toastr.clear();
        if (latestcontact === '') {
            isValid = false;
            toastr.error('Contact number is required!');
        } else if (!/^[7-9]\d{9}$/.test(latestcontact)) {
            isValid = false;
            toastr.error('Please enter a valid mobile number!');
        }

        if (name === '') {
            isValid = false;
            toastr.error('Name is required!');
        } else if (!/^[a-zA-Z\s]+$/.test(name)) {
            isValid = false;
            toastr.error('Name must contain only letters and spaces!');
        }

        if (isValid) {
            $.ajax({
                url: "{{ route('change-number') }}"
                , type: 'POST'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , prevcontact: prevcontact
                    , customer_name: name
                    , mobile: latestcontact
                }
                , success: function(response) {
                    if (response.status === 'success') {
                        $('#prevmoblienumber').val(response.mobile_number)
                        toastr.success(response.message);
                        var otpSection = `
                            <section>
                                <h3 class="mb-3">Login with OTP</h3>
                                <div class="dlab-separator-outer">
                                    <div class="dlab-separator bg-primary style-skew"></div>
                                </div>
                                <div class="ui-decor"></div>
                                <div id="success"></div>
                                <p style="padding-top: 40px;">
                                    We have sent an OTP to XXX XXX ${response.mobile_number.slice(-4)}
                                </p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Enter OTP" name="user_otp" id="user_otp" type="password">
                                            <p class="text-primary error" id="otp_error" style="display: none;"></p>
                                        </div>
                                        <input type="hidden" id="otp" name="otp" value="${response.otp}" />
                                        <input type="hidden" id="customer_name" name="customer_name" value="${response.name}" />
                                        <input type="hidden" id="moblienumber" name="moblienumber" value="${response.mobile_number}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="resend-otp-btn" href="#">Resend OTP</a>
                                    </div>
                                </div>
                                <p>Not your number? <span><b><a href="#" class="change_mobile_number" style="#F76D2B;">change it</a></b></span></p>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12" style="margin-left:30px;">
                                        <button class="site-button m-r15 text-uppercase verify-otp">Log in</button>
                                    </div>
                                </div>
                            </section>`;
                        $('#loginModal .right-section').html(otpSection);
                        $('#loginModal').modal('show');
                    } else {
                        toastr.error(response.message || 'Something went wrong!');
                    }
                },

                error: function(xhr) {
                    toastr.error('An unexpected error occurred during OTP verification!');
                }
            });
        }
    }

    $(document).on('click', '.verify-otp', function(e) {
        e.preventDefault();
        submitUserOTP()
    });

    function submitUserOTP() {
        var otp = $('#user_otp').val().trim();
        if (otp === '') {
            toastr.error('Please enter the OTP');
            return;
        }

        $.ajax({
            url: "{{ route('verify-otp') }}"
            , type: 'POST'
            , data: {
                _token: "{{ csrf_token() }}"
                , otp: otp
                , contact: $('#prevmoblienumber').val()
            , }
            , success: function(response) {
                if (response.status === 'success') {
                    toastr.success('OTP verified successfully!');
                    $('#loginModal').modal('hide');
                    window.location.href =
                        "{{ route('dashboard.index') }}";
                } else {
                    toastr.error(response.message || 'Failed to verify OTP!');
                }
            }
            , error: function(xhr) {
                toastr.error('Invalid OTP! Please try again.');
            }
        });
    }

</script>
<script>
    $(document).ready(function() {
        $('#editprofile').on('click', function() {
            $('#editProfileModal').modal('show');
        });
    });

    function updateProfile() {
        var name = $('#update_name').val().trim();
        var email = $('#update_email').val().trim();
        var contact = $('#update_moblie_number').val().trim();
        var city = $('input[name="city"]:checked').val();
        var loginId = $('#update_login_id').val();
        var isValid = true;

        toastr.clear();

        if (name === '') {
            isValid = false;
            toastr.error('Name is required!');
        } else if (!/^[a-zA-Z\s]+$/.test(name)) {
            isValid = false;
            toastr.error('Name must contain only letters and spaces!');
        }

        if (email === '') {
            isValid = false;
            toastr.error('Email is required!');
        } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email)) {
            isValid = false;
            toastr.error('Please enter a valid email!');
        }

        if (contact === '') {
            isValid = false;
            toastr.error('Contact number is required!');
        } else if (!/^[7-9]\d{9}$/.test(contact)) {
            isValid = false;
            toastr.error('Please enter a valid mobile number!');
        }

        if (!city) {
            isValid = false;
            toastr.error('Please select a city!');
        }

        if (isValid) {
            var updateUrl = "{{ route('dashboard.update', ':id') }}".replace(':id', loginId);
            $.ajax({
                url: updateUrl
                , type: 'POST'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , _method: 'PATCH'
                    , name: name
                    , email: email
                    , contact: contact
                    , city: city
                }
                , success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message || 'Profile updated successfully!');
                        $('#editProfileModal').modal('hide');
                    } else if (response.status === 'info') {
                        toastr.info(response.message || 'No changes were made to the profile.');
                        $('#editProfileModal').modal('hide');
                    } else {
                        toastr.error(response.message || 'An error occurred!');
                    }
                }
                , error: function(xhr) {
                    var errors = xhr.responseJSON ? xhr.responseJSON.errors : null;
                    if (errors) {
                        for (const [key, messages] of Object.entries(errors)) {
                            toastr.error(messages[0]);
                        }
                    } else {
                        toastr.error('An unexpected error occurred!');
                    }
                }
            });
        }
    }

    $(document).ready(function() {
        $('.bookNowForm').submit(function(e) {
            e.preventDefault();
            const name = $('.book_name').val().trim();
            const email = $('.book_email').val().trim();
            const contact = $('.book_contact').val().trim();
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
                _token: "{{ csrf_token() }}"
                , name: name
                , email: email
                , contact: contact
                , recaptcha: $('.g-recaptcha-response').val()
                , enq: $('.enq').val()
                , message: message
            };

            $.ajax({
                url: "{{ route('dashboard.store') }}"
                , type: 'POST'
                , data: formData
                , success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $('.bookNowForm')[0].reset();
                        grecaptcha.reset();
                        $('.g-recaptcha-response').val('');
                    }
                }
                , error: function(xhr, status, error) {
                    toastr.error('Failed to submit form. Please try again.');
                }
            });
        });
    });



    function validateRecaptcha() {
        const recaptchaResponse = grecaptcha.getResponse();
        if (!recaptchaResponse) {
            toastr.clear();
            toastr.error('Please complete the reCAPTCHA!');
            return false;
        }
        $('.g-recaptcha-response').val(recaptchaResponse);
        return true;
    }

</script>
{{-- Filter Section For Mobile View --}}
<script>
    $('#filter-btn').on('click', function() {
        $('body').toggleClass('filter-active');
        if ($('body').hasClass('filter-active')) {
            $('#filter-section').css({
                display: 'block'
            , });
        } else {
            $('#filter-section').css({
                display: 'none'
            , });
        }
    });

    $('#close-filter').on('click', function(e) {
        e.preventDefault();
        $('body').removeClass('filter-active');
        $('#filter-section').hide();
    });

    function checkAndShowFilter() {
        var windowWidth = $(window).width();
        if (windowWidth > 991) {
            $('#filter-section').show();
            $('body').removeClass('filter-active');
        } else {
            if (!$('body').hasClass('filter-active')) {
                $('#filter-section').hide();
            }
        }
    }

    checkAndShowFilter();
    $(window).resize(function() {
        checkAndShowFilter();
    });

</script>
<script>
    $(document).on('click', '.favorite-or-heart a', function(e) {
        e.preventDefault();
        var loggedIn = @json(Session::get('user_logged_in', false));
        if (loggedIn) {
            window.location.href = '/dashboard';
        } else {
            $('#loginModal').modal('show');
        }
    });

</script>
{{-- Location modal script --}}
<script>
    function setLocation(city) {
        $.ajax({
            url: '/set-location'
            , type: 'POST'
            , data: {
                location: city
            }
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , success: function(response) {
                if (response.success) {
                    $('.location-box').removeClass('active');
                    $(`a[onclick="setLocation('${city}')"]`).addClass('active');
                    toastr.success(`Location set to ${city}`);
                    $('#selectLocationModal').modal('hide');
                    const navbarToggleButton = document.querySelector('.navbar-toggler');
                    if (navbarToggleButton && window.innerWidth <= 768) {
                        navbarToggleButton.click();
                    }
                } else {
                    toastr.error('Failed to set location. Please try again.');
                }
            }
            , error: function(error) {
                console.error('Error setting location:', error);
                toastr.error('An error occurred. Please try again.');
            }
        });
    }

</script>

<script>
    function redirectToCarDetails(event, url) {
        if (event.target.closest('.openModal')) {
            return;
        }
        if (event.target.closest('.remove-from-wishlist')) {
            return;
        }
        window.location.href = url;
    }

</script>
<script>
    $(document).ready(function() {
        $(".dlab-quik-search form").on("submit", function(event) {
            event.preventDefault();
        });

        $("#searchInput").on("keyup", function() {
            let query = $(this).val().trim();
            if (query === "") {
                $("#suggestionList").html("").hide();
                return;
            }
            if (query.length > 1) {
                $.ajax({
                    url: "/search/suggestions"
                    , type: "POST"
                    , headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                    , data: {
                        search: query
                    }
                    , success: function(data) {
                        let suggestionHTML = "";
                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                suggestionHTML += `<li data-model_name="${item.model_name}">${item.name}</li>`;
                            });
                            $("#suggestionList").html(suggestionHTML).show();
                        } else {
                            suggestionHTML = "<li>No Cars Found</li>";
                            $("#suggestionList").html(suggestionHTML).show();
                        }
                    }
                    , error: function() {
                        console.error("Error fetching suggestions.");
                    }
                });
            } else {
                $("#suggestionList").hide();
            }
        });

        $(document).on("click", "#suggestionList li", function() {
            let modelName = $(this).data("model_name");
            if (modelName) {
                $.ajax({
                    url: "/used-cars/searchfilter"
                    , type: "POST"
                    , headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                    , data: {
                        modelName: modelName
                    }
                    , success: function(response) {
                        $('#suggestionList').empty();
                        $('#masonry').html(response.html);
                        $('#searchInput').val('');
                        $('.fa-remove').click();
                        if (window.location.pathname !== '/used-cars') {
                            window.location.href = '/used-cars';
                        }
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

        $(document).click(function(e) {
            if (!$(e.target).closest("#searchInput, #suggestionList").length) {
                $("#suggestionList").hide();
            }
        });

        //Search functionality for mobile view
        $("#searchInputMobile").on("keyup", function() {
            let query = $(this).val().trim();
            if (query === "") {
                $("#suggestionListMobile").html("").hide();
                return;
            }
            if (query.length > 1) {
                $.ajax({
                    url: "/search/suggestions"
                    , type: "POST"
                    , headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                    , data: {
                        search: query
                    }
                    , success: function(data) {
                        let suggestionHTML = "";
                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                suggestionHTML += `<li data-model_name="${item.model_name}">${item.name}</li>`;
                            });
                            $("#suggestionListMobile").html(suggestionHTML).show();
                        } else {
                            suggestionHTML = "<li>No Cars Found</li>";
                            $("#suggestionListMobile").html(suggestionHTML).show();
                        }
                    }
                    , error: function() {
                        console.error("Error fetching suggestions.");
                    }
                });
            } else {
                $("#suggestionListMobile").hide();
            }
        });

        $(document).on("click", "#suggestionListMobile li", function() {
            let modelName = $(this).data("model_name");
            if (modelName) {
                $.ajax({
                    url: "/used-cars/searchfilter"
                    , type: "POST"
                    , headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                    , data: {
                        modelName: modelName
                    }
                    , success: function(response) {
                        $('#suggestionListMobile').empty();
                        $('#masonry').html(response.html);
                        if (window.location.pathname !== '/used-cars') {
                            window.location.href = '/used-cars';
                        }
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
                            $('#searchInputMobile').val('');
                            if ($('#navbarNavDropdown').hasClass('show')) {
                                $('#navbarNavDropdown').removeClass('show');
                            }
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

        $(document).click(function(e) {
            if (!$(e.target).closest("#searchInputMobile, #suggestionListMobile").length) {
                $("#suggestionListMobile").hide();
            }
        });
    });

</script>
<script>
    if (window.location.pathname === '/used-cars') {
        if (sessionStorage.getItem('pageReloaded')) {
            $.ajax({
                url: '/clear-session'
                , type: 'GET'
                , success: function(response) {}
            });
        } else {
            sessionStorage.setItem('pageReloaded', 'true');
        }
    }

    $(document).on("click", function(e) {
        if (!$(e.target).closest("#searchInput, #suggestionList").length) {
            $("#suggestionList").hide();
        }
    });

    //suggestion field fixed code
    document.addEventListener("DOMContentLoaded", function() {
        let searchInput = document.getElementById("searchInput");
        let suggestionList = document.getElementById("suggestionList");

        function updateSuggestionPosition() {
            let rect = searchInput.getBoundingClientRect();
            suggestionList.style.position = "fixed";
        }
        searchInput.addEventListener("focus", updateSuggestionPosition);
        searchInput.addEventListener("input", updateSuggestionPosition);
        window.addEventListener("scroll", updateSuggestionPosition);
        window.addEventListener("resize", updateSuggestionPosition);
    });

    //To prevennt from click on tooltip icon in mobile view
    document.addEventListener("DOMContentLoaded", function() {
        if (window.innerWidth <= 768) {
            document.querySelectorAll(".tooltip-icon").forEach(function(icon) {
                icon.addEventListener("click", function(event) {
                    event.preventDefault();
                });
            });
        }
    });

</script>
