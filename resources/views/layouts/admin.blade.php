<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <title>Hunz Honey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://public.codepenassets.com/css/normalize-5.0.0.min.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/style.css')}}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo/favicon.svg')}}">
    <link rel="icon" href="{{ asset('assets/img/logo/icon.svg')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/all-icons/myicon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/customstyling.css')}}" />
  </head>
  <body>
    <div class="preloder"></div>
    <header>
      <div id="main-wrapper">
        <div class="menu-bar v1">
          <div class="container">
            <div class="menu-bar-content">
              <div class="menu-logo">
                <a href="{{ route('/') }}"><img src="https://dropbelaravel.bracketweb.com/assets/images/logo-dark.png" alt="Logo"></a>
              </div>
              <nav class="main-menu">
                <ul>
                  <li class="">
                    <a href="{{ route('/') }}">Home</a>
                  </li>
                  <li class="">
                    <a href="{{ route('about') }}">About Us</a>
                  </li>
                  <li class="">
                    <a href="{{ route('shop') }}">Shop</a>
                  </li>
                  <li class="">
                    <a href="{{ route('contact') }}">Contact</a>
                  </li>
                </ul>
              </nav>
              <div class="menu-right">
                <ul>
                  <li style="display: none;">
                    <button class="search-open-btn">
                      <span class="my-icon icon-magnifying-glass"></span>
                    </button>
                    <div class="top-bar-search">
                      <button class="search-close">
                        <span class="my-icon icon-close"></span>
                      </button>
                      <form action="#">
                        <input type="search" placeholder="Search...">
                        <button type="submit">
                          <span class="my-icon icon-magnifying-glass"></span>
                        </button>
                      </form>
                    </div>
                  </li>
                  <li>
                    <div class="shop-card-list">
                      <a class="shop-card-btn" href="{{ route('cart') }}">
                        <!-- <span class="price">$458.50</span> -->
                        <span class="my-icon icon-shop-bag"></span>
                        <span class="count">{{ getCartCount() }}</span>
                      </a>
                    </div>
                  </li>
                  <li>
                    <button class="mobile-menu-btn">
                      <span></span>
                      <span></span>
                      <span></span>
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </header>

    @yield('html')

    <footer id="nine">
      <div class="info-footer v1 bg-cover-center" style="margin-top:80px ;"
        data-background="//beeswax-theme.myshopify.com/cdn/shop/files/honey_04de6ac7-7a95-4c9e-a645-6c2e6ab4fd54.png?v=1642766463">
        <div class="container">

          <div class="info-content">
            <div class="row">
              <div class="col-md-6 col-lg-12 col-xl-3">
                <div class="footer__widget">
                  <div class="footer__widget-content">
                    <div class="footer-left">
                      <div class="footer-logo">
                        <a href="{{ route('/') }}">
                          <img src="https://dropbelaravel.bracketweb.com/assets/images/logo-dark.png" alt="Logo">
                        </a>
                      </div>
                      <p>Beeberrry is a leading brand. We are 8 years old and have largest
                        network. Raw honey contains an array of plant chemicals that act as
                        antioxidants.</p>
                      <ul class="socials-links-box v1">
                        <li><a href="#"><span class="my-icon icon-facebook"></span></a></li>
                        <li><a href="#"><span class="my-icon icon-twitter"></span></a></li>
                        <li><a href="#"><span class="my-icon icon-pinterest-p"></span></a></li>
                        <li><a href="#"><span class="my-icon icon-instagram"></span></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="footer__widget">
                  <h4 class="footer__widget-title">Useful Links</h4>
                  <div class="footer__widget-content">
                    <div class="useful-link">
                      <ul>
                        <li><a href="{{ route('contact') }}">Terms &amp; Conditions</a></li>
                        <li><a href="{{ route('contact') }}">Payment Methods</a></li>
                        <li><a href="{{ route('contact') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('contact') }}">Product Complaint</a></li>
                        <li><a href="{{ route('contact') }}">Careers</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="footer__widget">
                  <h4 class="footer__widget-title">Contact Us</h4>
                  <div class="footer__widget-content">
                    <div class="info-link">
                      <p>4517 Washington Ave. Manchester, Kentucky 39495</p>
                      <ul>
                        <li>
                          <a href="#">
                            <span class="my-icon icon-phone"></span>
                            <span class="text">+91-562 687 8900</span>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span class="my-icon icon-envelope"></span>
                            <span class="text">bill.sanders@example.com</span>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span class="my-icon icon-envelope"></span>
                            <span class="text">deanna.curtis@example.com</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="footer__widget">
                  <h4 class="footer__widget-title">Instagram</h4>
                  <div class="footer__widget-content">
                    <div class="insta-gallry">
                      <ul>
                        <li><a href="#"><img src="{{ asset('assets/img/footer/insta-1.png')}}" alt="insta"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/img/footer/insta-2.png')}}" alt="insta"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/img/footer/insta-3.png')}}" alt="insta"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/img/footer/insta-4.png')}}" alt="insta"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/img/footer/insta-5.png')}}" alt="insta"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/img/footer/insta-6.png')}}" alt="insta"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="main-footer">
            <div class="left-text">
              <p>Copyright © 2025 by <a href="{{ route('/') }}">Beeberry</a>, All Rights Reserved.</p>
            </div>
            <div class="pement-img">
              <img src="{{ asset('assets/img/footer/pement.png')}}" alt="pement">
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="{{ asset('assets/script.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins.js')}}"></script>
    <script src="{{ asset('assets/js/index.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js" integrity="sha512-Ic9xkERjyZ1xgJ5svx3y0u3xrvfT/uPkV99LBwe68xjy/mGtO+4eURHZBW2xW4SZbFrF1Tf090XqB+EVgXnVjw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/bootle.js') }}"></script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          1200: {
            slidesPerView: 3,
          },
        },
      });
    </script>

    @yield('script')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    @if(session('success'))
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: "{{ session('success') }}",
          timer: 3000,
          showConfirmButton: false
        });
      </script>
    @endif
    
    @if(session('error'))
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: "{{ session('error') }}",
        });
      </script>
    @endif

    <script type="text/javascript">
      $(document).on('click', '.add-to-cart-custom', function (e) {
          e.preventDefault();

          let productId = $(this).data('product-id');
          let quantity = $(this).data('quantity');
          let price = $(this).data('price');

          $.ajax({
              url: `{{ route('add_to_cart') }}`,
              method: 'POST',
              data: {
                  _token: $('meta[name="csrf-token"]').attr('content'),
                  product_id: productId,
                  quantity: quantity,
                  price:price
              },
              beforeSend: function () {
                  $("#loader").show();
                  $("#blur-bg").show();
              },
              success: function (response) {
                  $('.shop-card-btn .count').text(response.cartCount);
                  Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Product added to cart!',
                    timer: 3000,
                    showConfirmButton: false
                  });
                  // setTimeout(() => location.reload(), 1500);
              },
              complete: function () {
                  $("#loader").hide();
                  $("#blur-bg").hide();
              },
              error: function (xhr) {
                  alert('Error adding item to cart');
              }
          });
      });

      $(document).on('click', '.add-to-cart-custom-detail', function (e) {
          e.preventDefault();

          let productId = $(this).data('product-id');
          let quantity = $('#quantity_detail').val();
          let sizeId = $('.size-selector:checked').val();
          let pot = $('.pot-selector:checked').val();
          let priceText = $('#price-display-' + productId).text();
          let price = priceText.replace('AED', '').trim();

          // let sizeId = $('#size-selector').val();
          // let pot = $('#pot-selector').val();

          $.ajax({
              url: `{{ route('add_to_cart') }}`,
              method: 'POST',
              data: {
                  _token: $('meta[name="csrf-token"]').attr('content'),
                  product_id: productId,
                  quantity: quantity,
                  size_id: sizeId,
                  pot: pot,
                  price:price
              },
              beforeSend: function () {
                  $('.ajax-loader').fadeIn();
              },
              success: function (response) {
                  $('.minicart-btn .quantity').text(response.cartCount);
                  window.location.reload();
              },
              complete: function () {
                  $('.ajax-loader').fadeOut();
              },
              error: function (xhr) {
                  alert('Error adding item to cart');
              }
          });
      });

      $(document).on('click', '.add-to-wishlist', function(e) {
          e.preventDefault();

          let productId = $(this).data('product-id');

          $.ajax({
              url: `{{ route('add-to-wishlist') }}`,
              type: 'POST',
              data: {
                product_id: productId,
                _token: '{{ csrf_token() }}'
              },
              success: function(response) {
                if (response.success) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Product added to wishlist!',
                    timer: 3000,
                    showConfirmButton: false
                  });
                } else {
                  alert(response.message);
                }
              },
              beforeSend: function () {
                $('.ajax-loader').fadeIn();
              },
              complete: function () {
                $('.ajax-loader').fadeOut();
              },
              error: function(xhr) {
                if (xhr.status === 401) {
                    $('#loginModal').modal('show');
                } else {
                    alert('An error occurred. Please try again later.');
                }
              }
          });
      });

      function removeFromCart(id) {
          if (confirm('Are you sure you want to remove this item from your cart?')) {
              $.ajax({
                  url: "{{ route('remove_from_cart') }}",
                  method: 'POST',
                  data: {
                      _token: "{{ csrf_token() }}",
                      id: id,
                  },
                  success: function(response) {
                      if (response.status === 'success') {
                          window.location.reload();
                      }
                  },
                  error: function(xhr) {
                      alert('Failed to remove the item. Please try again.');
                  }
              });
          }
      }

      function removeFromWishlist(id) {
          if (confirm('Are you sure you want to remove this item from your Wishlist?')) {
              $.ajax({
                  url: "{{ route('remove-from-wishlist') }}",
                  method: 'POST',
                  data: {
                      _token: "{{ csrf_token() }}",
                      id: id,
                  },
                  success: function(response) {
                      if (response.status === 'success') {
                          window.location.reload();
                      }
                  },
                  error: function(xhr) {
                      alert('Failed to remove the item. Please try again.');
                  }
              });
          }
      }
    </script>

  </body>

</html>
