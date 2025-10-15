@extends('layouts.admin')
@section('html')

  <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1 bg-cover-center" data-background="{{ asset('assets/img/breadcum/bg.jpg')}}">
                <div class="container">
                    <h2>Our Services</h2>
                    <ul>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>Our Services</li>
                    </ul>
                </div>
            </section>
            <!-- Breadcum End -->
            <!-- Our Services Start -->
            <section class="our-services v2">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-lg-6 col-xl-5 order-lg-1">
                            <div class="right-content">
                                <div class="check-our-profile">
                                    <img src="{{ asset('assets/img/check-our-range/profile-img-1.jpg')}}" alt="profile-img">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            <div class="content-left">
                                <div class="section-title v1">
                                    <h6>Our Services</h6>
                                    <h2>Check Our Range of Services</h2>
                                </div>
                                <ul>
                                    <li><a href="{{ route('service-detail') }}">Honey Production</a></li>
                                    <li><a href="{{ route('service-detail') }}">Beekeeping Classes</a></li>
                                    <li><a href="{{ route('service-detail') }}">Swarm Removal</a></li>
                                    <li><a href="{{ route('service-detail') }}">Honey Shop</a></li>
                                </ul>
                                <a href="{{ route('service-detail') }}" class="link-anime v1">more services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Our Services End -->
            <!-- Why Us Start-->
            <section class="why-us v1">
                <div class="container">
                    <div class="section-title-center v1">
                        <h6>Why Us</h6>
                        <h2>Why Choose Our Products</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="big-pic wow animate__fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                <img src="{{ asset('assets/img/why-us/big-pic.png')}}" alt="pic">
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
            <!-- Why Us End -->
            <!-- Tasty Honey Start -->
            <section class="tasty-honey v1 pb-xl-spach">
                <div class="container">
                    <div class="section-title-center v1">
                        <h6>Tasty Honey</h6>
                        <h2>Types Of Honey</h2>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 col-xl-4">
                            <div class="tasty-honey-card">
                                <div class="tasty-honey-header">
                                    <div class="my-icon icon-forest-honey"></div>
                                    <h4>01</h4>
                                </div>
                                <div class="tasty-honey-body">
                                    <h4><a href="#">Forest Honey</a></h4>
                                    <p>Organic wild forest honey is the honeydew gathered by bees from wild forest trees
                                        such as holm oak and cork oak trees</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="tasty-honey-card">
                                <div class="tasty-honey-header">
                                    <span class="my-icon icon-creamed-honey"></span>
                                    <h4>02</h4>
                                </div>
                                <div class="tasty-honey-body">
                                    <h4><a href="#">Creamed Honey</a></h4>
                                    <p>Creamed honey is honey that has been processed to control crystallization. Also
                                        known as honey fondant,</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="tasty-honey-card">
                                <div class="tasty-honey-header">
                                    <span class="my-icon icon-bee-jar"></span>
                                    <h4>03</h4>
                                </div>
                                <div class="tasty-honey-body">
                                    <h4><a href="#">Liquid Honey</a></h4>
                                    <p>liquid honey, comb honey, and creamed honey. Sometimes the predominant floral
                                        type from which the honey.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Tasty Honey End -->
        </main>

@endsection