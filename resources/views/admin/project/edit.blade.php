@extends("admin.admin_master")

@section("admin_home")

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="container-fluid">


    <div class="row">
        <!-- <div class="col-xl-2"></div> -->

        <div class="col-xl-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Home Project</h4>
                    <!-- <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p> -->
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.update.project', $project->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf
                        <input type="hidden" name="old_image" value="{{ $project->project_image }}">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="title_1">Project title One</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="title_1"
                                        placeholder="title_1"
                                        name="title_1"
                                        value="{{ $project->title_1 }}"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('title_1')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="title_2">Project title Two</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="title_2"
                                        placeholder="title_2"
                                        name="title_2"
                                        value="{{ $project->title_2 }}"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('title_2')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="project_icon">Project Icon</label>
                                    <input name="project_icon" type="text"
                                    class="form-control" id="project_icon"
                                    value="{{ $project->project_icon }}"
                                    required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('project_icon')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="project_type">Project Type</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="project_type"
                                        placeholder="project_type"
                                        name="project_type"
                                        value="{{ $project->project_type }}"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('project_type')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="title_1">Project client</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="client"
                                        placeholder="client"
                                        name="client"
                                        value="{{ $project->client }}"
                                        >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('client')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="title_2">Project category</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="category"
                                        placeholder="category"
                                        name="category"
                                        value="{{ $project->category }}"
                                        >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('category')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="project_image">Project Image</label>
                                    <input name="project_image" type="file" class="form-control" id="project_image" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('project_image')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                   <img id="show_image" width="100" height="70" src="{{ !empty($project->project_image)? asset($project->project_image) : 'https://via.placeholder.com/150' }}" alt="ghjhsdjk" srcset="">
                                </div>
                            </div> --}}
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="content_long">Long Content</label>

                                    <textarea name="description" id="ckeditor-classic">
                                        {{ $project->description }}
                                    </textarea>

                                    <div class="invalid-feedback">
                                        Please provide content.
                                    </div>

                                    @error('description')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
            <!-- end card -->


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Home Project Thumbnail Image</h4>
                    <!-- <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p> -->
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('project.update.image_thumbnail') }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf
                        {{-- <input type="hidden" name="old_image" value="{{ $project->project_image }}"> --}}
                        <input type="hidden" name="project_thumbnail_id" value="{{ $project->id }}">
                        <input type="hidden" name="old_img" value="{{ $project->project_image }}">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="project_image">Project Image</label>
                                    <input name="project_image" type="file" class="form-control" id="project_image" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('project_image')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                   <img id="show_image" width="100px" height="70px" src="{{ !empty($project->project_image)? asset($project->project_image) : 'https://via.placeholder.com/150' }}" alt="ghjhsdjk" srcset="">
                                </div>
                            </div>
                        </div>



                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Home Project Multi Image</h4>
                    <!-- <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p> -->
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('project.update.multi_image') }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf
                        {{-- <input type="hidden" name="old_image" value="{{ $project->project_image }}"> --}}
                        {{-- <input type="hidden" name="project_thumbnail_id" value="{{ $project->id }}">
                        <input type="hidden" name="old_img" value="{{ $project->project_image }}"> --}}

                        <div class="row">
                            @foreach ($multiImgs as $img)
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label" for="project_image">Project Image</label>
                                        {{-- <input name="project_multi_image_name" type="file" class="form-control" id="project_image" > --}}
                                        <input
                                            type="file"
                                            name="multi_img[ {{$img->id}} ]"
                                            id="multi_img"
                                            class="form-control"
                                        />
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>

                                        @error('project_multi_image_name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <img id="" width="100px" height="70px" src="{{ asset($img->project_multi_image_name) }}" alt="ghjhsdjk" srcset="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h5 class="card-title">
                                        <a href="{{ route('project.delete.multi_image', $img->id) }}"
                                            class="btn btn-sm btn-danger" id="delete" title="Delete Data">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </h5>
                                </div>



                            @endforeach
                        </div>



                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

        <!-- <div class="col-xl-2"></div> -->

    </div>
    <!-- end row -->


</div> <!-- container-fluid -->


<script>

    $(document).ready(function(){
        $('#project_image').change(function(e){ //on file input change
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show_image").attr("src", e.target.result);
            };
            reader.readAsDataURL(e.target.files["0"]);
        });
    });

</script>

{{-- ---------------------------Show Multi Image JavaScript Code ------------------------ --}}

<script>

    $(document).ready(function(){
     $('#multi_img').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                    .height(80); //create image element
                        $('#preview_multi_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

    </script>
  {{-- ================================= End Show Multi Image JavaScript Code. ==================== --}}


@endsection
