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
			<h1>Tag Categories List</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
					<li class="breadcrumb-item active">Tag Categories List</li>
				</ol>
			</nav>

			{{-- <a href="{{ route('add-blog')}}" class="btn btn-primary form_btn add_btn">Add Blog</a> --}}

		</div><!-- End Page Title -->

		<section class="section">
			<div class="row">

				<div class="col-md-12 mt-3">


					<table class="table datatable" id="datatable" >
						<thead class="thead-dark main_bg">
							<tr class="c_row">
								<th scope="col">S. No</th>
								<th scope="col">Category</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>

                            @if(!empty($categories))

	                            @foreach($categories as $key => $category)

	                                <tr class="c_row" >
	                                    <th scope="row">{{ $key + 1 }}</th>
	                                    <td>{{ $category->name }}</td>
	                                    <td style="text-align: center;">
	                                        <a href="" style="color:#db9d94;" data-id="{{ $category->id }}" class="delete-tag">Delete</a>
	                                        {{-- <a href="javascript:void(0)" data-bs-toggle="modal" data-status="{{ $order->status }}" data-bs-target="#changeStatus" style="color:#db9d94;">Change Status</a> --}}
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


	<!-- Modal -->
	<div class="modal fade text-center" id="success_modal_add_tag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<i class="bx bxs-message-check" style="font-size: 55px;color: #db9d94;" id="success_icon"></i>

					<!-- <i class="bx bxs-message-x" style="font-size: 55px;color: red;"></i> -->

					<h3 class="my-4" id="status">Success</h3>

					<p class="my-4" id="message">Tag Category Deleted Successfully</p>

					<a href="{{ route('product-categories-list') }}" class="form_btn btn btn-primary my-4">Done</a>

				</div>
			</div>
		</div>
	</div>



@endsection('pagehtml')

@section('pagescript')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listeners to delete buttons
        document.querySelectorAll('.delete-tag').forEach(data => {
            data.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default anchor behavior
                let id = this.getAttribute('data-id');
                if (id != null) {

                    $.ajax({
                        url: "{{ route('delete-tag-category') }}",
                        type: "POST",
                        data: {
                            category_id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {

                            const successModal = new bootstrap.Modal(document.getElementById('success_modal_add_tag'));
                            if (response.status === 'success') {
                                document.getElementById('message').innerHTML = "Product Category Deleted Successfully";
                            } else {
                                document.getElementById('message').innerHTML = response.message || "Failed to delete tag category.";
                                document.getElementById('status').innerHTML = response.status || "Failed";
                                var icon = document.getElementById('success_icon');
                                icon.classList.remove('bxs-message-check');
                                icon.classList.add('bxs-message-x');
                                icon.style.color = 'red';
                            }
                            // Show the modal
                            successModal.show();
                        },
                        error: function (error) {
                            console.error('Error:', error);
                            document.getElementById('message').innerHTML = "Sorry We Can't Delete This Category Right Now";
                            const successModal = new bootstrap.Modal(document.getElementById('success_modal_add_tag'));
                            successModal.show();
                        }
                    });
                }
            });
        });


        document.getElementById('success_modal_add_tag').addEventListener('hidden.bs.modal', function () {
            window.location.href = "{{ route('product-categories-list') }}";
        });
    });
</script>
@stop
