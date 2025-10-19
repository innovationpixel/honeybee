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
			<h1>View Lead Details</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">View Lead Details</li>
				</ol>
			</nav>
		</div>

		<section class="section">
			<div class="row">
			
				<div class="row c_box mb-4 mx-3 mt-3" style="width: 97%;">

						<div class="col-md-12 mb-2">

							<h3 class="heading2">Lead Details</h3>

							<div class="c_divider my-2"></div>

						</div>

						<div class="col-md-4 col-6 mb-2">
							<p class="label">Name</p>
							<p class="txt">{{ $lead->name ?? '' }}</p>
						</div>

						<div class="col-md-4 col-6 mb-2">
							<p class="label">Email</p>
							<p class="txt">{{ $lead->email ?? '' }}</p>
						</div>

						<div class="col-md-4 col-6 mb-2 mb-sm-0">
							<p class="label">Phone</p>
							<p class="txt">{{ $lead->phone ?? '' }}</p>
						</div>

                        <div class="col-md-3 col-3 mb-2 mb-sm-0">
                            <p class="label">Bundle Size</p>
                            @if ( isset( $lead->bundle_size ) && !empty( $lead->bundle_size ) )
                                <p class="txt">{{ $lead->bundle_size ?? '' }}</p>
                            @elseif ( isset( $lead->other_bundle ) && !empty( $lead->other_bundle ) )
                                <p class="txt">{{ $lead->other_bundle ?? '' }}</p>
                            @else
                                <p class="txt"></p>
                            @endif
                        </div>

						<div class="col-md-8 col-8 mb-2">
							<p class="label">Address</p>
							<p class="txt">{{ $lead->message }}</p>
						</div>

				</div>
				

			</div>

		</section>

	</main><!-- End #main -->



@endsection('pagehtml')

@section('pagescript')


@stop
