@extends('admin.layouts.master')
@section('modal-popup-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('title')
    <title> All Amenities </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Amenities</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item"><a href="#">Amenities</a></li>
                        </ol>
                    </div>
                </div>
{{--                <div class="text-right">--}}
{{--                    @can('view_only')<a href="" data-toggle="modal" data-target="#addAmenity" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"> <i class="fa fa-plus"></i> Add Amenity</a>@endcan--}}
{{--                    @if(Auth::guard('admin')->user()->role == 1)<i class="fa fa-minus" style="color: #949496;display: none;"></i>@else<i class="fa fa-minus" style="color: #949496"></i>@endif--}}

{{--                </div>--}}

            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List of Amenities</h3>
                            <div class="text-right">
                                @can('view_only')
                                    <a href="{{url('/admin/add-amenity')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"> <i class="fa fa-plus-circle"></i> Add amenity</a>
                                @endcan
                                @if(Auth::guard('admin')->user()->role == 1)<i class="fa fa-minus" style="color: #949496;display: none;"></i>@else<i class="fa fa-minus" style="color: #949496"></i>@endif

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
                            <div id="message"></div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @if($amenity->count() > 0)
                                    @foreach($amenity as $amenityDetail)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{($amenityDetail->name) ? $amenityDetail->name : '-'}}</td>
                                            <td>
                                                @if($amenityDetail->icon)
                                                <img src="{{asset('admin-panel/assets/property-images/amenities/icons/'.$amenityDetail->icon)}}" height="80px" width="80px">
                                                @endif
                                            </td>
                                            <td>
                                                @can('view_only')
                                                    <a href="{{url('/admin/edit-amenity',$amenityDetail->id)}}" class="btn btn-primary btn-sm" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-edit"></i></a>
                                                    <a href="{{url('/admin/del-amenity',$amenityDetail->id)}}" class="btn btn-danger btn-sm delete-confirm" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>
                                                @endcan
                                                @if(Auth::guard('admin')->user()->role == 1)<p style="display: none">---</p>@else<p>---</p>@endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>no result found</p>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- del icon using ajax -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){
            //delete category
            $(document).on('click','.delete-confirm',function (e){
                e.preventDefault();
                const url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this amenity?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
            });
        });
    </script>
@endsection
