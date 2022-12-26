@extends("admin.admin_master")

@section("admin_home")

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create Home Contact</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"> Home Contact</a></li>
                        <li class="breadcrumb-item active">Create Home Contact</li>
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
                    <h4 class="card-title">Create Home Contact</h4>
                    <!-- <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p> -->
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.store.contact') }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf
                        
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="coy_name">Company Email 1</label>
                                    <input 
                                        type="email" 
                                        class="form-control" 
                                        id="email_1" 
                                        placeholder="Company Email 1" 
                                        name="email_1" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('email_1')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="coy_name">Company Email 2</label>
                                    <input 
                                        type="email" 
                                        class="form-control" 
                                        id="email_2" 
                                        placeholder="Company Email 2" 
                                        name="email_2" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('email_2')
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
                                    <label class="form-label" for="coy_yr_exp">Company Phone 1</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="phone_1" 
                                        placeholder="Company Phone 1" 
                                        name="phone_1" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('phone_1')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="coy_yr_exp">Company Phone 2</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="phone_2" 
                                        placeholder="Company Phone 2" 
                                        name="phone_2" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('phone_2')
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
                                    <label class="form-label" for="coy_yr_exp">Company Phone 3</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="phone_3" 
                                        placeholder="Company Phone 3" 
                                        name="phone_3" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('phone_3')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="coy_yr_exp">Company Phone 4</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="phone_4" 
                                        placeholder="Company Phone 4" 
                                        name="phone_4" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    @error('phone_4')
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
                                    <label class="form-label" for="content_long">Company Address</label>

                                    <textarea name="address" id="ckeditor-classic">
                                        
                                    </textarea>
                                     
                                    <div class="invalid-feedback">
                                        Please provide content.
                                    </div>

                                    @error('address')
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