@extends('layouts.admin')
@section('html')

  <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1 bg-cover-center"
                data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/breadcum/bg.jpg">
                <div class="container">
                    <h2>Cart</h2>
                    <ul>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </section>
            <!-- Breadcum End -->
            <section class="cart">

                <div class="container">

                    <div class="row mt-5">
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="product-info">
                                                    <div class="product-image">
                                                        <i class="fas fa-tools"></i>
                                                    </div>
                                                    <div class="product-details">
                                                        <h6>6.25" STRIPPED SCREW EXTRACTOR COMBINATION PLIERS</h6>
                                                        <p>SKU: VT-001</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$30.97</td>
                                            <td>
                                                <div class="quantity-controls">
                                                    <button class="quantity-btn">-</button>
                                                    <input type="text" class="quantity-input" value="3">
                                                    <button class="quantity-btn">+</button>
                                                </div>
                                            </td>
                                            <td>$92.91</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cart-totals">
                                <h4 class="section-title">Cart Totals</h4>

                                <div class="product-row">
                                    <div>Subtotal</div>
                                    <div>$92.91</div>
                                </div>

                                <div class="product-row">
                                    <div>
                                        Shipping
                                        <p class="small mb-0">Free shipping</p>
                                        <p class="small mb-0">Shipping to CA.</p>
                                        <a href="#" class="small">Change address</a>
                                    </div>
                                    <div>$0.00</div>
                                </div>

                                <div class="total-row">
                                    <div>Total</div>
                                    <div>$92.91</div>
                                </div>

                                <a href="{{ route('checkout') }}" class="btn btn-proceed mt-3">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </main>
@endsection