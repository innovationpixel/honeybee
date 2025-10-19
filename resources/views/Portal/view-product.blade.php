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
			width: 95%;
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

		.form-group:nth-child(3) {
			top: -24px;
			position: relative;
			color: red;
		}

		.on-off-button {
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

		#myDropZone {
			display: flex !important;
			flex-wrap: wrap;
			cursor: pointer;
		}

		#myDropZone .dz-success-mark,
		.dz-error-mark {
			display: none;
		}

		#myDropZone .dz-image-preview {
			margin: 5px;
			width: 150px;
		}

		#myDropZone {
			display: flex !important;
			flex-wrap: wrap;
			cursor: pointer;
		}

		#myDropZone .dz-success-mark,
		.dz-error-mark {
			display: none;
		}

		#myDropZone .dz-image-preview {
			margin: 5px;
		}

		.dz-filename {
			width: 130px;
			height: 25px;
			overflow: hidden;
		}

		.choices__inner {
			background-color: #ffffff !important;
			height: 45px;
			border-radius: 5px !important;
		}

		.choices__input {
			background-color: #ffffff !important;
			font-size: 15px !important;
			width: 250px !important;
		}

		.choices__list--multiple .choices__item {
			background-color: #ed8608 !important;
			border: 1px solid #ff8d00 !important;
		}

		.file-name-display {
		    margin-top: -35px;
		    font-size: 16px;
		    color: #555555cf;
		    margin-bottom: 10px;
		    margin-left: 130px;
		}

		#myDropZone1{
			display: flex !important;
			flex-wrap: wrap;
			cursor: pointer;
		}

		#myDropZone1 .dz-success-mark , .dz-error-mark{
			display: none;
		}

		#myDropZone1 .dz-image-preview{
			margin: 5px;
		}

		.dz-message{
			width: 100%;
			margin-bottom: 15px;
		}

		.dz-image img{
			height: 150px;
			width: 150px;
		}

		.choices__item--choice {
			 background-color: #ffff !important;
		}
		
		.multislect .choices__inner{
			height: 60px;
		}
		
		.multislect .choices__button{
			border: none !important;
		}

	</style>

	<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
	<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

	<main id="main" class="main">

		<div class="pagetitle">
			<h1>View Product</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">View Product</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->



		<section class="section">
			<div class="row">

				<div class="col-md-12">

					<form class="custom_form" method="POST" action="{{ route('update-product') }}" id="update_product" name="update_product" enctype="multipart/form-data">

						@csrf

						<input type="hidden" name="product_id" id="product_id" value="{{$id}}">

						<div class="row">

							<div class="col-sm-12">

								<div class="form-group">
									<label for="formGroupExampleInput">Product Name</label>
									<input type="text" name="product_name" class="form-control" id="editProducttitleInput" value="{{ $product->name ?? '' }}" placeholder="Product Name">
								</div>

							</div>

							<!-- Category -->
							<div class="col-sm-6">
								<div class="form-group">
									<label>Category</label>
									<select class="form-control form-select" name="category_id" id="supervisor_select">
										<option value="">Select Category</option>
										@if($categories->isNotEmpty())
											@foreach($categories as $category)
												<option value="{{ $category->id }}"
													{{ $category->id == $product->category_id ? 'selected' : '' }}>
													{{ $category->name }}
												</option>
											@endforeach
										@endif
									</select>
								</div>
							</div>

							<!-- Sub-Category -->
							<div class="col-sm-6">
								<div class="form-group multislect">
									<label>Sub Category</label>
									<select class="form-control" name="sub_category_id" id="sub_category_select">
										<option value="">Select Sub Category</option>
										@if(!empty($sub_categories))
											@foreach($sub_categories as $sub_category)
												<option value="{{ $sub_category->id }}"
													{{ $sub_category->id == $product->sub_category_id ? 'selected' : '' }}>
													{{ $sub_category->name }}
												</option>
											@endforeach
										@endif
									</select>
								</div>
							</div>

							<div class="col-md-12 mb-4">
								<div class="form-group">
									<label>Add Gallery</label>
									<div id="myDropZone1" name="image" class="dropzone dropzone-design mb-50 form-control py-3">
										<div class="dz-default dz-message"><span>Click to Upload Pictures</span></div>
									</div>
								</div>
							</div>

							<div class="col-sm-12 mt-3 mb-3">
								<h3 class="heading2">Description</h3>
								<div class="c_divider my-1"></div>
							</div>
							
							<div class="col-sm-12 mt-4">
								<div class="form-group">
									<label for="formGroupExampleInput">Short Description</label>
									<textarea name="short_description" placeholder="Short Description" class="form-control" rows="4" style="width: 95%;">{{ $product->description ?? '' }}</textarea>
								</div>
							</div>

							<div class="col-sm-12">

								<div class="form-group">
									<label for="formGroupExampleInput">Url</label>
									<input type="text" name="url"  class="form-control"id="editProducturlInput" value="{{ $product->url ?? '' }}" placeholder="Url" readonly>
								</div>

							</div>

							
                            <div class="col-sm-12 mt-3 mb-3">

								<h3 class="heading2">Pricing</h3>

								<div class="c_divider my-1"></div>

							</div>

                            <div class="col-sm-12 mt-3 mb-3">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label for="price">Price</label>
											<input type="number" class="form-control" id="price" name="price" placeholder="Please enter price" min="0" value="{{ $product->price ?? 0 }}">
										</div>
									</div>

									<div class="col-sm-4">
										<div class="form-group">
											<label for="discount_percentage">Discounted Percentage</label>
											<input type="number" class="form-control" id="discount_percentage" name="discounted_price" placeholder="Please enter discounted percentage" value="{{ $product->discounted_price ?? 0 }}" min="0" max="99">
										</div>
									</div>

									<div class="col-sm-4">
										<div class="form-group">
											<label for="final_price">Discounted Price</label>
											<input type="text" class="form-control" id="final_price" placeholder="Discounted price will appear here" disabled>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</section>
	</main><!-- End #main -->


@endsection('pagehtml')

@section('pagescript')

	<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('js/spartan-multi-image-picker-min.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>

	<script type="text/javascript">
		$(document).ready(function() {

			(function($) {
				"use strict";

				$.validator.addMethod(
					"allowExten",
					function(value, element) {

						var allowedExtensions = ['jpeg', 'jpg', 'png', 'webp'];

						var file = value.toLowerCase(),
							extension = file.substring(file.lastIndexOf('.') + 1);

						if ($.inArray(extension, allowedExtensions) == -1) {
							return false;

						} else {
							return true;

						}
					},

					"Invalid file format"
				);

				$.validator.addMethod(
					"checkDropDown",
					function(value, element) {

						if (value == '') {
							return false;

						} else return true;
					},
					"Please elect category"
				);

				// validate contactForm form
				$(function() {
                    var validator = $('#update_product').validate({ // Changed to update_product from add_product
                    rules: {
                        product_name: {
                            required: true,
                        },
                        category_id: {
                            required: true,
                            checkDropDown: true
                        },
                        sub_category_id: {
                            required: true,
                            checkDropDown: true
                        },
                        short_description: {
                            required: true,
                        },
                        // "product[0][size]": {
                        //     required: true,
                        // },
                        // "product[0][price]": {
                        //     required: true,
                        // },
                        // "product[0][product_image]": {
                        //     required: true,
                        //     allowExten: true
                        // },
                    },
                    submitHandler: function(form, event) {
                        form.submit();
                    }
                });

					$('#success_modal_add_project').on('hidden.bs.modal', function() {
						$('.loader').hide();
						window.location.href = "{{ route('products-list') }}";

					});
				});

			})(jQuery)

			$('#project_name, #address, #cover_image').change(function() {
				$(this).removeClass('error');
			});

		})
	</script>

	<script src="https://unpkg.com/filepond/dist/filepond.js"></script>

	<script>

	    var oldImages = @json($product->documents);

	    // Convert oldImages to FilePond's expected format
	    var preloadedFiles = oldImages.map(function(image) {
	        return {
	            source: `/plantales/public/storage/products/${image.encoded_name}`, // Correct relative path
	            options: {
	                type: 'localhost', // Specify that it's a local file
	            },
	        };
	    });

	    FilePond.create(document.querySelector('.filepond'), {
	        allowMultiple: true,
	        files: preloadedFiles,
	        server: null
	    });

	</script>

	<script type="text/javascript">
	    var removed_files = [];

		Dropzone.autoDiscover = false;

		$("div#myDropZone1").dropzone({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
		    url: "{{ route('update-product') }}",
		    autoProcessQueue: false,
		    uploadMultiple: true,
		    maxFilesize: 10,
		    // addRemoveLinks: true,
		    paramName: "file",
		    method: "POST",
		    maxFiles: 10,
		    parallelUploads: 100,
		    acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp",
		    dictDefaultMessage: '<div class="text-center mb-3"><i class="la la-cloud-upload text-primary" style="font-size:50px"></i></div> <strong>Drop files here or click to upload. </strong>',
		    init: function () {
		        const submitButton = document.getElementById("submit");
		        const imageUpload = this;
		        let removed_files = [];

		        // Handle submit button click
		        submitButton.addEventListener("click", function (e) {
		            e.preventDefault();
		            e.stopPropagation();

		            if ($("#update_product").valid()) {
		                $("#submit").prop("disabled", true);

		                const formData = new FormData(document.getElementById("update_product"));

		                if (imageUpload.getQueuedFiles().length > 0) {
		                    imageUpload.getQueuedFiles().forEach((file, index) => {
		                        formData.append(`dropzone_images[${index}]`, file);
		                    });
		                }

		                formData.append("removed_files", JSON.stringify(removed_files));

		                $.ajax({
		                    url: "{{ route('update-product') }}",
		                    method: "POST",
		                    data: formData,
		                    contentType: false,
		                    processData: false,
		                    success: function (response) {
		                        console.log(response);
		                        window.location = "{{ route('products-list') }}";
		                    },
		                    error: function (xhr) {
		                        console.error(xhr.responseText);
		                        alert("An error occurred while submitting the form.");
		                    }
		                });
		            }
		        });

		        // Handle removed files
		        this.on("removedfile", function (file) {
		            removed_files.push(file.name);
		        });

		        // Add custom remove button
		        this.on("addedfile", function (file) {
		            const removeButton = Dropzone.createElement(
		                "<a href='javascript:;' class='btn btn-danger btn-sm btn-block' style='width: 148px;'>Remove</a>"
		            );

		            const _this = this;
		            removeButton.addEventListener("click", function (e) {
		                e.preventDefault();
		                e.stopPropagation();
		                _this.removeFile(file);
		            });

		            file.previewElement.appendChild(removeButton);
		        });

		        var images = [
		            <?php foreach ($product->documents as $key => $value) { ?>
		                <?php $path = asset('storage/products/'.$value->encoded_name ); ?>
		                {name: '{{ $value->id.'_'.$value->original_name }}', url: "{{ $path }}", size: "{{ $value->size }}"},
		            <?php } ?>
		        ];

		        for (let i = 0; i < images.length; i++)
		        {
		            let img = images[i];
		            var mockFile = {
		                name: img.name,
		                size: img.size
		            };

		            imageUpload.emit("addedfile", mockFile);
		            imageUpload.emit("thumbnail", mockFile, img.url);
		            imageUpload.emit("complete", mockFile);

		            mockFile.previewElement.dataset.url = img.url;

		            imageUpload.options.maxFiles -= 1;
		        }
		    }
		});

	</script>


	<script>

		document.addEventListener('DOMContentLoaded', function () {
			const element = document.getElementById('add_tags');
			const choices = new Choices(element, {
				removeItemButton: true,
				shouldSort: false
			});
		});


		function getSelectedValues() {

			const selectedOptions = document.querySelectorAll('#add_tags option:checked');
			const selectedValues = Array.from(selectedOptions).map(option => option.value);
			return selectedValues;
		}

		document.querySelector('form').addEventListener('submit', function(e) {
			e.preventDefault();
			const selectedValues = getSelectedValues();
		});

		$(document).ready(function(){

		     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
		        removeItemButton: true,
		        maxItemCount:8,
		        searchResultLimit:8,
		        renderChoiceLimit:8
		      });


		});

		document.addEventListener('DOMContentLoaded', () => {
		    const checkboxes = document.querySelectorAll('.sales-discount-checkbox');
		    const saleFields = document.getElementById('sale-fields');
		    const discountFields = document.getElementById('discount-fields');

		    const toggleRequiredFields = (type) => {

		        const allFields = [saleFields, discountFields];
		        allFields.forEach((fields) => {
		            const inputs = fields.querySelectorAll('input');
		            inputs.forEach((input) => {
		                input.value = '';
		                input.removeAttribute('required');
		            });
		        });

		        if (type === 'sale') {
		            saleFields.querySelectorAll('input').forEach((input) => {
		                input.setAttribute('required', 'required');
		            });
		        } else if (type === 'discount') {
		            discountFields.querySelectorAll('input').forEach((input) => {
		                input.setAttribute('required', 'required');
		            });
		        }
		    };

		    checkboxes.forEach((checkbox) => {
		        checkbox.addEventListener('change', () => {
		            if (checkbox.checked) {
		                checkboxes.forEach((cb) => {
		                    if (cb !== checkbox) cb.checked = false;
		                });

		                toggleRequiredFields(checkbox.value);
		                togglePromoFields(checkbox.value);
		            } else {
		                toggleRequiredFields('');
		                togglePromoFields('');
		            }
		        });
		    });
		});

		function togglePromoFields(type) {
		    document.getElementById('sale-fields').style.display = 'none';
		    document.getElementById('discount-fields').style.display = 'none';

		    if (type === 'sale') {
		        document.getElementById('sale-fields').style.display = 'block';
		    } else if (type === 'discount') {
		        document.getElementById('discount-fields').style.display = 'block';
		    }
		}

		document.addEventListener("DOMContentLoaded", function () {
			const categorySelect = document.getElementById('supervisor_select');
			const subCategorySelect = document.getElementById('sub_category_select');

			const selectedSubCategoryId = "{{ $product->sub_category_id ?? '' }}";

			function loadSubCategories(categoryId, selected = null) {
				subCategorySelect.innerHTML = '<option value="">Select Sub Category</option>';

				if (categoryId) {
					$("#loader").show();
					$("#blur-bg").show();

					fetch(`/public/get-sub-categories/${categoryId}`)
						.then(response => response.json())
						.then(data => {
							if (data.length) {
								data.forEach(sub => {
									const option = document.createElement('option');
									option.value = sub.id;
									option.text = sub.name;
									if (selected && selected == sub.id.toString()) {
										option.selected = true;
									}
									subCategorySelect.appendChild(option);
								});
							}
						})
						.catch(error => {
							console.error('Error fetching sub-categories:', error);
						})
						.finally(() => {
							$("#loader").hide();
							$("#blur-bg").hide();
						});
				}
			}

			const initialCategoryId = categorySelect.value;
			if (initialCategoryId) {
				loadSubCategories(initialCategoryId, selectedSubCategoryId);
			}

			categorySelect.addEventListener('change', function () {
				loadSubCategories(this.value);
			});
		});

		document.getElementById('editProducttitleInput').addEventListener('input', function () {
			let title = this.value;

			let slug = title
				.toLowerCase()
				.replace(/[^\w\s-]/g, '')
				.trim()
				.replace(/\s+/g, '-')
				.replace(/-+/g, '-');

			document.getElementById('editProducturlInput').value = slug;
		});

		document.addEventListener('DOMContentLoaded', function () {
			const priceInput = document.getElementById('price');
			const discountInput = document.getElementById('discount_percentage');
			const finalPriceInput = document.getElementById('final_price');

			function calculateDiscountedPrice() {
				const price = parseFloat(priceInput.value);
				const discount = parseFloat(discountInput.value);

				// Validate input
				if (isNaN(price) || isNaN(discount)) {
					finalPriceInput.value = '';
					return;
				}

				if (discount > 99) {
					alert('Discount percentage cannot be greater than 99%');
					discountInput.value = '';
					finalPriceInput.value = '';
					return;
				}

				// Calculate final price
				const discountedAmount = (price * discount) / 100;
				const finalPrice = price - discountedAmount;

				finalPriceInput.value = finalPrice.toFixed(2);
			}

			priceInput.addEventListener('input', calculateDiscountedPrice);
			discountInput.addEventListener('input', calculateDiscountedPrice);
		});


	</script>

@stop
