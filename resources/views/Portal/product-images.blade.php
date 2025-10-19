@extends('layouts.admin22')


@section('pagecss')



@stop

@section('pagehtml')

	<style>

		td a{

			color: #ffffff !important;
			padding: 4px 10px;
			background-color: #ae0031;
			border-radius: 2px;
			font-size: 14px;
			font-weight: 500;
			cursor: pointer;
		}


		.bg-main{
			background-color: #ae0031 !important;
			border: none;
		}

		.main_color{
			color: #ae0031;
		}


		*{
			font-family: poppins;
		}

		.modal-body P{
			color: #000000;
		}


		.design_box1{
			border-bottom: 5px solid #af0031;
			box-shadow: 0px 0px 20px #0000001f;
			padding-left: 40px;
			padding-right: 40px;
		}

		.project_card{
				padding: 15px 15px;
				box-shadow: 0px 0px 15px #00000029;
				border-radius: 5px;
				position: relative;
			}

			.up_tag{
				background-color: #af0031;
				position: absolute;
				top: 5px;
				right: 5px;
				border-radius: 50%;
				padding: 27px 10px;
				font-weight: 500;
				color: #ffffff;
			}

			.new_badge{
				background-color: #af0031;
				color: #ffffff;
				padding: 10px 11px;
				text-align: center;
				position: absolute;
				border-radius: 50%;
				line-height: 1.2;
				font-weight: 600;
				right: 34px;
				top: 18px;
			}

			.design_box1{
				background-color: #ffffff;
				border-radius: 5px;
				color: #ae0031;
				border-bottom: 5px solid #ae0031;
				position: relative;
				max-height: 220px;
				height: 100%;
				display: flex;
				flex-direction: column;
				justify-content: center;
			}

			.alert span{
				margin-left: 22px;
				color: #878485;
				font-size: 14px;
			}


			.list-group-item{
				border: 1px solid #ededed;
				border-left: 5px solid #ae0031;
			}

			.alert{
				max-height: 214px;
				overflow: auto;
			}


			.alert a{
				font-size: 24px;
				float: right;
				margin-top: -15px;
				color: #ae0031;
			}

			.unread_alert{
				background-color: antiquewhite;
			}
			
			.form-check-input:checked{
				background-color: #f5756e;
				border-color: #f5756e;
			}
			
			.form-check-input[type=checkbox]{
				border-color: #a6a6a6;
			}

	</style>

	<main id="main" class="main">

		<div class="pagetitle">
			<h1>Product Images</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
					<li class="breadcrumb-item active">Product Images</li>
				</ol>
			</nav>

		</div>

		<section>
			<div class="container">
				<div class="row my-5">

					<div class="col-sm-6">
						<h2><b>Product:</b> {{ $product->name }}</h2>
					</div>

	                <div class="col-md-12 mb-3 mt-2">

						<form method="POST" action="{{ route('save-product-images') }}">

							<div class="row c_box mb-4">
								
								@csrf

								<input type="hidden" name="product_id" value="{{ $id }}">
												
								<div class="col-md-12 mb-2">

									<h3 class="heading2">Product Images</h3>

									<div class="c_divider my-2"></div>

								</div>

								@if( $product->documents->isNotEmpty() ) 
								    
								    @foreach( $product->documents as $key => $image )
								    
								        <div class="col-md-3 col-6 mb-3 mb-sm-0">
								            <p class="txt">
								                <img src="{{ asset('storage/products/' .$image->encoded_name) }}" style="width: 200px; height: 140px;">
								                
								                <div class="form-check">
								                    <input 
								                        class="form-check-input title_image" 
								                        type="checkbox" 
								                        value="{{ $image->id }}" 
								                        name="title_image" 
								                        id="title_image_{{ $key }}" 
								                        data-type="title" {{ $image->title == 1 ? 'checked' : '' }}>
								                    <label class="form-check-label" for="title_image_{{ $key }}">Title Image</label>
								                </div>

								                <!-- <div class="form-check">
								                    <input 
								                        class="form-check-input secondary_image" 
								                        type="checkbox" 
								                        value="{{ $image->id }}" 
								                        name="secondary_image" 
								                        id="secondary_image_{{ $key }}" 
								                        data-type="secondary" {{ $image->second_title == 1 ? 'checked' : '' }}>
								                    <label class="form-check-label" for="secondary_image_{{ $key }}">Secondary Image</label>
								                </div> -->
								            </p>
								        </div>

								    @endforeach

								@endif
							
							</div>

							<button type="submit" class="btn btn-primary">Save</button>

						</form>

					</div>
				</div>
			</div>
		</section> 
	</main>

	<script>
	    document.addEventListener('DOMContentLoaded', function () {

	        document.querySelectorAll('.title_image').forEach((checkbox) => {
	            checkbox.addEventListener('change', function () {
	                if (this.checked) {
	        
	                    document.querySelectorAll('.title_image').forEach(cb => {
	                        if (cb !== this) cb.checked = false;
	                    });
	                }
	            });
	        });

	        document.querySelectorAll('.secondary_image').forEach((checkbox) => {
	            checkbox.addEventListener('change', function () {
	                if (this.checked) {

	                    document.querySelectorAll('.secondary_image').forEach(cb => {
	                        if (cb !== this) cb.checked = false;
	                    });
	                }
	            });
	        });
	    });
	</script>

@stop


@section('pagescript')


@endsection('pagescript')
