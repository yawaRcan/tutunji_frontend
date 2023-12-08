@extends('frontend.old-layouts.master')
@section('title')
    <title>Tuntunji Realty | Pre-Construction</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-darkgrey fw-700">Home</a></li>
                        <li class="breadcrumb-item active fw-700" aria-current="page"> New Pre-Construction</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 col-6 mt-40">
                <h6 class="fs-16">Showing 1 - 20 of 561</h6>
                <span class="text-grey">Properties in Toronto, Canada</span>

            </div>
            <div class="col-lg-3 col-6 mt-40">
                <ul class="list-unstyled list-inline text-right">
                    <li class="list-inline-item text-grey fs-16 fw-400">
                        Sort by
                    </li>
                    <li class="list-inline-item"> <select id="inputState" class="form-control br-4">
                            <option selected>Relevence</option>
                            <option>...</option>
                        </select></li>
                </ul>

            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-3 pr-0 pr-15">
                <div class="property-box" style="background-color: #F2F2F2;">
                    <h6 class="fs-16">Filters</h6>
                    <form>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-12">Property Status</label>
                            <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                <option>Any</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Property Type</label>
                            <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                <option>Any</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Location</label>
                            <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                <option>Any</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Property Status</label>
                            <div slider id="slider-distance">
                                <div>
                                    <div inverse-left style="width:70%;"></div>
                                    <div inverse-right style="width:70%;"></div>
                                    <div range style="left:30%;right:40%;"></div>
                                    <span thumb style="left:30%;"></span>
                                    <span thumb style="left:60%;"></span>
                                    <div sign style="left:30%;">
                                        <span id="value">100k</span>
                                    </div>
                                    <div sign style="left:60%;">
                                        <span id="value">200k</span>
                                    </div>
                                </div>
                                <input type="range" tabindex="0" value="30" max="100" min="0" step="1" oninput="
  this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
  var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
  var children = this.parentNode.childNodes[1].childNodes;
  children[1].style.width=value+'%';
  children[5].style.left=value+'%';
  children[7].style.left=value+'%';children[11].style.left=value+'%';
  children[11].childNodes[1].innerHTML=this.value;" />

                                <input type="range" tabindex="0" value="60" max="100" min="0" step="1" oninput="
  this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
  var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
  var children = this.parentNode.childNodes[1].childNodes;
  children[3].style.width=(100-value)+'%';
  children[5].style.right=(100-value)+'%';
  children[9].style.left=value+'%';children[13].style.left=value+'%';
  children[13].childNodes[1].innerHTML=this.value;" />
                            </div>
                        </div>
                    </form>
                    <div class="row mt-40">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="fs-12">Bed</label>
                                <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                    <option>Any</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="fs-12">Baths</label>
                                <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                    <option>Any</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="fs-12">Area</label>
                                <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                    <option>Any</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="fs-12">Property Status</label>
                                <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                    <option>Any</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mt-41">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="appartment-box">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-20">
                                        <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                        <span class="fs-12 text-grey">
                                            by Agent Name #1
                                        </span>
                                        <div class="blue-bar mt-20">
                                            <div class="row">
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">$123,000</h6>
                                                    <span class="fs-12 text-grey">
                                                        8,002 / sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">3589</h6>
                                                    <span class="fs-12 text-grey">
                                                        Area in sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                    <span class="fs-12 text-grey">
                                                        Property Status
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-8">
                                                <ul class="list-unstyled list-inline d-flex">
                                                    <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                    <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                    <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                    <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                    <li class="list-inline-item">Posted on Jul 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Listing Agent</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="appartment-box mt-40">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-20">
                                        <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                        <span class="fs-12 text-grey">
                                            by Agent Name #1
                                        </span>
                                        <div class="blue-bar mt-20">
                                            <div class="row">
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">$123,000</h6>
                                                    <span class="fs-12 text-grey">
                                                        8,002 / sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">3589</h6>
                                                    <span class="fs-12 text-grey">
                                                        Area in sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                    <span class="fs-12 text-grey">
                                                        Property Status
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-8">
                                                <ul class="list-unstyled list-inline d-flex">
                                                    <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                    <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                    <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                    <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                    <li class="list-inline-item">Posted on Jul 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Listing Agent</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="appartment-box mt-40">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-20">
                                        <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                        <span class="fs-12 text-grey">
                                            by Agent Name #1
                                        </span>
                                        <div class="blue-bar mt-20">
                                            <div class="row">
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">$123,000</h6>
                                                    <span class="fs-12 text-grey">
                                                        8,002 / sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">3589</h6>
                                                    <span class="fs-12 text-grey">
                                                        Area in sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                    <span class="fs-12 text-grey">
                                                        Property Status
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-8">
                                                <ul class="list-unstyled list-inline d-flex">
                                                    <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                    <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                    <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                    <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                    <li class="list-inline-item">Posted on Jul 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Listing Agent</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="appartment-box mt-40">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-20">
                                        <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                        <span class="fs-12 text-grey">
                                            by Agent Name #1
                                        </span>
                                        <div class="blue-bar mt-20">
                                            <div class="row">
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">$123,000</h6>
                                                    <span class="fs-12 text-grey">
                                                        8,002 / sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">3589</h6>
                                                    <span class="fs-12 text-grey">
                                                        Area in sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                    <span class="fs-12 text-grey">
                                                        Property Status
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-8">
                                                <ul class="list-unstyled list-inline d-flex">
                                                    <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                    <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                    <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                    <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                    <li class="list-inline-item">Posted on Jul 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Listing Agent</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="appartment-box mt-40">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-20">
                                        <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                        <span class="fs-12 text-grey">
                                            by Agent Name #1
                                        </span>
                                        <div class="blue-bar mt-20">
                                            <div class="row">
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">$123,000</h6>
                                                    <span class="fs-12 text-grey">
                                                        8,002 / sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">3589</h6>
                                                    <span class="fs-12 text-grey">
                                                        Area in sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                    <span class="fs-12 text-grey">
                                                        Property Status
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-8">
                                                <ul class="list-unstyled list-inline d-flex">
                                                    <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                    <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                    <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                    <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                    <li class="list-inline-item">Posted on Jul 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Listing Agent</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="appartment-box mt-40">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-20">
                                        <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                        <span class="fs-12 text-grey">
                                            by Agent Name #1
                                        </span>
                                        <div class="blue-bar mt-20">
                                            <div class="row">
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">$123,000</h6>
                                                    <span class="fs-12 text-grey">
                                                        8,002 / sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">3589</h6>
                                                    <span class="fs-12 text-grey">
                                                        Area in sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                    <span class="fs-12 text-grey">
                                                        Property Status
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-8">
                                                <ul class="list-unstyled list-inline d-flex">
                                                    <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                    <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                    <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                    <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                    <li class="list-inline-item">Posted on Jul 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Listing Agent</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="appartment-box mt-40">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-20">
                                        <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                        <span class="fs-12 text-grey">
                                            by Agent Name #1
                                        </span>
                                        <div class="blue-bar mt-20">
                                            <div class="row">
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">$123,000</h6>
                                                    <span class="fs-12 text-grey">
                                                        8,002 / sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">3589</h6>
                                                    <span class="fs-12 text-grey">
                                                        Area in sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                    <span class="fs-12 text-grey">
                                                        Property Status
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-8">
                                                <ul class="list-unstyled list-inline d-flex">
                                                    <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                    <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                    <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                    <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                    <li class="list-inline-item">Posted on Jul 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Listing Agent</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="appartment-box mt-40">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-20">
                                        <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                        <span class="fs-12 text-grey">
                                            by Agent Name #1
                                        </span>
                                        <div class="blue-bar mt-20">
                                            <div class="row">
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">$123,000</h6>
                                                    <span class="fs-12 text-grey">
                                                        8,002 / sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">3589</h6>
                                                    <span class="fs-12 text-grey">
                                                        Area in sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                    <span class="fs-12 text-grey">
                                                        Property Status
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-8">
                                                <ul class="list-unstyled list-inline d-flex">
                                                    <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                    <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                    <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                    <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                    <li class="list-inline-item">Posted on Jul 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Listing Agent</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="appartment-box mt-40">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-20">
                                        <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                        <span class="fs-12 text-grey">
                                            by Agent Name #1
                                        </span>
                                        <div class="blue-bar mt-20">
                                            <div class="row">
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">$123,000</h6>
                                                    <span class="fs-12 text-grey">
                                                        8,002 / sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">3589</h6>
                                                    <span class="fs-12 text-grey">
                                                        Area in sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-4 col-4">
                                                    <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                    <span class="fs-12 text-grey">
                                                        Property Status
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-8">
                                                <ul class="list-unstyled list-inline d-flex">
                                                    <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                    <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                    <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                    <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                    <li class="list-inline-item">Posted on Jul 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Listing Agent</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey mt-80" style="background-color: #EEEEEE">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h1 class="fs-40 text-center bb-2 fw-700">Contact Us</h1>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-8 offset-lg-2">
                    <p class="fs-16 fw-700 text-center">Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor a ornare odio sed non mauris vitae erat consequat auctor</p>
                </div>
            </div>
            <div class="bg-white mt-40">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center fs-30 fw-700">Send Us a Message</h1>


                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <form>

                            <div class="form-group">
                                <label>Your Full Name</label>
                                <input type="Name" class="form-control" id="name" placeholder="Robison Croso">
                            </div>
                            <div class="form-group">
                                <label>Your Contact Number</label>
                                <input type="number" class="form-control" id="name" placeholder="+99 98789 99899">
                            </div>
                            <div class="form-group">
                                <label>Your Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="example@box.com">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="form-group">
                                <label>Service you Looking For</label>
                                <input type="text" class="form-control" id="text">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Write Your Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Send Now</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- NEWS-LETTER BEGIN -->
    @include('frontend.include.news-letter-1')
    <!-- NEWS-LETTER BEGIN END -->
@endsection
