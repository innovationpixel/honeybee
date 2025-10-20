@extends('layouts.admin')
@section('html')

    <style>
        .error {
            color: red;
        }
        .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 .selected-flag {
            height: 48px;
        }
    </style>

    <main>
        <section class="breadcum v1 bg-cover-center"
            data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/breadcum/bg.jpg">
            <div class="container">
                <h2>Contact</h2>
                <ul>
                    <li><a href="{{ route('/') }}">Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </section>
        
        <section class="send-message v1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-content">
                            <div class="section-title v1">
                                <h6>Send Message</h6>
                                <h2>Just Have a Quick Any Questions?</h2>
                                <p>Honey bees stockpile honey in the hive. Within the hive is a structure made from
                                    wax called honeycomb. The honeycomb is made up of hundreds or thousands of
                                    hexagonal cells, into which the bees regurgitate honey for storage. Other
                                    honey-producing species.</p>
                            </div>
                            <div class="socials-links-box">
                                <ul>
                                    <li><a href="#"><span class="my-icon icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="my-icon icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="my-icon icon-linkedin-in"></span></a></li>
                                    <li><a href="#"><span class="my-icon icon-instagram"></span></a></li>
                                    <li><a href="#"><span class="my-icon icon-skype"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <form class="rd-form rd-mailform" method="post" action="{{ route('save_contact_form') }}" id="contact_form">                                
                                
                                @csrf

                            <ul>
                                <li>
                                    <h5>Your Name</h5>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                </li>
                                <li class="pt-3">
                                    <h5>Your Email</h5>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                </li>
                                <li class="pt-3">
                                    <h5>Your Phone Number</h5>
                                    <input type="text" name="phone" class="phone" id="phone" style="width: 630px;">
                                </li>
                                <li class="pt-3 pb-3">
                                    <h5>Message</h5>
                                    <textarea class="form-control" id="message" name="message" placeholder="Leave a message here"></textarea>
                                </li>
                            </ul>
                            <button type="submit" class="btn-anime v2 pt-3">send message</button>
                            <p class="response"></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Send Message End -->
        <!-- Contact US Start -->
        <section class="contact-us v1 bg-cover-center"
            data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/contact/bg.jpg">
            <div class="container">
                <div class="section-title-center-white v1">
                    <h6>Contact Us</h6>
                    <h2>Get In Touch</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-content">
                            <ul>
                                <li>
                                    <span class="my-icon icon-phone"></span>
                                    <p><a href="#">+(528) 406-7592</a></p>
                                </li>
                                <li>
                                    <span class="my-icon icon-location-dot"></span>
                                    <p>4517 Washington Ave. Manchester, Kentucky 39495</p>
                                </li>
                                <li>
                                    <span class="my-icon icon-envelope"></span>
                                    <p><a href="#">youremail@example.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="schedule-content">
                            <h4>Opening Hours</h4>
                            <ul>
                                <li>
                                    <p>
                                        <span class="day">Sat - Mon</span>
                                        <span class="time">10 AM - 8 PM</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <span class="day">Tus - Thu</span>
                                        <span class="time">11 AM - 7 PM</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <span class="day">Friday</span>
                                        <span class="time off-day">Off - Day</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact US End -->
        <!-- Contact Map Start -->
        <div class="contact-map v1 pb-xl-spach">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14613.167032861855!2d90.433811!3d23.701273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b767a022cd4b%3A0xaf33907e219d127!2sRayerbag%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1675146270950!5m2!1sen!2sbd"></iframe>
        </div>
        <!-- Contact Map End -->
    </main>

@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            $('#contact_form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        minlength: 3
                    },
                    phone: {
                        required: true,
                        minlength: 3
                    },
                    message: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    name: {
                        required: "Name is required",
                    },
                    email: {
                        required: "Email is required",
                    },
                    phone: {
                        required: "Phone is required",
                    },
                    message: {
                        required: "Message is required",
                    }
                },
                submitHandler: function(form) {
                    $('#contact_form').submit();
                }
            })

        })
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script>
        $(".phone").intlTelInput({
            initialCountry: "gb",
            separateDialCode: true,
            preferredCountries: ["gb", "us", "ae"],
            geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
        });

        $(".hiden").intlTelInput({
            initialCountry: "gb",
            dropdownContainer: 'body',
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
        });

        /* ADD A MASK IN PHONE INPUT (when document ready and when changing flag) FOR A BETTER USER EXPERIENCE */
        var mask1 = $(".phone").attr('placeholder').replace(/[0-9]/g, 0);

        $(document).ready(function() {
            $('.phone').mask(mask1)
        });

        $(".phone").on("countrychange", function(e, countryData) {
            $(".phone").val('');
            var mask1 = $(".phone").attr('placeholder').replace(/[0-9]/g, 0);
            $('.phone').mask(mask1);
        });

        var selectedCountryData = $(".selected-dial-code").text();
        $("#dial_code_contact").val(selectedCountryData);

        $(".hiden").parent().css('display', 'none');
        $(".intl-tel-input").css('width', '100%');
    </script>

@endsection
