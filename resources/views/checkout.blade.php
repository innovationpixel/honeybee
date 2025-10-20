@extends('layouts.admin')

@section('html')

    <style>
        .error {
            color: red;
        }
    </style>

        <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1 bg-cover-center"
                data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/breadcum/bg.jpg">
                <div class="container">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </section>
            <!-- Breadcum End -->
            <section class="Checkout">

                <div class="container">

                    <form method="post" action="{{ route('placeOrder') }}" id="placeOrder">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <h4 class="section-title">Billing Details</h4>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label">First Name *</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="companyName" class="form-label">Company Name (optional)</label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name">
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="country" class="form-label">Country / Region *</label>
                                        <select class="form-select" id="country" name="country">
                                            <option selected>United States (US)</option>
                                            <option>Canada</option>
                                            <option>United Kingdom</option>
                                            <option>Australia</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="state" class="form-label">State *</label>
                                        <select class="form-select" name="city" id="state">
                                            <option selected>California</option>
                                            <option>New York</option>
                                            <option>Texas</option>
                                            <option>Florida</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="apartment" class="form-label">Street address *</label>
                                    <input type="text" class="form-control mb-2" name="address" id="apartment" placeholder="House number and street name">
                                    <input type="text" class="form-control" name="apartment" placeholder="Apartment, suite, unit, etc. (optional)">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="city" class="form-label">Town / City *</label>
                                        <input type="text" class="form-control" name="town" id="city">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="zipCode" class="form-label">ZIP Code *</label>
                                    <input type="text" name="zip_code" class="form-control" id="zipCode">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone *</label>
                                    <input type="tel" name="phone" class="form-control" id="phone">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>

                                <div class="mb-3">
                                    <label for="order_notes" class="form-label">Order Notes</label>
                                    <input type="text" name="order_note" class="form-control" id="order_notes" placeholder="Order Notes (optional)">
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" name="create_account" type="checkbox" id="createAccount">
                                    <label class="form-check-label" for="createAccount">
                                        Create an account?
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="order-summary">
                                    <h4 class="section-title">Your Order</h4>

                                    @php $grandTotal = 0; @endphp 
                                                    
                                    @if(session()->has('cart') && count(session('cart')) > 0)

                                        @foreach(session('cart') as $item)

                                            @php 
                                                $itemSubtotal = $item['price'] * $item['quantity']; 
                                                $grandTotal += $itemSubtotal; 
                                            @endphp 

                                            <div class="product-row" data-product-id="{{ $item['id'] }}">
                                                <div class="product-info">
                                                    <div class="product-image">
                                                        <i class="fas fa-tools"></i>
                                                    </div>
                                                    <div class="product-details">
                                                        <h6>{{ $item['name'] }}</h6>
                                                        <p class="product-price">$ {{ number_format($item['price'], 2) }} x {{ number_format($item['quantity'], 2) }}</p>
                                                    </div>
                                                </div>
                                                <!-- <div class="product-price">$ </div> -->
                                            </div>

                                        @endforeach

                                    @else

                                        <div class="product-row">
                                            <p>Cart is empty.</p>
                                        </div>
                                    
                                    @endif

                                    <div class="product-row">
                                        <div>Subtotal</div>
                                        <div>{{ number_format($grandTotal, 2) }}</div>
                                    </div>

                                    <div class="product-row">
                                        <div>Shipping</div>
                                        <div>$5.00</div>
                                    </div>

                                    <div class="total-row">
                                        <div>Total</div>
                                        <div>{{ number_format($grandTotal+5, 2) }}</div>
                                    </div>

                                    <!-- <div class="coupon-section">
                                        <p class="mb-2">Have a coupon? Click here to enter your coupon code.</p>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Coupon code">
                                            <button class="btn btn-apply" type="button">Apply</button>
                                        </div>
                                    </div> -->

                                    <div class="payment-method">
                                        <h6 class="mb-3">Payment Method</h6>

                                        <div class="payment-option active">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentMethod"
                                                    id="creditCard" checked>
                                                <label class="form-check-label" for="creditCard">
                                                    Credit / Debit Card
                                                </label>
                                            </div>
                                        </div>

                                        <div class="payment-option">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentMethod"
                                                    id="paypal">
                                                <label class="form-check-label" for="paypal">
                                                    PayPal
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" id="savePayment">
                                            <label class="form-check-label" for="savePayment">
                                                Save payment information to my account for future purchases.
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-checkout mt-4">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </section>
        </main>

@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            $('#placeOrder').validate({
                rules: {
                    first_name: {
                        required: true,
                        minlength: 3
                    },
                    last_name: {
                        required: true,
                        minlength: 3
                    },
                    company_name: {
                        required: true,
                        minlength: 3
                    },
                    country: {
                        required: true,
                    },
                    address: {
                        required: true,
                        minlength: 3
                    },
                    town: {
                        required: true,
                        minlength: 3
                    },
                    city: {
                        required: true,
                    },
                    zip_code: {
                        required: true,
                        minlength: 3
                    },
                    phone: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    },
                },
                submitHandler: function(form) {
                    $('#placeOrder').submit();
                }
            })

        })
    </script>

@endsection