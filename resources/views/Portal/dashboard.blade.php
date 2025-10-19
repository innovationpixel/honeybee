@extends('layouts.admin22')


@section('pagecss')



@stop

@section('pagehtml')

	<style>

		td a{

			color: #ffffff !important;
			padding: 4px 10px;
			background-color: #db9d94;
			border-radius: 2px;
			font-size: 14px;
			font-weight: 500;
			cursor: pointer;
		}


		.bg-main{
			background-color: #db9d94 !important;
			border: none;
		}

		.main_color{
			color: #db9d94;
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
				color: #db9d94;
				border-bottom: 5px solid #db9d94;
				position: relative;
				max-height: 185px;
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
				border-left: 5px solid #db9d94;
			}

			.alert{
				max-height: 214px;
				overflow: auto;
			}


			.alert a{
				font-size: 24px;
				float: right;
				margin-top: -15px;
				color: #db9d94;
			}

			.unread_alert{
				background-color: antiquewhite;
			}

	</style>

	<main id="main" class="main">
		<div class="pagetitle">
			<h1>Dashboard</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><a href="{{ route('/') }}">Dashboard</a></li>
				</ol>
			</nav>
		</div>

		<section>
			<div class="container">
				<div class="row my-5">
					
					<div class="col-md-4 text-center">
						<a href="javascript::void();">
                            <div class="design_box1 py-5 mb-3">
								<h3 class="heading3 main_color" style="font-size: 70px;">{{ $pending ?? 0 }}</h3>
                                <h4 class="heading4">Pending Orders</h4>
                            </div>
                        </a>
					</div>
					
                    <div class="col-md-4 text-center">
                        <a href="javascript::void();">
                            <div class="design_box1 py-5 mb-3">
								<h3 class="heading3 main_color" style="font-size: 70px;">{{ $inprogress ?? 0 }}</h3>
								<h4 class="heading4">Orders In-Progress</h4>
                            </div>
                        </a>
					</div>
	                <div class="col-md-4 text-center">
						<a href="javascript::void();">
							<div class="design_box1 py-5 mb-3">
								<h3 class="heading3 main_color" style="font-size: 70px;">{{ $delivered ?? 0 }}</h3>
                                <h4 class="heading4">Orders Completed</h4>
                            </div>
                        </a>
					</div>
					
                    <div class="col-md-4 text-center">
						<a href="javascript::void();">
							<div class="design_box1 py-5 mb-3">
								<h3 class="heading3 main_color" style="font-size: 70px;">{{ $cancelled ?? 0 }}</h3>
                                <h4 class="heading4">Orders Cancelled</h4>
                            </div>
                        </a>
					</div>
					
                    <div class="col-md-4 text-center">
						<a href="javascript::void();">
							<div class="design_box1 py-5 mb-3">
								<h3 class="heading3 main_color" style="font-size: 70px;">{{ $orders ?? 0 }}</h3>
								<h4 class="heading4">Total Orders</h4>
                            </div>
                        </a>
					</div>
					
					<div class="col-md-4 text-center">
						<a href="javascript::void();">
							<div class="design_box1 py-5 mb-3">
								<h3 class="heading3 main_color" style="font-size: 70px;">{{ $products ?? 0 }}</h3>
								<h4 class="heading4">Total Products</h4>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
	</main>

@stop


@section('pagescript')


@endsection('pagescript')
