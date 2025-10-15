@extends('layouts.admin')
@section('html')

  <!-- Swiper Slider -->
  <div class="section" id="one">
    <div class="one">
      <img class="slider-top-img" id="leaf"
        src="https://preview.vwthemesdemo.com/vw-honey-shop-pro/wp-content/themes/vw-honey-shop-pro/assets/images/slider/slider-top.png"
        alt="Image" />
      <h1 data-text="Hunz Honey">Hunz Honey</h1>
      <img id="fanta" src="{{ asset('./Images/bottle.png')}}" alt="" />
    </div>
    <div class="main-div">
      <svg xmlns="http://www.w3.org/2000/svg" height="100%" viewBox="0 0 283.5 27.8"
        preserveAspectRatio="xMidYMax slice">
        <path class="elementor-shape-fill"
          d="M0 0v1.4c.6.7 1.1 1.4 1.4 2 2 3.8 2.2 6.6 1.8 10.8-.3 3.3-2.4 9.4 0 12.3 1.7 2 3.7 1.4 4.6-.9 1.4-3.8-.7-8.2-.6-12 .1-3.7 3.2-5.5 6.9-4.9 4 .6 4.8 4 4.9 7.4.1 1.8-1.1 7 0 8.5.6.8 1.6 1.2 2.4.5 1.4-1.1.1-5.4.1-6.9.1-3.7.3-8.6 4.1-10.5 5-2.5 6.2 1.6 5.4 5.6-.4 1.7-1 9.2 2.9 6.3 1.5-1.1.7-3.5.5-4.9-.4-2.4-.4-4.3 1-6.5.9-1.4 2.4-3.1 4.2-3 2.4.1 2.7 2.2 4 3.7 1.5 1.8 1.8 2.2 3 .1 1.1-1.9 1.2-2.8 3.6-3.3 1.3-.3 4.8-1.4 5.9-.5 1.5 1.1.6 2.8.4 4.3-.2 1.1-.6 4 1.8 3.4 1.7-.4-.3-4.1.6-5.6 1.3-2.2 5.8-1.4 7 .5 1.3 2.1.5 5.8.1 8.1s-1.2 5-.6 7.4c1.3 5.1 4.4.9 4.3-2.4-.1-4.4-2-8.8-.5-13 .9-2.4 4.6-6.6 7.7-4.5 2.7 1.8.5 7.8.2 10.3-.2 1.7-.8 4.6.2 6.2.9 1.4 2 1.5 2.6-.3.5-1.5-.9-4.5-1-6.1-.2-1.7-.4-3.7.2-5.4 1.8-5.6 3.5 2.4 6.3.6 1.4-.9 4.3-9.4 6.1-3.1.6 2.2-1.3 7.8.7 8.9 4.2 2.3 1.5-7.1 2.2-8 3.1-4 4.7 3.8 6.1 4.1 3.1.7 2.8-7.9 8.1-4.5 1.7 1.1 2.9 3.3 3.2 5.2.4 2.2-1 4.5-.6 6.6 1 4.3 4.4 1.5 4.4-1.7 0-2.7-3-8.3 1.4-9.1 4.4-.9 7.3 3.5 7.8 6.9.3 2-1.5 10.9 1.3 11.3 4.1.6-3.2-15.7 4.8-15.8 4.7-.1 2.8 4.1 3.9 6.6 1 2.4 2.1 1 2.3-.8.3-1.9-.9-3.2 1.3-4.3 5.9-2.9 5.9 5.4 5.5 8.5-.3 2-1.7 8.4 2 8.1 6.9-.5-2.8-16.9 4.8-18.7 4.7-1.2 6.1 3.6 6.3 7.1.1 1.7-1.2 8.1.6 9.1 3.5 2 1.9-7 2-8.4.2-4 1.2-9.6 6.4-9.8 4.7-.2 3.2 4.6 2.7 7.5-.4 2.2 1.3 8.6 3.8 4.4 1.1-1.9-.3-4.1-.3-6 0-1.7.4-3.2 1.3-4.6 1-1.6 2.9-3.5 5.1-2.9 2.5.6 2.3 4.1 4.1 4.9 1.9.8 1.6-.9 2.3-2.1 1.2-2.1 2.1-2.1 4.4-2.4 1.4-.2 3.6-1.5 4.9-.5 2.3 1.7-.7 4.4.1 6.5.6 1.5 2.1 1.7 2.8.3.7-1.4-1.1-3.4-.3-4.8 1.4-2.5 6.2-1.2 7.2 1 2.3 4.8-3.3 12-.2 16.3 3 4.1 3.9-2.8 3.8-4.8-.4-4.3-2.1-8.9 0-13.1 1.3-2.5 5.9-5.7 7.9-2.4 2 3.2-1.3 9.8-.8 13.4.5 4.4 3.5 3.3 2.7-.8-.4-1.9-2.4-10 .6-11.1 3.7-1.4 2.8 7.2 6.5.4 2.2-4.1 4.9-3.1 5.2 1.2.1 1.5-.6 3.1-.4 4.6.2 1.9 1.8 3.7 3.3 1.3 1-1.6-2.6-10.4 2.9-7.3 2.6 1.5 1.6 6.5 4.8 2.7 1.3-1.5 1.7-3.6 4-3.7 2.2-.1 4 2.3 4.8 4.1 1.3 2.9-1.5 8.4.9 10.3 4.2 3.3 3-5.5 2.7-6.9-.6-3.9 1-7.2 5.5-5 4.1 2.1 4.3 7.7 4.1 11.6 0 .8-.6 9.5 2.5 5.2 1.2-1.7-.1-7.7.1-9.6.3-2.9 1.2-5.5 4.3-6.2 4.5-1 7.7 1.5 7.4 5.8-.2 3.5-1.8 7.7-.5 11.1 1 2.7 3.6 2.8 5 .2 1.6-3.1 0-8.3-.4-11.6-.4-4.2-.2-7 1.8-10.8 0 0-.1.1-.1.2-.2.4-.3.7-.4.8v.1c-.1.2-.1.2 0 0v-.1l.4-.8c0-.1.1-.1.1-.2.2-.4.5-.8.8-1.2V0H0zM282.7 3.4z">
        </path>
      </svg>
    </div>
  </div>
  <div class="section" id="two">
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
                <h2>Beeberry Honey is One Iconic Brand.</h2>
                <p>For over 27 years, our family has been keeping bees around Beechworth producing pure and natural
                  Australian
                  honey. Traditions, techniques, and tales are now being passed from the 4th to the 5th generation.</p>
              </div>
              <ul class="check-mark-list v2 mt-5">
                <li>
                  <span class="my-icon icon-check"></span>
                  <h6>Promotes burn and wound healing</h6>
                </li>
                <li>
                  <span class="my-icon icon-check"></span>
                  <h6>Better for blood sugar levels than regular sugar</h6>
                </li>
                <li>
                  <span class="my-icon icon-check"></span>
                  <h6>May help suppress coughing in children</h6>
                </li>
              </ul>
              <a href="{{ route('about') }}" class="link-anime v2 mt-5">read our story</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section py-5" id="three">
    <div class="container">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="product-card v1">
              <div class="product-img">
                <a href="{{ route('shop-detail') }}">
                  <img src="{{ asset('./Images/bottle.png')}}" alt="items">
                </a>
              </div>
              <div class="product-content">
                <h4><a href="{{ route('shop-detail') }}">Premium Honey</a></h4>
                <h5>$10.50 <del>$12.50</del></h5>
                <p>Weight: <strong>1KG</strong></p>
              </div>
              <ul class="shop-btns">
                <li><a href="#"><span class="my-icon icon-heart"></span></a></li>
                <li><a href="{{ route('cart') }}"><span class="my-icon icon-shop-bag"></span></a></li>
              </ul>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="product-card v1">
              <div class="product-img">
                <a href="{{ route('shop-detail') }}">
                  <h1>&nbsp;</h1>
                </a>
              </div>
              <div class="product-content">
                <h4><a href="{{ route('shop-detail') }}">Organic Honey</a></h4>
                <h5>$12.50</h5>
                <p>Weight: <strong>1KG</strong></p>
              </div>
              <ul class="shop-btns">
                <li><a href="#"><span class="my-icon icon-heart"></span></a></li>
                <li><a href="{{ route('cart') }}"><span class="my-icon icon-shop-bag"></span></a></li>
              </ul>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="product-card v1">
              <div class="product-img">
                <a href="{{ route('shop-detail') }}">
                  <img src="{{ asset('./Images/bottle.png')}}" alt="items">
                </a>
              </div>
              <div class="product-content">
                <h4><a href="{{ route('shop-detail') }}">Jarrah Honey</a></h4>
                <h5>$13.50</h5>
                <p>Weight: <strong>1KG</strong></p>
              </div>
              <ul class="shop-btns">
                <li><a href="#"><span class="my-icon icon-heart"></span></a></li>
                <li><a href="{{ route('cart') }}"><span class="my-icon icon-shop-bag"></span></a></li>
              </ul>
            </div>
          </div>

        </div>

        <!-- Navigation buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

      </div>
    </div>
  </div>

  <section class="our-services v1" id="our_services" id="four">
    <div class="container">
      <div class="section-title-center v1">
        <h6>Our Services</h6>
        <h2>We Provide The Best Quality</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-xl-3">
          <div class="service-card">
            <div class="my-icon icon-honeycomb"></div>
            <h4><a href="{{ route('service-detail') }}">Honey Production</a></h4>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="service-card">
            <div class="my-icon icon-bee-jar-flay"></div>
            <h4><a href="{{ route('service-detail') }}">Beekeeping Classes</a></h4>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="service-card">
            <div class="my-icon icon-hone-shop-bag"></div>
            <h4><a href="{{ route('service-detail') }}">Honey Shop</a></h4>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="service-card">
            <div class="my-icon icon-honey-sarf"></div>
            <h4><a href="{{ route('service-detail') }}">Swarm Removal</a></h4>
          </div>
        </div>
      </div>
      <div class="more-link">
        <a class="link-anime v1" href="{{ route('service-detail') }}">more services</a>
      </div>
    </div>
  </section>
  <!-- Our Services End -->
  <!-- Why Us Start-->
  <section class="why-us v1" id="five">
    <div class="container">
      <div class="section-title-center v1">
        <h6>Why Us</h6>
        <h2>Why Choose Our Products</h2>
      </div>
      <div class="row">
        <div class="col-xl-4">
          <div class="big-pic wow animate__fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
            <img src="https://dropbelaravel.bracketweb.com/assets/images/products/product-1-4.png" alt="pic">
          </div>
        </div>
        <div class="col-md-6 col-xl-4 order-xl-first">
          <ul class="list-1">
            <li class="wow animate__fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
              <div class="my-icon icon-bee"></div>
              <div class="text">
                <h5>Natural Bees</h5>
                <p>Honey starts as flower nectar collected by bees, which broken .</p>
              </div>
            </li>
            <li class="wow animate__fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
              <div class="my-icon icon-flower-bee"></div>
              <div class="text">
                <h5>Flower Products</h5>
                <p>Honey starts as flower nectar collected by bees, which broken .</p>
              </div>
            </li>
            <li class="wow animate__fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
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
            <li class="wow animate__fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
              <div class="my-icon icon-bees-seal-cells"></div>
              <div class="text">
                <h5>Bees Seal Cells</h5>
                <p>Honey starts as flower nectar collected by bees, which broken .</p>
              </div>
            </li>
            <li class="wow animate__fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
              <div class="my-icon icon-bee-jar"></div>
              <div class="text">
                <h5>100 % Naturally</h5>
                <p>Honey starts as flower nectar collected by bees, which broken .</p>
              </div>
            </li>
            <li class="wow animate__fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
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
  <div class="grid-banner-section section" id="six">
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
  </div>

  <div class="testimonial-section section" id="seven">
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
  </div>

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
  </div>

@endsection
