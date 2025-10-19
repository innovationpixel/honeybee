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
			<h1>Products List</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">Products List</li>
				</ol>
			</nav>

			<a href="{{ route('add-product')}}" class="btn btn-primary form_btn add_btn">Add Product</a>

		</div>

		<section class="section">
			<div class="row">

				<div class="col-md-12 mt-3">


					<table class="table datatable">
						<thead class="thead-dark main_bg">
							<tr class="c_row">
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">Category</th>
								<th scope="col">Sub Category</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>

							@if( isset($products) && !empty($products) )

                                @foreach($products as $key => $product)

									<tr class="c_row">
										<th scope="row">{{ $key + 1 }}</th>
										<td style="padding: 5px !important;">
											@if( !empty($product->documentTitle->encoded_name) )
												<a href="{{ asset('storage/products/'.$product->documentTitle->encoded_name) }}" target="_blank">
													<img src="{{ asset('storage/products/' .$product->documentTitle->encoded_name) }}" style="width: 70px; height: 50px;">
												</a>
											@endif
										</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->category->name ?? '' }}</td>
										<td>{{ $product->sub_category->name ?? '' }}</td>
										<td>
											<div class="dropdown">
                                      			<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        			Action
                                      			</button>
                                      			<ul class="dropdown-menu">
                                                    <li>
                                                    	<a class="dropdown-item" href="{{ route('edit-product', Crypt::encryptString($product->id) ) }}">View</a>
                                                    </li>
                                        			<li>
                                        				<a class="dropdown-item" href="{{ route('deleteProduct', Crypt::encryptString($product->id)) }}">Delete</a>
                                        			</li>
                                        			<li>
                                        				<a class="dropdown-item" href="{{ route('product-images', Crypt::encryptString($product->id) ) }}">Images</a>
                                        			</li>
                                        			
                                        			@if( $product->hide == 0 )
	                                        			<li>
	                                        				<a class="dropdown-item" href="{{ route('product-hide', Crypt::encryptString($product->id) ) }}">Hide</a>
	                                        			</li>
                                        			@endif

                                        			@if( $product->hide == 1 )
	                                        			<li>
	                                        				<a class="dropdown-item" href="{{ route('product-unhide', Crypt::encryptString($product->id) ) }}">Unhide</a>
	                                        			</li>
                                        			@endif
                                      			</ul>
                                    		</div>
										</td>
									</tr>

								@endforeach

							@endif

						</tbody>
					</table>

				</div>

			</div>

		</section>

	</main>

@endsection('pagehtml')

@section('pagescript')

@stop
