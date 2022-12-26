@extends("frontend.home_master")



@section("home_frontend")

@php
    $sliders = App\Models\Home\HomeSlider::latest()->paginate(4);

    $abouts = App\Models\Home\HomeAbout::findOrFail(1);
    $services = App\Models\Home\HomeService::latest()->get();
    $testimonials = App\Models\Home\HomeTestimonial::latest()->get();
    $multiImages = App\Models\Home\MultiImage::latest()->paginate(6);
    $banner = App\Models\Home\Banner::findOrFail(1);
@endphp

    <!-- Header Banner -->
    <section class="banner-header banner-img-top section-padding valign bg-img bg-fixed" data-overlay-dark="4"
        data-background="{{asset($banner->name)}}">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h6>What We Do</h6>
                    <h1>Our <span>Services</span></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>About the service</h5>
                            <p>{!! Str::limit($service->long_description, 120) !!}</p>

                            <ol class="number mb-30">
                                <li>Duisteyerionyer venenatis lacus gravida eros ut turpis interdum.</li>
                                <li>Sedeuter nunc volutpat mollis sapien viventa drana viventa.</li>
                                <li>Fusceler mollis augue sit amet hendrerit vestibulum.</li>
                                <li>Gravida eros ut turpis interdum ornare. Interdum et malesu adama.</li>
                            </ol>

                        </div>
                        <div class="col-md-6 gallery-item">
                            <a href="{{asset($service->service_image)}}" title="Event" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"> <img src="{{asset($service->service_image)}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 gallery-item">
                            <a href="{{asset($service->service_image)}}" title="Fashion" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"> <img src="{{asset($service->service_image)}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12 mt-30">
                            <p class="mb-30">Architecture lonon lorem ac erat suscipit bibendum. Nulla facilisi. Sedeuter nunc volutpat, mollis sapien vel, conseyer turpeutionyer masin libero sempe. Fusceler mollis augue sit amet hendrerit vestibulum. Duisteyerionyer venenatis lacus. Gravida eros ut turpis interdum ornare. Interdum et malesu they adamale fames ac anteipsu pimsine faucibus. Curabitur arcu site feugiat in torto.</p>
                            <h6>What's part of the service?</h6>
                            <p>Architecture lonon lorem ac erat suscipit bibendum. Nulla facilisi. Sedeuter nunc volutpat, mollis sapien vel, conseyer turpeutionyer masin libero sempe. Fusceler mollis augue sit amet hendrerit vestibulum. Duisteyerionyer venenatis lacus. Gravida eros ut turpis interdum ornare. Interdum et malesu they adamale fames ac anteipsu pimsine faucibus. Curabitur arcu site feugiat in torto.</p>
                        </div>
                    </div> --}}
        </div>
    </section>

    <!-- Other Services -->
    <section class="services center section-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">What We Do</div>
                    <div class="section-title">Other <span>Services</span></div>
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
                                <h5><a href="{{route('detail.service', $item->id)}}">{{$item->title}}</a></h5>
                                <p>{!! Str::limit($item->long_description, 120) !!}</p>
                                <a href="{{route('detail.service', $item->id)}}" class="link-btn" tabindex="0">View service</a>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
