
@php

$contacts = App\Models\Home\HomeContact::findOrFail(1);
$services = App\Models\Home\HomeService::all();

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
    // dd($prefix)
    // dd($route)

$logo = App\Models\Home\Logo::findOrFail(1);
$favicon = App\Models\Home\Favicon::findOrFail(1);

@endphp

<!-- Progress scroll totop -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

 <!-- Top Navbar -->
 <div class="main-header">
    <div class="header-top">
        <div class="container">
            <div class="top-outer clearfix">
                <!--Top Left-->
                <div class="top-left">
                    <ul class="links clearfix">
                        <li><a href="tel:+{{$contacts->phone_1}}"><span class="fa fa-phone"></span>+{{$contacts->phone_1}}</a></li>
                        <li><a href="mailto:{{$contacts->email_1}}"><span class="fa fa-envelope"></span>{{$contacts->email_1}}</a></li>
                        {{-- <li><a href="{{url('/')}}" target="_blank"><span class="fa fa-map-marker"></span>{{$contacts->address}}</a></li> --}}
                        <li><a href="{{url('/')}}" target="_blank"><span class="fa fa-map-marker">
                            </span>{{strip_tags($contacts->address)}}</a></li>
                    </ul>
                </div>
                <!--Top Right-->
                <div class="top-right clearfix">
                    <ul class="social-icon-one">
                        <li><a href="{{$abouts->phone_2}}"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a href="{{$abouts->phone_3}}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{$abouts->phone_4}}"><i class="fa fa-instagram"></i></a></li>
                        {{-- <li>
                            <a href="#" class="fa fa-youtube-play"></a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Navbar -->
<nav class="navbar navbar-expand-md">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="{{ url('/') }}">
            <img src="{{asset($logo->name)}}" alt="adams">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'about' ? 'active' : '' }}" href="{{ route('about.page') }}">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <span class="nav-link {{ (Request::path() == 'services') ? 'active': '' }}"> Our Services <i class="fa fa-angle-down"></i></span>
                    <ul class="dropdown-menu last">
                        <li class="dropdown-item {{ ($route == 'services.page') ? 'active': '' }}"><a href="{{ route('services.page') }}">Services</a></li>
                        {{-- <li class="dropdown-item"><a href="services2.html">Services 02</a></li>
                        <li class="dropdown-item"><a href="services3.html">Services 03</a></li>
                        <li class="dropdown-item"><a href="services-page.html">Services Page</a></li> --}}
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <span class="nav-link {{ (Request::path() == 'project') ? 'active': '' }}">Our Projects <i class="fa fa-angle-down"></i></span>
                    <ul class="dropdown-menu last">
                        <li class="dropdown-item {{ ($route == 'project.page') ? 'active': '' }}"><a href="{{ route('project.page') }}">Projects</a></li>
                        <li class="dropdown-item {{ ($route == 'project.gallery') ? 'active': '' }}"><a href="{{ route('project.gallery') }}">Gallery</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-item dropdown"> <span class="nav-link"> Pages <i class="fa fa-angle-down"></i></span>
                    <ul class="dropdown-menu last">
                        <li class="dropdown-item"><a href="image-gallery.html">Image Gallery</a></li>
                        <li class="dropdown-item"><a href="video-gallery.html">Video Gallery</a></li>
                        <li class="dropdown-item"><a href="pricing.html">Pricing Plan</a></li>
                        <li class="dropdown-item"><a href="team.html">Team</a></li>
                        <li class="dropdown-item"><a href="careers.html">Careers</a></li>
                        <li class="dropdown-item"><a href="testimonials.html">Testimonials</a></li>
                        <li class="dropdown-item"><span>Other <i class="fa fa-angle-right"></i></span>
                            <ul class="sub-menu">
                                <li class="dropdown-item"><a href="faqs.html">Faqs</a></li>
                                <li class="dropdown-item"><a href="404.html">404 Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item dropdown"> <span class="nav-link"> Blog <i class="fa fa-angle-down"></i></span>
                    <ul class="dropdown-menu last">
                        <li class="dropdown-item"><a href="blog.html">Blog 01</a></li>
                        <li class="dropdown-item"><a href="blog2.html">Blog 02</a></li>
                        <li class="dropdown-item"><a href="post.html">Post Page</a></li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{ (Request::path() == 'team') ? 'active': '' }}" href="{{ route('team.page') }}">Our Team</a></li>
                <li class="nav-item">
                    <a class="nav-link {{ ($route == 'contact.page') ? 'active': '' }}" href="{{ route('contact.page') }}">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
