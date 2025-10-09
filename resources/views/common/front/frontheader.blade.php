  <div class="sigma_preloader">
     <img src="{{ asset('/Front/assets/img/om.svg') }}" alt="preloader">
 </div> 
 <aside class="sigma_aside sigma_aside-left">

     <a class="navbar-brand mx-auto" href="index.html"> <img src="{{ asset('/Front/assets/img/logo.jpg') }}" alt="logo">
     </a>

     <!-- Menu -->
     <ul>
         <li class="menu-item ">
             <a href="{{ route('Front.index') }}">Home</a>

         </li>
         <li class="menu-item ">
             <a href="about-us.html">About Us</a>

         </li>
         <li class="menu-item menu-item-has-children">
             <a href="#">Gallery</a>
             <ul class="sub-menu">
                 <li class="menu-item"> <a href="image.html">Photos </a></li>
                 <li class="menu-item"> <a href="video.html">Video</a> </li>

             </ul>
         </li>

         <li class="menu-item">
             <a href="{{ route('Front.ContactUs') }}">Contact</a>
         </li>
     </ul>

 </aside>
 <div class="sigma_aside-overlay aside-trigger-left"></div>
 <!-- partial -->

 <!-- partial:partia/__header.html -->
 <header class="sigma_header header-2 can-sticky">

     <!-- Middle Header Start -->
     <div class="sigma_header-middle">
         <nav class="navbar">

             <!-- Controls -->
             <div class="sigma_header-controls style-2">

                 <ul class="sigma_header-controls-inner">
                     <!-- Desktop Toggler -->
                     <li class="aside-toggler style-2 aside-trigger-right desktop-toggler">
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                     </li>

                     <!-- Mobile Toggler -->
                     <li class="aside-toggler style-2 aside-trigger-left">
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                     </li>
                 </ul>

             </div>

             <!-- Menu -->
             <ul class="navbar-nav">
                 <li class="menu-item ">
                     <a href="{{ route('Front.index') }}">Home</a>
                 </li>
                 <li class="menu-item ">
                     <a href="{{ route('Front.AboutUs') }}">About Us</a>
                 </li>
                 <li class="menu-item menu-item-has-children">
                     <a href="#">Gallery</a>
                     <ul class="sub-menu">
                         <li class="menu-item"> <a href="{{ route('Front.image') }}">Photos</a> </li>
                         <li class="menu-item"> <a href="{{ route('Front.video') }}">Video</a> </li>
                     </ul>
                 </li>

                 <li class="menu-item ">
                     <a href="{{ route('Front.ContactUs') }}">Contact Us</a>
                 </li>
             </ul>

             <!-- Logo Start -->
             <div class="sigma_logo-wrapper text-center">
                 <a class="navbar-brand" href="index.html">
                     <img src="{{ asset('/Front/assets/img/logo.jpg') }}" alt="logo" style="height: 85px;">
                 </a>
             </div>
             <!-- Logo End -->

             <!-- Button & Phone -->
             <div class="sigma_header-controls sigma_header-button gap-2">
                 <a href="mailto:shreeshyamsewasamitivadodara@gmail.com" class="sigma_header-contact">
                     <i class="fal fa-envelope"></i> <!-- changed icon -->
                     <div class="sigma_header-contact-inner">
                         <span>Write to Us</span> <!-- optional small text -->
                         <h6>shreeshyamsewasamitivadodara@gmail.com</h6> <!-- your email here -->
                     </div>
                 </a>

                 <a href="tel:+919376210692" class="sigma_header-contact">
                     <i class="fal fa-phone"></i>
                     <div class="sigma_header-contact-inner">
                         <span>Get Support</span>
                         <h6>+91 93762 10692</h6>
                     </div>
                 </a>
                 <a class="sigma_btn-custom" href="#"> Donate Now </a>
             </div>

         </nav>
     </div>
     <!-- Middle Header End -->

 </header>
