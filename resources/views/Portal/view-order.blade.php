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
			<h1>View Order</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
					<li class="breadcrumb-item active">View Order</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->

    @if(!empty($order))

		<section class="section">
			<div class="row">

				<div class="col-md-12">

					<form class="custom_form"  action="#" id="add-blog" name="view-blog" enctype="multipart/form-data">
                        @csrf
						<div class="row">

							<div class="col-sm-12 mt-3 mb-3">

								<h3 class="heading2">Customer Detail</h3>

								<div class="c_divider my-1"></div>

							</div>
                            @if(!empty($order->first_name))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Customer Name</label>
                                        <input type="text" name="name" class="form-control" id="" value="{{ $order->first_name .' '. $order->last_name }}" placeholder="customeer name" disabled>
                                    </div>

                                </div>
                            @endif
                            @if(!empty($order->email))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Email</label>
                                        <input type="text" name="email" class="form-control" id="" value="{{ $order->email }}" placeholder="Email" disabled>
                                    </div>

                                </div>
                            @endif
                            @if(!empty($order->phone))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="" value="{{ $order->phone }}" placeholder="Phone" disabled>
                                    </div>

                                </div>
                            @endif
                            @if(!empty($order->customer_address))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Address</label>
                                        <input type="text" name="address" class="form-control" id="" value="{{ $order->customer_address }}" placeholder="Address" disabled>
                                    </div>

                                </div>
                            @endif




							<div class="col-sm-12 mt-3 mb-3">

								<h3 class="heading2">Order Detail</h3>

								<div class="c_divider my-1"></div>

							</div>


                            @if(!empty($order->rental_time))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Rental Time</label>
                                        <input type="text" name="name" class="form-control" id="" value="{{ $order->rental_time }}" placeholder="customeer name" disabled>
                                    </div>

                                </div>
                            @endif
                            @if(!empty($order->delivery_date))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Delivery Date</label>
                                        <input type="text" name="email" class="form-control" id="" value="{{ $order->delivery_date }}" placeholder="Delivery Date" disabled>
                                    </div>

                                </div>
                            @endif
                            @if(!empty($order->delivery_time))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Delivery Time</label>
                                        <input type="text" name="phone" class="form-control" id="" value="{{ $order->delivery_time }}" placeholder="Delivery Time" disabled>
                                    </div>

                                </div>
                            @endif
                            @if(!empty($order->order_address))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Address</label>
                                        <input type="text" name="address" class="form-control" id="" value="{{ $order->order_address }}" placeholder="Address" disabled>
                                    </div>

                                </div>
                            @endif
                            @if(!empty($order->shipping))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Shipping</label>
                                        <input type="text" name="address" class="form-control" id="" value="{{ $order->shipping }}" placeholder="Shipping" disabled>
                                    </div>

                                </div>
                            @endif
                            @if(!empty($order->order_detail))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Order dtail</label>
                                        <input type="text" name="address" class="form-control" id="" value="{{ $order->order_detail }}" placeholder="Order Detail" disabled>
                                    </div>

                                </div>
                            @endif
                            @if(!empty($order->emirate))

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Emirate</label>
                                        <input type="text" name="address" class="form-control" id="" value="{{ $order->emirate }}" placeholder="Emirate" disabled>
                                    </div>

                                </div>
                            @endif
                            @if(!empty($order->sub_total))
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Sub Total</label>
                                        <input type="text" name="address" class="form-control" id="" value="{{ $order->sub_total }}" placeholder="sub total" disabled>
                                    </div>

                                </div>
                            @endif

						</div>


					</form>

				</div>

			</div>

		</section>
    @endif




@endsection('pagehtml')

@section('pagescript')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/additional-methods.min.js"></script>

<script type="text/javascript">



</script>



@stop
