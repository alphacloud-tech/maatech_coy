

@php

$cores = App\Models\Home\CoreValue::latest()->paginate(6);

@endphp

@section('title')
{{ $abouts->coy_name }} | core value
@endsection

<section class="values section-padding bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">Our Values</div>
                <div class="section-title">Core <span>Values</span></div>
            </div>
        </div>
        <div class="row">
            @foreach ($cores as $item)
                <div class="col-md-4">
                    <div class="single-facility">
                        <span class="{{$item->icon}}"></span>
                        <h5>{{$item->title}}</h5>
                        <p>{{strip_tags($item->content)}}</p>
                        <div class="facility-shape"> <span class="{{$item->icon}}"></span> </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
