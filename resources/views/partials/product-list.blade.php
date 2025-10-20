<div class="row">
    @if( isset($products) && !empty($products) )
        @foreach($products as $product)
            <div class="col-sm-6 col-xl-4">
                <div class="product-card v1">
                    <div class="product-img">
                        <a href="{{ route('shop-detail') }}">
                            @if( isset($product->documentTitle) && !empty($product->documentTitle) )
                                <img src="{{ asset('storage/product/' .$product->documentTitle->encoded_name ) }}" alt="items">
                            @endif
                        </a>
                    </div>
                    <div class="product-content">
                        @php
                            $originalPrice = $product->price ?? 0;
                            $discountPercentage = $product->discounted_price ?? 0;
                            $finalPrice = $originalPrice;

                            if ($discountPercentage > 0) {
                                $finalPrice = $originalPrice - ($originalPrice * ($discountPercentage / 100));
                            }
                        @endphp

                        <h4><a href="{{ route('shop-detail') }}">{{ $product->name ?? '' }}</a></h4>

                        @if($discountPercentage > 0)
                            <h5>${{ number_format($finalPrice, 2) }} <del>${{ number_format($originalPrice, 2) }}</del></h5>
                        @else
                            <h5>${{ number_format($originalPrice, 2) }}</h5>
                        @endif

                        <p>Weight: <strong>{{ $product->weight ?? '' }}</strong></p>
                    </div>
                    <ul class="shop-btns">
                        <li>
                            <a data-product-id="{{ $product->id }}" data-quantity="1" class="add-to-cart-custom"><span class="my-icon icon-heart"></span></a>
                        </li>
                        <li>
                            <a data-product-id="{{ $product->id }}" data-quantity="1" data-price="{{ $discountPercentage > 0 ? $finalPrice : $originalPrice }}" class="add-to-cart-custom"><span class="my-icon icon-shop-bag"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
</div>
@if($products->count() > 0 && isset($products))
    <div class="pagination-area">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                {{ $products->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
    </div>
@endif