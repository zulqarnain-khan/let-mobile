@extends('layouts.default')
@section('title')
<title>Change Password | Let Mobile</title>
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
    .login-btn
    {
        width: 50%
    }
    .notification-style
    {
        background: #03a9f4;
        padding: 20px;
        color: white;
        border-radius: 5px;
        margin: 10px 0;
    }
    .disabled-div {
          pointer-events: none;
          opacity: 0.4;
      }
    .social-p
    {
        display: flex;
        text-align: center;
    }
    .social
    {
        width: 60%;
    }
</style>
@section('content')
<div class="page-header" style="background: url(<?=url('public/assets/img/banner1.webp')?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h1 class="product-title">Change Password</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=url('/')?>">Home /</a></li>
                        <li class="current">Forgot Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-12 col-xs-12">
                <div class="forgot login-area">
                    <h3>Forgot Password</h3>
                    <form id="forgetForm" accept-charset="utf-8" class="login-form">
                        {{ @csrf_field() }}
                        <fieldset class="fieldset">
                            <div class="form-group">
                                <div class="errors alert alert-danger"></div>
                                <div class="success alert alert-success"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input type="password" name="password" id="password" placeholder="New Password" class="form-control"> 
                                </div>
                                <span class="color">Password must be min. 6 characters. Combine numbers, upper and lowercase letters.</span>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Password(Confirm Password)" class="form-control"> </div>
                            </div>
                            <div class="form-group mb-3">
                            <div class="text-center">
                                <button type="submit" value="Login" class="btn btn-common log-btn login-btn">Change Password </button>
                            </div>
                        </div>
                        </fieldset>
                    </form>
                        <div class="form-group mt-4">
                            <ul class="form-links">
                                <li class="float-left"><a href="<?php echo url('user/signup'); ?>">Don't have an account?</a></li>
                                <li class="float-right"><a href="<?php echo url('user/signin'); ?>">Back to Login</a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('page-scripts')
<script type="text/javascript">
    $("#forgetForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#forgetForm').submit(function(e) {
        e.preventDefault();
        $(".errors").text("");
        $(".errors").hide();
        $(".success").text("");
        $(".success").hide();
        var errors = 0;
        $("#forgetForm :input").map(function() {
            if (!$(this).val()) {
                $(this).addClass('required');
                errors++;
            } else if ($(this).val()) {
                $(this).removeClass('required');
            }
        });
        if (errors > 0) { return false; }
        var formData = new FormData($(this)[0]);
        $(".fa-spin").show();
        //$('.log-btn').attr('disabled', true);
        $("#mydiv").addClass("disabled-div");
        $.ajax({
            type: 'POST',
            url: '{{ url("/user/reset-password") }}/{{ $hash }}',
            data: formData,
            cache       : false,
            contentType : false,
            processData : false,
            dataType: 'json',
            error: function(data) {
                $("#mydiv").removeClass("disabled-div");
                var x = JSON.parse(data.responseText);
                //console.log(x);
                $('.log-btn').attr('disabled', false);
                $(".errors").text(x.message);
                $(".errors").show();
                $(".fa-spin").hide();
                var errors = 0;
                $("#forgetForm :input").map(function() {
                    if (!$(this).val()) {
                        $(this).addClass('required');
                        errors++;
                    } else if ($(this).val()) {
                        $(this).removeClass('required');
                    }
                });
            },
            success: function(data) {
                $("#mydiv").removeClass("disabled-div");
                $(".fa-spin").hide();
                $('.log-btn').attr('disabled', false);
                console.log(data);
                $('#forgetForm')[0].reset();
                $('.log-btn').prop('disabled', false);
                $(".success").show();
                $(".success").append(data.message);
                window.setTimeout(function(){window.location.href = "{{ url('user/signin')}}";}, 2000);
            }
        });
    });
</script>
@stop