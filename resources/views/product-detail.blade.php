@extends('layouts.admin')

@section('html')

    <main>
        <section class="breadcum v1 bg-cover-center" data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/breadcum/bg.jpg">
            <div class="container">
                <h2>{{ $product->name ?? '' }}</h2>
                <ul>
                    <li><a href="{{ route('/') }}">Home</a></li>
                    <li>{{ $product->name ?? '' }}</li>
                </ul>
            </div>
        </section>

        <section class="shop-details v1">
            <div class="container">
                <div class="product-display row">
                    <div class="col-lg-6">
                        <div class="display-left">
                            <div class="big-box-img">
                                <a class="zoom-btn venobox" data-gall="shops-display-demos"
                                    href="assets/img/shop-details/big-img.jpg"><span
                                        class="my-icon icon-magnifying-glass"></span></a>
                                <div class="slider">
                                    <div class="swiper-wrapper">
                                        @if( isset($product->documents) && !empty($product->documents) )
                                            @foreach($product->documents as $document)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/products/' .$document->encoded_name ) }}" alt="big-img">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="small-box-img">
                                <div class="slider">
                                    <div class="swiper-wrapper">
                                        @if( isset($product->documents) && !empty($product->documents) )
                                            @foreach($product->documents as $document)
                                                <div class="swiper-slide">
                                                    <a class="venobox" data-gall="shops-display-demos"
                                                        href="{{ asset('storage/products/' .$document->encoded_name ) }}">
                                                        <img src="{{ asset('storage/products/' .$document->encoded_name ) }}" alt="big-img">
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="display-right">
                            <h3>{{ $product->name ?? '' }}</h3>
                            @php
                                $originalPrice = $product->price ?? 0;
                                $discountPercentage = $product->discounted_price ?? 0;
                                $finalPrice = $originalPrice;

                                if ($discountPercentage > 0) {
                                    $finalPrice = $originalPrice - ($originalPrice * ($discountPercentage / 100));
                                }
                            @endphp
                            @if($discountPercentage > 0)
                                <h4>${{ number_format($finalPrice, 2) }} <del>${{ number_format($originalPrice, 2) }}</del></h4>
                            @else
                                <h4>${{ number_format($originalPrice, 2) }}</h4>
                            @endif
                            <!-- <p>Organic Honey: Organic honey is produced from the pollen of organically grown plants,
                                and without chemical miticides to treat the bees. Buying organic honey ensures that
                                you.</p> -->
                            <div class="quan-card">
                                <div class="quantity-count">
                                    <button class="count-down-btn">-</button>
                                    <input class="count-numbber" type="number" value="1">
                                    <button class="count-plus-btn">+</button>
                                </div>
                                
                                <a href="javascript::void();" 
                                    class="link-anime v2 add-to-cart-custom-detail" 
                                    data-product-id="{{ $product->id }}">
                                    Add to Cart
                                </a>
                            </div>

                            <ul>
                                <li>
                                    <p>
                                        <span class="title">kWeight :</span>
                                        <span class="text">{{ $product->weight ?? '' }}</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <span class="title">Category :</span>
                                        <span class="text">{{ $product->sub_category->name ?? '' }}, {{ $product->category->name ?? '' }}</span>
                                    </p>
                                </li>
                                <!-- <li>
                                    <p>
                                        <span class="title">Tags :</span>
                                        <span class="text">Bee, Flower, Honey</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <span class="title">Availability :</span>
                                        <span class="text">500 In Stock</span>
                                    </p>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="product-tab">
                    <ul class="nav-tabs" id="myTab" role="tablist">
                        <li>
                            <button class="active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description-tab-pane" type="button">Description</button>
                        </li>
                        @if(false)
                        <!-- <li>
                            <button id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane"
                                type="button">Reviews (2) <span class="star-mark star-5">
                                    <span class="my-icon icon-star"></span>
                                    <span class="my-icon icon-star"></span>
                                    <span class="my-icon icon-star"></span>
                                    <span class="my-icon icon-star"></span>
                                    <span class="my-icon icon-star"></span>
                                </span>
                            </button>
                        </li>
                        <li>
                            <button id="information-tab" data-bs-toggle="tab" data-bs-target="#information-tab-pane"
                                type="button">Information</button>
                        </li>
                        <li>
                            <button id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq-tab-pane"
                                type="button">Faq</button>
                        </li> -->
                        @endif
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description-tab-pane">
                            <p>{{ $product->description ?? '' }}</p>
                        </div>
                        @if(false)
                        <div class="tab-pane fade" id="reviews-tab-pane">
                            <p>Organic honey, also known as organic or Bio, is honey obtained from the blossoms of
                                certified organic fields. To be considered an organic product, it must comply with
                                the protocol required by organic beekeeping.In addition, the honey obtained from
                                these fields must have the corresponding certification that guarantees it.This means
                                that for honey to be considered organic, it must be made with nectar from flowers
                                that are free of pesticides and herbicides. In addition, no antibiotics or chemicals
                                are used on the bees.</p>
                        </div>
                        <div class="tab-pane fade" id="information-tab-pane">
                            <p>Organic honey, also known as organic or Bio, is honey obtained from the blossoms of
                                certified organic fields. To be considered an organic product, it must comply with
                                the protocol required by organic beekeeping.In addition, the honey obtained from
                                these fields must have the corresponding certification that guarantees it.This means
                                that for honey to be considered organic, it must be made with nectar from flowers
                                that are free of pesticides and herbicides. In addition, no antibiotics or chemicals
                                are used on the bees.</p>
                        </div>
                        <div class="tab-pane fade" id="faq-tab-pane">
                            <p>Organic honey, also known as organic or Bio, is honey obtained from the blossoms of
                                certified organic fields. To be considered an organic product, it must comply with
                                the protocol required by organic beekeeping.In addition, the honey obtained from
                                these fields must have the corresponding certification that guarantees it.This means
                                that for honey to be considered organic, it must be made with nectar from flowers
                                that are free of pesticides and herbicides. In addition, no antibiotics or chemicals
                                are used on the bees.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="our-products v1 pt-0">
            <div class="container">
                <div class="section-title v1">
                    <div class="left-content">
                        <h2>Related products</h2>
                    </div>
                </div>
                <div class="row">
                    @if( isset($products) && !empty($products) )
                        @foreach($products as $product)
                            <div class="col-sm-6 col-xl-3">
                                <div class="product-card v1">
                                    <div class="product-img">
                                        <a href="{{ route('product-detail', $product->url) }}">
                                            <img src="{{ asset('storage/products/' .$product->documentTitle->encoded_name ) }}" alt="items">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h4><a href="{{ route('product-detail', $product->url) }}">{{ $product->name ?? '' }}</a></h4>
                                        @php
                                            $originalPrice = $product->price ?? 0;
                                            $discountPercentage = $product->discounted_price ?? 0;
                                            $finalPrice = $originalPrice;

                                            if ($discountPercentage > 0) {
                                                $finalPrice = $originalPrice - ($originalPrice * ($discountPercentage / 100));
                                            }
                                        @endphp
                                        @if($discountPercentage > 0)
                                            <h5>${{ number_format($finalPrice, 2) }} <del>${{ number_format($originalPrice, 2) }}</del></h5>
                                        @else
                                            <h5>${{ number_format($originalPrice, 2) }}</h5>
                                        @endif
                                        <p>Weight: <strong>{{ $product->weight ?? '' }}</strong></p>
                                    </div>
                                    <ul class="shop-btns">
                                        <li>
                                            <a class="{{ Auth::id() && $product->wishlist ? 'wishlist_active' : 'add-to-wishlist' }}" data-product-id="{{ $product->id }}">
                                                <span class="my-icon icon-heart {{ Auth::id() && $product->wishlist ? 'wishlist_active_icon' : '' }}"></span>
                                            </a>
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
            </div>
        </section>

    </main>

@endsection