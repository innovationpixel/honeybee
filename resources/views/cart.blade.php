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
                                        @php $grandTotal = 0; @endphp 

                                        @if(session()->has('cart') && count(session('cart')) > 0)  

                                            @foreach(session('cart') as $item)
                                                @php 
                                                    $itemSubtotal = $item['price'] * $item['quantity']; 
                                                    $grandTotal += $itemSubtotal; 
                                                @endphp 

                                                <tr data-product-id="{{ $item['id'] }}">
                                                    <td>
                                                        <div class="product-info">
                                                            <div class="product-image">
                                                                <i class="fas fa-tools"></i>
                                                            </div>
                                                            <div class="product-details">
                                                                <h6>{{ $item['name'] }}</h6>
                                                                <!-- <p>SKU: VT-001</p> -->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="price" data-price="{{ $item['price'] }}">{{ number_format($item['price'], 2) }}</td>
                                                    <td>
                                                        <div class="quantity-controls">
                                                            <button class="quantity-btn minus">-</button>
                                                            <input type="text" class="quantity-input" value="{{ $item['quantity'] }}" min="1">
                                                            <button class="quantity-btn plus">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="line-total">$ {{ number_format($item['price'] * $item['quantity'], 2) }}</td>                                        
                                                </tr>

                                            @endforeach
                                        @else
                                            <tr><td colspan="4" class="text-center pt-5">Cart is empty.</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cart-totals">
                                <h4 class="section-title">Cart Totals</h4>

                                <div class="product-row">
                                    <div>Subtotal</div>
                                    <div> $<span id="cart-subtotal">{{ number_format($grandTotal, 2) }}</span></div>
                                </div>

                                <div class="product-row">
                                    <div>
                                        Shipping
                                        <!-- <p class="small mb-0">Free shipping</p>
                                        <p class="small mb-0">Shipping to CA.</p>
                                        <a href="#" class="small">Change address</a> -->
                                    </div>
                                    <div>$5.00</div>
                                </div>

                                <div class="total-row">
                                    <div>Total</div>
                                    <div> $<span id="cart-grandtotal">{{ number_format(($grandTotal+5), 2) }}</span></div>
                                </div>
                                <a href="{{ route('checkout') }}" class="btn btn-proceed mt-3">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </main>

@endsection

@section('script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.quantity-input');
            const cartSubtotalEl = document.getElementById('cart-subtotal');
            const cartGrandtotalEl = document.getElementById('cart-grandtotal');

            function updateBackendCart(productId, quantity) {
                fetch('/update-cart-quantities', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: productId, quantity: quantity })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
            
                        const tr = document.querySelector(`tr[data-product-id="${productId}"]`);
                        if(tr) {
                            tr.querySelector('.line-total').innerText = '$ ' + Number(data.itemSubtotal).toFixed(2);
                        }
            
                        cartSubtotalEl.innerText = Number(data.subtotal).toFixed(2);
                        cartGrandtotalEl.innerText = (Number(data.subtotal) + 5).toFixed(2);
                    } else {
                        alert(data.message || 'Failed to update cart');
                    }
                })
                .catch(() => alert('Error updating cart'));
            }

            quantityInputs.forEach(input => {
                const productId = input.closest('tr').dataset.productId;

                function handleQuantityChange() {
                    let qty = parseInt(input.value);
                    if(isNaN(qty) || qty < 1) qty = 1;
                    input.value = qty;
                    updateBackendCart(productId, qty);
                }

                input.addEventListener('change', handleQuantityChange);

                input.previousElementSibling.addEventListener('click', function() {
                    let currentVal = parseInt(input.value) || 1;
                    input.value = currentVal > 1 ? currentVal - 1 : 1;
                    handleQuantityChange();
                });

                input.nextElementSibling.addEventListener('click', function() {
                    let currentVal = parseInt(input.value) || 1;
                    input.value = currentVal + 1;
                    handleQuantityChange();
                });
            });
        });
    </script>

@endsection