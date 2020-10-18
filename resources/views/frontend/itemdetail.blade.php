@extends('layouts.default')
@section('title')
<title>{{ ucwords($item['adtitle']) }} | Let Mobile </title>
<meta name="description" content="{{ htmlspecialchars_decode($item['ad_description']) }}">
@stop
<?php $imgs = ''; $ar = explode(',', $item['adimgs']);?>
@section('page-css')
<meta property="og:url" content="{{ url('/') }}/{{ $item['adslug'] }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ ucwords($item['adtitle']) }}" />
<meta property="og:image" content="{{ url('public/images/'.$ar[0]) }}" />
<meta property="og:image:alt" content="{{ ucwords($item['adtitle']) }}" />
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/assets/css/owl.carousel.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
    .interested
    {
        margin: 20px auto;
    }
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
@stop
@section('content')
<div class="hidden-sharer">
    <img src="{{ url('public/images/'.$ar[0]) }}" alt="{{ ucwords($item['adtitle']) }}" />
</div>
<div class="page-header" style="background: url(<?=url('public/assets/img/banner1.webp')?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h1 class="product-title">{{ ucwords($item['adtitle']) }}</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=url('/')?>">Home /</a></li>
                        <li class="current">Ad Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	if(@$item) {
		$ar = explode(',', $item['adimgs']);
		if(count($ar) > 0){
			for($i = 0; $i < count($ar); $i++){
				if($i == 0){
					$imgs .= '<div class="item"><div class="product-img"><img class="img-fluid" src="'.url('public/images/'.$ar[$i]).'" alt="'.$item["brand"]["brand"].' used phones price in '. ucwords($item["city"]["city"]) .'"/></div><span class="price">Rs. '.$item["adprice"].'</span></div>';
				} else {
					$imgs .= '<div class="item"><div class="product-img"><img class="img-fluid" src="'.url('public/images/'.$ar[$i]).'" alt=""'.$item["brand"]["brand"].' used phones price in '. ucwords($item["city"]["city"]) .'""/></div><span class="price">Rs. '.$item["adprice"].'</span></div>';
				}
			}
		} else {
			$imgs = '<div class="item"><div class="product-img"><img src="'.url('images/noimage.png').'" alt=""'.$item["brand"]["brand"].' used phones price in '. ucwords($item["city"]["city"]) .'""/></div><span class="price">Rs. '.$item["adprice"].'</span></div>';
		}
	}
	?>
<div class="section-padding">
    <div class="container">
        <div class="product-info row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="ads-details-wrapper">
                    <div id="owl-demo" class="owl-carousel owl-theme">
                        <?= $imgs ?>
                    </div>
                </div>
                <div class="details-box">
                    <div class="ads-details-info">
                        <h2>{{ ucwords($item['adtitle']) }}</h2>
                        <div class="details-meta">
                            <span><a href="#"><i class="lni-alarm-clock"></i> {{ date('d M h:i a', $item['adtime']) }}</a></span>
                            <span><a href="#"><i class="lni-map-marker"></i>{{ ucwords($item['city']['city']) }},{{ ucwords($item['adadress']) }}</a></span>
                            <span><a href="#"><i class="lni-eye"></i> {{$item['postview_count']}} View</a></span>
                        </div>
                        <p class="mb-4">{{ htmlspecialchars_decode($item['ad_description']) }}</p>
                    </div>
                    <div class="tag-bottom">
                        <div class="float-left">
                            <ul class="advertisement">
                                <li>
                                    <p><strong><i class="lni-folder"></i> Categories:</strong> <a href="#">Old Mobiles</a></p>
                                </li>
                                <li>
                                    <p><strong><i class="lni-archive"></i> Condition:</strong> {{ ($item['cond'] == '0') ? 'Used' : 'New'  }}</p>
                                </li>
                                <li>
                                    <p><strong><i class="lni-package"></i> Brand:</strong> <a href="{{ url('mobile') }}/{{ $item['brand']['brand'] }}"> {{ ucwords($item['brand']['brand']) }} </a></p>
                                </li>
                            </ul>
                        </div>
                        <div class="float-right">
                            <div class="share">
                                <div class="social-link">
                                    <a target="_blank" class="facebook" data-toggle="tooltip" data-placement="top" title="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/') }}/{{ $item['adslug'] }}"><i class="lni-facebook-filled"></i></a>
                                    <a target="_blank" class="twitter" data-toggle="tooltip" data-placement="top" title="twitter" href="https://twitter.com/intent/tweet?status={{ ucwords($item['adtitle']) }} here is Link for {{ url('/') }}/{{ $item['adslug'] }}"><i class="lni-twitter-filled"></i></a>
                                    <a target="_blank" class="linkedin" data-toggle="tooltip" data-placement="top" title="linkedin" href="https://www.linkedin.com/shareArticle?url={{ url('/') }}/{{ $item['adslug'] }}&title={{ ucwords($item['adtitle']) }}&source=Let Mobile"><i class="lni-linkedin-fill"></i></a>
                                    <a target="_blank" class="google" href="whatsapp://send?text=Check this out:{{ ucwords($item['adtitle']) }} here is link for {{ url('/') }}/{{ $item['adslug'] }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <aside class="details-sidebar">
                     <div class="widget_search">
                        <form role="search" id="search-form" action="{{ url('search/keyword') }}" method="get">
                            <input type="search" class="form-control" autocomplete="off" name="s" placeholder="Search..." id="search-input">
                            <button type="submit" id="search-submit" class="search-btn"><i class="lni-search"></i></button>
                        </form>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Ad Posted By</h4>
                        <div class="mb-4">
                                <object style="border:0; height: 230px; width: 100%;" data="https://www.google.com/maps/embed/v1/place?q={{ urlencode($item['adadress']) }},{{ $item['city']['city'] }}&key=AIzaSyAy_OvtbZn9ktU5njKItgbAHBozJ8vRbNg"></object>
                            </div>
                        <div class="agent-inner">
                            
                            <div class="agent-title">
                                <div class="agent-photo">
                                    <a href="#"><img src="{{ asset('public/profiles') }}/{{ $item['user']['image'] }}" onerror="this.src='{{ asset('site/user-icon.png') }}'" alt="user-icon"></a>
                                </div>
                                <div class="agent-details">
                                    <h3>{{ ucwords($item['selname']) }}</h3>
                                    <p><i class="lni-map-marker"></i> <strong>City : </strong>{{ ucwords($item['city']['city']) }}</p>
                                    <p><span><i class="lni-map-marker"></i> <strong>Address : </strong> {{ ucwords($item['adadress']) }}</p>
                                    <span><i class="lni-phone-handset"></i><?php echo $item['adphone']; ?></span>
                                </div>
                            </div>
                            @if ( !Auth::guest() && $item["postedby"] != Session::get('user_id'))
                            <div class="interested" id="mydiv">
                                <form id="interestedForm">
                                    {{ @csrf_field() }}
                                    <input type="email" class="form-control" name="email" placeholder="Your Email">
                                    <input type="text" class="form-control" name="phone" placeholder="Your Phone">
                                    <p>I'm interested in this mobile [{{ ucwords($item['adtitle']) }}] and I'd like to know more details.</p>
                                    <button type="submit" value="no" class="btn btn-common fullwidth mt-4">Send Message</button>
                                </form>
                            </div>
                            <ul class="errors"></ul>
                            <ul class="success"></ul>
                            @endif
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-lg-8 col-md-12 col-xs-12">
                <section class="featured section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="heading">
                                    <h1 class="section-title">Related Mobiles Ads</h1>
                                    <h4 class="sub-title">Discover & connect with top-rated Mobiles ads</h4>
                                </div>
                            </div>
                            @if($l_ads) 
                            @foreach($l_ads as $row)
                            <?php if($row['adslug'] !== $item['adslug']) { $images = explode(',', $row['adimgs']) ?>
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                <div class="featured-box">
                                    <figure>
                                        <a href="{{ url('mobile') }}/{{ $row['brand']['brand'] }}">
                                            <div class="homes-tag featured">{{ @ucwords($row['brand']['brand']) }} </div>
                                        </a>
                                        <div class="homes-tag rent"><i class="lni-camera"></i> {{ count($images) }}</div>
                                        <span class="price-save">Rs.<?php echo number_format(str_replace(',','',@$row['adprice'])) ?></span>
                                        <a href="{{ url($row['adslug'])}}"><img class="img-fluid img-width-100" src="{{ url('public/images/thumbnail').'/'.$images[0] }}" alt="{{ @ucwords($row['adtitle']) }} price in pakistan"></a>
                                    </figure>
                                    <div class="content-wrapper">
                                        <div class="feature-content">
                                            <h4><a href="{{ url($row['adslug']) }}">{{ @ucwords(substr($row['adtitle'],0,14)) }}...</a></h4>
                                            
                                            <div class="meta-tag">
                                                <div class="user-name">
                                                    <a href="javascript:void(0)"><i class="lni-user"></i> {{ @ucwords($row['selname']) }}</a>
                                                </div>
                                                <div class="listing-category">
                                                    <a ><i class="lni-mobile"></i>Mobiles</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="listing-bottom clearfix">
                                            <a href="{{ url('city/'.$row['city']['cityslug'])}}" class="float-left"><i class="lni-map-marker"></i> {{ @ucwords($row['city']['city']) }}</a>
                                            <a class="float-right">{{ date("F j",strtotime($row['created_at'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <aside class="details-sidebar">
                    <div class="widget">
                       <h4 class="widget-title">More Ads From Seller</h4>
                       <ul class="posts-list">
                        @if($ads) 
                        @foreach($ads as $row)
                        <?php $images = explode(',', $row['adimgs']); ?>
                        <?php 
                            if ($row['aid']%2 == 0) {
                                $alt = 'used phones in '.$row['city']['city'];
                            }
                            else {
                                $alt = $row['brand']['brand'] . ' used phones';
                            }
                         ?>
                           <li>
                               <div class="widget-thumb">
                                   <a href="{{ url($row['adslug'])}}"><img src="{{ url('public/images/thumbnail').'/'.$images[0] }}" alt="{{ $alt }}" /></a>
                               </div>
                               <div class="widget-content">
                                   <h2><a href="{{ url($row['adslug'])}}">{{ @ucwords(substr($row['adtitle'],0,17)) }}...</a></h2>
                                   <div class="meta-tag">
                                       <span>
                                        <a href="{{ url('mobile') }}/{{ $row['brand']['brand'] }}"><i class="lni-bookmark-alt"></i> {{ @ucwords($row['brand']['brand']) }}</a>
                                        </span>
                                        <span>
                                        <a href="{{ url('city/'.$row['city']['cityslug'])}}"><i class="lni-map-marker"></i> {{ @ucwords($row['city']['city']) }}</a>
                                        </span>
                                   </div>
                                   <h4 class="price">Rs.<?php echo number_format(str_replace(',','',@$row['adprice'])) ?></h4>
                               </div>
                               <div class="clearfix"></div>
                           </li>
                        @endforeach
                        @else
                        <li>No Ads Found</li>
                        @endif
                       </ul>
                   </div>
               </aside>
            </div>
        </div>

    </div>
</div>
@stop

@section('page-scripts')
<script src="{{ url('/') }}/public/assets/js/owl.carousel.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $(document).ready(function() {
    $( "#search-input" ).autocomplete({
        source: function(request, response) {
            $.ajax({
            url: "{{url('search/home')}}",
            data: {
                term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.name;
               }); 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
</script>
<script type="text/javascript">
    (function($) {
            var testiOwl=$("#testimonials");testiOwl.owlCarousel({autoplay:true,margin:30,dots:false,autoplayHoverPause:true,nav:false,loop:true,responsiveClass:true,responsive:{0:{items:1,},991:{items:2}}});var newproducts=$("#new-products");newproducts.owlCarousel({autoplay:true,nav:true,autoplayHoverPause:true,smartSpeed:350,dots:false,margin:30,loop:true,navText:['<i class="lni-chevron-left"></i>','<i class="lni-chevron-right"></i>'],responsiveClass:true,responsive:{0:{items:1,},575:{items:2,},991:{items:3,}}});var categoriesslider=$("#categories-icon-slider");categoriesslider.owlCarousel({autoplay:true,nav:false,autoplayHoverPause:true,smartSpeed:350,dots:true,margin:30,loop:true,navText:['<i class="lni-chevron-left"></i>','<i class="lni-chevron-right"></i>'],responsiveClass:true,responsive:{0:{items:1,},575:{items:2,},991:{items:5,}}});var detailsslider=$("#owl-demo");detailsslider.owlCarousel({autoplay:true,nav:false,autoplayHoverPause:true,smartSpeed:350,dots:true,margin:30,loop:true,navText:['<i class="lni-chevron-left"></i>','<i class="lni-chevron-right"></i>'],responsiveClass:true,responsive:{0:{items:1,},575:{items:1,},991:{items:1,}}});}

        )(jQuery);
</script>
<script type="text/javascript">
    $("#interestedForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#interestedForm').submit(function(e) {
        e.preventDefault();
        $(".errors").text("");
        $(".errors").hide();
        $(".success").text("");
        $(".success").hide();
        var errors = 0;
        $("#interestedForm :input").map(function() {
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
            url: '{{ url("/interested/store") }}/{{$item["postedby"]}}',
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
                $('#interestedForm')[0].reset();
                $('.log-btn').prop('disabled', false);
                $(".success").show();
                $(".success").append("<li><strong>Sucess!</strong> Your SMS has been sent. Let us know if there’s anything else we can help you with. <br> <b> The Let Mobile Team <b></li>");
            }
        });
    });
</script>
@stop