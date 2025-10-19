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
					<li class="breadcrumb-item"><a>Home</a></li>
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
								<th scope="col">Parent Category</th>
								<th scope="col">Tags</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>

                            @if(!empty($tags))

	                            @foreach($tags as $key => $tag)

	                                <tr class="c_row" >
	                                    <th scope="row">{{ $key + 1 }}</th>
	                                    <td>{{ $tag->category_name }}</td>
	                                    <td>{{ $tag->tag }}</td>
	                                    <td style="text-align: center;">
	                                        <a href="" style="color:#db9d94;" data-id="{{ $tag->id }}" class="delete-tag">Delete</a>
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

					<i class="bx bxs-message-check" style="font-size: 55px;color: #db9d94;"></i>

					<!-- <i class="bx bxs-message-x" style="font-size: 55px;color: red;"></i> -->

					<h3 class="my-4">Success</h3>

					<p class="my-4" id="message">Tag Category Deleted Successfully</p>

					<a href="{{ route('tags-list') }}" class="form_btn btn btn-primary my-4">Done</a>

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
                           id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {

                            const successModal = new bootstrap.Modal(document.getElementById('success_modal_add_tag'));
                            if (response.status === 'success') {
                                document.getElementById('message').innerHTML = "Tag Category Deleted Successfully";
                            } else {
                                document.getElementById('message').innerHTML = response.message || "Failed to delete tag category.";
                            }
                            // Show the modal
                            successModal.show();
                        },
                        error: function (error) {
                            console.error('Error:', error);
                            document.getElementById('message').innerHTML = "Sorry We Can't Delete This Tag  Right Now";
                            const successModal = new bootstrap.Modal(document.getElementById('success_modal_add_tag'));
                            successModal.show();
                        }
                    });
                }
            });
        });


        document.getElementById('success_modal_add_tag').addEventListener('hidden.bs.modal', function () {
            window.location.href = "{{ route('tags-list') }}";
        });
    });
</script>

@stop
