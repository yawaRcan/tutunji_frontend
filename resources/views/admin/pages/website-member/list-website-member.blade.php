@extends('admin.layouts.master')
@section('title')
    <title> All Website Members</title>
    <style>
        input[type="file"] {
            display: none;
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
                        <h1>All Website Members</h1>
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
                            <h3 class="card-title">List of Website Members</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($memberData as $memberDetail)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>
                                            @if($memberDetail['image'])
                                                <img src="{{asset('frontend/assets/profile/'.$memberDetail['image'])}}" class="profile-img" height="100px" width="100px">
                                            @else
                                                <img src="{{asset('default/blank-profile.png')}}" class="profile-img" height="100px" width="100px">
                                            @endif

{{--                                                <img src="{{asset($memberDetail['image'] ? 'frontend/assets/profile/'.$memberDetail['image'] : 'frontend/assets/imgs/noimage.png')}}" height="100px" width="100px">--}}

                                        </td>
                                        <td>{{($memberDetail['name']) ? $memberDetail['name'] : '-'}}</td>
                                        <td>{{($memberDetail['email']) ? $memberDetail['email'] : '-'}}</td>
                                        <td>{{($memberDetail['phone'] ? $memberDetail['phone'] : '-')}}</td>
                                        <td>@can('view_only')<a href="{{url('/admin/edit-website-member',[$memberDetail['id']])}}" class="btn btn-primary btn-sm" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-edit"></i></a><a href="{{url('/admin/delete-website-member',[$memberDetail['id']])}}" class="btn btn-primary btn-sm show_confirm" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>@endcan
                                            @if(Auth::guard('admin')->user()->role == 1)<p style="display: none">---</p>@else<p>---</p>@endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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

    <script type="text/javascript">
        $('.show_confirm').click(function(e) {
            if(!confirm('Are you sure you want to delete this member?')) {
                e.preventDefault();
            }
        });
    </script>
@endsection
