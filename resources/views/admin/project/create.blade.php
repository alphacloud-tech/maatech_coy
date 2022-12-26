@extends("admin.admin_master")

@section("admin_home")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create Home Project</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"> Home Project</a></li>
                        <li class="breadcrumb-item active">Create Home Project</li>
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
                    <h4 class="card-title">Create Home Project</h4>
                    <!-- <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p> -->
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.store.project') }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf

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
                                    <input name="project_icon" type="text" class="form-control" id="project_icon" required>
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
                                    <label class="form-label" for="title_1">Project client</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="client"
                                        placeholder="client"
                                        name="client"
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

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="project_type">Project Type</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="project_type"
                                        placeholder="project_type"
                                        name="project_type"
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
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="project_image">Project Image</label>
                                    <input name="project_image" type="file" class="form-control" id="project_image" required>
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
                                    <label class="form-label" for="project_image">Project Multiple Image(max=2)</label>
                                    <input
                                        name="multi_img[]"
                                        type="file"
                                        class="form-control"
                                        multiple = ""
                                        id="multi_img" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('multi_img')
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
