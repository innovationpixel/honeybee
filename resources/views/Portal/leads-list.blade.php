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
			<h1>Leads List</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
					<li class="breadcrumb-item active">Leads List</li>
				</ol>
			</nav>
		</div>
		<section class="section">
			<div class="row">
				<div class="col-md-12 mt-3">
					<table class="table datatable" id="datatable" >
						<thead class="thead-dark main_bg">
							<tr class="c_row">
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>

                            @if(!empty($leads))
	                            @foreach($leads as $key => $leads)

	                                <tr class="c_row" >
	                                    <th scope="row">{{ $key + 1 }}</th>
	                                    <td>{{ $leads->name ?? '' }}</td>
	                                    <td>{{ $leads->email ?? '' }}</td>
	                                    <td>{{ $leads->phone ?? '' }}</td>
	                                    <td style="text-align: center;">
	                                        <a href="{{ route('view-lead', Crypt::encryptString($leads->id) ) }}" style="color:#db9d94;" class="">View</a> | 
	                                        <a href="{{ route('delete-lead', $leads->id ) }}" style="color:#db9d94;" class="delete-sub-category">Delete</a>
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
