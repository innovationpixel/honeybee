<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="robots" content="noindex,nofollow">

  @if( !empty($title) )
  <title>{{ $title }}</title>
  @else
  <title>Admin Portal | Honey Bee </title>

  @endif

    <?php

        $current_route = Route::currentRouteName();

    ?>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/images/plantales-fav.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href=" {{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css')}}">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style2.css')}}" rel="stylesheet">


  <style type="text/css">
    .notification-item.unread {
        background-color: #f8f9fa;
        border-left: 5px solid #1D4A34;
    }

    .notification-item.read {
        background-color: #ffffff;
        border-left: 5px solid transparent;
    }
    /* Loader styles */
    .loader {
        color: #1D4A34 !important;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        display: none;
    }
    .loader .spinner-border {
        width: 3rem;
        height: 3rem;
        border-width: 0.5rem;
    }

    .error {
      color: red;
    }

  </style>
</head>

<body>

    <div id="blur-bg" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.3); backdrop-filter: blur(5px); z-index: 9998;"></div>
    <div id="loader" style="display: none; position: fixed; top: 50%; left: 50%; z-index: 9999; transform: translate(-50%, -50%);">
        <img src="https://i.gifer.com/VAyR.gif" alt="Loading..." style="width: 100px !important;" />
    </div>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('/') }}" class="logo">
        <img src="https://dropbelaravel.bracketweb.com/assets/images/logo-dark.png" alt="Logo">
      </a>
      <i class="toggle-sidebar-btn mr-5"><img src="{{ asset('assets/img/menu.png')}}" style="width: 35px; filter: sepia(1);"></i>
    </div><!-- End Logo -->


    <!--

    <div class="search-bar">
      <form class="search-form d-flex align-items-center w-75 ml-5" method="POST" action="#" style="margin-left: 20px;">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown">

            <!-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-bell"></i>
              <span class="badge badge-number" style="background-color: #1D4A34;">46</span>
            </a>--> <!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <!--<li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li> -->
            <!--<li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li> -->

            <!-- <li>
              <hr class="dropdown-divider">
            </li> -->

            @if(isset($notifications) && $notifications->isNotEmpty())

              @foreach($notifications as $notification)
                  @php
                      $createdAt = new DateTime($notification->created_at);
                      $formattedDate = $createdAt->format('d M Y, H:i');
                      $isRead = $notification->read ? 'read' : 'unread';
                  @endphp

                  <li class="notification-item {{ $isRead }}" data-id="{{ $notification->id }}" style="width: 250px;">
                      <i class="bi bi-check-circle {{ $isRead == 'read' ? 'text-muted' : 'text-success' }}"></i>
                      <div>
                          <h4>{{ $notification->title }}</h4>
                          <p>{{ $notification->description }}</p>
                          <p>{{ $formattedDate }}</p>
                      </div>
                  </li>
                  <li>
                      <hr class="dropdown-divider">
                  </li>
              @endforeach

            @endif


            <!-- <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li> -->
            <!-- <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li> -->

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->


        <!-- Messages Nav -->
        <!-- <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge badge-number" style="background-color: #2d3141;">3</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul>

        </li> -->
        <!-- End Messages Nav -->


        <li class="nav-item dropdown pe-3 user_btn">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/user.png')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::User()->name }}</span>

          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header" style="background-color: #db9d94; color: #ffffff;">
              <h6 style="color: #ffffff;">{{ Auth::User()->name  }}</h6>
              <?php
              $user_role = Auth::User()->role_id;
              $roles = DB::table('roles')
                ->where('id', $user_role)
                ->first();
              ?>
              {{-- <span>{{ $roles->name }}</span> --}}
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <!-- <li>
                <a class="dropdown-item d-flex align-items-center" style="cursor:pointer;" href="" >

                    <i class="fas fa-user"></i>
                  <span>Profile</span>
                </a>
            </li> -->

            <li>
              <a class="dropdown-item d-flex align-items-center" style="cursor:pointer;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>

                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>


          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->

  @include('layouts.sidebar_procurement')

  @yield('pagehtml')

  <!-- ======= Footer ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>




	<!-- Succuess Modal -->


	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade text-center" id="success_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <i class="bx bxs-message-check" style="font-size: 55px;color: #1D4A34;"></i>

		<!-- <i class="bx bxs-message-x" style="font-size: 55px;color: red;"></i> -->

		<h3 class="my-4">Success</h3>

		<p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

		<a href="#" class="form_btn btn btn-primary my-4">Done</a>

      </div>

    </div>
  </div>
</div>






  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('js/jquery.fancybox.min.js')}}" defer=""></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main2.js')}}"></script>

  @yield('pagescript')

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

</body>

</html>
