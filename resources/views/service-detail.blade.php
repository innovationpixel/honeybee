@extends('layouts.admin')
@section('html')
 <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1 bg-cover-center" data-background="{{ asset('assets/img/breadcum/bg.jpg')}}">
                <div class="container">
                    <h2>Services Details</h2>
                    <ul>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>Services Details</li>
                    </ul>
                </div>
            </section>
            <!-- Breadcum End -->
            <!-- Services Details Start -->
            <section class="services-details v1">
                <div class="container">
                    <div class="big-post-img">
                        <img src="{{ asset('assets//img/services-details/big-img.jpg')}}" alt="post-img">
                    </div>
                    <h3>Beekeeping Classes</h3>
                    <p>Honey bees stockpile honey in the hive. Within the hive is a structure made from wax called
                        honeycomb. The honeycomb is made up of hundreds or thousands of hexagonal cells, into which the
                        bees regurgitate honey for storage. Other honey-producing species of bee store the substance in
                        different structures, such as the pots made of wax and resin used by the stingless bee Honey is
                        sweet because of its high concentrations of the monosaccharides fructose and glucose.Honey is
                        sweet because of its high concentrations of the monosaccharides fructose and glucose. It has
                        about the same relative sweetness as sucrose (table sugar). One standard tablespoon (15 mL) of
                        honey provides around 190 kilojoules (46 kilocalories) of food energy.It has attractive chemical
                        properties for baking and a distinctive flavor when used as a sweetener.Most microorganisms
                        cannot grow in honey and sealed honey therefore does not spoil. Samples of honey discovered in
                        archaeological contexts have proven edible even after thousands of years.</p>
                    <div class="feedbac-box bg-cover-center" data-background="{{ asset('assets/img/services-details/bg.jpg')}}">
                        <div class="box-img">
                            <img src="{{ asset('assets/img/services-details/small-img-1.jpg')}}" alt="small-img">
                        </div>
                        <div class="box-img order-xl-2">
                            <img src="{{ asset('assets/img/services-details/small-img-2.jpg')}}" alt="small-img">
                        </div>
                        <!-- <div class="box-content">
                            <h5>Excellent</h5>
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
                            <a href="#" class="feedbac-btn">
                                <span class="my-icon icon-face-grin"></span>Feedback
                            </a>
                        </div> -->
                    </div>
                    <h3>What We Do</h3>
                    <p>Bees are among the few insects that can create large amounts of body heat. They use this ability
                        to produce a constant ambient temperature in their hives. Hive temperatures are usually around
                        35 °C (95 °F) in the honey-storage areas. This temperature is regulated either by generating
                        heat with their bodies or removing it through water evaporation. The evaporation removes water
                        from the stored honey, drawing heat from the colony. The bees use their wings to govern hive
                        cooling. Coordinated wing beating moves air across the wet honey, drawing out water and heat.
                        Ventilation of the hive eventually expels both excess water and heat into the outside world.</p>
                    <div class="mid-box-imgs">
                        <div class="box-img">
                            <img src="{{ asset('assets/img/services-details/mid-img-1.jpg')}}" alt="mid-img">
                        </div>
                        <div class="box-img">
                            <img src="{{ asset('assets/img/services-details/mid-img-2.jpg')}}" alt="mid-img">
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services Details End -->
            <!-- Our Sweet Clients Start -->
            <section class="our-sweet-clients v1 pt-0 pb-xl-spach">
                <div class="container">
                    <div class="section-title-center v1">
                        <h6>Our Sweet Clients and Partners</h6>
                    </div>
                    <div class="slider">
                        <ul class="swiper-wrapper">
                            <li class="swiper-slide">
                                <a href="{{ route('service-detail') }}">
                                    <img src="{{ asset('assets/img/our-sweet-clients/logo-1.png')}}" alt="logo">
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="{{ route('service-detail') }}">
                                    <img src="{{ asset('assets/img/our-sweet-clients/logo-2.png')}}" alt="logo">
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="{{ route('service-detail') }}">
                                    <img src="{{ asset('assets/img/our-sweet-clients/logo-3.png')}}" alt="logo">
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="{{ route('service-detail') }}">
                                    <img src="{{ asset('assets/img/our-sweet-clients/logo-4.png')}}" alt="logo">
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="{{ route('service-detail') }}">
                                    <img src="{{ asset('assets/img/our-sweet-clients/logo-5.png')}}" alt="logo">
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="{{ route('service-detail') }}">
                                    <img src="{{ asset('assets/img/our-sweet-clients/logo-6.png')}}" alt="logo">
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="{{ route('service-detail') }}">
                                    <img src="{{ asset('assets/img/our-sweet-clients/logo-7.png')}}" alt="logo">
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="{{ route('service-detail') }}">
                                    <img src="{{ asset('assets/img/our-sweet-clients/logo-8.png')}}" alt="logo">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Our Sweet Clients End -->
        </main>

@endsection