@extends('layouts.admin22')

@section('pagehtml')

	<style>
		* {
			font-family: poppins;
		}


		.custom_form {
			margin-top: 20px;
		}


		.custom_form label {
			color: #db9d94;
			margin-bottom: 10px;
			font-weight: 400;
			font-size: 18px;
		}

		.custom_form input {
			font-size: 16px;
			padding: 10px 18px;
			box-shadow: 0px 0px 5px #00000026;
			font-weight: 400;
			margin-bottom: 35px;
			width: 90%;
		}

		.custom_form::placeholder {
			color: #2d31418c;
		}

		input[type=file]::file-selector-button {
			background-color: #2D3141;
			color: #ffffff;
			border-radius: 5px;
		}

		.txt_link {
			color: #000000;
			font-size: 14px;
			text-decoration: underline;
			text-align: right;
			margin-right: 15px;
			cursor: pointer;
		}

		.d_btn {
			width: 100px;
			justify-content: right;
			text-align: center;
			float: right;
			margin-right: 7%;
			margin-top: 0;
		}

		.disabled {
			pointer-events: none;
		}

		.form-group:nth-child(3){
			top: -24px;
			position: relative;
			color: red;
		}

		.on-off-button{
		    margin-left: 10px !important;
		    font-size: 16px !important;
		    color: black !important;
		    font-weight: 300 !important;
		    margin-top: 2px !important;
		}

	    .form-check-input:checked {
	        background-color: #db9d94;
	        border-color: #db9d94;
	        box-shadow: 0 0 10px rgba(174, 0, 49, 0.5);
	    }

	    .form-check-input {
	        transition: background-color 0.3s, box-shadow 0.3s;
	    }

	</style>

	<main id="main" class="main">

		<div class="pagetitle">
			<h1>Add Product Category</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">Add Product Category</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->

		<section class="section">
			<div class="row">

				<div class="col-md-12">

					<form class="custom_form" method="POST" action="{{ route('save-sub-category') }}" id="add-category" name="add-category" enctype="multipart/form-data">

                        @csrf

						<div class="row">

							<div class="col-sm-6">

								<div class="form-group">
									<label for="formGroupExampleInput">Parent Category</label>
									<select class="form-control" name="category_id" id="category_id" required>
										@if (isset($categories) && !empty($categories))
											@foreach ($categories as $category)
												<option value="{{ $category->id }}">
													{{ $category->name }}
												</option>
											@endforeach
										@endif
									</select>
								</div>

							</div>
							
							<div class="col-sm-6">

								<div class="form-group">
									<label for="formGroupExampleInput">Name</label>
									<input type="text" name="name" class="form-control" id="" placeholder="Sub Category" required>
								</div>

							</div>

							<div class="col-sm-12 mt-3">

								<button type="submit" class="form_btn mt-0 text-center" style="width: 180px;">Add Category</button>

							</div>

						</div>


					</form>

				</div>

			</div>

		</section>


	</main><!-- End #main -->



@endsection('pagehtml')

@section('pagescript')

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/additional-methods.min.js"></script>

@stop
