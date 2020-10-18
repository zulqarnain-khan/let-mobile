@extends('layouts.default')
@section('title')
<title>Let Mobile | Used Phones Sell and Buy | Old or New Mobile Phones Sell and Buy | Classified mobile phones ads website in Pakistan </title>
    <meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale and buy Website in Pakistan. Now You can Sell and Buy Latest Mobiles in all over the Pakistan.Let mobile Classified Sell and Buy mobile phones ads website in Pakistan">
@stop
@section('page-css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style type="text/css">
    .width-100 {
        width: 100% !important;
    }
    .search-bar .search-form {
        float: unset !important;
    }
    .width-75-1 {
        width: 60%;
        margin-top: 10%;
    }
    .width-75-2 {
        width: 100%;
        margin-top: 20%;
    }
    .width-75-3 {
        width: 65%;
        margin-top: 20%;
    }
</style>
@stop
@section('content')
    <header id="header-wrap">
        <div id="hero-area">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-9 col-xs-12 text-center">
                        <div class="contents">
                            <h1 class="head-title">Find Used|New Mobiles in  <span class="year">Pakistan</span></h1>
                            <p>Buy and sell thousands of Mobiles, we have just the right one for you</p>
                            <div class="search-bar">
                                <div class="search-inner">
                                    <form class="search-form" method="get" action="{{ url('search/keyword') }}">
                                        <div class="form-group width-100">
                                            <input type="text" name="s" id="search" class="form-control" placeholder="What are you looking for....?">
                                        </div>
                                        <button class="btn btn-common" type="submit"><i class="lni-search"></i> Search Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="featured section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="heading">
                    <h1 class="section-title">Latest Mobiles Ads</h1>
                    <h4 class="sub-title">Discover & connect with top-rated Mobiles ads</h4>
                </div>
            </div>
            @if($ads) 
            @foreach($ads as $row)
            <?php $images = explode(',', $row['adimgs']) ?>
            <?php 
                if ($row['aid']%2 == 0) {
                    $alt = 'used phones in '.$row['city']['city'];
                }
                else {
                    $alt = $row['brand']['brand'] . ' used phones';
                }
             ?>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="featured-box">
                    <figure>
                        <a href="{{ url('mobile') }}/{{ $row['brand']['brand'] }}">
                            <div class="homes-tag featured">{{ @ucwords($row['brand']['brand']) }} </div>
                        </a>
                        <div class="homes-tag rent"><i class="lni-camera"></i> {{ count($images) }}</div>
                        <span class="price-save">Rs.<?php echo number_format(str_replace(',','',@$row['adprice'])) ?></span>
                        <a href="{{ url($row['adslug'])}}"><img class="img-fluid img-width-100" src="{{ url('public/images/thumbnail').'/'.$images[0] }}" alt="{{ $alt }}"></a>
                    </figure>
                    <div class="content-wrapper">
                        <div class="feature-content">
                            <h2><a href="{{ url($row['adslug']) }}">{{ @ucwords(substr($row['adtitle'],0,17)) }}...</a></h2>
                            
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
            @endforeach
            @endif
        </div>
    </div>
    </section>
    <section class="works section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="heading">
                    <h1 class="section-title">How It Works?</h1>
                    <h4 class="sub-title">Post a free Classified Mobile Ad. Buy and Sale.</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="works-item">
                    <div class="icon-box">
                        <img class="img-fluid width-75-1" src="{{ url('public/assets/img/info.webp') }}" alt="Create an Account with Let Mobile Website">
                    </div>
                    <p>Create an Account</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="works-item">
                    <div class="icon-box">
                        <img class="img-fluid width-75-2" src="{{ url('public/assets/img/2.webp') }}" alt="Post a free Classified Ad">
                    </div>
                    <p>Post Free Ad</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="works-item">
                    <div class="icon-box">
                        <img class="img-fluid width-75-3" src="{{ url('public/assets/img/4.webp') }}" alt="Deal Done">
                    </div>
                    <p>Deal Done</p>
                </div>
            </div>
            <hr class="works-line">
        </div>
    </div>
    </section>
    <section id="blog" class="section-padding">

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="heading">
                    <h1 class="section-title">Our Blogs</h1>
                    <h4 class="sub-title">Discover & connect with top-rated Technology</h4>
                </div>
            </div>
            <?php if(@$blogs){ foreach($blogs as $blog){ ?>
            <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
                <div class="blog-item-wrapper">
                    <div class="blog-item-img">
                        <a href="<?php echo url('blogs/'.$blog->blog_slug); ?>">
                            <img src="<?php echo url('public/blogimages/thumbnail/'.$blog->blog_image); ?>" alt="<?php echo @ucwords($blog->blog_title); ?>">
                        </a>
                    </div>
                    <div class="blog-item-text">
                        <div class="meta-tags">
                            <span class="user float-left"><a href="#"><i class="lni-user"></i>Let Mobile</a></span>
                            <span class="date float-right"><i class="lni-calendar"></i> <?=date_format(date_create($blog->created_at), 'jS F Y')?></span>
                        </div>
                        <h2><a href="<?php echo url('blogs/'.$blog->blog_slug); ?>">
                            {{ @ucwords(substr($blog->blog_title,0,30)) }}...</a></h2>
                            <?php echo substr($blog->short_description,0,150); ?> ...
                        <a href="<?php echo url('blogs/'.$blog->blog_slug); ?>" class="btn btn-common">Read More</a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>
@stop
@section('page-scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $(document).ready(function() {
    $( "#search" ).autocomplete({
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
@stop