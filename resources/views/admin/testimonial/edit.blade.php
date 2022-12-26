@extends("admin.admin_master")

@section("admin_home")

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="container-fluid">

    <div class="row">
        <!-- <div class="col-xl-2"></div> -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Home Testimonial</h4>
                    <!-- <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p> -->
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.update.testimonial', $testimonial->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf

                        <input type="hidden" name="old_image" value="{{ $testimonial->comment_image }}">

                        <div class="row">


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Testimonial Title</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        placeholder="Service Title"
                                        name="title"
                                        value="{{ $testimonial->title }}"
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
                                    <label class="form-label" for="title">Testimonial Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder="Service name"
                                        name="name"
                                        value="{{ $testimonial->name }}"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('name')
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
                                    <label class="form-label" for="comment_image">Image</label>
                                    <input name="comment_image" type="file" class="form-control" id="comment_image" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('comment_image')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                   <img id="show_image" width="100" height="70" src="{{ !empty($testimonial->comment_image)? asset($testimonial->comment_image) : 'https://via.placeholder.com/150' }}" alt="ghjhsdjk" srcset="">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="content_long">Comment</label>

                                    <textarea name="comment" id="ckeditor-classic">
                                        {{ $testimonial->comment }}
                                    </textarea>

                                    <div class="invalid-feedback">
                                        Please provide content.
                                    </div>

                                    @error('comment')
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
        $('#comment_image').change(function(e){ //on file input change
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show_image").attr("src", e.target.result);
            };
            reader.readAsDataURL(e.target.files["0"]);
        });
    });

</script>

@endsection
