@extends("admin.admin_master")

@section("admin_home")

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create Home About</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"> Home About</a></li>
                        <li class="breadcrumb-item active">Create Home About</li>
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
                    <h4 class="card-title">Create Home About</h4>
                    <!-- <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p> -->
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.store.about') }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf
                        
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="coy_name">Company Name</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="coy_name" 
                                        placeholder="Company Name" 
                                        name="coy_name" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('coy_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="title">About Title</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="title" 
                                        placeholder="About Title" 
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
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="coy_yr_exp">Company Experience</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="coy_yr_exp" 
                                        placeholder="Company Year of Experience" 
                                        name="coy_yr_exp" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('coy_yr_exp')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="yr_founded">Company Year Founded</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="yr_founded" 
                                        placeholder="Company Year Founded" 
                                        name="yr_founded" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('yr_founded')
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
                                    <label class="form-label" for="content">Short Content</label>

                                    <textarea class="form-control" name="content_short" required>
                                        
                                    </textarea>
                                     
                                    <div class="invalid-feedback">
                                        Please provide content.
                                    </div>

                                    @error('content_short')
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

                                    <textarea name="content_long" id="ckeditor-classic">
                                        
                                    </textarea>
                                     
                                    <div class="invalid-feedback">
                                        Please provide content.
                                    </div>

                                    @error('content_long')
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
                                    <label class="form-label" for="about_image">About Image</label>
                                    <input name="about_image" type="file" class="form-control" id="about_image" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('about_image')
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