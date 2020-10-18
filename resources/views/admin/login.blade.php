<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Admin Login | Let Mobile</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
		<link href="{{ asset('admin') }}/assets/app/custom/login/login-v3.default.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin') }}/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin') }}/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="{{ asset('admin') }}/assets/media/logos/favicon.ico" />
		<style>
		    .errors
		    {
		        display: none
		    }
		    .success
		    {
		        display: none
		    }
		</style>
	</head>
	<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{ asset('admin') }}/assets/media//bg/bg-3.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign In Crime Spotter as Admin</h3>
								</div>
								<form class="kt-form" id="loginForm">
									@csrf
			                        <div class="form-group">
			                            <div class="errors alert alert-danger"></div>
			                            <div class="success alert alert-success"></div>
			                        </div>
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
										<div id="email" class="error invalid-feedback">This field is required.</div>
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="password">
										<div id="password" class="error invalid-feedback">This field is required.</div>
									</div>
									<div class="row kt-login__extra">
										<div class="col">
											<label class="kt-checkbox">
												<input type="checkbox" name="remember"> Remember me
												<span></span>
											</label>
										</div>
										<div class="col kt-align-right">
											<a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
										</div>
									</div>
									<div class="kt-login__actions">
										<button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('admin') }}/assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="{{ asset('admin') }}/assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="{{ asset('admin') }}/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>
<script type="text/javascript">
    $("#loginForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('is-invalid');
        } else if ($(this).val()) {
            $(this).removeClass('is-invalid');
        }
    });
    $('#loginForm').submit(function(e) {
        e.preventDefault();
        $(".errors").text("");
        $(".errors").hide();
        $(".success").text("");
        $(".success").hide();
        var errors = 0;
        var formData = new FormData($(this)[0]);
        $('.log-btn').attr('disabled', true);
        $.ajax({
            type: 'POST',
            url: '{{ url("admin/user/authentication") }}',
            data: formData,
            cache       : false,
            contentType : false,
            processData : false,
            dataType: 'json',
            error: function(data) {
                var x = JSON.parse(data.responseText);
                $('.log-btn').attr('disabled', false);
                $(".errors").text(x.message);
                $(".errors").show();
                $(".fa-spin").hide();
                $("#loginForm :input").map(function() {
                    if (!$(this).val()) {
                        $(this).addClass('is-invalid');
                    } else if ($(this).val()) {
                        $(this).removeClass('is-invalid');
                    }
                });
            },
            success: function(data) {
                $(".success").show();
                $(".success").append(data.message);
                window.setTimeout(function(){window.location.href = "{{ url('admin/dashboard')}}";}, 2000);
            }
        });
    });
</script>