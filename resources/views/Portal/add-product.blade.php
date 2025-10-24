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

		#demo{
			display: flex;
			flex-wrap: wrap;
		}
		
		.multislect .choices__inner{
			height: 60px;
		}
		
		.multislect .choices__button{
			border: none !important;
		}


	</style>

	<link href="https://releases.transloadit.com/uppy/v4.8.0/uppy.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
	<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

	<main id="main" class="main">

		<div class="pagetitle">
			<h1>Add Product</h1>
			<div class="c_divider"></div>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">Add Product</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->



		<section class="section">
			<div class="row">

				<div class="col-md-12">

					<form class="custom_form" method="POST" action="{{ route('save-product') }}" id="add_product" name="add_product" enctype="multipart/form-data">

						@csrf

						<div class="row">

							<div class="col-sm-12">

								<div class="form-group">
									<label for="formGroupExampleInput">Product Name</label>
									<input type="text" name="product_name" class="form-control" id="addProducttitleInput" placeholder="Product Name">
								</div>

							</div>

							<!-- Category -->
							<div class="col-sm-4">
								<div class="form-group">
									<label>Category</label>
									<select class="form-control form-select" name="category_id" id="category" required>
										<option value="">Select Category</option>
										@if($categories->isNotEmpty())
											@foreach($categories as $category)
												<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endforeach
										@endif
									</select>
								</div>
							</div>

							<!-- Sub-Category -->
							<div class="col-sm-4">
								<div class="form-group multislect">
									<label>Sub Category</label>
									<select class="form-control" name="sub_category_id" id="sub_category" placeholder="Please select Sub Category" required>
										<option value="">Select Sub Category</option>
										<!-- Dynamically populated -->
									</select>
								</div>
							</div>

							<div class="col-sm-4">

								<div class="form-group">
									<label for="formGroupExampleInput">Weight</label>
									<input type="text" name="weight" class="form-control" id="addProducttitleInput" placeholder="Weight" required>
								</div>

							</div>


							<div class="col-sd-12">
								<div class="form-horizontal">
								  	<div class="form-group">
								    	<label class="control-label col-md-3">Upload Image</label>
								    	<div class="col-md-12">
							      			<div class="row">
							        			<div id="demo"></div>
							      			</div>
							    		</div>
								  	</div>
								</div>
							</div>

							
							<div class="col-sm-12 mt-3 mb-3">
								
								<h3 class="heading2">Description Bottom</h3>
								
								<div class="c_divider my-1"></div>

							</div>
							
							<div class="col-sm-12">

								<div class="form-group">
									<label for="formGroupExampleInput">Short Description</label>
									<textarea name="short_description" placeholder="Short Description" class="form-control" rows="4" style="width: 95%;"></textarea>
								</div>

							</div>

							<div class="col-sm-12">

								<div class="form-group">
									<label for="formGroupExampleInput">Url</label>
									<input type="text" name="url" class="form-control" id="addProducturlInput" placeholder="Url" readonly>
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
											<input type="number" class="form-control" id="price" name="price" placeholder="Please enter price" min="0">
										</div>
									</div>

									<div class="col-sm-4">
										<div class="form-group">
											<label for="discount_percentage">Discounted Percentage</label>
											<input type="number" class="form-control" id="discount_percentage" name="discounted_price" placeholder="Please enter discounted percentage" min="0" max="99">
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

							<div class="col-sm-12 mt-3">
								<button type="submit" class="form_btn mt-0 text-center" style="width: 180px;">Add Product</button>
							</div>

						</div>

					</form>

				</div>

			</div>

		</section>

	</main><!-- End #main -->

	<script src="{{ asset('assets/js/jquery-3.6.3.min.js')}}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('js/spartan-multi-image-picker-min.js') }}"></script>

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
                    var validator = $('#add_product').validate({ 
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
                        //"product[0][size]": {
                        //    required: true,
                        //},
                        //"product[0][price]": {
                        //    required: true,
                        //},
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

	<script>

		$("#demo").spartanMultiImagePicker({
		  	maxCount : 10,
		  	fieldName: 'images[]',
		  	rowHeight :'200px',
		  	groupClassName :'col-md-4 col-sm-4 col-xs-6',
		});

		$("#demo").spartanMultiImagePicker({
			placeholderImage: {
			    image : ADDICON,
			    width :'64px'
			},
		});

		$("#demo").spartanMultiImagePicker({
		  	allowedExt:'png|jpg|jpeg|gif'
		});

		$("#demo").spartanMultiImagePicker({
		  	maxFileSize:'',
		});

		$("#demo").spartanMultiImagePicker({
		  	onAddRow:         function() {},
		  	onRenderedPreview:function() {},
		  	onRemoveRow:      function() {},
		  	onExtensionErr:   function() {},
		  	onSizeErr:        function() {}
		});

		$("#demo").spartanMultiImagePicker({
		  	dropFileLabel:   'Drop file here',
		});

		$("#demo").spartanMultiImagePicker({
		  	directUpload :  {
		    	loaderIcon:'<i class="fas fa-sync fa-spin"></i>',
		    	status:      false,
		    	url:         `{{ route('save-product') }}`,
		    	success:     function(success) {
		    		console.log('success');
		    	},
		    	error:       function() {}
		  	},
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

		document.getElementById('addProducttitleInput').addEventListener('input', function () {
			let title = this.value;

			let slug = title
				.toLowerCase()
				.replace(/[^\w\s-]/g, '')
				.trim()
				.replace(/\s+/g, '-')
				.replace(/-+/g, '-');

			document.getElementById('addProducturlInput').value = slug;
		});

		document.addEventListener("DOMContentLoaded", function () {
			const categorySelect = document.getElementById('category');
			const subCategorySelect = document.getElementById('sub_category');

			categorySelect.addEventListener('change', function () {
				const categoryId = this.value;

				// Clear sub-category dropdown
				subCategorySelect.innerHTML = '<option value="">Select Sub Category</option>';

				if (categoryId) {
					$("#loader").show();
					$("#blur-bg").show();
					fetch(`/get-sub-categories/${categoryId}`)
						.then(response => response.json())
						.then(data => {
							if (data.length) {
								data.forEach(sub => {
									const option = document.createElement('option');
									option.value = sub.id;
									option.text = sub.name;
									subCategorySelect.appendChild(option);
								});
							}
						})
						.catch(error => console.error('Error fetching sub-categories:', error))
						.finally(() => {
							$("#loader").hide();
							$("#blur-bg").hide();
						});
				}
			});
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


@endsection('pagehtml')
