@extends("admin.admin_master")

@section("admin_home")

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create Home Team</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"> Home Team</a></li>
                        <li class="breadcrumb-item active">Create Home Team</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <!-- <div class="col-xl-2"></div> -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Home Team</h4>
                    <!-- <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p> -->
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.store.team') }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf

                        <div class="row">

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Team name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder="name"
                                        name="name"
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
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Team title</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        placeholder="title"
                                        name="title"
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
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="team_image">Image</label>
                                    <input name="team_image" type="file" class="form-control" id="team_image" required>
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

                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="linkedin">Linkedin</label>
                                    <input name="linkedin" type="text" class="form-control" id="linkedin" >
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
                                        >
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
                                        >
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
                                    <label class="form-label" for="twitter">Twitter</label>
                                    <input name="twitter" type="text" placeholder="twitter" class="form-control" id="twitter">
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


                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

        <!-- <div class="col-xl-2"></div> -->

    </div>
    <!-- end row -->


</div> <!-- container-fluid -->

@endsection
