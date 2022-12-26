@extends("frontend.home_master")



@section("home_frontend")

@php
    $projects = App\Models\Home\ProjectMultiImage::latest()->paginate(3);
    $projects = App\Models\Home\ProjectMultiImage::where('project_id', '>', 6)->paginate(3);;
    $banner = App\Models\Home\Banner::findOrFail(1);
    $abouts = App\Models\Home\HomeAbout::findOrFail(1);

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
                <h6>Project Images</h6>
                <h1>Image <span>Gallery</span></h1>
            </div>
        </div>
    </div>
</section>


 <!--  Image Gallery -->
 <section class="section-padding">
    <div class="container">
        <div class="row">
            <!-- 3 columns -->
            @foreach ($projects as $key => $item)
                    <div class="col-md-4 gallery-item">
                        <a href="{{asset($item->project_multi_image_name)}}" title="Norc. Construction" class="img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="{{asset($item->project_multi_image_name)}}"
                                    class="img-fluid mx-auto d-block" alt="work-img">
                                </div>
                            </div>
                        </a>
                    </div>
            @endforeach

            {!! $projects->links() !!}
        </div>
    </div>
</section>




@endsection

