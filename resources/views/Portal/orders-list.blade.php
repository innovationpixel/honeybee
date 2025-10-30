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
			<h1>Orders List</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
					<li class="breadcrumb-item active">Orders List</li>
				</ol>
			</nav>

			{{-- <a href="{{ route('add-blog')}}" class="btn btn-primary form_btn add_btn">Add Blog</a> --}}

		</div><!-- End Page Title -->

		<section class="section">
			<div class="row">

				<div class="col-md-12 mt-3">


					<table class="table datatable">
						<thead class="thead-dark main_bg">
							<tr class="c_row">
								<th scope="col">S. No</th>
								<th scope="col">Customer Name</th>
								<th scope="col">City</th>
                                <th scope="col">Address</th>
								<th scope="col">Order Total</th>
								<th scope="col">Ordered On</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
                            
                            @if(!empty($orders))
	                        
	                            @foreach($orders as $key => $order)
	                        
	                                <tr class="c_row">
	                                    <th scope="row">{{ $key + 1 }}</th>
	                                    {{-- <td style="padding: 5px !important;"><img src="{{ asset('storage/blog/'.$blog->encoded_file_name)}}" style="width: 70px;" ></td> --}}
	                                    <td>{{ $order->customer->first_name ?? '' }} {{ $order->customer->last_name ?? '' }}</td>
	                                    <td>{{ $order->city }}</td>
	                                    <td>{{ $order->address }}</td>
	                                    <td>${{ $order->sub_total ?? '0' }}.00</td>
	                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('jS M y h:iA') }}</td>
	                                    <td>
	                                    	<input type="hidden" name="order_id" class="order_id" value="{{ $order->id }}">
											<select class="form-control changes_order_status" name="changes_order_status" id="changes_order_status">
											    @if (isset($orderStatuses) && !empty($orderStatuses))
											        @foreach ($orderStatuses as $orderStatus)
											            <option value="{{ $orderStatus->status }}" {{ $orderStatus->status == $order->status ? 'selected' : '' }}>
											                {{ $orderStatus->status }}
											            </option>
											        @endforeach
											    @endif
											</select>
						                </td>

	                                    <td style="text-align: center;">
	                                        <a href="{{ route('view-order-detail', Crypt::encryptString($order->id)) }}" style="color:#db9d94;">View</a>
	                                    </td>
	                                </tr>

	                            @endforeach
	                        
	                        @endif

						</tbody>
					</table>

				</div>

			</div>

		</section>

	</main><!-- End #main -->

    <div class="modal fade" id="changeStatus" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Change Order Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">

                    <p>You can change the order status</p>

                    <select class="form-control" name="changes_order_status">

                        @if( isset($orderStatuses) && !empty($orderStatuses) )

                            @foreach( $orderStatuses as $orderStatus )
                         
                                <option value="{{ $orderStatus->status }}">{{ $orderStatus->status }}</option>

                            @endforeach

                        @endif

                    </select>

                </div>
            </div>
        </div>
    </div>

    <script>
	    document.addEventListener('DOMContentLoaded', function () {

	        document.querySelectorAll('[data-bs-toggle="modal"][data-status]').forEach(link => {
	            link.addEventListener('click', function () {
	                const status = this.getAttribute('data-status'); 
	                const dropdown = document.querySelector('#changeStatus select[name="changes_order_status"]');

	                if (dropdown) {
	                    Array.from(dropdown.options).forEach(option => {
	                        option.selected = (option.value == status);
	                    });
	                }
	            });
	        });
	    });
	</script>

@endsection('pagehtml')

@section('pagescript')

	<script>
	    $(document).ready(function () {

	        $('.changes_order_status').on('change', function () {

	            const selectedStatus = $(this).val();
	            const orderId = $(this).closest('tr').find('.order_id').val();

	            $.ajax({
	                url: '{{ route("change_order_status") }}',
	                method: 'POST',
	                data: {
	                    _token: '{{ csrf_token() }}', 
	                    order_id: orderId,
	                    status: selectedStatus
	                },
					beforeSend: function () {
                        $("#loader").show();
                        $("#blur-bg").show();
                    },
	                success: function (response) {
	                    // window.location.reload();
						Swal.fire({
							icon: 'success',
							title: 'Success!',
							text: 'Status Updated Successfully!',
							timer: 3000,
							showConfirmButton: false
						});
						setTimeout(() => location.reload(), 1500);
	                },
					complete: function () {
                        $("#loader").hide();
                        $("#blur-bg").hide();
                    },
	                error: function (xhr, status, error) {
	                    alert(xhr.responseJSON.message || 'An error occurred while updating the status.');
	                }
	            });
	        });

	    });
	</script>
@stop
