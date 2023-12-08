<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/owl.theme.default.css">
    <link href="{{asset('')}}frontend/assets/css/style.css" type="text/css" rel="stylesheet">

    <title>Tuntunji Realty | Pop Up</title>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mr-auto mt-50" data-toggle="modal" data-target="#exampleModal">
                Launch demo Pop Up
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="contact-agent-box">
                        <button type="button" class="close close-popup" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="agent-topbox">
                            <h6 class="fs-16">Contact Listing Agent</h6>
                            <p class="fs-12">Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor aerat consequat auctor</p>
                        </div>
                        <div class="agent-body">
                            <form>
                                <div class="form-group mt-10">
                                    <label for="exampleFormControlSelect1" class="fs-12">Full Name:</label>
                                    <input class="form-control br-30 fs-12" id="exampleFormControlSelect1" placeholder="Type your Full name">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="exampleFormControlSelect1" class="fs-12">Phone Number:</label>
                                    <input class="form-control br-30 fs-12" id="exampleFormControlSelect1" placeholder="Type your Phone Number">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="exampleFormControlSelect1" class="fs-12">Email Address:</label>
                                    <input class="form-control br-30 fs-12" id="exampleFormControlSelect1" placeholder="Type your Email">
                                </div>
                                <div class="row mt-10">
                                    <div class="col-lg-6">
                                        <div class="sub-box">
                                            <ul class="box-sell p-0 mb-0 list-unstyled">
                                                <li>
                                                    <input type="radio" id="Pre-Construction" name="selector">
                                                    <label for="Pre-Construction" class="mb-0 pb-3 fs-12">Yes</label>
                                                    <div class="check"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-box">
                                            <ul class="box-sell p-0 mb-0 list-unstyled">
                                                <li>
                                                    <input type="radio" id="Status-2" name="selector">
                                                    <label for="Status-2" class="mb-0 pb-3 fs-12">No</label>
                                                    <div class="check"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div class="agent-footer">
                                <div class="row">
                                    <div class="col-lg-12"><button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Register Now</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="{{asset('')}}frontend/assets/js/jquery.js"></script>
<script src="{{asset('')}}frontend/assets/js/bootstrap.js"></script>
<script src="{{asset('')}}frontend/assets/js/bootstrap.bundle.js"></script>

</body>

</html>
