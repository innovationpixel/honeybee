@extends('layouts.admin')

@section('html')

    <main>
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

        <section class="shop v1 pb-xl-spach">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="products">
                            <div class="pro-display-header">
                                @if($products->count() > 0 && isset($products))
                                    <div class="pro-left pagination-summary text-center mb-3">
                                        <p>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                                    </div>
                                @endif
                                <div class="pro-right">
                                    <!-- <select class="page-select">
                                        <option>6 per page</option>
                                        <option>9 per page</option>
                                        <option selected>12 per page</option>
                                    </select> -->
                                    <!-- <form id="sortingForm" method="GET" action="{{ url('/shop') }}">
                                        <div class="form-group">
                                            <label for="sort_by">Sort Products</label>
                                            <select name="sort_by" id="sort_by" class="form-control no-custom-select" onchange="this.form.submit()">
                                                <option value="">Default sorting</option>
                                                <option value="new_arrivals" {{ request('sort_by') == 'new_arrivals' ? 'selected' : '' }}>Sort by latest</option>
                                                <option value="popularity" {{ request('sort_by') == 'popularity' ? 'selected' : '' }}>Sort by popularity</option>
                                                <option value="low_to_high" {{ request('sort_by') == 'low_to_high' ? 'selected' : '' }}>Price low to high</option>
                                                <option value="high_to_low" {{ request('sort_by') == 'high_to_low' ? 'selected' : '' }}>Price high to low</option>
                                            </select>
                                        </div>
                                    </form> -->
                                </div>
                            </div>
                            <div id="product-list">
                                @include('partials.product-list', ['products' => $products])
                            </div>
                            
                            <!-- <ul class="pegination">
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
                            </ul> -->
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
                                        <form method="GET" action="{{ url('/shop') }}">
                                            <input type="hidden" name="sorting" value="{{ request('sorting') }}">
                                            <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                                            <input type="search" name="search" value="{{ request('search') }}" placeholder="Search...">
                                            <button type="submit"><span class="my-icon icon-magnifying-glass"></span></button>
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
                                            @if( isset($categories) && !empty($categories) )
                                                @foreach($categories as $category)
                                                    <li>
                                                        <span class="my-icon icon-hone-stock"></span>
                                                        <h6><a href="{{ route('shop', ['category_id' => $category->id, 'search' => request('search'), 'sorting' => request('sorting')] ) }}">{{ $category->name }}</a></h6>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-sidebar__widget">
                                <div class="blog-sidebar__widget-head">
                                    <h4 class="blog-sidebar__widget-title">Filter By Price</h4>
                                </div>
                                <div class="blog-sidebar__widget-content">
                                    <div class="my-range-slider" data-slider-double="true" data-min-p="10" data-max-p="140" data-min-value="10" data-max-value="140">
                                        <div class="my-range-slider-wrapper">
                                            <div class="slider-track"></div>
                                        </div>
                                        <div class="tag-price">
                                            <ul>
                                                <li>
                                                    <button class="tag">FILTER</button>
                                                </li>
                                                <li>
                                                    <p>Price: $<span class="range-min-value">30</span> - $<span class="range-max-value">70</span></p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="blog-sidebar__widget">
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
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@section('script')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const filterButton = document.querySelector('.tag');
            const minDisplay = document.querySelector('.range-min-value');
            const maxDisplay = document.querySelector('.range-max-value');
            const sliderContainer = document.querySelector('.my-range-slider');

            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);

            const priceMin = parseInt(params.get('price_min')) || parseInt(sliderContainer.dataset.minP);
            const priceMax = parseInt(params.get('price_max')) || parseInt(sliderContainer.dataset.maxP);

            minDisplay.innerText = priceMin;
            maxDisplay.innerText = priceMax;

            sliderContainer.dataset.minValue = priceMin;
            sliderContainer.dataset.maxValue = priceMax;

            filterButton.addEventListener('click', function () {
                const min = minDisplay.innerText;
                const max = maxDisplay.innerText;

                params.set('price_min', min);
                params.set('price_max', max);

                window.location.href = `${url.pathname}?${params.toString()}`;
            });
        });

        $('select').not('.no-custom-select').niceSelect();

        // $('#sort_by').on('change', function () {
        //     let form = $('#sortingForm');
        //     let url = form.attr('action');
        //     let data = form.serialize();

        //     $.ajax({
        //         url: url,
        //         type: 'GET',
        //         data: data,
        //         success: function (response) {
        //             $('#product-list').html(response.html);
        //             window.history.pushState({}, '', url + '?' + data);
        //         },
        //         error: function () {
        //             alert('Failed to load sorted products.');
        //         }
        //     });
        // });

    </script>

@endsection