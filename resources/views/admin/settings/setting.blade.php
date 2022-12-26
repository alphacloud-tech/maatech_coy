@extends("admin.admin_master")


@section("admin_home")

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

@php

    $data = App\Models\Home\Banner::findOrFail(1);
    $logo = App\Models\Home\Logo::findOrFail(1);
    // dd($logo);
    $favicon = App\Models\Home\Favicon::findOrFail(1);

@endphp

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Home Settings</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Home Settings</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Banner</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.edit.banner') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="name" name="id" value="{{$data->id}}">
                        <input type="hidden" id="old_image" name="old_image" value="{{$data->name}}">

                        <div class="mb-3">
                            <label for="name" class="form-label"> Banner (1920 x 1080)</label>
                            <input
                                name="name"
                                type="file"
                                class="form-control"
                                id="banner"
                                aria-describedby=""
                                >
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Banner</h4>

                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <div class="mb-3">
                               <img id="show_banner"  class="img-fluid" src="{{ !empty($data->name)? asset($data->name) : 'https://via.placeholder.com/150' }}" alt="ghjhsdjk" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end cardaa -->
        </div> <!-- end col -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Logo</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.edit.logo') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="text" id="name" name="id" value="{{$logo->id}}">
                        <input type="text" id="old_image" name="old_image" value="{{$logo->name}}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Logo Image (180 x 28)</label>
                            <input
                                name="name"
                                type="file"
                                class="form-control"
                                id="logo"
                                aria-describedby=""
                                >
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Logo</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <div class="mb-3">
                               <img id="show_logo"  class="img-fluid" src="{{ !empty($logo->name)? asset($logo->name) : 'https://via.placeholder.com/150' }}" alt="ghjhsdjk" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Favicon</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.edit.favicon') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="name" name="id" value="{{$favicon->id}}">
                        <input type="hidden" id="old_image" name="old_image" value="{{$favicon->name}}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Favicon (72 x 72)</label>
                            <input
                                name="name"
                                type="file"
                                class="form-control"
                                id="favicon"
                                aria-describedby=""
                                >
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Favicon</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <div class="mb-3">
                               <img id="show_favicon"  class="img-fluid" src="{{ !empty($favicon->name)? asset($favicon->name) : 'https://via.placeholder.com/150' }}" alt="ghjhsdjk" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end cardaa -->
        </div> <!-- end col -->
    </div> <!-- end row -->

</div> <!-- container-fluid -->


<script>

    $(document).ready(function(){
        $('#logo').change(function(e){ //on file input change
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show_logo").attr("src", e.target.result);
            };
            reader.readAsDataURL(e.target.files["0"]);
        });
    });

</script>
<script>

    $(document).ready(function(){
        $('#banner').change(function(e){ //on file input change
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show_banner").attr("src", e.target.result);
            };
            reader.readAsDataURL(e.target.files["0"]);
        });
    });

</script>
<script>

    $(document).ready(function(){
        $('#favicon').change(function(e){ //on file input change
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show_favicon").attr("src", e.target.result);
            };
            reader.readAsDataURL(e.target.files["0"]);
        });
    });

</script>

@endsection
