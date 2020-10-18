    @extends('layouts.default')
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
    #user-icon
    {
        width: 50%;
    }
    .image {
        overflow: hidden;
        position: relative;
    }

    .label {
        background: rgba(0, 0, 0, 0.5) none repeat scroll 0 0;
        bottom: -25px;
        color: #fff;
        left: 0;
        margin: 0;
        position: absolute;
        right: 0;
        text-align: center;
        transition:0.1s all;
        cursor:pointer;
    }
    .input
    {
        visibility:hidden;
        height: 0px !important;
    }
    .image:hover .label {
      bottom: 0px;
    }
</style>
    @section('content')
    <div class="page-header" style="background: url({{ url('/') }}/public/assets/img/banner1.webp);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Welcome ! {{ Session::get('name') }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home /</a></li>
                            <li class="current">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
                    <aside>
                        <div class="sidebar-box">
                            <div class="user">
                                <figure class="image" id="mydiv1">
                                    <img src="{{ asset('public/profiles') }}/{{ Session::get('image') }}" onerror="this.src='{{ asset('site/user-icon.png') }}'"  alt="User Icon" id="user-icon">
                                    <form id="profileForm" enctype="multipart/form-data">
                                        {{ @csrf_field() }}
                                        <input id="profile" class="input" accept="image/*" type="file" name="profile" onchange="profileForm()">
                                    </form>
                                    <span class="label" onclick="document.getElementById('profile').click()"><strong>Change Profile</strong></span>
                                </figure>
                                <div class="usercontent">
                                    <h3>Hello {{ Session::get('name') }}!</h3>
                                    <h4>Administrator</h4>
                                </div>
                            </div>
                            <nav class="navdashboard">
                                <ul>
                                    <li>
                                        <a class="active" href="{{url('user')}}/{{ Session::get('slug') }}">
                                            <i class="lni-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('user')}}/{{ Session::get('slug') }}/ads/published">
                                            <i class="lni-layers"></i>
                                            <span>My Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a  href="{{url('user')}}/{{ Session::get('slug') }}/ads/unverified">
                                            <i class="lni-support"></i>
                                            <span>Unverified Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('user')}}/{{ Session::get('slug') }}/ads/deleted">
                                            <i class="lni-trash"></i>
                                            <span>Deleted Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('user')}}/{{ Session::get('slug') }}/ads/solded">
                                            <i class="lni-layers"></i>
                                            <span>Sold Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('user')}}/logout">
                                            <i class="lni-enter"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="page-content">
                        <div class="inner-box">
                            <div class="dashboard-box">
                                <h2 class="dashbord-title">Dashboard</h2>
                            </div>
                            <div class="dashboard-wrapper">
                                <div class="dashboard-sections">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-write"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="{{url('user')}}/{{ Session::get('slug') }}/ads/published">Total Posted</a></h2>
                                                    <h3>{{ $published }} Ad Published</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-support"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="{{url('user')}}/{{ Session::get('slug') }}/ads/unverified">Unverified </a></h2>
                                                    <h3>{{ $unverified }} Ad Unverified</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-layers"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="{{url('user')}}/{{ Session::get('slug') }}/ads/solded">Sold </a></h2>
                                                    <h3>{{ $sold }} Ad Solded</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-trash"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="{{url('user')}}/{{ Session::get('slug') }}/ads/deleted">Deleted </a></h2>
                                                    <h3>{{ $deleted }} Ad Deleted</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="register-form login-area" id="mydiv">
                                <form id="registerForm" method="post" accept-charset="utf-8" class="login-form">
                                    {{ @csrf_field() }}
                                    <fieldset class="fieldset">
                                        <div class="form-group">
                                            <ul class="errors" id="errors"></ul>
                                            <ul class="success" id="success"></ul>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="lni-user"></i>
                                                <input type="text" name="fname" id="fname" value="{{ $user->fname }}" placeholder="First Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="lni-user"></i>
                                                <input type="text" name="lname" id="lname" value="{{ $user->lname }}" placeholder="Last Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="lni-phone"></i>
                                                <input type="text" name="phone" id="phone" value="{{ $user->phone }}" placeholder="Phone (03001481947)" class="form-control">
                                            </div>
                                        </div>
                                        <div>
                                            <input type="submit" value="Update" class="btn btn-common log-btn"> 
                                        </div>
                                    </fieldset>
                                </form>
                                </div>
                                <hr>
                                <div class="register-form login-area" id="mydiv">
                                <form id="ChangeForm" method="post" accept-charset="utf-8" class="login-form">
                                    {{ @csrf_field() }}
                                    <fieldset class="fieldset">
                                        <div class="form-group">
                                            <ul class="errors" id="errors-c"></ul>
                                            <ul class="success" id="success-c"></ul>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="lni-user"></i>
                                                <input type="password" name="oldpassword" id="oldpass"  placeholder="Old Password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="lni-user"></i>
                                                <input type="password" name="newpassword" id="newpassword" placeholder="New Password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="input-icon">
                                            <i class="lni-lock"></i>
                                            <input type="password" name="confirm-password" id="confirm-password" placeholder="Password(Confirm Password)" class="form-control"> </div>
                                    </div>
                                        <div>
                                            <input type="submit" value="Change Password" class="btn btn-common log-btn-c"> 
                                        </div>
                                    </fieldset>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $("#errors").text("");
        $("#errors").hide();
        $("#success").text("");
        $("#success").hide();
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
            url: '{{ url("/user/update") }}/{{ $user->id }}',
            data: formData,
            dataType: 'json',
            error: function(data) {
                $("#mydiv").removeClass("disabled-div");
                $('.log-btn').attr('disabled', false);
                var x = JSON.parse(data.responseText);
                $("#errors").show();
                for (var error in x.errors) {
                    $(".errors").append("<li>"+x.errors[error]+"</li>");
                    $('#'+error).addClass('required');
                }
            },
            success: function(data) {
                $("#mydiv").removeClass("disabled-div");
                $('#registerForm')[0].reset();
                $('.log-btn').prop('disabled', false);
                $("#success").show();
                $("#success").append("<li><strong>Sucess!</strong> Name Updated successfully.</li>");
            }
        });
    });
    $("#ChangeForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#ChangeForm').submit(function(e) {
        e.preventDefault();
        $("#errors-c").text("");
        $("#errors-c").hide();
        $("#success-c").text("");
        $("#success-c").hide();
        var errors = 0;
        $("#ChangeForm :input").map(function() {
            if (!$(this).val()) {
                $(this).addClass('required');
                errors++;
            } else if ($(this).val()) {
                $(this).removeClass('required');
            }
        });
        if (errors > 0) { return false; }
        var formData = $(this).serialize();
        $('.log-btn-c').attr('disabled', true);
        $("#mydiv").addClass("disabled-div");
        $.ajax({
            type: 'POST',
            url: '{{ url("/user/changePassowrd") }}/{{ $user->id }}',
            data: formData,
            dataType: 'json',
            error: function(data) {
                $("#mydiv").removeClass("disabled-div");
                $('.log-btn-c').attr('disabled', false);
                var x = JSON.parse(data.responseText);
                $("#errors-c").show();
                for (var error in x.errors) {
                    $("#errors-c").append("<li>"+x.errors[error]+"</li>");
                    $('#'+error).addClass('required');
                }
            },
            success: function(data) {
                $("#mydiv").removeClass("disabled-div");
                $('#ChangeForm')[0].reset();
                $('.log-btn-c').prop('disabled', false);
                $("#success-c").show();
                $("#success-c").append("<li><strong>Sucess!</strong> Password Change successfully.</li>");
            }
        });
    });


    function profileForm(){
        var formData = new FormData($('#profileForm')[0]);
        $("#mydiv1").addClass("disabled-div");
        $.ajax({
            type: 'POST',
            url: '{{ url("/user/profile") }}/{{ $user->id }}',
            data: formData,
            cache       : false,
            contentType : false,
            processData : false,
            dataType: 'json',
            error: function(data) {
                $("#mydiv1").removeClass("disabled-div");
            },
            success: function(data) {
                console.log(data.image);
                $("#mydiv1").removeClass("disabled-div");
                $("#user-icon").attr({ "src": data.image});
            }
        });
    }
</script>
@stop