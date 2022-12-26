@extends("admin.admin_master")

@section("admin_home")

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="container-fluid">


    <div class="row">
        <!-- <div class="col-xl-2"></div> -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Home Service</h4>
                    <!-- <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p> -->
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.update.service', $service->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf
                        <input type="hidden" name="old_image" value="{{ $service->service_image }}">
                        <div class="row">


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Service Title</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        placeholder="Service Title"
                                        name="title"
                                        value="{{ $service->title }}"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('title')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="about_image">Service Icon</label>
                                    <input name="service_icon" type="text" class="form-control" id="service_icon" value="{{ $service->service_icon }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('service_icon')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="row">


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="service_image">Service Image</label>
                                    <input name="service_image" type="file" class="form-control" id="service_image" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('service_image')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                   <img id="show_image" width="100" height="70" src="{{ !empty($service->service_image)? asset($service->service_image) : 'https://via.placeholder.com/150' }}" alt="ghjhsdjk" srcset="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="content_long">Long Content</label>

                                    <textarea name="long_description" id="ckeditor-classic">
                                        {{ $service->long_description }}
                                    </textarea>

                                    <div class="invalid-feedback">
                                        Please provide content.
                                    </div>

                                    @error('long_description')
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
        </div> <!-- end col -->

        <!-- <div class="col-xl-2"></div> -->

    </div>
    <!-- end row -->


</div> <!-- container-fluid -->


<script>

    $(document).ready(function(){
        $('#service_image').change(function(e){ //on file input change
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show_image").attr("src", e.target.result);
            };
            reader.readAsDataURL(e.target.files["0"]);
        });
    });

</script>

@endsection
