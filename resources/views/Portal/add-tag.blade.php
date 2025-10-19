@extends('layouts.admin22')

@section('pagehtml')

	<style>
		* {
			font-family: poppins;
		}


		.custom_form {
			margin-top: 20px;
		}


		.custom_form label {
			color: #db9d94;
			margin-bottom: 10px;
			font-weight: 400;
			font-size: 18px;
		}

		.custom_form input {
			font-size: 16px;
			padding: 10px 18px;
			box-shadow: 0px 0px 5px #00000026;
			font-weight: 400;
			margin-bottom: 35px;
			width: 90%;
		}

		.custom_form::placeholder {
			color: #2d31418c;
		}

		input[type=file]::file-selector-button {
			background-color: #2D3141;
			color: #ffffff;
			border-radius: 5px;
		}

		.txt_link {
			color: #000000;
			font-size: 14px;
			text-decoration: underline;
			text-align: right;
			margin-right: 15px;
			cursor: pointer;
		}

		.d_btn {
			width: 100px;
			justify-content: right;
			text-align: center;
			float: right;
			margin-right: 7%;
			margin-top: 0;
		}

		.disabled {
			pointer-events: none;
		}

		.form-group:nth-child(3){
			top: -24px;
			position: relative;
			color: red;
		}

		.on-off-button{
		    margin-left: 10px !important;
		    font-size: 16px !important;
		    color: black !important;
		    font-weight: 300 !important;
		    margin-top: 2px !important;
		}

	    .form-check-input:checked {
	        background-color: #db9d94;
	        border-color: #db9d94;
	        box-shadow: 0 0 10px rgba(174, 0, 49, 0.5);
	    }

	    .form-check-input {
	        transition: background-color 0.3s, box-shadow 0.3s;
	    }

	</style>

	<main id="main" class="main">

		<div class="pagetitle">
			<h1>Add Tag Category</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">Add Tag Category</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->



		<section class="section">
			<div class="row">

				<div class="col-md-12">

					<form class="custom_form" method="POST" action="{{ route('save-tag') }}" id="add-category" name="add-category" enctype="multipart/form-data">

                        @csrf

						<div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="category">Parent Category</label>
                                    <select name="tags[0][category]" class="form-control">
                                        <option value="">Select Parent Category</option>
                                        @if($categories)
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

							<div class="col-sm-6">

								<div class="form-group">
									<label for="formGroupExampleInput">Tag Name</label>
									<input type="text" name="tags[0][name]" class="form-control" id="" placeholder="title">
								</div>

							</div>

                             <!-- Dynamic Fields -->
                             <div id="dynamic-fields"></div>

                            <div class="col-sm-6" id="new_fields">

                                <div id="existing_div" class="col-sm-4 right">
                                    <a class="txt_link form" id="add-more-fields">Add more</a>
                                </div>

                            </div>



                            {{-- <div class="col-sm-6">

								<div class="form-group">
									<label for="formGroupExampleInput">Url</label>
									<input type="text" name="url" class="form-control" id="" placeholder="url">
								</div>

							</div> --}}

							<div class="col-sm-12 mt-3">

								<button type="submit" class="form_btn mt-0 text-center" style="width: 180px;">Add Category</button>

							</div>

						</div>


					</form>

				</div>

			</div>

		</section>

        <!-- Modal -->
        <div class="modal fade text-center" id="success_modal_add_project" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <i class="bx bxs-message-check" style="font-size: 55px;color: #db9d94;"></i>

                        <!-- <i class="bx bxs-message-x" style="font-size: 55px;color: red;"></i> -->

                        <h3 class="my-4">Success</h3>

                        <p class="my-4">Tag Added Successfully</p>

                        <a href="{{ route('tags-list') }}" class="form_btn btn btn-primary my-4">Done</a>

                    </div>
                </div>
            </div>
        </div>


	</main><!-- End #main -->



@endsection('pagehtml')

@section('pagescript')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/additional-methods.min.js"></script>

    <script type="text/javascript">
        $(function () {
            let counter = 1;


            function addValidationRules(index) {
                $(`input[name="tags[${index}][name]"]`).rules("add", {
                    required: true,
                    remote: {
                        url: "{{ route('check-tag') }}",
                        type: "POST",
                        data: {
                            name: function () {
                                return $(`input[name="tags[${index}][name]"]`).val();
                            },
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        dataFilter: function (response) {
                            const result = JSON.parse(response);
                            return result.exists ? "false" : "true";
                        }
                    },
                    messages: {
                        required: "Please enter tag name",
                        remote: "Tag already exists"
                    }
                });

                $(`select[name="tags[${index}][category]"]`).rules("add", {
                    required: true,
                    messages: {
                        required: "Please select a category for the tag"
                    }
                });
            }


            $('#add-more-fields').click(function () {
                const newFields = `
                    <div class="row" data-index="${counter}">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tag-category-${counter}">Category ${counter}</label>
                                <select name="tags[${counter}][category]" class="form-control" id="tag-category-${counter}">
                                    <option value="">Select Category</option>
                                    @if($categories)
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tag-name-${counter}">Tag Name ${counter}</label>
                                <input type="text" name="tags[${counter}][name]" class="form-control" id="tag-name-${counter}" placeholder="Tag Name">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <a class="txt_link form_btn btn btn-primary d_btn delete-client-field bi bi-trash remove-fields" data-index="${counter}"></a>
                        </div>
                    </div>
                `;
                $('#dynamic-fields').append(newFields);
                addValidationRules(counter);
                counter++;
            });


            $(document).on('click', '.remove-fields', function () {
                const index = $(this).data('index');
                $(`[data-index="${index}"]`).remove();
                counter--;
            });

            // Initialize validation
            $('#add-category').validate({
                rules: {
                    "tags[0][name]": {
                        required: true,
                        remote: {
                            url: "{{ route('check-tag') }}",
                            type: "POST",
                            data: {
                                name: function () {
                                    return $('input[name="tags[0][name]"]').val();
                                },
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            dataFilter: function (response) {
                                const result = JSON.parse(response);
                                return result.exists ? "false" : "true";
                            }
                        }
                    },
                    "tags[0][category]": {
                        required: true
                    }
                },
                messages: {
                    "tags[0][name]": {
                        required: "Please enter tag name",
                        remote: "Tag already exists"
                    },
                    "tags[0][category]": {
                        required: "Please select a category for the tag"
                    }
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });


            addValidationRules(0);
        });
    </script>

@stop
