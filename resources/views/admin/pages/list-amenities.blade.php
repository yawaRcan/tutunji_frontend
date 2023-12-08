@extends('admin.layouts.master')
@section('modal-popup-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
@section('title')
    <title> Admin | List Amenities </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Amenities List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Property</li>
                        </ol>
                    </div>
                </div>
                <div class="text-right">
{{--                    <a href="" data-toggle="modal" data-target="#addAmenity" class="btn btn-primary addBtn"> <i class="fa fa-plus"></i> Add Amenity</a>--}}
{{--                    <button type="button" name="create_record" id="create_record" class="btn btn-success">Add Amenity</button>--}}
                    <a href="" data-toggle="modal" data-target="#addAmenity" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Amenity</a>
                </div>
                {{--Start Add Modal--}}
                <div class="modal fade" id="addAmenity" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Amenity</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('add_amenity') }}" method="post">
                                    @csrf
                                    <label for="name">Name</label>
                                    <input id="name" type="text" name="name" class="form-control">
                                    <hr>
                                    <div>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-outline-success" value="Add" style="float: right">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--End Add Modal--}}
                {{--Start Edit Modal--}}
                <div class="modal fade" id="editModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Amenity</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('updateAmenity')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" id="amenity_id">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="amenity_name" class="form-control">
                                    <hr>
                                    <div>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-outline-success" value="Update" style="float: right">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--End Edit Modal--}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Property List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($amenity as $amenityDetail)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$amenityDetail->name}}</td>
                                        <td> <button type="button" value="{{$amenityDetail->id}}" class="btn btn-outline-primary editbtn">Edit</button>
                                            <button class="btn btn-outline-danger" value="Delete" onclick="deleteConfirmation({{$amenityDetail->id}})">Delete</button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
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
@endsection
