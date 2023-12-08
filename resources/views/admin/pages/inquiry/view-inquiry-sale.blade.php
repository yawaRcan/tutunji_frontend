@extends('admin.layouts.master')
@section('title')
    <title> View Inquiries </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View Inquiry</h1>
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
                            <h3 class="card-title">List of Inquires</h3>
                            <div class="text-right">
                                @can('view_only')
                                    {{--                                    <a href="{{url('/admin/list-pre-construct-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">All</a>--}}
                                    {{--                                    <a href="{{url('/admin/active-pre-construct-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Active</a>--}}
                                    {{--                                    <a href="{{url('/admin/deleted-pre-construct-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Deleted</a>--}}
                                    <a href="{{url('/admin/add-inquiry-sale',$inquiryId)}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-plus-circle"></i> Add Submission</a>
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
                                    <th>Id</th>
                                    <th>Full Name</th>
                                    {{--                                    <th>Property Id</th>--}}
                                    {{--                                    <th>User Id</th>--}}
                                    <th>Phone number</th>
                                    <th>Email Address</th>
                                    <th>Brokerage_or_Agent</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inquiryData as $i_detail)
                                    <tr>
                                        <td>{{($i_detail['id']) ? $i_detail['id'] : '-'}}</td>
                                        <td>{{($i_detail['full_name']) ? $i_detail['full_name'] : '-'}}</td>
                                        {{--                                        <td>{{($i_detail['property_id']) ? $i_detail['property_id'] : '-'}}</td>--}}
                                        {{--                                        <td>{{($i_detail['user_id']) ? $i_detail['user_id'] : '0'}}</td>--}}
                                        <td>{{($i_detail['phone_number']) ? $i_detail['phone_number'] : '-'}}</td>
                                        <td>{{($i_detail['email_address']) ? $i_detail['email_address'] : '-'}}</td>
                                        <td>{{($i_detail['broker_or_agent']) ? $i_detail['broker_or_agent'] : '-'}}</td>
                                        <td>
                                            @can('view_only')
                                                ---
                                                {{--                                                <a href="{{url('/admin/view-inquiry',[$preData['id']])}}" class="btn btn-primary btn-sm" style="background-color: #949496;border-color: #949496;"><i class="fa fa-eye"></i></a>--}}
                                                {{--                                                <a href="{{url('/admin/edit-pre-construct-property',[$preData['id']])}}" class="btn btn-primary btn-sm" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-edit"></i></a>--}}
                                                {{--                                                @if($preData['internal_status'] == 1)--}}
                                                {{--                                                    <a href="{{url('/admin/update-status',$preData['id'])}}" class="btn btn-sm btn-success show_confirm" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>&nbsp;--}}
                                                {{--                                                @else--}}
                                                {{--                                                    <a href="{{url('/admin/update-status',$preData['id'])}}" class="btn btn-sm btn-success" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>--}}
                                                {{--                                                @endif--}}
                                            @endcan

                                            @if(Auth::guard('admin')->user()->role == 1)<p style="display: none">---</p>@else<p>---</p>@endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Full Name</th>
                                    {{--                                    <th>Property Id</th>--}}
                                    {{--                                    <th>User Id</th>--}}
                                    <th>Phone number</th>
                                    <th>Email Address</th>
                                    <th>Brokerage_or_Agent</th>
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
            if(!confirm('Are you sure you want to delete this property?')) {
                e.preventDefault();
            }
        });
    </script>
@endsection
