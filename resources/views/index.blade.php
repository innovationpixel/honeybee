@extends('layouts.admin')

@section('html')

  <section class="section p-0" id="one">
    <div class="one">
      <img class="slider-top-img" id="leaf"
        src="https://preview.vwthemesdemo.com/vw-honey-shop-pro/wp-content/themes/vw-honey-shop-pro/assets/images/slider/slider-top.png"
        alt="Image" />
      <h1 data-text="Hunzzz Honey">Hunzzz Honey</h1>
      <img id="fanta" src="{{ asset('Images/bottle.png')}}" alt="" />
    </div>

  </section>

  <section class="section" id="two">
    <div class="container">
      <div class="two">
        <div class="row">


          <div class="col-lg-6">
            <!-- <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#e04428"
                  d="M41.5,-59.5C49.8,-51.1,49.7,-33.6,50.7,-19.2C51.7,-4.7,53.8,6.7,52.4,18.9C51.1,31.1,46.3,44.1,36.9,52.9C27.6,61.8,13.8,66.5,-2.5,70C-18.8,73.4,-37.7,75.6,-52.5,68.5C-67.3,61.5,-78.2,45.2,-84.5,27.1C-90.9,9,-92.7,-10.8,-80.5,-19.3C-68.3,-27.8,-42.1,-24.8,-26.3,-30.8C-10.6,-36.8,-5.3,-51.7,5.7,-59.5C16.6,-67.3,33.2,-68,41.5,-59.5Z"
                  transform="translate(100 100)" />
              </svg> -->
          </div>

          <div class="col-lg-6">
            <div class="content-left">
              <div class="section-title v1">
                <h6>About Us</h6>
                <h2>Hunzzz Honey – Pure Sidr Honey from Nature’s Heart.</h2>
                <p>
                  At <strong>Hunzzz Honey</strong>, we are dedicated to bringing you the purest and most authentic
                  <strong>Sidr honey</strong> straight from the source. Harvested from the blossoms of the sacred
                  Sidr tree, our honey is known for its rich taste, natural healing power, and cultural heritage.
                  We work closely with trusted beekeepers who follow traditional, ethical, and sustainable methods
                  to ensure every jar is <strong>100% raw, unfiltered, and free from additives</strong>.
                  From hive to home, we promise purity, transparency, and care in every drop.
                  <em>🌿 Pure. Natural. Authentic.</em>
                </p>
              </div>
              <ul class="check-mark-list v2">
                <li>
                  <span class="my-icon icon-check"></span>
                  <h6>100% Raw and Unfiltered Sidr Honey</h6>
                </li>
                <li>
                  <span class="my-icon icon-check"></span>
                  <h6>Ethically Sourced and Sustainably Harvested</h6>
                </li>
                <li>
                  <span class="my-icon icon-check"></span>
                  <h6>Rich in Taste and Natural Healing Properties</h6>
                </li>
              </ul>
              <a href="{{ route('service-detail') }}" class="link-anime v2 mt-4">read our story</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="secttion why-us v1" id="four">
    <div class="container">

      <div class="section-title-center v1">
        <h6>Why Us</h6>
        <h2>Why Choose Our Products</h2>
      </div>
      <div class="row">
        <div class="col-xl-4">
          <div class="big-pic">
            <img src="https://dropbelaravel.bracketweb.com/assets/images/products/product-1-4.png" alt="pic">
          </div>
        </div>
        <div class="col-md-6 col-xl-4 order-xl-first">
          <ul class="list-1">
            <li class="">
              <div class="my-icon icon-bee"></div>
              <div class="text">
                <h5>Natural Bees</h5>
                <p>Honey starts as flower nectar collected by bees, which broken .</p>
              </div>
            </li>
            <li class="">
              <div class="my-icon icon-flower-bee"></div>
              <div class="text">
                <h5>Flower Products</h5>
                <p>Honey starts as flower nectar collected by bees, which broken .</p>
              </div>
            </li>
            <li class="">
              <div class="my-icon icon-honeycomb"></div>
              <div class="text">
                <h5>Honey Comb</h5>
                <p>Honey starts as flower nectar collected by bees, which broken .</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-md-6 col-xl-4">
          <ul class="list-2">
            <li class="">
              <div class="my-icon icon-bees-seal-cells"></div>
              <div class="text">
                <h5>Bees Seal Cells</h5>
                <p>Honey starts as flower nectar collected by bees, which broken .</p>
              </div>
            </li>
            <li class="">
              <div class="my-icon icon-bee-jar"></div>
              <div class="text">
                <h5>100 % Naturally</h5>
                <p>Honey starts as flower nectar collected by bees, which broken .</p>
              </div>
            </li>
            <li class="">
              <div class="my-icon icon-bee-strong"></div>
              <div class="text">
                <h5>Increase Immunity</h5>
                <p>Honey starts as flower nectar collected by bees, which broken .</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </section>





  <section class="section py-5" id="three">
    <div class="container">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">

          @if( isset($products) && !empty($products) )
          @foreach($products as $product)
          <div class="swiper-slide">
            <div class="product-card v1">
              <div class="product-img">
                <a href="{{ route('product-detail', $product->url) }}">
                  @if( isset($product->documentTitle) && !empty($product->documentTitle) )
                  <img src="{{ asset('storage/products/' .$product->documentTitle->encoded_name ) }}"
                    alt="{{ $product->name ?? '' }}">
                  @endif
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
                <li><a class="{{ Auth::id() && $product->wishlist ? 'wishlist_active' : 'add-to-wishlist' }}"
                    data-product-id="{{ $product->id }}"><span class="my-icon icon-heart"></span></a></li>
                <li><a data-product-id="{{ $product->id }}" data-quantity="1"
                    data-price="{{ $discountPercentage > 0 ? $finalPrice : $originalPrice }}"
                    class="add-to-cart-custom"><span class="my-icon icon-shop-bag"></span></a></li>
              </ul>
            </div>
          </div>
          @endforeach
          @endif

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

      </div>
    </div>
  </section>

  <section class="grid-banner-section section" id="three">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="">
            <div class="grid-banner-content">
              <!-- Sub Title -->
              <h6>BUY PURIFIED PRODUCTS AND SAVE 6%</h6>

              <!-- Main Title -->
              <h4>GRAB IT AND SAVE 40%</h4>

              <!-- Description -->
              <p>
                Get the best quality purified honey products at unbeatable
                prices. For a limited time only, enjoy
                <strong>extra 40% OFF</strong> on selected items. Don’t miss
                out on this special seasonal discount — shop now and taste the
                purity!
              </p>

              <!-- Button -->
              <a href="{{ route('cart') }}" class="btn-custom">VIEW MORE</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonial-section section" id="one">
    <div class="container">
      <h2 class="testimonial-title">What Our Clients Say</h2>
      <!-- Swiper -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="testimonial-slide">
              <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Amy" />
              <p>
                "Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. It has been the industry's standard ever
                since the 1500s."
              </p>
              <cite>AMY AMROU</cite>
              <span>New York, US</span>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-slide">
              <img src="https://randomuser.me/api/portraits/men/44.jpg" alt="George" />
              <p>
                "Rhues rueres is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text."
              </p>
              <cite>GEORGE</cite>
              <span>Canada</span>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-slide">
              <img src="https://randomuser.me/api/portraits/women/47.jpg" alt="Sarah" />
              <p>
                "Tellues rhues simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard ever since the 1500s."
              </p>
              <cite>SARAH</cite>
              <span>London, UK</span>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="testimonial-slide">
              <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Amy" />
              <p>
                "Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. It has been the industry's standard ever
                since the 1500s."
              </p>
              <cite>AMY AMROU</cite>
              <span>New York, US</span>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-slide">
              <img src="https://randomuser.me/api/portraits/men/44.jpg" alt="George" />
              <p>
                "Rhues rueres is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text."
              </p>
              <cite>GEORGE</cite>
              <span>Canada</span>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-slide">
              <img src="https://randomuser.me/api/portraits/women/47.jpg" alt="Sarah" />
              <p>
                "Tellues rhues simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard ever since the 1500s."
              </p>
              <cite>SARAH</cite>
              <span>London, UK</span>
            </div>
          </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>

  <section class="brand-logo-slider section" id="eight">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Custom Swiper -->
          <div class="swiper myBrandSwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <a href="#"><img src="https://beeswax-theme.myshopify.com/cdn/shop/files/brlog1x01.png?v=1642678316"
                    alt="Logo 1" /></a>
              </div>
              <div class="swiper-slide">
                <a href="#"><img src="https://beeswax-theme.myshopify.com/cdn/shop/files/brlog1x02.png?v=1642678329"
                    alt="Logo 2" /></a>
              </div>
              <div class="swiper-slide">
                <a href="#"><img src="https://beeswax-theme.myshopify.com/cdn/shop/files/brlog1x03.png?v=1642678346"
                    alt="Logo 3" /></a>
              </div>
              <div class="swiper-slide">
                <a href="#"><img src="https://beeswax-theme.myshopify.com/cdn/shop/files/brlog1x04.png?v=1642678354"
                    alt="Logo 4" /></a>
              </div>
              <div class="swiper-slide">
                <a href="#"><img src="https://beeswax-theme.myshopify.com/cdn/shop/files/brlog1x05.png?v=1642678366"
                    alt="Logo 5" /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="container3D"></div>

@endsection

@section('script')


@endsection