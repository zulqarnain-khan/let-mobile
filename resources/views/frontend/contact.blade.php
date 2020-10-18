@extends('layouts.default')
@section('title')
<title>Contact Us | Let Mobile </title>
<meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in Lahore, Karachi, Islamabad, Faisalabad and Multan all over the Pakistan. ">
@stop
<style type="text/css">
    .required {
        border-color: red !important;
    }
    .errors
    {
        background: #f8f8f8;
        padding: 20px;
        color: darkred;
        border-radius: 5px;
        display: none
    }
    .success
    {
        background: #03a9f4;
        padding: 20px;
        color: white;
        border-radius: 5px;
        display: none
    }
    .notification-style
    {
        background: #03a9f4;
        padding: 20px;
        color: white;
        border-radius: 5px;
        margin: 10px 45px;
    }
    .disabled-div {
        pointer-events: none;
        opacity: 0.4;
    }
</style>
@section('content')
<div class="page-header" style="background: url({{ url('/') }}/assets/img/banner1.webp);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h1 class="product-title">Contact Us</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home /</a></li>
                        <li class="current"> Contact Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content" class="section-padding">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-4">
				<div class="contact_info">
					<h5 class="list-title gray"><strong>Contact Us</strong></h5>
					<div class="contact-info">
						<div class="address">
							<p class="p1"> <i class="lni-map-marker"> </i> 85B , Block K Judicial Colony,Lahore(54782), Punjab, Pakistan </p>
							<p> <i class="lni-envelope"></i>  info@letmobile.pk</p>
							<p><i class="lni-phone"></i> (042) 35957618</p>
							<div>
								<p><strong><a href="">Get a Quote</a></strong></p>
								<p><strong> <a href="{{ url('user/login') }}">Client Area Login</a></strong></p>
								<!-- <p><strong> <a href="#skypeid" class="skype">Live Chat</a></strong></p> -->
								<p><strong> <a href="{{ url('support/terms-conditions') }}">Knowledge Base</a></strong></p>
							</div>
						</div>
					</div>
					<ul class="mt-3 footer-social">
                        <li><a class="facebook" target="_blank" href="https://www.facebook.com/letmobilepkofficial"><i class="lni-facebook-filled"></i></a></li>
                        <li><a class="twitter" target="_blank" href="https://twitter.com/LetMobile1"><i class="lni-twitter-filled"></i></a></li>
                        <li><a class="instagram" target="_blank" href="https://www.instagram.com/letmobilepk/"><i class="lni-instagram-filled"></i></a></li>
                    </ul>
				</div>
			</div>
			<div class="col-md-8">
				<div class="contact-form" id="mydiv">
					<h5 class="list-title gray"><strong>Contact us</strong></h5>
					<form id="contactForm"  accept-charset="utf-8" class="form-horizontal">
					{{ @csrf_field() }}
				    <fieldset>
				        <div class="row">
				            <div class="col-sm-12">
				                <div class="form-group">
				                    <div class="col-md-12">
				                        <input type="text" name="name" placeholder="Enter Name" class="form-control">
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-12">
				                <div class="form-group">
				                    <div class="col-md-12">
				                        <input type="email" name="email" placeholder="Enter Email" class="form-control">
				                    </div>
				                </div>
				            </div>
				            <div class="col-lg-12">
				                <div class="form-group">
				                    <div class="col-md-12">
				                        <textarea name="message" cols="40" rows="7" placeholder="Enter Message" class="form-control"></textarea>
				                    </div>
				                </div>
				                <div class="form-group">
	                                <ul class="errors"></ul>
	                                <ul class="success"></ul>
	                            </div>
				                <div class="form-group">
				                    <div class="col-md-12 ">
				                        <input type="submit" name="" value="Submit" class="btn btn-primary btn-lg"> </div>
				                </div>
				            </div>
				        </div>
				    </fieldset>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="intro-inner">
	<div class="contact-intro">
		<div class="w100 map">
			<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJNcZXAaoDGTkRa0tdIWIdzqk&key=AIzaSyAy_OvtbZn9ktU5njKItgbAHBozJ8vRbNg" allowfullscreen></iframe>
		</div>
	</div>
</div>
@stop
@section('page-scripts')
<script type="text/javascript">
    $("#contactForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#contactForm').submit(function(e) {
        e.preventDefault();
        $(".errors").text("");
        $(".errors").hide();
        $(".success").text("");
        $(".success").hide();
        var errors = 0;
        $("#contactForm :input").map(function() {
            if (!$(this).val()) {
                $(this).addClass('required');
                errors++;
            } else if ($(this).val()) {
                $(this).removeClass('required');
            }
        });
        if (errors > 0) { return false; }
        var formData = $(this).serialize();
        $('.log-btn').attr('disabled', true);
        $("#mydiv").addClass("disabled-div");
        $.ajax({
            type: 'POST',
            url: '{{ url("/contact/store") }}',
            data: formData,
            dataType: 'json',
            error: function(data) {
                $("#mydiv").removeClass("disabled-div");
                $('.log-btn').attr('disabled', false);
                var x = JSON.parse(data.responseText);
                $(".errors").show();
                for (var error in x.errors) {
                    $(".errors").append("<li>"+x.errors[error]+"</li>");
                    $('#'+error).addClass('required');
                }
            },
            success: function(data) {
                $("#mydiv").removeClass("disabled-div");
                $('#contactForm')[0].reset();
                $('.log-btn').prop('disabled', false);
                $(".success").show();
                $(".success").append("<li><strong>Sucess!</strong> Your message has been received.  Please enjoy, and let us know if there’s anything else we can help you with. <br> <b> The Let Mobile Team <b></li>");
            }
        });
    });
</script>
@stop