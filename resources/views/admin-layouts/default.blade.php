<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Let Mobile | Admin Panel</title>
		<meta name="description" content="Updates and statistics">
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
		@yield('page-css')
		<link href="{{ url('/') }}/public/admin/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/bootstrap/dist/css/bootstrap.min.css">
		<link  rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/demo/default/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/demo/default/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/demo/default/skins/brand/dark.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/demo/default/skins/aside/dark.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" rel="stylesheet" type="text/css" href="{{ url('/') }}/public/admin/assets/media/logos/favicon.ico" />
	</head>
	<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">		
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="{{url('/')}}">
					<h2>Let Mobile</h2>	
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="{{url('/')}}">
								<h2>Let Mobile</h2>	
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
											<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
											<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
										</g>
									</svg></span>
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
											<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
											<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
										</g>
									</svg></span>
							</button>
						</div>
					</div>
					@include('admin-layouts.header')
				</div>
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
								
							</div>
						</div>
						<div class="kt-header__topbar">
							<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect id="bound" x="0" y="0" width="24" height="24" />
												<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg> </span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
									<div class="kt-quick-search kt-quick-search--inline" id="kt_quick_search_inline">
										<form method="get" class="kt-quick-search__form">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
												<input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
												<div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
											</div>
										</form>
										<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
										</div>
									</div>
								</div>
							</div>
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
										<span class="kt-header__topbar-username kt-hidden-mobile">Let Mobile</span>
										
										<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">L</span>
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
									<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(../assets/media/misc/bg-1.jpg)">
										<div class="kt-user-card__avatar">
											
											<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
										</div>
										<div class="kt-user-card__name">
											Let Mobile
										</div>
										<div class="kt-user-card__badge">
											 <a href="{{url('user')}}/logout"> 
											 	<span class="btn btn-success btn-sm btn-bold btn-font-md">Logout</span>
											 </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@yield('content')
					<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
						<div class="kt-footer__copyright">
							2019&nbsp;&copy;&nbsp;<a href="{{ url('/') }}" target="_blank" class="kt-link">Let Mobile</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/custom/components/vendors/bootstrap-switch/init.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/custom/components/vendors/bootstrap-markdown/init.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/custom/components/vendors/bootstrap-notify/init.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/custom/components/vendors/jquery-validation/init.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/custom/components/vendors/sweetalert2/init.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="{{ url('/')}}/public/admin/assets/app/bundle/app.bundle.js" type="text/javascript"></script>
        @yield('page-scripts')
	</body>
</html>