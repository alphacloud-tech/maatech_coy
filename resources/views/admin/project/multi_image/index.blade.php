@extends("admin.admin_master")


@section("admin_home")


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Home Project Multi Image</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin.add.about') }}">Add Home About</a></li> --}}
                        <li class="breadcrumb-item active">Home Project Multi Image</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Home Project Multi Image</h4>

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
                                <th>Image</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach( $multiImages as  $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><img width="50" src="{{ asset($item->project_multi_image_name) }}" alt=""></td>

                                <td>
                                    @if ($item->project_id <= 6)
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="dropdown">
                                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item disabled" href="{{ route('admin.delete.portifolio', $item->id) }}">Disabled</a>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end card-body -->
                                    @else
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="dropdown">
                                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('project.delete.multi_image', $item->id) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end card-body -->
                                    @endif
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end cardaa -->
        </div> <!-- end col -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Project Multi Image</h4>
                </div>
                <div class="card-body">

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store.multimage') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="project_multi_image_name" class="form-label"> Project Multi Image</label>
                                <input
                                    name="project_multi_image_name[]"
                                    type="file"
                                    class="form-control"
                                    id="project_multi_image_name"
                                    aria-describedby=""
                                    multiple=""
                                    >
                                @error('project_multi_image_name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end cardaa -->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->

@endsection
