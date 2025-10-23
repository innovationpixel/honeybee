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

        .terms-content {
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
    </style>

<!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold">Terms and Conditions</h1>
            <p class="lead">Please read our terms carefully before using our website or purchasing our products</p>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="sticky-top" style="top: 100px;">
                        <h5 class="mb-3">Quick Navigation</h5>
                        <div class="list-group">
                            <a href="#general" class="list-group-item list-group-item-action">
                                <i class="fas fa-info-circle"></i> General Information
                            </a>
                            <a href="#products" class="list-group-item list-group-item-action">
                                <i class="fas fa-shopping-basket"></i> Products
                            </a>
                            <a href="#pricing" class="list-group-item list-group-item-action">
                                <i class="fas fa-tag"></i> Pricing & Payment
                            </a>
                            <a href="#shipping" class="list-group-item list-group-item-action">
                                <i class="fas fa-shipping-fast"></i> Shipping & Delivery
                            </a>
                            <a href="#returns" class="list-group-item list-group-item-action">
                                <i class="fas fa-undo-alt"></i> Returns & Refunds
                            </a>
                            <a href="#intellectual" class="list-group-item list-group-item-action">
                                <i class="fas fa-copyright"></i> Intellectual Property
                            </a>
                            <a href="#liability" class="list-group-item list-group-item-action">
                                <i class="fas fa-balance-scale"></i> Limitation of Liability
                            </a>
                            <a href="#privacy" class="list-group-item list-group-item-action">
                                <i class="fas fa-user-shield"></i> Privacy
                            </a>
                            <a href="#changes" class="list-group-item list-group-item-action">
                                <i class="fas fa-sync-alt"></i> Changes to Terms
                            </a>
                            <a href="#contact" class="list-group-item list-group-item-action">
                                <i class="fas fa-envelope"></i> Contact Us
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="terms-content">
                        <div class="alert alert-warning" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            By accessing or using our website, you agree to these Terms. Please read them carefully.
                        </div>

                        <section id="general" class="mb-5">
                            <h3 class="section-title">General Information</h3>
                            <p>This website is owned and operated by Hunzzz honey located in the UK.</p>
                            <p>By using this site, you confirm that you are at least 18 years old or are using it with
                                the consent of a parent or guardian.</p>
                        </section>

                        <section id="products" class="mb-5">
                            <h3 class="section-title">Products</h3>
                            <p>We offer natural honey and related products.</p>
                            <p>While we strive for accuracy, product descriptions, pricing, and availability may change
                                without notice.</p>
                            <p>We make no guarantees that all products displayed on our site will always be available.
                            </p>
                        </section>

                        <section id="pricing" class="mb-5">
                            <h3 class="section-title">Pricing and Payment</h3>
                            <p>All prices are listed in £ pound currency and include/exclude applicable taxes as stated.
                            </p>
                            <p>We accept payments through:</p>
                            <ul>
                                <li>Credit/Debit cards</li>
                                <li>PayPal</li>
                                <li>Bank transfers</li>
                            </ul>
                            <p>By placing an order, you confirm that you are authorized to use the chosen payment
                                method.</p>
                        </section>

                        <section id="shipping" class="mb-5">
                            <h3 class="section-title">Shipping and Delivery</h3>
                            <p>Orders are processed within 2 business days after payment confirmation.</p>
                            <p>Delivery times depend on your location and shipping provider.</p>
                            <div class="highlight-box">
                                <i class="fas fa-exclamation-circle"></i> We are not responsible for delays or damages
                                caused by third-party couriers.
                            </div>
                        </section>

                        <section id="returns" class="mb-5">
                            <h3 class="section-title">Returns and Refunds</h3>
                            <p>Here's a detailed description of product returns, suitable for use in a company policy,
                                website section, or internal documentation.</p>

                            <h5>Product Returns</h5>
                            <p>Product returns refer to the process in which customers send back purchased goods to the
                                seller or manufacturer for various reasons.</p>
                            <p>Returns are an essential component of customer service and supply chain management,
                                allowing businesses to maintain trust and customer satisfaction while ensuring product
                                quality and compliance with policies.</p>

                            <h5>Return Eligibility</h5>
                            <p>Customers may return products for several reasons, including:</p>
                            <ul>
                                <li><strong>Defective or damaged items:</strong> Products that arrive broken,
                                    malfunctioning, or not as described.</li>
                                <li><strong>Incorrect product shipped:</strong> The wrong size, color, or model was
                                    delivered.</li>
                                <li><strong>Product not matching description:</strong> The item differs from online
                                    images or specifications.</li>
                            </ul>
                        </section>

                        <section id="intellectual" class="mb-5">
                            <h3 class="section-title">Intellectual Property</h3>
                            <p>All content on this website — including text, images, graphics, and logos — is the
                                property of Hunzzz honey and protected by copyright laws.</p>
                            <p>You may not reproduce, distribute, or use our content without written permission.</p>
                        </section>

                        <section id="liability" class="mb-5">
                            <h3 class="section-title">Limitation of Liability</h3>
                            <p>We are not liable for any damages arising from the use or misuse of our products or
                                website.</p>
                            <div class="highlight-box">
                                <i class="fas fa-exclamation-triangle"></i> Honey is a natural product — individuals
                                allergic to bee products should avoid consumption. Always consult a healthcare
                                professional before using our products if you have health concerns.
                            </div>
                        </section>

                        <section id="privacy" class="mb-5">
                            <h3 class="section-title">Privacy</h3>
                            <p>Your privacy is important to us. Please review our <a href="#"
                                    class="text-warning">Privacy Policy</a> to understand how we collect, use, and
                                protect your personal data.</p>
                        </section>

                        <section id="changes" class="mb-5">
                            <h3 class="section-title">Changes to Terms</h3>
                            <p>We may update these Terms from time to time. Any changes will be posted on this page with
                                the updated date. Continued use of our website after changes means you accept the
                                revised Terms.</p>
                        </section>

                        <section id="contact" class="mb-5">
                            <h3 class="section-title">Contact Us</h3>
                            <p>For any questions or concerns regarding these Terms, please contact us at:</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="fas fa-envelope text-warning"></i>
                                            Hunzzzhoney@outlook.com</li>
                                        <li class="mb-2"><i class="fas fa-map-marker-alt text-warning"></i> [business
                                            address]</li>
                                        <li class="mb-2"><i class="fas fa-phone text-warning"></i> [phone number]</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Business Hours</h5>
                                            <p class="card-text">
                                                Monday - Friday: 9:00 AM - 6:00 PM<br>
                                                Saturday: 10:00 AM - 4:00 PM<br>
                                                Sunday: Closed
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="text-center mt-5">
                            <p class="text-muted">Last updated: October 2023</p>
                        </div>
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