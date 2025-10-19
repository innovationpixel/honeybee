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
    </style>

    <section class="pt-5 pb-5 login_sec" style="padding-top: 100px;">
		<div class="container my-5">
			<div class="row">
				<div class="col-md-10 mx-auto">
					<div class="login_box row">
						<div class="col-md-7">
							<img src="{{ asset('assets/images/slider/slide-img/pink-himalayan-salt.png') }}" class="w-100" style="border-radius:15px; height:100%;">
						</div>
						<div class="col-md-5 my-auto text-center py-4 py-sm-0">
							<img src="https://dropbelaravel.bracketweb.com/assets/images/logo-dark.png" class="w-50 mb-3">
							<p style="font-size: 14px;">Login into your account</p>
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
                                
                                <form class="login_form"  method="POST" id="login-form" action="{{ route('login') }}" name="login-form" enctype="multipart/form-data">
                                
                                    @csrf

                                    <div class="icon_field">
                                        <input type="email" class="form-control mb-3" name="email" value="{{ old('email') }}" placeholder="email address">
                                        <img src="{{ asset('Images/mail.png')}}" class="">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="icon_field">
                                        <input type="password" name="password" class="form-control mb-2" id="#" placeholder="enter password">
                                        <img src="{{ asset('Images/pass.png')}}" class="">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary form_btn">Login</button>
                                
                                </form>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

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
	
@endsection('pagehtml')

@section('pagescript')


@stop