@extends('admin.layouts.master')
@section('title')
    <title> All Pending Properties </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--        <div class="col-md-6">add button</div>--}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Pending Property</h1>
                    </div>
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href=""></a>Properties</li>--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Pending</a></li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
                </div>
                {{--                <div class="text-right"><button type="button" class="btn btn-primary"></button></div>--}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List of All Pending Property</h3>
                            <div class="text-right">
                                <a href="{{url('/admin/list-pending-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65f;">All</a>
                                <a href="{{url('/admin/rejected-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65f;">Rejected </a>
                                <a href="{{url('/admin/all-pending-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65f;">Pending</a>
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
{{--                                    <th>Title</th>--}}
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>ListedIn</th>
                                    <th>City</th>
                                    <th>Neighborhood</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($pendingProperties as $propertyData)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>

                                            @if(!empty($propertyData['property_media']['media_name']))
                                                @if($propertyData['source'] == 'Frontend')
                                                    <img src="{{asset('frontend/assets/property-images/media-file/'.$propertyData['property_media']['media_name'])}}" height="100px" width="100px">
                                                @else
                                                    <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$propertyData['property_media']['media_name'])}}" height="100px" width="100px">
                                                @endif
                                            @else
                                                <img src="{{asset('default/404-not-found.jpg')}}" height="100px" width="100px">
                                            @endif
{{--                                            @if($propertyData['property_media'])--}}
{{--                                                <img src="{{asset('frontend/assets/property-images/media-file/'.$propertyData['property_media']['media_name'])}}" height="100px" width="100px">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('default/404-not-found.jpg')}}" height="100px" width="100px">--}}
{{--                                            @endif--}}
                                            {{--                                            @foreach($saleData['property_media'] as $mediaFile)--}}
                                            {{--                                                <img src="{{asset('frontend/assets/property-media/'.$mediaFile['media_name'])}}" height="100px" width="100px">--}}
                                            {{--                                            @endforeach--}}
                                        </td>

{{--                                        <td>{{($propertyData['title']) ? $propertyData['title'] : '-'}}</td>--}}
                                        <td>${{($propertyData['price']) ? $propertyData['price'] : '-'}}</td>
{{--                                        <td>{{($propertyData['category']) ? $propertyData['category'] : '-'}}</td>--}}
                                        <td>{{($propertyData['cat_details']) ? $propertyData['cat_details']['name'] : '-'}}</td>
                                        <td>{{($propertyData['listed_in']) ? $propertyData['listed_in'] : '-'}}</td>
                                        <td>{{($propertyData['city']) ? $propertyData['city'] : '-'}}</td>
                                        <td>{{($propertyData['neighborhood']) ? $propertyData['neighborhood'] : '-'}}</td>
                                        <td>
                                            @if($propertyData['internal_status'] == 0)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($propertyData['internal_status'] == 2)
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-success">Approved</span>
                                            @endif
                                        </td>
                                        {{--                                        <td> @if($propertyData['internal_status'] == 0)--}}
                                        {{--                                                --}}{{--                                                <button class="btn btn-warning btn-sm">Pending</button>--}}
                                        {{--                                                <a href="{{url('/admin/propertyStatus',$propertyData['id'])}}" class="btn btn-sm btn-success" style="background-color: #1ED65F;border-color: #1ED65F;" title="">Approve</a>--}}
                                        {{--                                            @else--}}
                                        {{--                                                --}}{{--                                                <button class="btn btn-success btn-sm">Active</button>--}}
                                        {{--                                                <a href="{{url('/admin/propertyStatus',$propertyData['id'])}}" class="btn btn-warning" style="background-color: #949496;border-color: #949496;" title="">Reject</a>--}}
                                        {{--                                            @endif</td>--}}
                                        <td>
                                            @can('view_only')
                                                @if($propertyData['internal_status'] != 2)
                                                    <a href="{{url('/admin/view-pending-property',$propertyData['id'])}}" class="btn btn-sm btn-info" style="background-color: #949496;border-color: #949496;"><i class="fa fa-eye"></i></a>&nbsp;
                                                    <a href="{{url('/admin/propertyStatus',$propertyData['id'])}}" class="btn btn-sm btn-success" style="background-color: #1ED65F;border-color: #1ED65f;"><i class="fa fa-check"></i></a>&nbsp;
                                                    <a href="#" id="rejectBtn" class="btn btn-sm btn-danger" data-p_id="{{ $propertyData['id'] }}"><i class="fa fa-times"></i></a>
                                                @else<i class="fa fa-minus" style="color: #949496"></i>@endif
                                            @endcan
                                            @if(Auth::guard('admin')->user()->role == 1)<p style="display: none">---</p>@else<p>---</p>@endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Media</th>
{{--                                    <th>Title</th>--}}
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>ListedIn</th>
                                    <th>City</th>
                                    <th>Neighborhood</th>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '#rejectBtn', function () {
                //var email = $('#signInEmail').val();
                swal("Write Reject Reason Here:", {
                    content: "input",
                })
                    .then((value) => {
                        /*$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });*/
                        $.ajax({
                            url     : '{{url("/admin/reject-property")}}',
                            type    : 'post',
                            data    : {
                                _token  : "{{ csrf_token() }}",
                                reason  : value,
                                p_id    : $(this).attr('data-p_id')
                            },
                            success : function(return_res){
                                console.log(return_res);
                                var newRes = JSON.parse(JSON.stringify(return_res));
                                if(newRes.success == "1"){
                                    //alert("Property Rejected");
                                    // swal("Good job!", "Property Rejected!", "success");
                                    toastr.success('Property rejected');
                                    location.reload();
                                }else{
                                    swal("Opps!", "Invalid Property ID!", "error")
                                }
                            }
                        });
                    });
            });
        });
    </script>
@endsection

