@extends('admin.layouts.master')
@section('title')
    <title> All Agent </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Agent</h1>
                    </div>
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href=""></a>Users</li>--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Sale</a></li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
                </div>

                {{--                <div class="text-right">--}}
                {{--                    @can('view_only')<a href="{{url('/register')}}" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-plus"></i> Add Users</a>@endcan--}}
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
                            <h3 class="card-title">List of Agent</h3>
                            <div class="text-right">
                                @can('view_only')<a href="{{url('/admin/add-agent')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-plus-circle"></i> Add agent</a>@endcan
                                @if(Auth::guard('admin')->user()->role == 1)<i class="fa fa-minus" style="color: #949496;display: none;"></i>@else<i class="fa fa-minus" style="color: #949496"></i>@endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
                            {{--                            @if(Session::has('success'))<div class="alert alert-success">{{Session::get('success')}}</div>@endif--}}
                            {{--                            @if(Session::has('error'))<div class="alert alert-danger">{{Session::get('error')}}</div>@endif--}}
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
{{--                                    <th>Image</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($agentData as $agentDetail)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{($agentDetail->fullName) ? $agentDetail->fullName : '-'}}</td>
                                        <td>{{($agentDetail->email) ? $agentDetail->email : '-'}}</td>
                                        <td>{{($agentDetail->phone) ? $agentDetail->phone : '-'}}</td>
{{--                                        <td>--}}
{{--                                            @if($agentDetail->image)--}}
{{--                                                <img src="{{asset('admin-panel/assets/agent/images/'.$agentDetail->image)}}" class="profile-img" height="100px" width="100px">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('default/blank-profile.png')}}" class="profile-img" height="100px" width="100px">--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
                                        <td>@can('view_only')
                                                <a href="{{url('/admin/edit-agent',[$agentDetail->id])}}" class="btn btn-primary btn-sm" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-edit"></i></a>
                                                    <a href="{{url('/admin/delete-agent',[$agentDetail->id])}}" class="btn btn-sm btn-success delete-confirm" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>
                                            @endcan
                                            @if(Auth::guard('admin')->user()->role == 1)<p style="display: none;">---</p>@else<p>---</p>@endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
{{--                                    <th>Image</th>--}}
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
    <!-- begin delete-confirmation script -->
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
                    text: "You want to delete this agent?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                        Swal.fire(
                            'Deleted!',
                            'Your agent has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endsection
