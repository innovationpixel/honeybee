@extends('layouts.admin22')



@section('pagehtml')


	<style>
		* {
			font-family: poppins;
		}

		.main_bg th {
			background-color: #db9d94;
			padding: 15px;
			font-weight: 500;
			color: #ffffff;
		}

		.c_row {
			border-left: 5px solid #db9d94;
			border-top: 10px solid #eff3fa;
			border-bottom: 10px solid #eff3fa;
		}
	</style>


	<main id="main" class="main">

		<div class="pagetitle">
			<h1>View Order Details</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">View Order Details</li>
				</ol>
			</nav>
		</div>

		<section class="section">
			<div class="row">

				<div class="col-md-12 mt-3">
				
					<h3 class="heading2">Order Details</h3>

					<div class="c_divider my-2"></div>

                        <table class="table">
                            <thead class="thead-dark main_bg">
                                <tr class="c_row">
                                    <th scope="col">S. No</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($order->orderProducts))
                                    @foreach($order->orderProducts as $key => $item)
                                        <tr class="c_row">
                                            <th style="padding-top: 20px;" scope="row">{{ $key + 1 }}</th>
                                            <td style="padding: 5px !important;">
												@if( isset($item->product->documentTitle) && !empty($item->product->documentTitle) )
													<a href="{{ asset('storage/products/'.$item->product->documentTitle->encoded_name ) }}" target="_blank">
														<img src="{{ asset('storage/products/'.$item->product->documentTitle->encoded_name ) }}" style="width: 70px; height: 50px;" >
													</a>
												@endif
                                            </td>
                                            <td style="padding-top: 20px;">{{ $item->product->name ?? '' }}</td>
                                            <td style="padding-top: 20px;">{{ $item->quantity ?? 0 }}</td>
                                            <td style="padding-top: 20px;">{{ $item->product->price ?? 0 }}</td>
                                            <td style="padding-top: 20px;">{{ ( $item->quantity ?? 0 ) * ( $item->product->price ?? 0 ) }}</td>
                                        </tr>
                                    @endforeach
                                @endif

								<tr class="c_row">
									<td colspan="4" scope="row"></td>
									<th style="padding-top: 20px;">Grand Total</th>
									<th style="padding-top: 20px;">$ {{ $order->sub_total ?? 0 }}</th>
								</tr>

						</tbody>
					</table>

				</div>
				
				
				<div class="row c_box mb-4 mx-3 mt-3" style="width: 97%;">

						<div class="col-md-12 mb-2">

							<h3 class="heading2">Order Details</h3>

							<div class="c_divider my-2"></div>

						</div>

						<div class="col-md-4 col-6 mb-2">
							<p class="label">Name</p>
							<p class="txt">{{ $order->customer->first_name ?? '' .' '.$order->customer->last_name ?? '' }}</p>
						</div>

						<div class="col-md-4 col-6 mb-2">
							<p class="label">Email</p>
							<p class="txt">{{ $order->customer->email ?? '' }}</p>
						</div>

						<div class="col-md-4 col-6 mb-2 mb-sm-0">
							<p class="label">Phone</p>
							<p class="txt">{{ $order->customer->phone ?? '' }}</p>
						</div>

						<div class="col-md-12 col-12 mb-2">
							<p class="label">Address</p>
							<p class="txt">{{ $order->apartment ?? '' }} {{ $order->address ?? '' }}</p>
						</div>

						<div class="col-md-3 col-6 mb-2 mb-sm-0">
							<p class="label">Town</p>
							<p class="txt">{{ $order->town ?? '' }}</p>
						</div>

						<div class="col-md-3 col-6 mb-2 mb-sm-0">
							<p class="label">City</p>
							<p class="txt">{{ $order->city ?? '' }}</p>
						</div>

						<div class="col-md-3 col-6 mb-2 mb-sm-0">
							<p class="label">Country</p>
							<p class="txt">{{ $order->country ?? '' }}</p>
						</div>

						<div class="col-md-3 col-6 mb-2 mb-sm-0">
							<p class="label">Status</p>
							<p class="txt">{{ $order->status ?? '' }}</p>
						</div>
												
						<div class="col-md-12 col-12 mb-2 mb-sm-0">
							<p class="label">Order Notes</p>
							<p class="txt">{{ $order->order_note ?? '' }}</p>
						</div>

				</div>
				

			</div>

		</section>

	</main><!-- End #main -->



@endsection('pagehtml')

@section('pagescript')


@stop
