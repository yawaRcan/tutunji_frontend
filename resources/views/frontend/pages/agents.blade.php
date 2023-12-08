@extends('frontend.layout.master')
@section('content')
    <div class="bg-black pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-4">
                    <img src="imgs/LogoTransparent.png" alt="" class="img-fluid w-110">
                </div>
                <div class="col-lg-8 dn mt-26 text-center">
                    <div class="input-group">
                        <input type=" text" class="form-control br-3" placeholder="Search Properties, Location, Projects..." aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="col-lg-2 col-8 mt-35 text-right">
                    <ul class="list-unstyled list-inline">
                        <li type="button" class="list-inline-item text-green fs-20 dn1" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i></li>
                        <li class="list-inline-item text-green fs-20"><i class="far fa-user"></i></li>
                        <li class="list-inline-item fs-20"><a href="" class="text-green">LogIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-darkgrey fw-700">Home</a></li>
                <li class="breadcrumb-item active fw-700" aria-current="page">Our Agents</li>
            </ol>
        </nav>
    </div>

    <div class="bg-silver">
        <h1 class="fs-40 fw-700">Our Agents</h1>
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
                <div class="col-lg-3">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-3">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-3">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-3">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-21">
                    <div class="card" style="width: 100%;">
                        <img src="imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-19">Name</h5>
                            <ul class="list-unstyled fs-17">
                                <li>Selling Agent</li>
                                <li>sparker@mail.com</li>
                                <li>(123) 456-6789</li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/linkedin.png" alt="" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img src="imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-70">
                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item mr-5">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item mr-5 active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item mr-5"><a class="page-link" href="#">2</a></li>
                            <li class="page-item mr-5"><a class="page-link" href="#">3</a></li>
                            <li class="page-item mr-5">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-parrotgreen">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 center">
                    <h1 class="fs-40 text-white">Sign Up for our<span class="fw-700"> Newsletter</span></h1>
                    <p class="mt-10 text-white">Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor a ornare odio sed non mauris vitae erat consequat auctor</p>
                </div>
                <div class="col-lg-6 center">
                    <h6 class="fs-21 fw-700 text-white">Stay Connected</h6>
                    <form>
                        <div class="row mt-21">
                            <div class="col-lg-8">
                                <input type="text" class="form-control h-10" placeholder="Enter Email Id">
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-light mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
