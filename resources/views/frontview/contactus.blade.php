@extends('layouts.front')
@section('content')
    <!-- partial:partia/__subheader.html -->
    <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(/khatushyam/Front/assets/img/subheader.jpg)">
        <div class="container">
            <div class="sigma_subheader-inner">
                <div class="sigma_subheader-text">
                    <h1>Contact Us</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="btn-link" href="{{ route('Front.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <!-- partial -->
    <!-- Map Start -->
    <div class="sigma_map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29524.077892980196!2d73.19793455902861!3d22.334373948337525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fcf3e0aa839d9%3A0x2e3d56c0ec5e6778!2sShree%20Shyam%20Mandir%20Vadodara!5e0!3m2!1sen!2sin!4v1759727019934!5m2!1sen!2sin"
            allowfullscreen=""></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact form Start -->
    <div class="section mt-negative pt-0">
        <div class="container">

            <form class="sigma_box box-lg m-0 mf_form_validate ajax_submit" action="{{ route('Front.ContactUs_sendmail') }}"
                method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <i class="far fa-user"></i>
                            <input type="text" placeholder="Full Name" class="form-control dark" name="name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <i class="far fa-envelope"></i>
                            <input type="email" placeholder="Email Address" class="form-control dark" name="email">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <i class="far fa-pencil"></i>
                            <input type="text" placeholder="Mobile Number" maxlength="10" class="form-control dark"
                                name="mobileno">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Enter Message" cols="45" rows="5" class="form-control dark"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="sigma_btn-custom">Submit Now</button>
                    <div class="server_response w-100">
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Contact form End -->

    <!-- Icons Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="sigma_icon-block text-center light icon-block-7">
                        <i class="flaticon-email"></i>
                        <div class="sigma_icon-block-content">
                            <span>Send Email <i class="far fa-arrow-right"></i> </span>
                            <h5> Email Address</h5>
                            <a href="mailto:shreeshyamsewasamitivadodara@gmail.com" target="_blank">
                                <p class="text-center">shreeshyamsewasamitivadodara@gmail.com</p>
                            </a>

                        </div>
                        <div class="icon-wrapper">
                            <i class="flaticon-email"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sigma_icon-block text-center light icon-block-7">
                        <i class="flaticon-call"></i>
                        <div class="sigma_icon-block-content">
                            <span>Call Us Now <i class="far fa-arrow-right"></i> </span>
                            <h5> Phone Number </h5>
                            <a href="tel:+91 93762 10692" target="_blank">
                                <p class="text-center">+91 93762 10692</p>
                            </a>
                        </div>
                        <div class="icon-wrapper">
                            <i class="flaticon-call"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sigma_icon-block text-center light icon-block-7">
                        <i class="flaticon-location"></i>
                        <div class="sigma_icon-block-content">
                            <span>Find Us Here <i class="far fa-arrow-right"></i> </span>
                            <h5> Location </h5>
                            <a href="https://www.google.com/maps/search/Shree+shyam+seva+samiti+Vadodara+Shivam+park+society,Near+Khodiyar+D+Mart+Vadodara+390006/@22.3343739,73.1979346,14z?entry=ttu&g_ep=EgoyMDI1MTAwMS4wIKXMDSoASAFQAw%3D%3D"
                                target="_blank">
                                <p>Shree shyam seva samiti Vadodara Shivam park society,Near Khodiyar D Mart Vadodara 390006
                                </p>
                            </a>
                        </div>
                        <div class="icon-wrapper">
                            <i class="flaticon-location"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Icons End -->
@endsection
