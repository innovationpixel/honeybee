@extends('layouts.admin')
@section('html')
 <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1 bg-cover-center"
                data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/breadcum/bg.jpg">
                <div class="container">
                    <h2>About Us</h2>
                    <ul>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </section>
            <!-- Breadcum End -->
            <!-- About Beeberry Start -->
            <section class="about-beeberry v3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="abou-o-img">
                                <img src="https://techsometimes.com/products/html/beeberry-html/assets/img/about-us/about-1.jpg"
                                    alt="about">
                                <img src="https://techsometimes.com/products/html/beeberry-html/assets/img/about-us/about-2.jpg"
                                    alt="about">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="content-left">
                                <div class="section-title v1">
                                    <h6>About Us</h6>
                                    <h2>Beeberry Honey is One Iconic Brand.</h2>
                                    <p>For over 27 years, our family has been keeping bees around Beechworth producing
                                        pure and natural Australian honey. Traditions, techniques, and tales are now
                                        being passed from the 4th to the 5th generation.</p>
                                </div>
                                <ul class="check-mark-list v2">
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
                                <a href="{{ route('service-detail') }}" class="link-anime v2">read our story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Beeberry End -->
            <!-- Get In Touch Start -->
            <section class="get-in-touch v1 bg-cover-center"
                data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/video-box/bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="box-content">
                                <div class="section-title-white v1">
                                    <h6>Get In Touch</h6>
                                    <h2>Find Us Here. Make Real Results Happen.</h2>
                                </div>
                                <ul class="star-mark star-5">
                                    <li>
                                        <span class="my-icon icon-star"></span>
                                    </li>
                                    <li>
                                        <span class="my-icon icon-star"></span>
                                    </li>
                                    <li>
                                        <span class="my-icon icon-star"></span>
                                    </li>
                                    <li>
                                        <span class="my-icon icon-star"></span>
                                    </li>
                                    <li>
                                        <span class="my-icon icon-star"></span>
                                    </li>
                                </ul>
                                <p>Trust Score 4.6 (Based on 1,500 Reviews)</p>
                                <button class="play-btn v2 venobox" data-vbtype="video" data-maxwidth="800px"
                                    data-autoplay="true" data-href="https://youtu.be/sYNgtwsfhx4?start=65">
                                    <span class="my-icon icon-play-t"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Get In Touch End -->
            <!-- Team Start -->
            <section class="why-us v1" id="five">
                <div class="container">
                    <div class="section-title-center v1">
                        <h6>Why Us</h6>
                        <h2>Why Choose Our Products</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="big-pic wow animate__fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                <img src="https://dropbelaravel.bracketweb.com/assets/images/products/product-1-4.png"
                                    alt="pic">
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
            <!-- <section class="team v1">
                <div class="container">
                    <div class="section-title-center v1">
                        <h6>Amazing Team</h6>
                        <h2>Our Team of Experts</h2>
                    </div>
                    <div class="slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide team-card">
                                <div class="profile-img">
                                    <img src="assets/img/team/team-1.jpg" alt="team">
                                    <ul>
                                        <li class="fb">
                                            <a href="#"><span class="my-icon icon-facebook"></span></a>
                                        </li>
                                        <li class="tw">
                                            <a href="#"><span class="my-icon icon-twitter"></span></a>
                                        </li>
                                        <li class="pin">
                                            <a href="#"><span class="my-icon icon-pinterest-p"></span></a>
                                        </li>
                                        <li class="in">
                                            <a href="#"><span class="my-icon icon-instagram"></span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="profile-info">
                                    <h4>Leslie Alexander</h4>
                                    <p>Beekeeper</p>
                                </div>
                            </div>
                            <div class="swiper-slide team-card">
                                <div class="profile-img">
                                    <img src="assets/img/team/team-2.jpg" alt="team">
                                    <ul>
                                        <li class="fb">
                                            <a href="#"><span class="my-icon icon-facebook"></span></a>
                                        </li>
                                        <li class="tw">
                                            <a href="#"><span class="my-icon icon-twitter"></span></a>
                                        </li>
                                        <li class="pin">
                                            <a href="#"><span class="my-icon icon-pinterest-p"></span></a>
                                        </li>
                                        <li class="in">
                                            <a href="#"><span class="my-icon icon-instagram"></span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="profile-info">
                                    <h4>Savannah Nguyen</h4>
                                    <p>Gardener</p>
                                </div>
                            </div>
                            <div class="swiper-slide team-card">
                                <div class="profile-img">
                                    <img src="assets/img/team/team-3.jpg" alt="team">
                                    <ul>
                                        <li class="fb">
                                            <a href="#"><span class="my-icon icon-facebook"></span></a>
                                        </li>
                                        <li class="tw">
                                            <a href="#"><span class="my-icon icon-twitter"></span></a>
                                        </li>
                                        <li class="pin">
                                            <a href="#"><span class="my-icon icon-pinterest-p"></span></a>
                                        </li>
                                        <li class="in">
                                            <a href="#"><span class="my-icon icon-instagram"></span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="profile-info">
                                    <h4>Cameron Williamson</h4>
                                    <p>Field Technician</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="prev-btn"><span class="my-icon icon-arrow-right-long"></span></button>
                    <button class="next-btn"><span class="my-icon icon-arrow-left-long"></span></button>
                </div>
            </section> -->
            <!-- Team End -->
            <!-- Working Process Start -->
            <section class="working-process bg-cover-center bg-honey-shap-right v1"
                data-background="https://techsometimes.com/products/html/beeberry-html/assets/img/working-process/bg.jpg">
                <div class="container">
                    <div class="section-title-center-white v1">
                        <h6>Working Process</h6>
                        <h2>How We Work For Our Customers</h2>
                    </div>
                    <div class="process-boxs">
                        <ul>
                            <li>
                                <div class="icon-box">
                                    <div class="my-icon icon-sunflower-hony"></div>
                                    <h6 class="num-count">1</h6>
                                </div>
                                <h5>Flowers Produce Nectar and Attract Our Bees</h5>
                            </li>
                            <li>
                                <div class="icon-box">
                                    <div class="my-icon icon-flower-bee"></div>
                                    <h6 class="num-count">2</h6>
                                </div>
                                <h5>Bees Collect the Nectar and Carry It to The Hive</h5>
                            </li>
                            <li>
                                <div class="icon-box">
                                    <div class="my-icon icon-bees-seal-cells"></div>
                                    <h6 class="num-count">3</h6>
                                </div>
                                <h5>Bees Seal Cells With Wax and Honey Ripens</h5>
                            </li>
                            <li>
                                <div class="icon-box">
                                    <div class="my-icon icon-bee-jar"></div>
                                    <h6 class="num-count">4</h6>
                                </div>
                                <h5>We Collect the Product and Transfer it to The Packaging</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Working Process End -->
            <!-- Blog News Start -->
            <!-- Blog News End -->
        </main>
@endsection
