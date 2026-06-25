<script>
    $(document).ready(function() {
        $('#submitButton_c').on('click', function(event) {
            event.preventDefault();

            function validateRecaptcha_c() {
                var recaptchaResponse = grecaptcha.getResponse();
                if (recaptchaResponse.length === 0) {
                    $('#recaptchaError').show();
                    return false;
                } else {
                    $('#recaptchaError').hide();
                    return true;
                }
            }

            if (!validateRecaptcha_c()) {
                return false;
            }
            var name = $('#name').val();
            var email = $('#email').val();
            var contact_no = $('#contact_no').val();
            var lead_source = $('#lead_source').val();
            var enquiry_for = $('#enquiry_for').val();
            var page_path = $('#page_path').val();

            if (name === '') {
                toastr.error('Name is required.');
                return false;
            }
            if (email === '') {
                toastr.error('Email is required.');
                return false;
            } else if (!validateEmail(email)) {
                toastr.error('Valid email is required.');
                return false;
            }
            if (contact_no === '') {
                toastr.error('Contact number is required.');
                return false;
            } else if (contact_no.length !== 10) {
                alert(contact_no);
                toastr.error('Valid contact number is required.');
                return false;
            }
            submitForm_c();
        });

        function validateEmail(email) {
            var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return re.test(email);
        }

        function submitForm_c() {
            $.ajax({
                url: '<?= base_url("insert_data"); ?>',
                type: 'POST',
                data: $('#insert_Form').serialize(),

                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success('Form submitted successfully.');
                        $('#insert_Form')[0].reset();
                        grecaptcha.reset();
                    } else if (response.status === 'error') {
                        if (response.errors) {
                            for (let field in response.errors) {
                                toastr.error(response.errors[field]);
                            }
                        } else {
                            toastr.error(response.message || 'An error occurred. Please try again.');
                        }
                        grecaptcha.reset();
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred. Please try again.');
                    grecaptcha.reset();
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#contact_no').on('input', function() {
            this.value = this.value.replace(/\D/g, '');
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }
        });
    });
</script>