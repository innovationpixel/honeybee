@extends('layouts.admin')
@section('html')

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

                    <div class="row">
                        <!-- Left Column - Account & Shipping Information -->
                        <div class="col-md-7">
                            <h4 class="section-title">Billing Details</h4>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="firstName" value="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="lastName" value="Last Name">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company Name (optional)</label>
                                <input type="text" class="form-control" id="companyName" placeholder="Company Name">
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">Country / Region *</label>
                                <select class="form-select" id="country">
                                    <option selected>United States (US)</option>
                                    <option>Canada</option>
                                    <option>United Kingdom</option>
                                    <option>Australia</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="streetAddress" class="form-label">Street address *</label>
                                <input type="text" class="form-control mb-2" id="streetAddress"
                                    placeholder="House number and street name">
                                <input type="text" class="form-control"
                                    placeholder="Apartment, suite, unit, etc. (optional)">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="city" class="form-label">Town / City *</label>
                                    <input type="text" class="form-control" id="city">
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label">State *</label>
                                    <select class="form-select" id="state">
                                        <option selected>California</option>
                                        <option>New York</option>
                                        <option>Texas</option>
                                        <option>Florida</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="zipCode" class="form-label">ZIP Code *</label>
                                <input type="text" class="form-control" id="zipCode">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone *</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email">
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="createAccount">
                                <label class="form-check-label" for="createAccount">
                                    Create an account?
                                </label>
                            </div>
                        </div>

                        <!-- Right Column - Order Summary & Payment -->
                        <div class="col-md-5">
                            <div class="order-summary">
                                <h4 class="section-title">Your Order</h4>

                                <div class="product-row">
                                    <div class="product-info">
                                        <div class="product-image">
                                            <i class="fas fa-tools"></i>
                                        </div>
                                        <div class="product-details">
                                            <h6>6.25" STRIPPED SCREW EXTRACTOR COMBINATION PLIERS</h6>
                                            <p>SKU: VT-001</p>
                                        </div>
                                    </div>
                                    <div class="product-price">$92.91</div>
                                </div>

                                <div class="product-row">
                                    <div>Subtotal</div>
                                    <div>$92.91</div>
                                </div>

                                <div class="product-row">
                                    <div>Shipping</div>
                                    <div>Free shipping</div>
                                </div>

                                <div class="total-row">
                                    <div>Total</div>
                                    <div>$92.91</div>
                                </div>

                                <div class="coupon-section">
                                    <p class="mb-2">Have a coupon? Click here to enter your coupon code.</p>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Coupon code">
                                        <button class="btn btn-apply" type="button">Apply</button>
                                    </div>
                                </div>

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

                                <button class="btn btn-checkout mt-4">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </main>
@endsection