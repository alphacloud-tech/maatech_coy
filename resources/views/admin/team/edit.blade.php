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

                    <form method="POST" action="{{ route('admin.update.team', $team->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf
                        <input type="hidden" name="old_image" value="{{ $team->team_image }}">

                        <div class="row">

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Team name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder="name"
                                        name="name"
                                        value="{{ $team->name }}"
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
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Team title</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        placeholder="title"
                                        name="title"
                                        value="{{ $team->title }}"
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

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="team_image">Image</label>
                                    <input name="team_image" type="file" class="form-control" id="team_image" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('team_image')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                   <img id="show_image" width="100" height="70" src="{{ !empty($team->team_image)? asset($team->team_image) : 'https://via.placeholder.com/150' }}" alt="ghjhsdjk" srcset="">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="linkedin">Linkedin</label>
                                    <input name="linkedin" type="text"
                                    class="form-control" id="linkedin" value="{{ $team->linkedin }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('linkedin')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="facebook">Facebook</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="facebook"
                                        placeholder="facebook"
                                        name="facebook"
                                        value="{{ $team->facebook }}"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('facebook')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="instagram">instagram</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="instagram"
                                        placeholder="instagram"
                                        name="instagram"
                                        value="{{ $team->instagram }}"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('instagram')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="twitter">twitter</label>
                                    <input name="twitter" type="text"
                                    value="{{ $team->twitter }}"
                                    class="form-control" id="twitter" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('twitter')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="content_long">Long Content</label>

                                    <textarea name="description" id="ckeditor-classic">
                                        {{ $team->description }}
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

@endsection
