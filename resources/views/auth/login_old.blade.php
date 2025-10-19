@extends('layouts.admin_login')	

@section('pagehtml')


<style>

.bottom_foter{
	position: absolute;
    width: 100%;
    bottom: 0;
}

</style>

	<section class="contactForm ctcformnew" style="display: flex;">
		<div class="container">
			
			<div class="row my-5">
			
				<div class="col-md-7 mx-auto">
				
					<h2 class="heading2 mb-4">Login</h2>
			
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

						<form method="POST" id="login-form" action="{{ route('login') }}" name="login-form" enctype="multipart/form-data">

                            @csrf

							
							<div class="form-group">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							
							<div class="form-group">

								<input type="password" name="password" class="form-control" id="#" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

							</div>
					
							<button type="submit" class="btn main_btn btn-primary w-100 pop_form_btn">Login</button>

						</form>

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
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>


@stop


