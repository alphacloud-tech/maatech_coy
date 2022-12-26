@extends("frontend.home_master")



@section("home_frontend")

@php
    $sliders = App\Models\Home\HomeSlider::latest()->paginate(4);

    $abouts = App\Models\Home\HomeAbout::findOrFail(1);
    $services = App\Models\Home\HomeService::all();
    $testimonials = App\Models\Home\HomeTestimonial::latest()->get();
    $multiImages = App\Models\Home\MultiImage::latest()->paginate(6);

    $projects = App\Models\Home\HomeProject::latest()->paginate(3);
    $teams = App\Models\Home\HomeTeam::all();
    $banner = App\Models\Home\Banner::findOrFail(1);

@endphp

@section('title')
    {{ $abouts->coy_name }} | Projects
@endsection
<!-- Header Banner -->
<section class="banner-header banner-img-top section-padding valign bg-img bg-fixed"
    data-overlay-dark="4" data-background="{{asset($banner->name)}}">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h6>Latest Works</h6>
                <h1>Our <span>Projects</span></h1>
            </div>
        </div>
    </div>
</section>
<!-- Projects -->
  <section class="projects section-padding">
    <div class="container">
        <div class="row">
            @foreach ($projects as $item)
                <div class="col-md-12 mb-90">
                    <div class="projects left">
                        <figure><img src="{{asset($item->project_image)}}" alt="" class="img-fluid"></figure>
                        <div class="caption">
                            <h4>{{$item->title_1}} <span>{{$item->title_2}}</span></h4>
                            <p>{{strip_tags($item->description)}}</p>
                            <div class="line-dec"></div>
                            <div class="info-wrapper">
                                <div class="date"><i class="{{$item->project_icon}}"></i>{{$item->project_type}}</div>
                                <div class="more"><a href="{{route('detail.project', $item->id)}}" class="link-btn" tabindex="0">Discover</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Numbers -->
@include('frontend.body.number_count')

<!-- Values -->
@include('frontend.body.core_value')
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

