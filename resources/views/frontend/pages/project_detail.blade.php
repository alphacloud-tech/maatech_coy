@extends("frontend.home_master")



@section("home_frontend")

@php
    $sliders = App\Models\Home\HomeSlider::latest()->paginate(4);

    $abouts = App\Models\Home\HomeAbout::findOrFail(1);
    $services = App\Models\Home\HomeService::latest()->get();
    $testimonials = App\Models\Home\HomeTestimonial::latest()->get();

@endphp

    <!-- Project Page Slider -->
    <header class="header slider">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            @foreach ($project_multiImages as $item)
                <div class="item bg-img" data-overlay-dark="1" data-background="{{asset($item->project_multi_image_name)}}"></div>
            @endforeach
        </div>
        <!-- arrow down -->
        <div class="arrow bounce text-center">
            <a href="#" data-scroll-nav="1" class=""> <i class="norc-arrow-down-2"></i> </a>
        </div>
    </header>
    <!-- Project Page -->
    <section class="project-page section-padding bg-gray" data-scroll-index="1">
        <div class="container">
            <div class="row">
                    <div class="section-subtitle">{{$project->title_2}}</div>
                    <div class="section-title">{{$project->title_1}}</div>
            </div>
            <div class="row">
            <!-- about -->
            <div class="col-md-9">
                   <div class="row">
                    <p>{{strip_tags($project->description)}}</p>
                    <div class="row mb-30">
                        <div class="col-md-6 gallery-item">
                            <a href="{{asset($project->project_image)}}" title="Event" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"> <img src="{{asset($project->project_image)}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 gallery-item">
                            <a href="{{asset($project->project_image)}}" title="Fashion" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"> <img src="{{asset($project->project_image)}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    {{-- <h5>What was included in the project?</h5>
                    <p>Nulla vitae metus tincidunt, varius nunc quis, porta nulla. Pellentesque vel dui nec libero auctor pretium id sed arcu. Nunc consequat diam id nisl blandit dignissim. Etiam commodo diam dolor, at scelerisque sem finibus sit amet. Curabitur id lectus eget purus finibus laoreet.</p> --}}
                    <ol class="number">
                        <li>Duisteyerionyer venenatis lacus gravida eros ut turpis interdum.</li>
                        <li>Sedeuter nunc volutpat mollis sapien viventa drana viventa.</li>
                        <li>Fusceler mollis augue sit amet hendrerit vestibulum.</li>
                    </ol>
                </div>
            </div>
            <!-- details -->
            <div class="col-md-2 offset-md-1">
                <ul class="content nor-list nor-list-divider">
                    <li class="author">
                        <strong>Client</strong>
                        <span>{{$project->client}}</span>
                    </li>
                    <li class="date">
                        <strong>Date</strong>
                        <span>{{Carbon\Carbon::parse($project->created_at)->format('jS M Y') }}</span>
                        {{-- <span>26 October, 2022</span> --}}
                    </li>
                    {{-- <li class="category">
                        <strong>Category</strong>
                        <span><a href="#">Architecture</a>, <a href="#">Interior</a></span>
                    </li> --}}
                </ul>
                {{-- <div class="share-icons mb-30">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
                <a href="#0" class="button-secondary">Visit Site</a> --}}

            </div>
            </div>
        </div>
    </section>
    <!-- Prev-Next Projects -->
    {{-- <section class="projects-prev-next">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div class="projects-prev-next-left">
                            <a href="#"> <i class="norc-arrow-left"></i> Previous Project</a>
                        </div>
                        <a href="projects.html"><i class="fa fa-th-large"></i></a>
                        <div class="projects-prev-next-right">
                            <a href="#">Next Project <i class="norc-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

@endsection
