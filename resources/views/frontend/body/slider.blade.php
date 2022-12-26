
@php
    $sliders = App\Models\Home\HomeSlider::latest()->paginate(4);

@endphp

<!-- Slider -->
<header class="header slider-fade">
    <div class="owl-carousel owl-theme">
        <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
        @foreach ($sliders as $item)

            {{-- <div class="text-left item bg-img" data-overlay-dark="4" data-background="{{asset('frontend/maatech/img/slider/1.jpg')}} "> --}}
            <div class="text-left item bg-img" data-overlay-dark="4" data-background="{{asset($item->slider_image)}}">
                <div class="v-middle caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <h4>{{$item->short_title}}</h4>
                                <h1>{{$item->title}}</h1>
                                <p>{{strip_tags($item->content)}}</p>
                                <a href="{{ route('project.page') }}" class="button-primary">Our Projects</a>
                                <a href="{{ route('services.page') }}" class="button-tersiyer">Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</header>
