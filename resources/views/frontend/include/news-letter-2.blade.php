<div class="bg-parrotgreen mt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 center">
                <h1 class="fs-40 text-white">Sign Up for our<span class="fw-700"> Newsletter</span></h1>
                <p class="mt-10 text-white">Consistent updates on the ever so changing Canadian Real Estate market!</p>
            </div>
            <div class="col-lg-6 center">
                {{--                    <h6 class="fs-21 fw-700 text-white">Stay Connected</h6>--}}
                <form>
                    <div class="row mt-21" style="margin-top: 8px;">
                        <div class="col-lg-8">
                            <input type="email" class="form-control h-10" name="subscriber_email" id="subscriber_email" placeholder="Enter Email Address">
                            <div id="status"></div>
                            <div id="content"></div>
                            {{-- <input type="text" class="form-control h-10" placeholder="Enter Email Id">--}}
                        </div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-light mb-2" name="subscribe_now" id="subscribe_now">Submit</button>
                            {{-- <button type="button" name="subscribe_now" id="subscribe_now"><i class="fa fa-send"></i></button>--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#subscribe_now").click(function(e){
        e.preventDefault();
        //first load
        $("#status").empty().html('Please wait........').addClass('text-danger');
        var subscriber_email = $("#subscriber_email").val();
        $.ajax({
            url:"{{url('/subscribe-email')}}",
            method:'POST',
            data:{
                _token: "{{ csrf_token() }}",email:subscriber_email
            },
            success:function(response){
                //var data = JSON.parse(response);
                var data = JSON.parse(JSON.stringify(response));
                if(data.success == true){
                    // $('#subscribe_now').hide();
                    $('#status').empty().html(data.message).addClass('text-success');
                    $('#status').removeClass('text-danger')
                    // alert('subscribe successfully');
                }else {
                    $('#status').show();
                    // $('#subscribe_now').hide();
                    $('#status').empty().html(data.message).addClass('text-danger');
                    $('#status').removeClass('text-success')
                }
            },
        });
    });
</script>
