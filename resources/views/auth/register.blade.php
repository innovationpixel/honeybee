@extends('layouts.admin_login')


@section('pagehtml')


    <style>

        *{
            font-family: poppins;
        }

        body{
            background: linear-gradient(180deg, #feaaa5 0%, #f5756e 50%);
        }

        .login_sec {
            background: rgb(45, 49, 65);
            background: linear-gradient(180deg, #feaaa5 0%, #f5756e 50%);
        }

        .login_box{
            padding: 18px 3px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 3px 20px #00000085;
        }

        .login_form input{
            width: 80%;
            margin: 22px auto;
            border-color: #2d314121;
            box-shadow: 0px 1px 8px #00000026;
            height: 45px;
            border-radius: 5px;
            font-size: 14px;
            color: #2d3141ba;
        }

        .form_btn{
            width: 80%;
            background-color: #f5756e;
            font-weight: 600;
            border: none;
            padding: 12px 10px;
            font-size: 14px;
            border-radius: 5px;
            margin-top: 22px;
            box-shadow: inset 0px 0px 30px #00000061;
        }

        .icon_field{
            position: relative;
        }

        .icon_field img{
            position: absolute;
            top: 12px;
            right: 14%;
            width: 21px;
            opacity: .5;
        }
		
		.verify_btn{
            width: 25%;
            height: 45px;
            margin-right: 43px;
            font-size: 14px;
            position: absolute;
            right: 0px;
            top: 0px;
            color: white;
            background-color: #f5756e;
            color: #ffffff;
            padding: 3px 5px;
            border-radius: 6px;
            line-height: 20px;
		}

        .verify_btn:hover {
            color: white;
        }
		
		#inputs input{
			width: 20%;
            margin: 22px auto;
            border-color: #2d314121;
            box-shadow: 0px 1px 8px #00000026;
            height: 45px;
            border-radius: 5px;
            font-size: 20px;
            color: #2d3141ba;
			font-weight: 600;
			text-align: center;
			color: #f5756e;
		}

    </style>

    <section class="pt-5 pb-5 login_sec">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="login_box row">
                        <div class="col-md-7">
                        
                            <img src="{{ asset('assets/images/slider/slide-img/2-3-960x741.webp')}}" class="w-100" style="border-radius:15px; height: 100%;">
                        
                        </div>
                        
                        <div class="col-md-5 my-auto text-center py-4 py-sm-0">
                        
                            <img src="{{ asset('assets/images/logo/plantales-logo.svg')}}" class="w-50 mb-3">
                            
                            <p style="font-size: 14px;">{{ __('Register') }}</p>

                            <div class="form_box">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <form class="login_form" name="register_form" id="register_form" method="POST" action="{{ route('register') }}"> 
                                
                                    @csrf

                                    <div class="icon_field">
                                        <input id="name" type="text" class="form-control mb-3 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                        <img src="{{ asset('images/user.png')}}" class="">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="icon_field email_group">
                                        <input id="email" type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                        <img src="{{ asset('images/mail.png')}}" class="">
                                        <div id="email-div"></div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="icon_field email_group">
                                        <input id="email_verfication" type="text" class="form-control mb-3 @error('email_verfication') is-invalid @enderror" name="email_verfication" style="width: 50%; margin-right: 146px;" value="{{ old('email_verfication') }}" required autocomplete="email_verfication" placeholder="OTP">
                                        <!-- <img src="{{ asset('images/mail.png')}}" class=""> -->
                                        <button class="verify_btn">Verify <br>Email</button>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="icon_field">
                                        <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                        <img src="{{ asset('images/pass.png')}}" class="">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="icon_field">
                                        <input id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                        <img src="{{ asset('images/pass.png')}}" class="">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                 
                                    <button type="submit" class="btn btn-primary form_btn">{{ __('Register') }}</button>
                                
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<!--  Modal (Bootstrap Example) -->
    <div class="modal fade" id="success_email_popup" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">OTP Verfication</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background: transparent; width: 34px;">x</button>
                </div>
                <div class="modal-body py-4 text-center">
                    <p style="font-weight: 400;">Verification code sent to your email.</p>

                 </div>
            </div>
        </div>
    </div>
	

@endsection('pagehtml')

@section('pagescript')

    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

    <script>
        $(function() {

            $('#login-form').validate({

                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".icon_field").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".icon_field").removeClass("has-error")
                },
                
            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $('.form_btn').prop('disabled', true);
            $('#email_verfication').prop('disabled', true);

            $('.verify_btn').click(function (e) {

                e.preventDefault();
                const email = $('#email').val();

                $('#email-div span.error-message').remove();

                if (email === '') {
                    $('#email-div').append('<span class="error-message" style="color: red;">Please enter your email address before verifying.</span>');
                    return;
                }

                $.ajax({
                    url: 'get-email-code',
                    method: 'POST',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#success_email_popup').modal('show');
                            $('#email_verfication').prop('disabled', false);
                            $('#email_verfication').focus();
                        } else {
                            alert(response.message || 'Failed to send verification code. Please try again.');
                        }
                    },
                    error: function (xhr) {
                        alert('An error occurred while sending the email. Please try again later.');
                    }
                });
            });


            $(function () {
                $('#register_form').validate({
                    rules: {
                        name: { 
                            required: true 
                        },
                        email_verfication: { 
                            required: true 
                        },
                        password: { 
                            required: true,
                            minlength: 8 
                        },
                        password_confirmation: { 
                            required: true,
                            equalTo: "#password" 
                        },
                        email: {
                            required: true,
                            remote: {
                                url: "{{ route('validate_email_address') }}",
                                type: "post",
                                async: false,
                                data:{ 
                                    _token: '{{ csrf_token() }}',
                                },
                                dataFilter: function(data) {
                                    return (data == 0) ? true : false;
                                }
                            },
                        },
                    },
                    messages: {
                        name: { 
                            required: "Please enter blog title" 
                        },
                        email_verfication: { 
                            required: "Please enter blog URL" 
                        },
                        password: { 
                            required: "Please enter your password",
                            minlength: "Password must be at least 8 characters long"
                        },
                        password_confirmation: { 
                            required: "Please confirm your password",
                            equalTo: "Passwords do not match"
                        },
                        email: { 
                            required: "Please enter your email address",
                            email: "Please enter a valid email address",
                            remote: "This email is already registered"
                        },
                    },
                    submitHandler: function (form) {
                        $('#email').prop('disabled', false);
                        $('#register_form')[0].submit();
                    },
                });
            });

            $('#email_verfication').on('input', function () {
                const otp = $(this).val();
                const email = $('#email').val();

                if (otp.length === 6) {

                    $.ajax({
                        url: 'verify-otp',
                        method: 'POST',
                        data: {
                            otp: otp,
                            email:email,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                $('#email_verfication').prop('disabled', true);
                                $('.form_btn').prop('disabled', false);
                                $('.verify_btn').prop('disabled', true);
                                $('#email').prop('disabled', true);

                            } else {
                                alert(response.message || 'Invalid OTP. Please try again.');
                            }
                        },
                        error: function (xhr) {
                            alert('An error occurred during verification. Please try again later.');
                        }
                    });
                }
            });
        });
        
        // const inputs = document.getElementById("inputs");

        // inputs.addEventListener("input", function (e) {
        //     const target = e.target;
        //     const val = target.value;

        //     if (isNaN(val)) {
        //         target.value = "";
        //         return;
        //     }

        //     if (val != "") {
        //         const next = target.nextElementSibling;
        //         if (next) {
        //             next.focus();
        //         }
        //     }
        // });

        // inputs.addEventListener("keyup", function (e) {
        //     const target = e.target;
        //     const key = e.key.toLowerCase();

        //     if (key == "backspace" || key == "delete") {
        //         target.value = "";
        //         const prev = target.previousElementSibling;
        //         if (prev) {
        //             prev.focus();
        //         }
        //         return;
        //     }
        // });

    </script>

@stop