@extends('layouts.default')
@section('title')
<title>Blogs | Let Mobile</title>
<meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in Lahore, Karachi, Islamabad, Faisalabad and Multan all over the Pakistan. ">
@stop
@section('page-css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop
@section('content')
<div class="page-header" style="background: url(<?=url('/')?>/public/assets/img/banner1.webp);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Blogs Newsfeed</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?=url('/')?>">Home /</a></li>
                        <li class="current">Our Blogs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <?php if(@$blogs){ foreach($blogs as $blog){ ?>
                <div class="blog-post">

                    <div class="post-thumb">
                        <a href="<?php echo url('blogs/'.$blog->blog_slug); ?>">
                            <img class="img-fluid img-width-100"  src="<?php echo url('public/blogimages/'.$blog->blog_image); ?>" alt="<?php echo @ucwords($blog->blog_title); ?>">
                        </a>
                        <div class="hover-wrap"></div>
                    </div>

                    <div class="post-content">
                        <div class="meta">
                            <span class="meta-part"><a href="#"><i class="lni-user"></i>  Published By Let Mobile</a></span>
                            <span class="meta-part"><a href="#"><i class="lni-alarm-clock"></i> <?=date_format(date_create($blog->created_at), 'jS F Y')?></a></span>
                            <!--<span class="meta-part"><a href="#"><i class="lni-folder"></i> Sticky</a></span>-->
                            <!--<span class="meta-part"><a href="#"><i class="lni-comments-alt"></i> 1 Comments</a></span>-->
                        </div>
                        <h1 class="post-title"><a href="<?php echo url('blogs/'.$blog->blog_slug); ?>"><?php echo @ucwords($blog->blog_title); ?></a></h1>
                        <div class="entry-summary">
                            <p> <?php echo $blog->short_description; ?></p>
                        </div>
                        <a href="<?php echo url('blogs/'.$blog->blog_slug); ?>" class="btn btn-common">Read More</a>
                    </div>

                </div>
                 <?php } } ?>
                <div class="pagination-bar">
                    {{ $blogs->onEachSide(1)->links('vendor.pagination.default') }}
                </div>

            </div>

            <aside id="sidebar" class="col-lg-4 col-md-12 col-xs-12 right-sidebar">

                <div class="widget_search">
                    <form role="search" id="search-form" action="{{ url('search/keyword') }}" method="get">
                        <input type="search" class="form-control" autocomplete="off" name="s" placeholder="Search..." id="search-input">
                        <button type="submit" id="search-submit" class="search-btn"><i class="lni-search"></i></button>
                    </form>
                </div>
                <!-- <div class="widget categories">
                    <h4 class="widget-title">All Categories</h4>
                    <ul class="categories-list">
                        <li>
                            <a href="#">
                                <i class="lni-dinner"></i> Hotel & Travels <span class="category-counter">(5)</span>
                            </a>
                        </li>
                    </ul>
                </div> -->

                <div class="widget widget-popular-posts">
                    <h4 class="widget-title">Recent Posts</h4>
                    <ul class="posts-list">
                        <?php if(@$ads){ foreach($ads as $row) { $images = explode(',', $row['adimgs']);?>
                        <li>
                            <div class="widget-thumb">
                                <a href="{{ url($row['adslug'])}}">
                                    <img  src="{{ url('public/images/thumbnail').'/'.$images[0] }}" alt="{{ @ucwords($row['adtitle'],0,17) }}" />
                                </a>
                            </div>
                            <div class="widget-content">
                                <a href="{{ url($row['adslug'])}}">{{ @ucwords(substr($row['adtitle'],0,20)) }}...</a>
                                <span>
                                    <a href="{{ url('mobile') }}/{{ $row['brand']['brand'] }}"><i class="lni-bookmark-alt"></i> {{ @ucwords($row['brand']['brand']) }}</a>
                                    <a href="{{ url('city/'.$row['city']['cityslug'])}}"><i class="lni-map-marker"></i> {{ @ucwords($row['city']['city']) }}</a>
                                </span>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                        <?php } } ?>
                    </ul>
                </div>
            </aside>

        </div>
    </div>
</div>
@stop
@section('page-scripts')
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
@stop