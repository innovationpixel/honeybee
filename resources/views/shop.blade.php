@extends('layouts.admin')
@section('html')

  <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1 bg-cover-center"
                data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/working-process/bg.jpg">
                <div class="container">
                    <h2>Shop</h2>
                    <ul>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
            </section>
            <!-- Breadcum End -->
            <!-- Shop Start -->
            <section class="shop v1 pb-xl-spach">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="products">
                                <div class="pro-display-header">
                                    <div class="pro-left">
                                        <p>Showing 1-09 of 17 results</p>
                                    </div>
                                    <div class="pro-right">
                                        <select class="page-select">
                                            <option>6 per page</option>
                                            <option>9 per page</option>
                                            <option selected>12 per page</option>
                                        </select>
                                        <select class="page-select">
                                            <option selected>Default sorting</option>
                                            <option>Sort by latest</option>
                                            <option>Sort by popularity</option>
                                            <option>Sort by average rating</option>
                                            <option>Sort by low to high</option>
                                            <option>Sort by low to high</option>
                                            <option>Price high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xl-4">
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
                                    <div class="col-sm-6 col-xl-4">
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
                                    <div class="col-sm-6 col-xl-4">
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
                                    <div class="col-sm-6 col-xl-4">
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
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="product-card v1">
                                            <div class="product-img">
                                                <a href="{{ route('shop-detail') }}">
                                                    <img src="{{ asset('assets/img/product/items-5.png')}}" alt="items">
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
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="product-card v1">
                                            <div class="product-img">
                                                <a href="{{ route('shop-detail') }}">
                                                    <img src="{{ asset('assets/img/product/items-6.png')}}" alt="items">
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
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="product-card v1">
                                            <div class="product-img">
                                                <a href="{{ route('shop-detail') }}">
                                                    <img src="{{ asset('assets/img/product/items-7.png')}}" alt="items">
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
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="product-card v1">
                                            <div class="product-img">
                                                <a href="{{ route('shop-detail') }}">
                                                    <img src="{{ asset('assets/img/product/items-8.png')}}" alt="items">
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
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="product-card v1">
                                            <div class="product-img">
                                                <a href="{{ route('shop-detail') }}">
                                                    <img src="{{ asset('assets/img/product/items-2.png')}}" alt="items">
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
                                <ul class="pegination">
                                    <li>
                                        <a href="#"><span class="my-icon icon-arrow-left"></span></a>
                                    </li>
                                    <li class="active">
                                        <a href="#">1</a>
                                    </li>
                                    <li>
                                        <a href="#">2</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="my-icon icon-arrow-right"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="blog-sidebar__wrapper">
                                <div class="blog-sidebar__widget">
                                    <div class="blog-sidebar__widget-head">
                                        <h4 class="blog-sidebar__widget-title">Search</h4>
                                    </div>
                                    <div class="blog-sidebar__widget-content">
                                        <div class="search-widget">
                                            <form action="#">
                                                <input type="search" placeholder="Search...">
                                                <button type="submit"><span
                                                        class="my-icon icon-magnifying-glass"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-sidebar__widget">
                                    <div class="blog-sidebar__widget-head">
                                        <h4 class="blog-sidebar__widget-title">Category</h4>
                                    </div>
                                    <div class="blog-sidebar__widget-content">
                                        <div class="category-list">
                                            <ul>
                                                <li>
                                                    <span class="my-icon icon-hone-stock"></span>
                                                    <h6>
                                                        <a href="blog-details.html">Honey Packets</a>
                                                    </h6>
                                                </li>
                                                <li>
                                                    <span class="my-icon icon-hone-stock"></span>
                                                    <h6>
                                                        <a href="blog-details.html">Honey&Comb</a>
                                                    </h6>
                                                </li>
                                                <li>
                                                    <span class="my-icon icon-hone-stock"></span>
                                                    <h6>
                                                        <a href="blog-details.html">Raw Energy&Comb</a>
                                                    </h6>
                                                </li>
                                                <li>
                                                    <span class="my-icon icon-hone-stock"></span>
                                                    <h6>
                                                        <a href="blog-details.html">Raw Honey</a>
                                                    </h6>
                                                </li>
                                                <li>
                                                    <span class="my-icon icon-hone-stock"></span>
                                                    <h6>
                                                        <a href="blog-details.html">Unfiltered Honey</a>
                                                    </h6>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-sidebar__widget">
                                    <div class="blog-sidebar__widget-head">
                                        <h4 class="blog-sidebar__widget-title">Filter By Price</h4>
                                    </div>
                                    <div class="blog-sidebar__widget-content">
                                        <div class="my-range-slider" data-slider-double="true" data-min-p="10"
                                            data-max-p="140" data-min-value="10" data-max-value="140">
                                            <div class="my-range-slider-wrapper">
                                                <div class="slider-track"></div>
                                            </div>
                                            <div class="tag-price">
                                                <ul>
                                                    <li>
                                                        <button class="tag">FILTER</button>
                                                    </li>
                                                    <li>
                                                        <p>Price: $<span class="range-min-value">30</span> - $<span
                                                                class="range-max-value">70</span></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="blog-sidebar__widget">
                                    <div class="blog-sidebar__widget-head">
                                        <h4 class="blog-sidebar__widget-title">Tags</h4>
                                    </div>
                                    <div class="blog-sidebar__widget-content">
                                        <div class="tags-widgets">
                                            <ul>
                                                <li><a href="#">Honey</a></li>
                                                <li><a href="#">Cinnamon</a></li>
                                                <li><a href="#">Tips</a></li>
                                                <li><a href="#">Plantations</a></li>
                                                <li><a href="#">Production</a></li>
                                                <li><a href="#">Recipes</a></li>
                                                <li><a href="#">Health</a></li>
                                                <li><a href="#">Beekeeper</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Shop End -->
        </main>

@endsection
