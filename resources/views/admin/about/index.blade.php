@extends("admin.admin_master")


@section("admin_home")


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Home About</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.add.about') }}">Add Home About</a></li>
                        <li class="breadcrumb-item active">Home About</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Home About</h4>

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
                                <th>Name</th>
                                <th>Title</th>
                                <th>L.Content</th>
                                <th>S.Content</th>
                                <th>Yr Exp</th>
                                <th>Yr Found</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $i = 1;
                            @endphp
                            @foreach( $abouts as  $item)
                            <tr>
                                <td>{{$i++}}</td>

                                <td><img width="50" src="{{ asset($item->about_image) }}" alt=""></td>
                                <td>{{  $item->coy_name }}</td>
                                <td>{{  Str::limit($item->title, 10) }}</td>
                                <td>{!! Str::limit($item->content_long, 20)  !!}</td>
                                <td>{!! Str::limit($item->content_short, 20)  !!}</td>
                                <td>{{  Str::limit($item->coy_yr_exp, 10) }}</td>
                                <td>{{  $item->yr_founded }}</td>
                                <td>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="dropdown">
                                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('admin.edit.about', $item->id) }}">Edit</a>
                                                        <a class="dropdown-item" href="{{ route('admin.delete.about', $item->id) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
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
    </div> <!-- end row -->
</div> <!-- container-fluid -->

@endsection