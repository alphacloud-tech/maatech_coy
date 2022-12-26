@extends("admin.admin_master")


@section("admin_home")


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Home Services</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.add.service') }}">Add Home Services</a></li>
                        <li class="breadcrumb-item active">Home Services</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Home Services</h4>

                    <div class="card-title-desc">
                        @if(session("success"))
                            <div class="card-body">
                                <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                                    <i class="mdi mdi-alert-circle-outline me-2"></i>
                                    {{ session("success") }}!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>S.Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach( $cores as  $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{  Str::limit($item->icon, 30) }}</td>
                                <td>{{  Str::limit($item->title, 30) }}</td>
                                <td>{!! Str::limit($item->content, 50)  !!}</td>
                                <td>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="dropdown">
                                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('admin.edit.core', $item->id) }}">Edit</a>
                                                        <a class="dropdown-item" href="{{ route('admin.delete.core', $item->id) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end card-body -->
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end cardaa -->
        </div> <!-- end col -->

        <div class="col-xl-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Home Core Value</h4>
                    <!-- <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p> -->
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.store.core') }}" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf

                        <div class="row">

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="title"> Core Value title</label>
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
                                    <label class="form-label" for="icone"> Core Value Icon</label>
                                    <input name="icon" type="text" class="form-control" id="icon" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    @error('icon')
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
                                    <label class="form-label" for="content"> Core Value Content</label>

                                    <textarea name="content" id="ckeditor-classic">

                                    </textarea>

                                    <div class="invalid-feedback">
                                        Please provide content.
                                    </div>

                                    @error('content')
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
    </div> <!-- end row -->
</div> <!-- container-fluid -->

@endsection
