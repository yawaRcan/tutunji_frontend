@extends('admin.layouts.master')
@section('title')
    <title> All Sale/Lease Properties </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> All Sale/Lease Property</h1>
                    </div>
                </div>

                {{--                <div class="text-right">--}}
                {{--                    @can('view_only')<a href="{{url('/admin/add-sale-property')}}" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-plus"></i> Add Property</a>@endcan--}}
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
                            <h3 class="card-title">List of All Sale/Lease Property</h3>
                            <div class="text-right">
                                @can('view_only')
                                    <a href="{{url('/admin/all-sale-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"> All</a>
                                    <a href="{{url('/admin/approve-sale-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"> Approve</a>
                                    <a href="{{url('/admin/deleted-sale-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Deleted</a>
                                    <a href="{{url('/admin/add-sale-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-plus-circle"></i> Add property</a>
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
                                    <th>Media</th>
                                    <th>Price</th>
                                    <th>Listed In</th>
                                    <th>Category</th>
                                    <th>City</th>
                                    <th>Agent Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($all_sale_property as $saleData)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>
                                            @if(!empty($saleData['property_media']['media_name']))
                                                @if($saleData['source'] == 'Frontend')
                                                    <img src="{{asset('frontend/assets/property-images/media-file/'.$saleData['property_media']['media_name'])}}" height="100px" width="100px" style="border: solid 1px #f3f3f3;background: #fff;">
                                                @else
                                                    <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$saleData['property_media']['media_name'])}}" height="100px" width="100px" style="border: solid 1px #f3f3f3;background: #fff;">
                                                @endif
                                            @else
                                                <img src="{{asset('default/404-not-found.jpg')}}" height="100px" width="100px">
                                            @endif
                                        </td>
                                        <td>
                                            @if($saleData['before_price_label'] != null && $saleData['after_price_label'] != null)
                                                {{$saleData['before_price_label']}}
                                            @endif
                                            ${{($saleData['price']) ? $saleData['price'] : '-'}}
                                            @if($saleData['after_price_label'] != null && $saleData['before_price_label'] != null)
                                                {{$saleData['after_price_label']}}
                                            @endif
                                        </td>
                                        <td>{{($saleData['listed_in']) ? $saleData['listed_in'] : '-'}}</td>
                                        <td>{{($saleData['cat_details']) ? $saleData['cat_details']['name'] : '-'}}</td>
                                        <td>{{($saleData['city']) ? $saleData['city'] : '-'}}</td>
                                        <td>{{($saleData['agent_details']) ? $saleData['agent_details']['fullName'] : '-'}}</td>
                                        <td>@if($saleData['internal_status'] == 1 && $saleData['property_type'] == 'sale')<span class="badge badge-success">Approved</span>
                                            @elseif($saleData['internal_status'] == 2 && $saleData['property_type'] == 'sale')
                                                <span class="badge badge-danger">Deleted</span>
                                            @else
                                            @endif</td>
                                        <td>@can('view_only')
                                                <a href="{{url('/admin/edit-sale-property',[$saleData['id']])}}" class="btn btn-primary btn-sm" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-edit"></i></a>
                                                @if($saleData['internal_status'] == 1)
                                                    <a href="{{url('/admin/update-sale-property-status',$saleData['id'])}}" class="btn btn-sm btn-success delete-confirm" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>&nbsp;
                                                    {{--                                                @else--}}
                                                    {{--                                                    <a href="{{url('/admin/update-status',$preData['id'])}}" class="btn btn-sm btn-success" style="background-color: #949496;border-color: #949496;"><i class="fa fa-trash"></i></a>&nbsp;--}}

                                                @endif
                                            @endcan
                                            @if(Auth::guard('admin')->user()->role == 1)<p style="display: none;">---</p>@else<p>---</p>@endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Media</th>
                                    <th>Price</th>
                                    <th>Listed In</th>
                                    <th>Category</th>
                                    <th>City</th>
                                    <th>Agent Name</th>
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
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
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
