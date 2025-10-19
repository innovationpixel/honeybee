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
			<h1>Customers List</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">Customers List</li>
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
								<th scope="col">Name</th>
								<th scope="col">Phone</th>
								<th scope="col">Email</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
                            @if(!empty($customers))
	                            @foreach($customers as $key=>$customer)
									<tr class="c_row">
										<th scope="row">{{ $key+1 }}</th>
										{{-- <td style="padding: 5px !important;"><img src="{{ asset('storage/blog/'.$blog->encoded_file_name)}}" style="width: 70px;" ></td> --}}
										<td>{{ $customer->first_name .' '. $customer->last_name }}</td>
										<td>{{ $customer->phone }}</td>
										<td>{{ $customer->email }}</td>

										<td>
											<a href="{{ route('view-customer', Crypt::encryptString($customer->id)) }}" style="color:#db9d94;">View</a>
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



@endsection('pagehtml')

@section('pagescript')


@stop
