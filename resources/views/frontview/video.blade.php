@extends('layouts.front')
@section('content')
    <!-- partial:partia/__subheader.html -->
    <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(/khatushyam/Front/assets/img/subheader.jpg)">
        <div class="container">
            <div class="sigma_subheader-inner">
                <div class="sigma_subheader-text">
                    <h1>Videos</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="btn-link" href="{{ route('Front.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Videos</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <!-- partial -->

    <!-- Blog Start -->
    <div class="section section-padding">
        <div class="container">
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
                                                <iframe src="{{ $embedUrl }}" title="YouTube video player"
                                                    title="YouTube video" frameborder="0"
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
                                <h5> <a href="#">{{ $video->name ?? '' }}</a> </h5>
                            </div>
                        </article>
                    </div>
                @endforeach
                <!-- Article End -->
            </div>
            <!-- Pagination Start -->
            <div class="flex items-center justify-between mt-5">
                {!! $videos->links() !!}
            </div>
            <!-- Pagination End -->
        </div>

        <div class="spacer spacer-bottom spacer-lg light-bg pattern-triangles"></div>

    </div>
    <!-- Blog End -->




    <!-- Back To Top Start -->
    <div class="sigma_top style-5">
        <i class="far fa-angle-double-up"></i>
    </div>
@endsection
