@extends('layouts.front')
@section('content')
    <!-- partial:partia/__subheader.html -->
    <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(/khatushyam/Front/assets/img/subheader.jpg)">
        <div class="container">
            <div class="sigma_subheader-inner">
                <div class="sigma_subheader-text">
                    <h1>Photos</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="btn-link" href="{{ route('Front.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Photos detail</li>
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
                
                @foreach($GalleryMaster as $gallary)
                <div class="col-lg-4 coaching">
                    <div class="sigma_portfolio-item style-2">
                        <a href="{{ asset('/gallery_master/' . $gallary->image ?? '') }}" class="popup-image">
                            <img src="{{ asset('/gallery_master/' . $gallary->image ?? '') }}" alt="portfolio">
                        </a>

                    </div>
                </div>
                @endforeach
              
               
            </div>

            <!-- Pagination Start -->
            <div class="flex items-center justify-between mt-5">
                {!! $GalleryMaster->links() !!}
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
