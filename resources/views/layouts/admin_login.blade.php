<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex,nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('asset_login/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset_login/style.css')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/plantales-fav.png') }}" />
        <title>Login Page | HoneyBee </title>
        <style>

            .owl-dots{
                display: none;

            }

            .banner_slide img{
                height: 650px;
            }

			.bottom_foter{
				position: absolute;
				width: 100%;
				bottom: 0;
			}

            .error {
                color: red;
            }

        </style>

        @yield('pagecss')

    </head>
    <body>

        @yield('pagehtml')

        <script src="{{ asset('asset_login/jquery.min.js')}}"></script>
        <script src="{{ asset('asset_login/popper.min.js')}}"></script>
        <script src="{{ asset('asset_login/bootstrap.min.js')}}"></script>
        <script src="{{ asset('asset_login/jquery.sticky.js')}}"></script>
        <script src="{{ asset('asset_login/main.js')}}"></script>
        @yield('pagescript')

    </body>

</html>

