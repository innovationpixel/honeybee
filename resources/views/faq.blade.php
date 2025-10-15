@extends('layouts.admin')
@section('html')

 <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1 bg-cover-center" data-background="{{ asset('assets/img/breadcum/bg.jpg')}}">
                <div class="container">
                    <h2>FAQ</h2>
                    <ul>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>FAQ</li>
                    </ul>
                </div>
            </section>
            <!-- Breadcum End -->
            <!-- Faq Start -->
            <section class="faq v1 pb-xl-spach">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="left-content">
                                <div class="section-title v1">
                                    <h6>Faq</h6>
                                    <h2>Do You Have Any Questions?</h2>
                                    <p>Honey bees stockpile honey in the hive. Within the hive is a structure made from
                                        wax called honeycomb. The honeycomb is made up of hundreds or thousands of
                                        hexagonal cells, into which the bees regurgitate honey for storage. Other
                                        honey-producing species of bee store the substance in different structures, such
                                        as the pots made of wax and resin used </p>
                                </div>
                                <a href="{{ route('contact') }}" class="link-anime v2">get in touch</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-countent">
                                <ul class="accordion" id="accordionFAQ">
                                    <li>
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            How can I pay for order?
                                        </button>
                                        <div id="faq1" class="collapse show" data-bs-parent="#accordionFAQ">
                                            <div class="box-content">
                                                <p>Products are ordered using the online form or by telephone. The
                                                    Customer should complete the Profile with the general particulars
                                                    required for the payment and delivery of the chosen Products and
                                                    will be notified by e-mail after his/her order is fulfilled. After
                                                    you select a Product, you may click its details and learn everything
                                                    about it or have a better look at it and, if you want to buy it,
                                                    just click the shopping cart and it will immediately be added to it.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq2">
                                            What payment methods exist in your company?
                                        </button>
                                        <div id="faq2" class="collapse" data-bs-parent="#accordionFAQ">
                                            <div class="box-content">
                                                <p>Products are ordered using the online form or by telephone. The
                                                    Customer should complete the Profile with the general particulars
                                                    required for the payment and delivery of the chosen Products and
                                                    will be notified by e-mail after his/her order is fulfilled. After
                                                    you select a Product, you may click its details and learn everything
                                                    about it or have a better look at it and, if you want to buy it,
                                                    just click the shopping cart and it will immediately be added to it.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq3">
                                            Is it possible to pay by credit card?
                                        </button>
                                        <div id="faq3" class="collapse" data-bs-parent="#accordionFAQ">
                                            <div class="box-content">
                                                <p>Products are ordered using the online form or by telephone. The
                                                    Customer should complete the Profile with the general particulars
                                                    required for the payment and delivery of the chosen Products and
                                                    will be notified by e-mail after his/her order is fulfilled. After
                                                    you select a Product, you may click its details and learn everything
                                                    about it or have a better look at it and, if you want to buy it,
                                                    just click the shopping cart and it will immediately be added to it.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq4">
                                            Can I return the product after purchase?
                                        </button>
                                        <div id="faq4" class="collapse" data-bs-parent="#accordionFAQ">
                                            <div class="box-content">
                                                <p>Products are ordered using the online form or by telephone. The
                                                    Customer should complete the Profile with the general particulars
                                                    required for the payment and delivery of the chosen Products and
                                                    will be notified by e-mail after his/her order is fulfilled. After
                                                    you select a Product, you may click its details and learn everything
                                                    about it or have a better look at it and, if you want to buy it,
                                                    just click the shopping cart and it will immediately be added to it.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq5">
                                            What is the validity period of the gift certificate?
                                        </button>
                                        <div id="faq5" class="collapse" data-bs-parent="#accordionFAQ">
                                            <div class="box-content">
                                                <p>Products are ordered using the online form or by telephone. The
                                                    Customer should complete the Profile with the general particulars
                                                    required for the payment and delivery of the chosen Products and
                                                    will be notified by e-mail after his/her order is fulfilled. After
                                                    you select a Product, you may click its details and learn everything
                                                    about it or have a better look at it and, if you want to buy it,
                                                    just click the shopping cart and it will immediately be added to it.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq6">
                                            Where and how can I exchange or refund?
                                        </button>
                                        <div id="faq6" class="collapse" data-bs-parent="#accordionFAQ">
                                            <div class="box-content">
                                                <p>Products are ordered using the online form or by telephone. The
                                                    Customer should complete the Profile with the general particulars
                                                    required for the payment and delivery of the chosen Products and
                                                    will be notified by e-mail after his/her order is fulfilled. After
                                                    you select a Product, you may click its details and learn everything
                                                    about it or have a better look at it and, if you want to buy it,
                                                    just click the shopping cart and it will immediately be added to it.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq7">
                                            How can I get a promotional code?
                                        </button>
                                        <div id="faq7" class="collapse" data-bs-parent="#accordionFAQ">
                                            <div class="box-content">
                                                <p>Products are ordered using the online form or by telephone. The
                                                    Customer should complete the Profile with the general particulars
                                                    required for the payment and delivery of the chosen Products and
                                                    will be notified by e-mail after his/her order is fulfilled. After
                                                    you select a Product, you may click its details and learn everything
                                                    about it or have a better look at it and, if you want to buy it,
                                                    just click the shopping cart and it will immediately be added to it.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq8">
                                            How can I cancel the order?
                                        </button>
                                        <div id="faq8" class="collapse" data-bs-parent="#accordionFAQ">
                                            <div class="box-content">
                                                <p>Products are ordered using the online form or by telephone. The
                                                    Customer should complete the Profile with the general particulars
                                                    required for the payment and delivery of the chosen Products and
                                                    will be notified by e-mail after his/her order is fulfilled. After
                                                    you select a Product, you may click its details and learn everything
                                                    about it or have a better look at it and, if you want to buy it,
                                                    just click the shopping cart and it will immediately be added to it.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Faq End -->
        </main>

@endsection