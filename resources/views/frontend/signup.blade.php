@extends('layouts.default')
@section('title')
<title>Sgin Up | Let Mobile </title>
    <meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in all over the Pakistan.">
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
    .social-p
    {
        text-align: center;
    }
    .social
    {
        width: 60%;
        margin-top: 20px;
    }
    .social-f
    {
        width: 62%;
        margin-top: 10px;
    }
    .color
    {
        color: #03a9f4;
    }
    .margin-10
    {
       margin: 10px;
    }
    .log-btn
    {
        width: 50%
    }
    .padding-20
    {
        padding: 0px 20px;
    }
    .heading {
        margin-bottom: 15px !important;
    }
    .services-item {
        padding: 20px 5px 15px 40px !important;
    }
</style>
@section('content')
<div class="page-header" style="background: url({{ url('public/assets/img/banner1.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h1 class="product-title">Create your account, Its free</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=url('/')?>">Home /</a></li>
                        <li class="current">Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="register section-padding">
    <div class="container">
        <div class="row justify-content-center">
            @if(Session::has('message'))
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="notification-style">
                        Once you've signed up for Let Mobile you can start creating ads.To effectively reach potential customers, your text ads should be informative, relevant, and engaging. or <a href="{{ url('user/signin') }}" class="btn btn-info"> Login here </a>
                    </div>
                </div>
            @endif
            <div class="col-lg-6 col-md-7 col-xs-12">
                <div class="register-form login-area" id="mydiv">
                    <h3>Register</h3>
                    <form id="registerForm" method="post" accept-charset="utf-8" class="login-form">
                        {{ @csrf_field() }}
                        <fieldset class="fieldset">
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-user"></i>
                                    <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-user"></i>
                                    <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control"> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-envelope"></i>
                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control"> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-phone"></i>
                                    <input type="text" name="phone" id="phone" placeholder="Phone (03001481947)" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input type="password" name="password" id="password" placeholder="Password" class="form-control"> 
                                </div>
                                <span class="color">Password must be min. 6 characters. Combine numbers, upper and lowercase letters.</span>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Password(Confirm Password)" class="form-control"> </div>
                            </div>
                            <div class="form-group">
                                <ul class="errors"></ul>
                                <ul class="success"></ul>
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkedall">
                                    <label>By clicking Register you agree to our <a href="{{url('support/terms-conditions')}}">Terms &amp; Conditions</a></label>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Register" class="btn btn-common log-btn"> 
                            </div>
                            <div class="text-center margin-10">
                                <span >Already have an account?</span>
                                <a href="{{ url('user/signin') }}">Login Here</a>
                            </div>
                            <div class="form-group mb-3 social-p">
                                <a href="{{ url('auth/google') }}">
                                  <img src="{{ asset('public/social/googleconnect.png') }}" class="img-responsive social">
                                </a> 
                                <a href="{{ url('auth/redirect/facebook') }}">
                                  <img src="{{ asset('public/social/facebookconnect.png') }}" class="img-responsive social-f">
                                </a> 
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-xs-12">
                <section class="services bg-light section-padding">
                    <div class="container">
                        <div class="row justify-content-c--enter">
                            <div class="col-12 text-center">
                                <div class="heading">
                                    <h1 class="section-title">Key Features</h1>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xs-12">
                                <div class="services-item wow fadeInRight" data-wow-delay="0.2s">
                                    <div class="icon">
                                        <i class="lni-pencil-alt"></i>
                                    </div>
                                    <div class="services-content">
                                        <h3><a >SignUp, Its free</a></h3>
                                        <p><b>You can just signup by providing following detail.</b></p>
                                        <ul class="padding-20">
                                            <li>1. First and last Name must be greater than 3 words and required.</li>
                                            <li>2. Email required and must be unique.</li>
                                            <li>3. Phone Number required and must be unique.</li> 
                                            <li>4. Phone format like : 03004466882 or +923006688442.</li>
                                            <li>5. Password must be min. 6 characters. Combine numbers, upper and lowercase letters.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-xs-12">
                                <div class="services-item wow fadeInRight" data-wow-delay="0.4s">
                                    <div class="icon">
                                        <i class="lni-emoji-smile"></i>
                                    </div>
                                    <div class="services-content">
                                        <h3><a >Sign Up Facebook or Google</a></h3>
                                        <p><b>You can also signup by click faceboof or google button.</b></p>
                                        <ul class="padding-20">
                                            <li>1. By faceboof or google sign up account will be activated automatically.</li>
                                            <li>2. Just one click and you will be registered.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-xs-12">
                                <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                                    <div class="icon">
                                        <i class="lni-heart"></i>
                                    </div>
                                    <div class="services-content">
                                        <h3><a>Create and Manage Items</a></h3>
                                        <p><b>Manage your ads on the go.</b></p>
                                        <ul class="padding-20">
                                            <li>1. After Email verification you can also manage your own dashboard.</li>
                                            <li>2. You change all profile settings.</li>
                                            <li>3. Also Manage your ads.</li>
                                            <li>4. Reply to Interested Peoples.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

@stop 
@section('page-scripts')
<script type="text/javascript">
    $("#registerForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#registerForm').submit(function(e) {
        e.preventDefault();
        $(".errors").text("");
        $(".errors").hide();
        $(".success").text("");
        $(".success").hide();
        var errors = 0;
        $("#registerForm :input").map(function() {
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
            url: '{{ url("/user/register") }}',
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
                $('#registerForm')[0].reset();
                $('.log-btn').prop('disabled', false);
                $(".success").show();
                $(".success").append("<li><strong>Sucess!</strong> Your account has been created successfully. We’ve sent you an email with activation link at the email address you provided. Please enjoy, and let us know if there’s anything else we can help you with. <br> <b> The Let Mobile Team <b></li>");
            }
        });
    });
</script>
@stop