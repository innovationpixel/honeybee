@extends('layouts.admin')

@section('html')

    <style>
        :root {
            --primary-color: #ff9900;
            --secondary-color: #663300;
            --light-color: #fff9e6;
            --dark-color: #333333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--dark-color);
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .hero-section {
            background: linear-gradient(rgba(255, 153, 0, 0.8), rgba(255, 153, 0, 0.9)), url('https://images.unsplash.com/photo-1587049633312-d628ae50a8ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .section-title {
            color: var(--secondary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .policy-content {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
        }

        .highlight-box {
            background-color: var(--light-color);
            border-left: 4px solid var(--primary-color);
            padding: 15px;
            margin: 20px 0;
        }

        footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 40px 0 20px;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .social-icons a {
            color: white;
            font-size: 1.2rem;
            margin-right: 15px;
        }

        .social-icons a:hover {
            color: var(--primary-color);
        }

        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .back-to-top:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        .list-group-item {
            border: none;
            padding-left: 0;
        }

        .list-group-item i {
            color: var(--primary-color);
            margin-right: 10px;
        }

        .info-card {
            border-left: 4px solid var(--primary-color);
            background-color: var(--light-color);
        }

        .update-badge {
            background-color: var(--primary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-left: 10px;
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold">Privacy Policy</h1>
            <p class="lead">We are committed to protecting your personal information and your right to privacy</p>
            <span class="update-badge">Last Updated: October 2025</span>
        </div>
    </section>

    <!-- Policy Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="sticky-top" style="top: 100px;">
                        <h5 class="mb-3">Quick Navigation</h5>
                        <div class="list-group">
                            <a href="#introduction" class="list-group-item list-group-item-action">
                                <i class="fas fa-info-circle"></i> Introduction
                            </a>
                            <a href="#information-collected" class="list-group-item list-group-item-action">
                                <i class="fas fa-database"></i> Information We Collect
                            </a>
                            <a href="#information-use" class="list-group-item list-group-item-action">
                                <i class="fas fa-cogs"></i> How We Use Information
                            </a>
                            <a href="#information-sharing" class="list-group-item list-group-item-action">
                                <i class="fas fa-share-alt"></i> Sharing Information
                            </a>
                            <a href="#data-security" class="list-group-item list-group-item-action">
                                <i class="fas fa-shield-alt"></i> Data Security
                            </a>
                            <a href="#cookies" class="list-group-item list-group-item-action">
                                <i class="fas fa-cookie-bite"></i> Cookies
                            </a>
                            <a href="#your-rights" class="list-group-item list-group-item-action">
                                <i class="fas fa-user-check"></i> Your Rights
                            </a>
                            <a href="#contact" class="list-group-item list-group-item-action">
                                <i class="fas fa-envelope"></i> Contact Us
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="policy-content">
                        <div class="alert alert-info" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            At Hunzzz Honey, we respect your privacy and are committed to protecting your personal
                            information.
                        </div>

                        <section id="introduction" class="mb-5">
                            <h3 class="section-title">Introduction</h3>
                            <p>This Privacy Policy explains how we collect, use, and safeguard your information when you
                                visit or make a purchase from our website.</p>
                            <p>By using our website, you consent to the data practices described in this policy. If you
                                do not agree with our policies and practices, please do not use our website.</p>
                        </section>

                        <section id="information-collected" class="mb-5">
                            <h3 class="section-title">Information We Collect</h3>
                            <p>When you use our website, we may collect the following types of information:</p>

                            <div class="row mt-4">
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100 info-card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-user text-warning"></i> Personal
                                                Information</h5>
                                            <p class="card-text">We collect personal details that you provide when
                                                making a purchase or creating an account:</p>
                                            <ul>
                                                <li>Full name</li>
                                                <li>Email address</li>
                                                <li>Billing and shipping address</li>
                                                <li>Phone number</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100 info-card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-credit-card text-warning"></i>
                                                Payment Information</h5>
                                            <p class="card-text">Payment details are processed securely by our payment
                                                providers. We do not store your full credit card details on our servers.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100 info-card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-laptop text-warning"></i> Website
                                                Usage Data</h5>
                                            <p class="card-text">We automatically collect technical information to
                                                improve our website:</p>
                                            <ul>
                                                <li>IP address</li>
                                                <li>Browser type and version</li>
                                                <li>How you interact with our site</li>
                                                <li>Pages visited and time spent</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100 info-card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-cookie text-warning"></i> Cookies &
                                                Tracking</h5>
                                            <p class="card-text">We use cookies and similar technologies to enhance your
                                                browsing experience and analyze site traffic.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="information-use" class="mb-5">
                            <h3 class="section-title">How We Use Your Information</h3>
                            <p>We use the information we collect for various purposes, including:</p>

                            <div class="row mt-4">
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-shopping-cart text-warning fa-lg"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5>Order Processing</h5>
                                            <p>To process and deliver your orders, send order confirmations, and provide
                                                customer support.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-envelope text-warning fa-lg"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5>Communication</h5>
                                            <p>To communicate with you about your purchases, promotions, or important
                                                updates.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-chart-line text-warning fa-lg"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5>Website Improvement</h5>
                                            <p>To analyze how customers use our website and make improvements to our
                                                services.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-gavel text-warning fa-lg"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5>Legal Compliance</h5>
                                            <p>To comply with applicable laws, regulations, and legal processes.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="information-sharing" class="mb-5">
                            <h3 class="section-title">Sharing Your Information</h3>
                            <p>We do not sell or rent your personal data to third parties. We only share information
                                with trusted partners in the following circumstances:</p>

                            <div class="highlight-box">
                                <h5><i class="fas fa-handshake me-2"></i>Trusted Service Providers</h5>
                                <p>We work with third-party companies and individuals to facilitate our services:</p>
                                <ul>
                                    <li><strong>Payment processors</strong> (e.g., Stripe, PayPal) to handle secure
                                        transactions</li>
                                    <li><strong>Delivery services</strong> to ship your orders and provide tracking
                                        information</li>
                                    <li><strong>Analytics tools</strong> (e.g., Google Analytics) to understand how our
                                        website is used</li>
                                </ul>
                            </div>

                            <p>These third parties have access to your personal information only to perform specific
                                tasks on our behalf and are obligated not to disclose or use it for any other purpose.
                            </p>
                        </section>

                        <section id="data-security" class="mb-5">
                            <h3 class="section-title">Data Security</h3>
                            <p>We implement reasonable technical and organizational safeguards to protect your
                                information from unauthorized access, use, or disclosure.</p>

                            <div class="alert alert-warning mt-3" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Please note that no method of transmission over the Internet or electronic storage is
                                100% secure. While we strive to use commercially acceptable means to protect your
                                personal information, we cannot guarantee its absolute security.
                            </div>
                        </section>

                        <section id="cookies" class="mb-5">
                            <h3 class="section-title">Cookies</h3>
                            <p>Our website may use cookies and similar tracking technologies to enhance your browsing
                                experience, remember your preferences, and analyze site traffic.</p>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <h5>What are cookies?</h5>
                                    <p>Cookies are small text files that are placed on your device when you visit our
                                        website. They help us provide you with a better experience by:</p>
                                    <ul>
                                        <li>Remembering your preferences</li>
                                        <li>Understanding how you use our site</li>
                                        <li>Providing relevant content</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5>Managing Cookies</h5>
                                    <p>You can control or delete cookies through your browser settings. However, please
                                        note that disabling cookies may affect the functionality of our website.</p>
                                    <p>For more information about cookies, visit <a
                                            href="https://www.allaboutcookies.org" target="_blank"
                                            class="text-warning">allaboutcookies.org</a>.</p>
                                </div>
                            </div>
                        </section>

                        <section id="your-rights" class="mb-5">
                            <h3 class="section-title">Your Rights</h3>
                            <p>Depending on your location, you may have certain rights regarding your personal data,
                                including:</p>

                            <div class="row mt-4">
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-eye text-warning fa-lg"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5>Right to Access</h5>
                                            <p>You can request copies of your personal information that we hold.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-edit text-warning fa-lg"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5>Right to Correction</h5>
                                            <p>You can request that we correct any information you believe is
                                                inaccurate.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-trash-alt text-warning fa-lg"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5>Right to Deletion</h5>
                                            <p>You can request that we delete your personal information under certain
                                                conditions.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-ban text-warning fa-lg"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5>Right to Object</h5>
                                            <p>You can object to our processing of your personal information in certain
                                                circumstances.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="highlight-box mt-4">
                                <p>To exercise any of these rights, please contact us at: <a
                                        href="mailto:Hunzzzhoney@outlook.com"
                                        class="text-warning fw-bold">Hunzzzhoney@outlook.com</a></p>
                                <p>We will respond to your request within 30 days.</p>
                            </div>
                        </section>

                        <section id="contact" class="mb-5">
                            <h3 class="section-title">Contact Us</h3>
                            <p>If you have any questions or concerns about this Privacy Policy or our data practices,
                                please contact us:</p>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-envelope text-warning"></i> Email
                                            </h5>
                                            <p class="card-text">Hunzzzhoney@outlook.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-map-marker-alt text-warning"></i>
                                                Address</h5>
                                            <p class="card-text">128 City Road, London EC1V 2NX</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </a>


@endsection

@section('script')

    <script>
        // Back to top button functionality
        document.querySelector('.back-to-top').addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Show/hide back to top button based on scroll position
        window.addEventListener('scroll', function () {
            const backToTopButton = document.querySelector('.back-to-top');
            if (window.pageYOffset > 300) {
                backToTopButton.style.display = 'flex';
            } else {
                backToTopButton.style.display = 'none';
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

@endsection