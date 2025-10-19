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
			<h1>Add Blog</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">Add Blog</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->



		<section class="section">
			<div class="row">

				<div class="col-md-12">

					<form class="custom_form" method="POST" action="{{ route('save-blog') }}" id="add-blog" name="add-blog" enctype="multipart/form-data">
                        @csrf
						<div class="row">

							<div class="col-sm-6">

								<div class="form-group">
									<label for="formGroupExampleInput">Title</label>
									<input type="text" name="title" class="form-control" id="" placeholder="title">
								</div>

							</div>

                            <div class="col-sm-6">

								<div class="form-group">
									<label for="formGroupExampleInput">Url</label>
									<input type="text" name="url" class="form-control" id="" placeholder="url">
								</div>

							</div>

                            <div class="col-sm-6">

								<div class="form-group">
									<label for="formGroupExampleInput">Picture</label>
									<input type="file" name="blog_image" class="form-control" id="" placeholder="Picture" >
								</div>

							</div>

                            <div class="col-sm-6">

								<div class="form-group">
									<label for="formGroupExampleInput">Image Alt Text</label>
									<input type="text" name="image_alt_text" class="form-control" id="" placeholder="Alt Text">
								</div>

							</div>




							<div class="col-sm-12 mt-3 mb-3">

								<h3 class="heading2">Blog Description</h3>

								<div class="c_divider my-1"></div>

							</div>

                            <div class="form-group col-md-12">
                                <label>Blog Description</label>
                                <textarea class="form-control" name="blog_description" id="message" rows="1" placeholder="Blog Description Here" ></textarea>
                            </div>

							<div class="col-sm-12 mt-3">

								<button type="submit" class="form_btn mt-0 text-center" style="width: 180px;">Add Blog</button>
								<!-- <button type="submit" class="form_btn mt-0 text-center" data-bs-toggle="modal" data-bs-target="#success_modal" style="width: 180px;">Add Project</button> -->

							</div>

						</div>


					</form>

				</div>

			</div>

		</section>

	    <!-- Modal -->
	    <div class="modal fade text-center" id="success_modal_add_blog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	                </div>
	                <div class="modal-body">

	                    <i class="bx bxs-message-check" style="font-size: 55px;color: #db9d94;"></i>

	                    <!-- <i class="bx bxs-message-x" style="font-size: 55px;color: red;"></i> -->

	                    <h3 class="my-4">Success</h3>

	                    <p class="my-4">Blog Added Successfully</p>

	                    <a href="{{ route('blogs-list') }}" class="form_btn btn btn-primary my-4">Done</a>

	                </div>
	            </div>
	        </div>
	    </div>


	</main><!-- End #main -->



@endsection('pagehtml')

@section('pagescript')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/additional-methods.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#add-blog').validate({
            rules: {
                title: { required: true },
                url: { required: true },
                blog_description: { required: true },
            },
            messages: {
                title: { required: "Please enter blog title" },
                url: { required: "Please enter blog URL" },
                blog_description: { required: "Please enter blog description" },
            },
            submitHandler: function (form) {
                event.preventDefault();
                $('.loader').show();

                $.ajax({
                    type: 'POST',
                    url: $(form).attr('action'),
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        const myModal = new bootstrap.Modal(
                            document.getElementById('success_modal_add_blog')
                        );
                        myModal.show();
                        $('#success_modal_add_blog').on('hidden.bs.modal', function () {
                            $('.loader').hide();
                            window.location.href = "{{ route('blogs-list') }}";
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Form submission failed:', error);
                    },
                });
            },
        });
    });

         tinymce.init({
	      	selector: 'textarea',
	      	plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
	      	toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',

	      	tinycomments_mode: 'embedded',
	      	tinycomments_author: 'Author name',
	      	mergetags_list: [
	        	{ value: 'First.Name', title: 'First Name' },
	        	{ value: 'Email', title: 'Email' },
	      	],
	      	file_picker_types: 'image',
	      	images_upload_url: "{{ route('blog_image_upload') }}",
			/* and here's our custom image picker*/
			file_picker_callback: (cb, value, meta) => {
				const input = document.createElement('input');
				input.setAttribute('type', 'file');
				input.setAttribute('accept', 'image/*');

				input.addEventListener('change', (e) => {
				  	const file = e.target.files[0];

				  	const reader = new FileReader();
				  	reader.addEventListener('load', () => {
					    /*
					      Note: Now we need to register the blob in TinyMCEs image blob
					      registry. In the next release this part hopefully won't be
					      necessary, as we are looking to handle it internally.
					    */
					    const id = 'blobid' + (new Date()).getTime();
					    const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
					    const base64 = reader.result.split(',')[1];
					    const blobInfo = blobCache.create(id, file, base64);
					    blobCache.add(blobInfo);

					    /* call the callback and populate the Title field with the file name */
					    cb(blobInfo.blobUri(), { title: file.name });
				  	});
				  	reader.readAsDataURL(file);
				});

				input.click();
			},
	    });



</script>



@stop
