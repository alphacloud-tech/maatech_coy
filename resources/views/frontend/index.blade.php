
@extends("frontend.home_master")

@section('home_frontend')

@php
    $sliders = App\Models\Home\HomeSlider::latest()->paginate(4);

    $abouts = App\Models\Home\HomeAbout::findOrFail(1);
    $services = App\Models\Home\HomeService::latest()->get();
    $testimonials = App\Models\Home\HomeTestimonial::latest()->get();
    $multiImages = App\Models\Home\MultiImage::all();

    $projects = App\Models\Home\HomeProject::latest()->paginate(3);
    $teams = App\Models\Home\HomeTeam::all();
@endphp

@section('title')
    {{ $abouts->coy_name }} | Home
@endsection

    <!-- Slider -->
    @include("frontend.body.slider")

    <!-- About -->
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30">
                    <div class="section-subtitle">{{$abouts->title}}</div>
                    <div class="section-title">About <span>{{$abouts->coy_name}}</span></div>

                    <p>{!!$abouts->content_long!!}</p>

                    <ul class="listext list-unstyled mb-30">
                        <li>
                            <div class="listext-icon"> <i class="norc-d-check"></i> </div>
                            <div class="listext-text">
                                <p>Over 25 years of experience</p>
                            </div>
                        </li>
                        <li>
                            <div class="listext-icon"> <i class="norc-d-check"></i> </div>
                            <div class="listext-text">
                                <p>100+ successfully executed projects</p>
                            </div>
                        </li>
                        <li>
                            <div class="listext-icon"> <i class="norc-d-check"></i> </div>
                            <div class="listext-text">
                                <p>Exceptional work quality</p>
                            </div>
                        </li>
                    </ul>
                    <div class="line-dec"></div>
                    {{-- <div class="about-bottom"> <img src="{{asset('frontend/maatech/img/signature-dark.svg')}}" alt="" class="image about-signature">
                        <div class="about-name-wrapper">
                            <div class="about-name">Adam Norman</div>
                            <div class="about-rol">CEO & Founder</div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-md-6">
                    <div class="about-img"> <img src="{{asset($abouts->about_image)}}" alt="">
                        <div class="about-img-hotifer">
                            <p>{{$abouts->content_short}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services -->

    <section class="services center section-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">What We Do</div>
                    <div class="section-title">Our <span>Services</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 owl-carousel owl-theme">
                    @foreach ($services as $item)
                        <div class="item mb-30">
                            <div class="service-img">
                                <div class="img"> <img src="{{asset($item->service_image)}}" alt=""> </div>
                            </div>
                            <div class="cont">
                                <div class="service-icon"> <i class="{{$item->service_icon}}"></i> </div>
                                <h5><a href="{{ route('services.page') }}">{{$item->title}}</a></h5>
                                {{-- <p>{!! Str::limit($item->long_description, 120) !!}</p> --}}
                                <p>{{strip_tags(Str::limit($item->long_description, 120))}}</p>
                                <a href="{{ route('services.page') }}" class="link-btn" tabindex="0">View service</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Process -->
    <section class="process">
        <div class="section-padding bg-img bg-fixed section-padding" data-background="{{asset('frontend/maatech/img/banner2.jpg')}}" data-overlay-dark="6">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 mb-45 text-center">
                        <h5>How We Work</h5>
                        <h2>Our Process</h2>
                        <p>Suspendisse potenti sed laoen ultra magna in dignissim justo porta miss acurabitur luctus magna numsation elentesue the miss vitae moie.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 padding">
                        <div class="item text-center"> <img src="{{asset('frontend/maatech/img/arrow1.png')}}" class="tobotm" alt=""> <span class="icon norc-paper"></span>
                            <h6><span>01.</span>Planing</h6>
                        </div>
                    </div>
                    <div class="col-md-3 padding">
                        <div class="item text-center"> <img src="{{asset('frontend/maatech/img/arrow1.png')}}" alt=""> <span class="icon norc-pen-tool-2"></span>
                            <h6><span>02.</span>Design</h6>
                        </div>
                    </div>
                    <div class="col-md-3 padding">
                        <div class="item text-center"> <img src="{{asset('frontend/maatech/img/arrow1.png')}}" class="tobotm" alt=""> <span class="icon norc-new-construction"></span>
                            <h6><span>03.</span>Construct</h6>
                        </div>
                    </div>
                    <div class="col-md-3 padding">
                        <div class="item text-center"> <span class="icon norc-trophy"></span>
                            <h6><span>04.</span>Finishing</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects -->
    <section class="projects section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">Latest Works</div>
                    <div class="section-title">Our <span>Projects</span></div>
                </div>
            </div>
            <div class="row">
                @foreach ($projects as $item)
                    <div class="col-md-12 mb-90">
                        <div class="projects left">
                            <figure><img src="{{asset($item->project_image)}}" alt="" class="img-fluid"></figure>
                            <div class="caption">
                                <h4>{{$item->title_1}} <span>{{$item->title_2}}</span></h4>
                                {{-- <p>{!!$item->description!!}</p> --}}
                                <p>{{strip_tags($item->description)}}</p>
                                <div class="line-dec"></div>
                                <div class="info-wrapper">
                                    <div class="date"><i class="{{$item->project_icon}}"></i>{{$item->project_type}}</div>
                                    <div class="more"><a href="{{ route('project.page') }}" class="link-btn" tabindex="0">Discover</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Values -->
    @include('frontend.body.core_value')

    <!-- Team -->
    <section class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">Expert Worker</div>
                    <div class="section-title">Meet <span>Our Team</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 owl-carousel owl-theme">
                    @foreach ($teams as $item)
                        <div class="team-card mb-30">
                            <div class="team-img"><img src="{{asset($item->team_image)}}" alt="" class="w-100"></div>
                            <div class="team-content">
                                <h3 class="team-title">{{$item->name}}<span>{{$item->title}}</span></h3>
                                <p class="team-text" style="color: white">{{strip_tags($item->description)}}</p>
                                <div class="social">
                                    <div class="full-width">
                                        <a href="{{$item->linkedin}}"><i class="fa fa-linkedin"></i></a>
                                        <a href="{{$item->facebook}}"><i class="fa fa-facebook"></i></a>
                                        <a href="{{$item->twitter}}"><i class="fa fa-twitter"></i></a>
                                        <a href="{{$item->instagram}}"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <h3 class="mb-0">{{$item->name}}<span>{{$item->title}}</span></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Numbers -->
   @include('frontend.body.number_count')
    <!-- News -->
    {{-- <section class="news section-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle"><span>Latest News</span></div>
                    <div class="section-title">Our <span>Blog</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="position-re o-hidden"> <img src="{{asset('frontend/maatech/img/news/5.jpg')}}" alt="">
                                <div class="date">
                                    <a href="post.html"> <span>Dec</span> <i>10</i> </a>
                                </div>
                            </div>
                            <div class="con">
                                <h5><a href="post.html">Construction Delivery Methods Training</a></h5>
                                <div class="divider"></div>
                                <div class="news-info">
                                    <div class="split-content news-info-left">
                                        <div class="news-icon-wrapper"> <i class="norc-new-construction"></i> </div>
                                        <div class="card-news-date-text">Construction</div>
                                    </div>
                                    <div class="split-content news-info-right"> <a href="#" class="link-btn" tabindex="0">Read more</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="position-re o-hidden"> <img src="{{asset('frontend/maatech/img/news/3.jpg')}}" alt="">
                                <div class="date">
                                    <a href="post.html"> <span>Dec</span> <i>06</i> </a>
                                </div>
                            </div>
                            <div class="con">
                                <h5><a href="post.html">Modern Glass Building in Construction</a></h5>
                                <div class="divider"></div>
                                <div class="news-info">
                                    <div class="split-content news-info-left">
                                        <div class="news-icon-wrapper"> <i class="norc-pantone"></i> </div>
                                        <div class="card-news-date-text">Interior</div>
                                    </div>
                                    <div class="split-content news-info-right"> <a href="#" class="link-btn" tabindex="0">Read more</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="position-re o-hidden"> <img src="{{asset('frontend/maatech/img/news/4.jpg')}}" alt="">
                                <div class="date">
                                    <a href="post.html"> <span>Dec</span> <i>08</i> </a>
                                </div>
                            </div>
                            <div class="con">
                                <h5><a href="post.html">Factory renovation architecture works</a></h5>
                                <div class="divider"></div>
                                <div class="news-info">
                                    <div class="split-content news-info-left">
                                        <div class="news-icon-wrapper"> <i class="norc-factory"></i> </div>
                                        <div class="card-news-date-text">Industrial</div>
                                    </div>
                                    <div class="split-content news-info-right"> <a href="#" class="link-btn" tabindex="0">Read more</a> </div>
                                </div>
                            </div>
                        </div><div class="item">
                            <div class="position-re o-hidden"> <img src="{{asset('frontend/maatech/img/news/2.jpg')}}" alt="">
                                <div class="date">
                                    <a href="post.html"> <span>Dec</span> <i>04</i> </a>
                                </div>
                            </div>
                            <div class="con">
                                <h5><a href="post.html">Construction Site Security Guide</a></h5>
                                <div class="divider"></div>
                                <div class="news-info">
                                    <div class="split-content news-info-left">
                                        <div class="news-icon-wrapper"> <i class="norc-new-construction"></i> </div>
                                        <div class="card-news-date-text">Construction</div>
                                    </div>
                                    <div class="split-content news-info-right"> <a href="#" class="link-btn" tabindex="0">Read more</a> </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="position-re o-hidden"> <img src="{{asset('frontend/maatech/img/news/1.jpg')}}" alt="">
                                <div class="date">
                                    <a href="post.html"> <span>Dec</span> <i>02</i> </a>
                                </div>
                            </div>
                            <div class="con">
                                <h5><a href="post.html">Airport Runway Construction Process</a></h5>
                                <div class="divider"></div>
                                <div class="news-info">
                                    <div class="split-content news-info-left">
                                        <div class="news-icon-wrapper"> <i class="norc-factory"></i> </div>
                                        <div class="card-news-date-text">Industrial</div>
                                    </div>
                                    <div class="split-content news-info-right"> <a href="#" class="link-btn" tabindex="0">Read more</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="position-re o-hidden"> <img src="{{asset('frontend/maatech/img/news/6.jpg')}}" alt="">
                                <div class="date">
                                    <a href="post.html"> <span>Dec</span> <i>12</i> </a>
                                </div>
                            </div>
                            <div class="con">
                                <h5><a href="post.html">Exterior House Colors Combinations</a></h5>
                                <div class="divider"></div>
                                <div class="news-info">
                                    <div class="split-content news-info-left">
                                        <div class="news-icon-wrapper"> <i class="norc-pantone"></i> </div>
                                        <div class="card-news-date-text">Interior</div>
                                    </div>
                                    <div class="split-content news-info-right"> <a href="#" class="link-btn" tabindex="0">Read more</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Video & Testiominals -->
    <section class="testimonials">
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="{{asset('frontend/maatech/img/banner.jpg')}}" data-overlay-dark="4">
            <div class="container">
                <div class="row">
                    <!-- Video -->
                    <div class="col-md-6 mb-30 valign">
                        <div class="vid-area">
                            <div class="vid-icon">
                                <a class="play-button vid" href="https://youtu.be/z4nO6NuEM3A">
                                    <svg class="circle-fill">
                                        <circle cx="43" cy="43" r="39" stroke="#fff" stroke-width="1"></circle>
                                    </svg>
                                    <svg class="circle-track">
                                        <circle cx="43" cy="43" r="39" stroke="none" stroke-width="1" fill="none"></circle>
                                    </svg> <span class="polygon">
                                        <i class="norc-triangle-right"></i>
                                    </span> </a>
                            </div>
                            <div class="cont mt-30 mb-30">
                                <h6>Promo Video</h6>
                                <h4>Video About Company</h4>
                                <p>Video showing our 25 years of business experience.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testiominals -->
                    <div class="col-md-5 offset-md-1">
                        <div class="testimonials-box">
                            <div class="head-box">
                                <h6>What said about us</h6>
                                <h4>Customer Reviews</h4>
                            </div>
                            <div class="owl-carousel owl-theme">
                                @foreach ($testimonials as $item)
                                    <div class="item"> <span class="quote"><img src="{{asset('frontend/maatech/img/quot.png')}}" alt=""></span>
                                        <p class="v-border">{{strip_tags($item->comment)}}</p>
                                        <div class="info">
                                            <div class="author-img"> <img src="{{asset($item->comment_image)}}" alt=""> </div>
                                            <div class="cont">
                                                <h6>{{$item->name}}</h6> <span>{{$item->title}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients -->
    <section class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="owl-carousel owl-theme">
                        @foreach ($multiImages as $item)
                        <div class="clients-logo">
                            <a href="#0"><img src="{{asset($item->img_name)}}" alt=""></a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5"></div>
            </div>
        </div>
    </section>

@endsection
