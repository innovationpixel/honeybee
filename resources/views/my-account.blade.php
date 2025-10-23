@extends('layouts.admin')

@section('html')

    <style>
        .account-container {

            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .account-header h2 {
            margin: 0;
            font-weight: 600;
        }

        .account-header p {
            margin: 5px 0 0;
            opacity: 0.9;
        }

        .account-body {
            display: flex;
            min-height: 600px;
        }

        .vertical-tabs {
            width: 250px;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
            padding: 20px 0;
        }

        .vertical-tabs .nav-link {
            font-weight: 500;
            padding: 15px 25px;
            color: #495057;
            border: none;
            border-left: 3px solid transparent;
            border-radius: 0;
            display: flex;
            align-items: center;
        }

        .vertical-tabs .nav-link:hover {
            background-color: #e9ecef;
            border-left-color: #adb5bd;
        }

        .vertical-tabs .nav-link.active {
            color: #0d6efd;
            background-color: #e7f1ff;
            border-left: 3px solid #0d6efd;
        }

        .vertical-tabs .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .tab-content {
            flex: 1;
            padding: 30px;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border: none;
            padding: 10px 25px;
            font-weight: 500;
        }

        .order-card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }

        .order-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .order-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-delivered {
            background-color: #d4edda;
            color: #155724;
        }

        .status-processing {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-shipped {
            background-color: #cce7ff;
            color: #004085;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #e9ecef;
        }

        .profile-section {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 5px;
            background-color: #e9ecef;
        }

        .password-strength-bar {
            height: 100%;
            border-radius: 5px;
            transition: width 0.3s;
        }

        .weak {
            background-color: #dc3545;
            width: 25%;
        }

        .medium {
            background-color: #ffc107;
            width: 50%;
        }

        .strong {
            background-color: #28a745;
            width: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .account-body {
                flex-direction: column;
            }

            .vertical-tabs {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #dee2e6;
            }

            .vertical-tabs .nav {
                flex-direction: row;
                overflow-x: auto;
            }

            .vertical-tabs .nav-link {
                border-left: none;
                border-bottom: 3px solid transparent;
                white-space: nowrap;
            }

            .vertical-tabs .nav-link.active {
                border-left: none;
                border-bottom: 3px solid #0d6efd;
            }
        }
    </style>

    <section class="breadcum v1 bg-cover-center" data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/working-process/bg.jpg">
        <div class="container">
            <h2>My Account</h2>
            <ul>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>My Account</li>
            </ul>
        </div>
    </section>
   
    <div class="container" style="max-width: 1300px; margin-top: 20px;">
        <div class="account-container">
            <div class="account-body">

                <div class="vertical-tabs">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="true">
                            <i class="bi bi-person-fill"></i>Account Details
                        </button>
                        <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders"
                            aria-selected="false">
                            <i class="bi bi-bag-check"></i>Order History
                        </button>
                        <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password"
                            aria-selected="false">
                            <i class="bi bi-shield-lock"></i>Change Password
                        </button>
                        <a class="nav-link dropdown-item d-flex align-items-center" style="cursor:pointer;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form>

                            <i class="bi bi-box-arrow-right"></i>
                            <span>Log Out</span>
                        </a>

                    </div>
                </div>

                <div class="tab-content" id="v-pills-tabContent">

                    <!-- Account Details Tab -->
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="profile-section">
                            <!-- <img src="https://via.placeholder.com/120" alt="Profile Picture" class="profile-img"> -->
                            <div class="profile-info">
                                <h4>{{ Auth()->user()->name ?? '' }}</h4>
                                <p class="text-muted">{{ Auth()->user()->email ?? '' }}</p>
                                <!-- <button class="btn btn-outline-primary btn-sm">Change Photo</button> -->
                            </div>
                        </div>

                        <form method="POST" action="{{ route('user.updateProfile') }}">
                            
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ Auth()->user()->name ?? '' }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ Auth()->user()->email ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" name="phone" id="phone" value="{{ Auth()->user()->phone ?? '' }}" required>
                            </div>

                            
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>

                    <!-- Order History Tab -->
                    <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                        <h4 class="mb-4">Recent Orders</h4>

                        @if(isset($orders) && $orders->isNotEmpty())
                            @foreach ($orders as $order)
                                <div class="order-card mb-3 p-3 border rounded">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="mb-0">Order #ORD-{{ $order->id }}</h5>
                                        <span class="order-status 
                                            @if($order->status === 'delivered') status-delivered
                                            @elseif($order->status === 'pending') status-pending
                                            @elseif($order->status === 'cancelled') status-cancelled
                                            @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </div>

                                    <p class="text-muted mb-2">
                                        Placed on {{ $order->created_at->format('F d, Y') }}
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fw-bold">
                                                ${{ number_format($order->sub_total, 2) }}
                                            </span>
                                            <span class="text-muted ms-2">
                                                • {{ $order->orderProducts->count() }} items
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">You have no recent orders.</p>
                        @endif

                        <!-- <div class="text-center mt-4">
                            <button class="btn btn-outline-secondary">View All Orders</button>
                        </div> -->
                    </div>

                    <!-- Change Password Tab -->
                    <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                        <h4 class="mb-4">Change Password</h4>
                        <form method="POST" action="{{ route('user.updatePassword') }}">
                            
                            @csrf

                            <div class="mb-3">
                                <label for="currentPassword" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword" name="current_password" value="{{ old('current_password') }}">
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="new_password" value="{{ old('new_password') }}">
                                <div class="form-text">Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.</div>
                            </div>
                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </form>

                        <div class="mt-5">
                            <h5>Security Tips</h5>
                            <ul class="text-muted">
                                <li>Use a unique password for each account</li>
                                <li>Change your password regularly</li>
                                <li>Avoid using personal information in your password</li>
                                <li>Consider using a password manager</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection