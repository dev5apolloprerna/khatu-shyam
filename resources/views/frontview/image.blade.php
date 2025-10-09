@extends('layouts.front')
@section('content')
    <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(/khatushyam/Front/assets/img/subheader.jpg)">
        <div class="container">
            <div class="sigma_subheader-inner">
                <div class="sigma_subheader-text">
                    <h1>Photos</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="btn-link" href="{{ route('Front.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Photos</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <!-- partial -->

    <!-- Puja Start -->
    <div class="section section-padding light-bg">
        <div class="container">

            <div class="portfolio-filter row">
                @foreach ($images as $image)
                    <div class="col-lg-4 coaching">
                        <a href="{{ route('Front.imagedetail',$image->album->slugname ?? '') }}">
                            <div class="sigma_portfolio-item style-2">
                                <img src="{{ asset('/gallery_master/' . $image->image ?? '') }}"
                                    alt="portfolio">
                                <div class="sigma_portfolio-item-content">
                                    <div class="sigma_portfolio-item-content-inner">
                                        <h5>
                                            {{ $image->album->name ?? '' }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Pagination Start -->
            <div class="flex items-center justify-between mt-5">
                {!! $images->links() !!}
            </div>
            <!-- Pagination End -->
        </div>
    </div>
    <!-- Puja End -->




    <!-- Back To Top Start -->
    <div class="sigma_top style-5">
        <i class="far fa-angle-double-up"></i>
    </div>
@endsection
