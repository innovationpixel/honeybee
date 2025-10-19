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
			<h1>Categories List</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">Categories List</li>
				</ol>
			</nav>

			<a href="{{ route('add-category')}}" class="btn btn-primary form_btn add_btn">Add Category</a>

		</div><!-- End Page Title -->

		<section class="section">
			<div class="row">

				<div class="col-md-12 mt-3">


					<table class="table datatable">
						<thead class="thead-dark main_bg">
							<tr class="c_row">
								<th scope="col">S. No</th>
								<th scope="col">Category</th>
								<th scope="col">Icon</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>

							@if( isset($categories) && !empty($categories) )

                                @foreach($categories as $key => $category)

									<tr class="c_row">
										<th scope="row">{{ $key + 1 }}</th>
										<td>{{ $category->name }}</td>
										<td>{{ $category->icon ?? '' }}</td>
										<td>
											<a href="{{ route('edit-category', Crypt::encryptString($category->id) ) }}" style="color:#db9d94;">Edit</a> |
											<a href="{{ route('delete-category', Crypt::encryptString($category->id) ) }}" style="color:#db9d94;">Delete</a>
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
