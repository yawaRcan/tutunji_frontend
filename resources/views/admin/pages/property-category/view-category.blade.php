@extends('admin.layouts.master')
@section('title')
    <title> All Category</title>
    <style>
        .swal2-icon.swal2-warning {
            /*border-color: #facea8;*/
            /*color: #f8bb86;*/
            border-color: #1ed760;
            border-colorrcolor: #1ed760;
        }
    </style>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Category</h1>
                    </div>
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href=""></a>Website Members</li>--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">All Members</a></li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
                </div>
                {{--                <div class="text-right"><a href="{{url('/admin/add-property')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Property</a></div>--}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List of Category</h3>
                            <div class="text-right">
                                @can('view_only')<a href="{{url('/admin/add-category')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-plus-circle"></i> Add category</a>@endcan
                                @if(Auth::guard('admin')->user()->role == 1)<i class="fa fa-minus" style="color: #949496;display: none;"></i>@else<i class="fa fa-minus" style="color: #949496"></i>@endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($allCategory as $categoryData)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{($categoryData->name) ? $categoryData->name : '-'}}</td>
                                        <td>@if($categoryData->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @elseif($categoryData->status == 0)
                                                <span class="badge badge-danger">Deactive</span>
                                            @else
                                                {{--                                                <span class="badge badge-success">Approved</span>--}}
                                            @endif
                                        </td>
                                        <td>@can('view_only')
                                                <a href="{{url('/admin/edit-category',[$categoryData['id']])}}" class="btn btn-primary btn-sm" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-edit"></i></a>

                                                <a href="{{url('/admin/delete-category',[$categoryData['id']])}}" class="btn btn-primary btn-sm delete-confirm" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>
                                                @if($categoryData->status == 0)
                                                    <a href="{{url('/admin/update-category-status',$categoryData['id'])}}" class="btn btn-sm btn-success active-confirm" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-check"></i></a>&nbsp;
                                                    {{--                                                @else--}}
                                                    {{--                                                    <a href="{{url('/admin/update-status',$preData['id'])}}" class="btn btn-sm btn-success" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>&nbsp;--}}

                                                @endif
                                            @endcan
                                            @if(Auth::guard('admin')->user()->role == 1)<p style="display: none">---</p>@else<p>---</p>@endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Status</th>
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
    <!-- del confirmation -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function (){
            //delete category
           $(document).on('click','.delete-confirm',function (e){
               e.preventDefault();
               const url = $(this).attr('href');
               Swal.fire({
                   title: 'Are you sure?',
                   text: "You want to delete this category?",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                   if (result.isConfirmed) {
                       window.location.href = url;
                       // Swal.fire(
                       //     'Deleted!',
                       //     'Your category has been deleted.',
                       //     'success'
                       // )
                   }
               })
           });
           //active category
           $(document).on('click','.active-confirm',function (e){
               e.preventDefault();
               const url = $(this).attr('href');
               Swal.fire({
                   title: 'Are you sure?',
                   text: "You want to active this category?",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Yes, active it!'
               }).then((result) => {
                   if (result.isConfirmed) {
                       window.location.href = url;
                       Swal.fire(
                           'Activated!',
                           'Your category has been activated.',
                           'success'
                       )
                   }
               })
           });
        });
    </script>
@endsection
