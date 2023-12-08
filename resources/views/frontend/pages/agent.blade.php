@extends('frontend.layout.master')
@section('title')
    <title>agent New </title>
    <style>
        .card{
            height: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="container">
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-darkgrey fw-700">Home</a></li>--}}
{{--                <li class="breadcrumb-item active fw-700" aria-current="page">Our Agents</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.include.navbar')
            </div>
        </div>
    </div>
    <div class="bg-silver">
        <h1 class="fs-40 fw-700">Our Team</h1>
    </div>
    <div class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-8">
                    <h6 class="fs-24 fw-700">Agents (50)</h6>
                </div>
                <div class="col-lg-2 col-4">
                    <select id="inputState" class="form-control br-4">
                        <option selected>New to Old</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="row mt-70">
                @foreach($allAgent as $agentData)
                <div class="col-lg-3" style="margin-bottom: 21px">
                    <div class="card" style="width: 100%;">
                        <img src="{{asset('default/blank-profile.png')}}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">{{$agentData->fullName ? $agentData->fullName : '-'}}</h5>
                            <ul class="list-unstyled fs-17">
                                <li>-</li>
                                <li>{{$agentData->email ? $agentData->email : '-'}}</li>
                                <li>{{$agentData->phone ? $agentData->phone : '-'}}</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                @php($url =  url('agent'))
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/?url={{$url}}" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid" height="34px" width="34px"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$url}}" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/Group 265.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            {{$allAgent->onEachSide(0)->links('frontend.pages.pagination.my-properties-pagination')}}
{{--            <div class="row mt-70">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <nav aria-label="Page navigation example">--}}
{{--                        <ul class="pagination justify-content-center">--}}
{{--                            <li class="page-item mr-5">--}}
{{--                                <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                    <span aria-hidden="true">&laquo;</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item mr-5 active"><a class="page-link" href="#">1</a></li>--}}
{{--                            <li class="page-item mr-5"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item mr-5"><a class="page-link" href="#">3</a></li>--}}
{{--                            <li class="page-item mr-5">--}}
{{--                                <a class="page-link" href="#" aria-label="Next">--}}
{{--                                    <span aria-hidden="true">&raquo;</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    @include('frontend.include.news-letter-1')
@endsection
