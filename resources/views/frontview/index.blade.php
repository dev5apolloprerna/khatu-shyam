@extends('layouts.front')
@section('content')
    <!-- Banner Start -->
    <div class="sigma_banner banner-3">

        <div class="sigma_banner-slider">

            <!-- Banner Item Start -->
            <div class="light-bg sigma_banner-slider-inner bg-cover bg-center bg-norepeat"
                style="
    background:
    url('/khatushyam/Front/assets/img/banner/banner(1).png') right center / auto 100% no-repeat,
      linear-gradient(
        90deg,
        rgba(255, 153, 0, 1) 0%,
        rgba(230, 23, 23, 1) 33%,
        rgba(255, 255, 255, 1) 69%
      )
  ">
                <div class="sigma_banner-text">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <h1 class="title">Some Important Life Lessons From Gita</h1>
                                <p class="blockquote mb-0 bg-transparent"> We are a Hindu that belives in Lord Rama and
                                    Vishnu Deva the
                                    followers and We are a Hindu that belives in Lord Rama and Vishnu Deva. This is where
                                    you should start
                                </p>
                                <!-- <div class="section-button d-flex align-items-center">
                                                                                                                          <a href="contact-us.html" class="sigma_btn-custom">Join Today <i class="far fa-arrow-right"></i> </a>
                                                                                                                          <a href="services.html" class="ms-3 sigma_btn-custom white">View Services <i
                                                                                                                              class="far fa-arrow-right"></i> </a>
                                                                                                                        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner Item End -->

            <!-- Banner Item Start -->
            <div class="light-bg sigma_banner-slider-inner bg-cover bg-center bg-norepeat"
                style="background:
    url('/khatushyam//Front/assets/img/banner/banner(2).png') right center / auto 100% no-repeat,
      linear-gradient(
        90deg,
        rgba(255, 153, 0, 1) 0%,
        rgba(230, 23, 23, 1) 33%,
        rgba(255, 255, 255, 1) 69%
      )">
                <div class="sigma_banner-text">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <h1 class="title">We are a Hindu that believe in Ram</h1>
                                <p class="blockquote mb-0 bg-transparent"> We are a Hindu that belives in Lord Rama and
                                    Vishnu Deva the
                                    followers and We are a Hindu that belives in Lord Rama and Vishnu Deva. This is where
                                    you should start
                                </p>
                                <!-- <div class="section-button d-flex align-items-center">
                                                                                                                          <a href="contact-us.html" class="sigma_btn-custom">Join Today <i class="far fa-arrow-right"></i> </a>
                                                                                                                          <a href="services.html" class="ms-3 sigma_btn-custom white">View Services <i
                                                                                                                              class="far fa-arrow-right"></i> </a>
                                                                                                                        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner Item End -->

        </div>

    </div>
    <!-- Banner End -->

    <!-- Broadcast Start -->
    <div id="live" class="section section-padding pt-5">
        <div class="container">
            <div class="section-title text-center">
                <p class="subtitle">Watch Video</p>
                <h4 class="title">Our Live Broadcast</h4>
            </div>
            <div class="row sigma_broadcast-video">
                <div class="col-12 mb-5">
                    <div class="row g-0  align-items-center">
                        <div class="col-lg-10 mx-auto">
                            @php
                                $videoLink = $video->video_link ?? '';
                            
                                if (!empty($videoLink)) {
                                    // Updated regex to match the YouTube live URL format
                                    if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|watch\?v=|v\/|live\/))([^\?&]+)/', $videoLink, $matches)) {
                                        $videoId = $matches[1];  // Extract video ID from URL
                                        $videoLink = 'https://www.youtube.com/watch?v=' . $videoId;  // Construct YouTube watch URL
                                    } else {
                                        $videoLink = ''; // If it's not a valid YouTube link, set to empty (or show an error message)
                                    }
                                }
                            @endphp

                            <div class="sigma_video-popup-wrap">
                                <img src="{{ asset('/Front/assets/img/video-gallery/01.png') }}" alt="video">
                                <a href="{{ $videoLink }}" class="sigma_video-popup popup-youtube">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Broadcast End -->

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
                        <img src="{{ asset('/Front/assets/img/about-new.png') }}" alt="about" class="d-none d-lg-block"
                            style="z-index: 99;">
                        <img src="{{ asset('/Front/assets/img/about-1.jpg') }}" alt="about" class="d-none d-lg-block"
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
                        <a href="#" class="sigma_btn-custom light">Learn More <i class="far fa-arrow-right"></i> </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- About End -->

    <!-- Progress bar Start -->
    <div class="section">
        <div class="container">
            <div class="row justify-content-center g-4">

                <div class="col-lg-4 text-center">
                    <div class="img-box img-effect-1 rounded-top rounded-end">
                        <img src="{{ asset('/Front/assets/img/images.jpeg')}}" alt="img" class="creative-img ">
                    </div>
                </div>

                <div class="col-lg-2 p-3 p-lg-0"></div>

                <div class="col-lg-5 z-index-3">
                    <div class="img-box img-effect-2">
                        <img src="{{ asset('/timetable_master/' . $timetable->image) }}" alt="img"
                            class="creative-img">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Progress bar End -->

    <!-- Puja Start -->
    <div class="section section-padding light-bg">
        <div class="container">
            <div class="section-title text-center">
                <p class="subtitle">Photos Gallery</p>
                <h4 class="title">Photos Gallery</h4>
            </div>


            <div class="portfolio-filter row">
                @foreach ($gallarys as $gallary)
                    <div class="col-lg-4 coaching">
                        <div class="sigma_portfolio-item style-2">
                            <img src="{{ asset('/gallery_master/' . $gallary->image ?? '') }}"
                                alt="portfolio">
                            <div class="sigma_portfolio-item-content">
                                <div class="sigma_portfolio-item-content-inner">
                                    <h5> <a href="{{ route('Front.imagedetail',$gallary->album->slugname ?? '') }}"> {{ $gallary->album->name ?? '' }} </a> </h5>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Puja End -->

    <!-- CTA Start -->
    <div class="section pt-5">
        <div class="container">
            <div class="section-title text-center">
                <p class="subtitle">Donate Us</p>
                <h4 class="title">Donate Now</h4>
            </div>

            <div class="row align-items-center position-relative">
                <div class="col-md-6">
                    <div class="sigma_cta primary-bg">
                        <img class="d-none d-lg-block" src="{{ asset('/Front/assets/img/cta/1.png') }}" alt="cta">
                        <div class="sigma_cta-content">
                            <span class="fw-600 text-white">For Help</span>
                            <h3 class="text-white mb-1"><a href="tel:+91 93762 10692" class="text-white">+91 93762
                                    10692</a></h3>
                            <h4 class="text-white"><a href="mailto:shreeshyamsewasamitivadodara@gmail.com"
                                    class="text-white">shreeshyamsewasamitivadodara@gmail.com</a></h4>
                        </div>
                    </div>
                </div>
                <span class="sigma_cta-sperator d-none d-lg-flex"></span>
                <div class="col-md-6">
                    <div class="sigma_cta primary-bg">
                        <div class="sigma_cta-content">
                            <h5 class="text-white mb-3">Donate Here</h5>
                            <ul class="list-unstyled text-white mb-0">
                                <li><strong>Register No:</strong> e/8015/vadodara</li>
                                <li><strong>Trust Name:</strong> Shree shyam seva samiti Vadodara</li>
                                <li><strong>Account No:</strong> 36980200000169</li>
                                <li><strong>IFSC Code:</strong> BARB0NEWVIP</li>
                                <li><strong>Branch Name:</strong>New VIP Road, Vadodara</li>
                            </ul>
                        </div>
                        <!-- <img class="d-none d-lg-block" src="assets/img/cta/2.png" alt="cta"> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- CTA End -->

    <!-- Blog Start -->
    <div class="section section-padding">
        <div class="container">

            <div class="section-title text-center">
                <p class="subtitle">Video Gallery</p>
                <h4 class="title">Video Gallery</h4>
            </div>

            <div class="row">

                <!-- Article Start -->
                @foreach ($videos as $video)
                         @php
                            // Extract the video link
                            $videoLink = $video->video_link ?? '';
                            
                            // Ensure the link is in the proper embed format
                            if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|watch\?v=|v\/|live\/))([^\?&]+)/', $videoLink, $matches)) {
                                $videoId = $matches[1];
                                $embedUrl = 'https://www.youtube.com/embed/' . $videoId;  // Use the embed format URL
                            } else {
                                $embedUrl = '';  // In case the link isn't valid, leave it empty
                            }
                        @endphp

                        <div class="col-lg-4 col-md-6">
                            <article class="sigma_post">
                                <div class="sigma_post-thumb">
                                    <a href="#">
                                        <div class="video-wrapper">
                                            @if ($embedUrl)
                                                <iframe src="{{ $embedUrl }}" title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen>
                                                </iframe>
                                            @else
                                                <p>Invalid video link</p> <!-- Optionally show an error message if the link is invalid -->
                                            @endif
                                        </div>
                                    </a>
                                </div>
                                <div class="sigma_post-body">
                                    <h5><a href="#">{{ $video->name ?? '' }}</a></h5>
                                </div>
                            </article>
                        </div>
                @endforeach

                <!-- Article End -->
            </div>

        </div>

        <div class="spacer spacer-bottom spacer-lg light-bg pattern-triangles"></div>

    </div>
    <!-- Blog End -->

    <!-- Back To Top Start -->
    <div class="sigma_top style-5">
        <i class="far fa-angle-double-up"></i>
    </div>
@endsection
