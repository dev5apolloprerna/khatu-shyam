@extends('layouts.front')
@section('content')
    <!-- partial:partia/__subheader.html -->
    <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(/khatushyam/Front/assets/img/subheader.jpg)">
        <div class="container">
            <div class="sigma_subheader-inner">
                <div class="sigma_subheader-text">
                    <h1>About Us</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="btn-link" href="{{ route('Front.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <!-- partial -->



    <!-- About Start -->
    <section class="section light-bg">
        <div class="container">
            <div class="section-title mb-0 text-center">
                <p class="subtitle">श्री श्याम सेवा समिति</p>
                <h4 class="title">About Khatu Shyam Ji Temple </h4>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-lg-30">
                    <div class="img-group">
                        <div class="img-group-inner">
                            <div class="ratio ratio-16x9 " style="z-index: 999;">
                                <iframe src="https://www.youtube.com/embed/GlyOxMcwt_o?si=yvFMY0mIwaaxlrjw"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <span></span>
                            <span></span>
                        </div>
                        <img src="{{ asset('Front/assets/img/about-new.png') }}" alt="about" class="d-none d-lg-block"
                            style="z-index: 99;">
                        <img src="{{ asset('Front/assets/img/about-1.jpg') }}" alt="about" class="d-none d-lg-block"
                            style="z-index: 99;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="me-lg-30">

                        <ul class="sigma_list list-2 mb-0">
                            <li>Peace of mind</li>
                            <li>Healing at Shyam Kund</li>
                            <li>Festival energy</li>
                            <li>Positive vibrations</li>
                        </ul>
                        <p class="blockquote bg-transparent"> Khatu Shyam Ji Temple, Vadodara, is one of the most revered
                            pilgrimage
                            sites for devotees of Lord Krishna. The temple is dedicated to Barbarika, the grandson of Bhima,
                            who is
                            worshipped here as Shyam Baba – an incarnation of Lord Krishna known for fulfilling the wishes
                            of his
                            devotees.</p>
                        <!-- <a href="#" class="sigma_btn-custom light">Learn More <i class="far fa-arrow-right"></i> </a> -->
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- volunteers Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="section-title mb-0 text-center">
                <p class="subtitle">Our Trustee</p>
                <h4 class="title">Our Trustee</h4>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="sigma_volunteers volunteers-4">
                        <div class="sigma_volunteers-thumb">
                            <img src="{{ asset('Front/assets/img/volunteers/1.jpg') }}" alt="volunteers">

                        </div>
                        <div class="sigma_volunteers-body">
                            <div class="sigma_volunteers-info">
                                <p>Temple Memember</p>
                                <h5>
                                    <a href="#">Yesh Chopra</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="sigma_volunteers volunteers-4">
                        <div class="sigma_volunteers-thumb">
                            <img src="{{ asset('Front/assets/img/volunteers/1.jpg') }}" alt="volunteers">

                        </div>
                        <div class="sigma_volunteers-body">
                            <div class="sigma_volunteers-info">
                                <p>Temple Memember</p>
                                <h5>
                                    <a href="#">Rakesh K Pandey</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="sigma_volunteers volunteers-4">
                        <div class="sigma_volunteers-thumb">
                            <img src="{{ asset('Front/assets/img/volunteers/2.jpg') }}" alt="volunteers">

                        </div>
                        <div class="sigma_volunteers-body">
                            <div class="sigma_volunteers-info">
                                <p>Temple Memember</p>
                                <h5>
                                    <a href="#">Murli Parsad</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="sigma_volunteers volunteers-4">
                        <div class="sigma_volunteers-thumb">
                            <img src="{{ asset('Front/assets/img/volunteers/1.jpg') }}" alt="volunteers">

                        </div>
                        <div class="sigma_volunteers-body">
                            <div class="sigma_volunteers-info">
                                <p>Temple Memember</p>
                                <h5>
                                    <a href="#">Yesh Chopra</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <!-- volunteers End -->


    <!-- Back To Top Start -->
    <div class="sigma_top style-5">
        <i class="far fa-angle-double-up"></i>
    </div>
@endsection
