@extends('admin.layouts.master')
@section('title')
    <title> View Offers </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View Offers</h1>
                    </div>
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href=""></a>Properties</li>--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Pre-construct</a></li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
                </div>
                {{--                <div class="text-right">--}}
                {{--                        @can('view_only')<a href="{{url('/admin/add-pre-construct-property')}}" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-plus"></i> Add Property</a>@endcan--}}
                {{--                        @if(Auth::guard('admin')->user()->role == 1)<i class="fa fa-minus" style="color: #949496;display: none;"></i>@else<i class="fa fa-minus" style="color: #949496"></i>@endif--}}
                {{--                </div>--}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List of Offers</h3>
                            <div class="text-right">
                                @can('view_only')
{{--                                    <a href="{{url('/admin/list-pre-construct-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">All</a>--}}
{{--                                    <a href="{{url('/admin/active-pre-construct-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Active</a>--}}
{{--                                    <a href="{{url('/admin/deleted-pre-construct-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Deleted</a>--}}
                                    <a href="{{url('/admin/add-offers',$propertyId)}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-plus-circle"></i> Add Offer</a>
                                @endcan
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
                                    <th>Time Submitted</th>
                                    <th>Full Name</th>
{{--                                    <th>Property Id</th>--}}
{{--                                    <th>User Id</th>--}}
                                    <th>Phone number</th>
                                    <th>Email Address</th>
                                    <th>Brokerage Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($offerData as $i_detail)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{date('m/d/Y H:i',strtotime($saleData['created_at']))}}</td>
                                        <td>{{($i_detail['full_name']) ? $i_detail['full_name'] : '-'}}</td>
{{--                                        <td>{{($i_detail['property_id']) ? $i_detail['property_id'] : '-'}}</td>--}}
{{--                                        <td>{{($i_detail['user_id']) ? $i_detail['user_id'] : '0'}}</td>--}}
                                        <td>{{($i_detail['phone_number']) ? $i_detail['phone_number'] : '-'}}</td>
                                        <td>{{($i_detail['email_address']) ? $i_detail['email_address'] : '-'}}</td>
                                        <td>{{($i_detail['brokerage_name']) ? $i_detail['brokerage_name'] : '-'}}</td>
                                        <td>
                                            @can('view_only')
                                                <a href="{{url('/admin/edit-offers',$i_detail['id'])}}" class="btn btn-primary btn-sm" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('/admin/delete-offers',$i_detail['id'])}}" class="btn btn-primary btn-sm delete-confirm" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>
                                            @endcan
                                            @if(Auth::guard('admin')->user()->role == 1)<p style="display: none">---</p>@else<p>---</p>@endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Time Submitted</th>
                                    <th>Full Name</th>
{{--                                    <th>Property Id</th>--}}
{{--                                    <th>User Id</th>--}}
                                    <th>Phone number</th>
                                    <th>Email Address</th>
                                    <th>Brokerage Name</th>
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

    <!-- del confirmation -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function (){
            //delete category
            $(document).on('click','.delete-confirm',function (e){
                e.preventDefault();
                const url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this property?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1ed760',
                    cancelButtonColor: '#949496',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                        Swal.fire(
                            'Deleted!',
                            'Your property has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endsection
