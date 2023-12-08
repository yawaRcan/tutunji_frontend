@extends('admin.layouts.master')
@section('title')
    <title> All Roles</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Roles</h1>
                    </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href=""></a>Dashboard</li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">All Roles</a></li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
                </div>
{{--                <div class="text-right"><a href="{{url('/admin/add-role')}}" class="btn btn-primary" style="background-color: #1ED65f;border-color: #1ED65f;"><i class="fa fa-plus"></i> Add Role</a></div>--}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Roles</h3>
                            <div class="text-right">
                                @can('view_only')<a href="{{url('/admin/add-role')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65f;border-color: #1ED65f;"><i class="fa fa-plus-circle"></i> Add role</a>@endcan
                                    @if(Auth::guard('admin')->user()->role == 1)<i class="fa fa-minus" style="color: #949496;display: none;"></i>@else<i class="fa fa-minus" style="color: #949496"></i>@endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roleData as $roleDetails)
                                    <tr>
                                        <td>{{ $roleDetails['name'] }}</td>
                                        <td><b style="font-size: 13px;">{{ implode(',  ', array_column($roleDetails['permission_details'], 'name')) }}</b></td>
                                        <td>@can('view_only')<a href="{{url('/admin/edit-role',$roleDetails['id'])}}" class="btn btn-primary btn-sm" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-edit"></i></a>&nbsp;@endcan
                                            @can('view_only')<a href="{{url('/admin/delete-role',$roleDetails['id'])}}" class="btn btn-primary btn-sm delete-confirm" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>@endcan
                                            @if(Auth::guard('admin')->user()->role == 1)<p style="display: none">---</p>@else<p>---</p>@endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Permissions</th>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function (){
            //delete category
            $(document).on('click','.delete-confirm',function (e){
                e.preventDefault();
                const url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this role?",
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
                            'Your role has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endsection
