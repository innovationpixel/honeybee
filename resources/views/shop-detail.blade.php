@extends('layouts.admin')
@section('html')

 <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1 bg-cover-center"
                data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/breadcum/bg.jpg">
                <div class="container">
                    <h2>Shop Details</h2>
                    <ul>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>Shop Details</li>
                    </ul>
                </div>
            </section>
            <!-- Breadcum End -->
            <!-- Shop Details Start -->
            <section class="shop-details v1">
                <div class="container">
                    <div class="product-display row">
                        <div class="col-lg-6">
                            <div class="display-left">
                                <div class="big-box-img">
                                    <a class="zoom-btn venobox" data-gall="shops-display-demos"
                                        href="{{ asset('assets/img/shop-details/big-img.jpg')}}"><span
                                            class="my-icon icon-magnifying-glass"></span></a>
                                    <div class="slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="{{ asset('assets/img/shop-details/big-img.jpg')}}" alt="big-img">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{{ asset('assets/img/shop-details/big-img.jpg')}}" alt="big-img">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{{ asset('assets/img/shop-details/big-img.jpg')}}" alt="big-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="small-box-img">
                                    <div class="slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a class="venobox" data-gall="shops-display-demos"
                                                    href="{{ asset('assets/img/shop-details/big-img.jpg')}}">
                                                    <img src="{{ asset('assets/img/shop-details/big-img.jpg')}}" alt="big-img">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a class="venobox" data-gall="shops-display-demos"
                                                    href="{{ asset('assets/img/shop-details/big-img.jpg')}}">
                                                    <img src="{{ asset('assets/img/shop-details/big-img.jpg')}}" alt="big-img">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a class="venobox" data-gall="shops-display-demos"
                                                    href="{{ asset('assets/img/shop-details/big-img.jpg')}}">
                                                    <img src="{{ asset('assets/img/shop-details/big-img.jpg')}}" alt="big-img">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="display-right">
                                <h3>Organic Honey</h3>
                                <h4>$100.00</h4>
                                <p>Organic Honey: Organic honey is produced from the pollen of organically grown plants,
                                    and without chemical miticides to treat the bees. Buying organic honey ensures that
                                    you.</p>
                                <div class="quan-card">
                                    <div class="quantity-count">
                                        <button class="count-down-btn">-</button>
                                        <input class="count-numbber" type="number" value="1">
                                        <button class="count-plus-btn">+</button>
                                    </div>
                                    <a href="#" class="link-anime v2">add to cart</a>
                                </div>
                                <ul>
                                    <li>
                                        <p>
                                            <span class="title">Sku :</span>
                                            <span class="text">Woo-album</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <span class="title">Category :</span>
                                            <span class="text">Raw & Unfiltered Honey, Spoonfull of Honey</span>
                                        </p>
                                    </li>
                                    <li>
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
                                    </li>
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
                            <li>
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
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description-tab-pane">
                                <p>Organic honey, also known as organic or Bio, is honey obtained from the blossoms of
                                    certified organic fields. To be considered an organic product, it must comply with
                                    the protocol required by organic beekeeping.In addition, the honey obtained from
                                    these fields must have the corresponding certification that guarantees it.This means
                                    that for honey to be considered organic, it must be made with nectar from flowers
                                    that are free of pesticides and herbicides. In addition, no antibiotics or chemicals
                                    are used on the bees.</p>
                            </div>
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
                        </div>
                    </div>
                </div>
            </section>
            <!-- Shop Details End -->
            <!-- Our Products Start -->
            <section class="our-products v1 pt-0">
                <div class="container">
                    <div class="section-title v1">
                        <div class="left-content">
                            <h2>Related products</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xl-3">
                            <div class="product-card v1">
                                <div class="product-img">
                                    <a href="{{ route('shop-detail') }}">
                                        <img src="{{ asset('assets/img/product/items-1.png')}}" alt="items">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="{{ route('shop-detail') }}">Dark Honey</a></h4>
                                    <h5>$11.50</h5>
                                    <p>Weight: <strong>1KG</strong></p>
                                </div>
                                <ul class="shop-btns">
                                    <li>
                                        <a href="#"><span class="my-icon icon-heart"></span></a>
                                    </li>
                                    <li>

                                        <a href="{{ route('cart') }}"><span class="my-icon icon-shop-bag"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="product-card v1">
                                <div class="product-img">
                                    <a href="{{ route('shop-detail') }}">
                                        <img src="{{ asset('assets/img/product/items-2.png')}}" alt="items">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="{{ route('shop-detail') }}">Premium Honey</a></h4>
                                    <h5>$10.50 <del>$12.50</del></h5>
                                    <p>Weight: <strong>1KG</strong></p>
                                </div>
                                <ul class="shop-btns">
                                    <li>
                                        <a href="#"><span class="my-icon icon-heart"></span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cart') }}"><span class="my-icon icon-shop-bag"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="product-card v1">
                                <div class="product-img">
                                    <a href="{{ route('shop-detail') }}">
                                        <img src="{{ asset('assets/img/product/items-3.png')}}" alt="items">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="{{ route('shop-detail') }}">Organic Honey</a></h4>
                                    <h5>$12.50</h5>
                                    <p>Weight: <strong>1KG</strong></p>
                                </div>
                                <ul class="shop-btns">
                                    <li>
                                        <a href="#"><span class="my-icon icon-heart"></span></a>
                                    </li>
                                    <li>
                                         <a href="{{ route('cart') }}"><span class="my-icon icon-shop-bag"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="product-card v1">
                                <div class="product-img">
                                    <a href="{{ route('shop-detail') }}">
                                        <img src="{{ asset('assets/img/product/items-4.png')}}" alt="items">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="{{ route('shop-detail') }}">Jarrah Honey</a></h4>
                                    <h5>$13.50</h5>
                                    <p>Weight: <strong>1KG</strong></p>
                                </div>
                                <ul class="shop-btns">
                                    <li>
                                        <a href="#"><span class="my-icon icon-heart"></span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cart') }}"><span class="my-icon icon-shop-bag"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Our Products End -->
        </main>

@endsection