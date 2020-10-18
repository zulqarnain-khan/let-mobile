@extends('layouts.default')
@section('title')
<title><?php echo @ucwords($mobile->mobile_title); ?> | Let Mobile  </title>
<meta name="description" content="<?php echo $mobile->short_description; ?>">
@stop
@section('page-css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<meta property="og:url" content="<?php echo url('new-mobiles/'.$mobile->mobile_slug); ?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ ucwords($mobile->mobile_title) }}" />
<meta property="og:image" content="<?php echo url('public/mobiles/'.$mobile->mobile_image); ?>" />
<meta property="og:image:alt" content="{{ ucwords($mobile->mobile_title) }}" />
@stop
@section('content')
<div class="hidden-sharer">
    <img src="<?php echo url('public/mobiles/'.$mobile->mobile_image); ?>" alt="{{ ucwords($mobile->mobile_title) }}" />
</div>
<div class="page-header" style="background: url(<?php echo url('public/mobiles/'.$mobile->mobile_image); ?>);    background-position: bottom;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h1 class="product-title"><?=stripslashes($mobile->mobile_title)?></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=url('/')?>">Home /</a></li>
                        <li class="current">New Mobile Details</li>
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
                <div class="blog-post single-post">
                    <!-- <div class="post-thumb">
                        <a href="<?php echo url('mobiles/'.$mobile->mobile_slug); ?>"><img class="img-fluid img-width-100" src="<?php echo url('public/mobiles/'.$mobile->mobile_image); ?>" alt="<?php echo @ucwords($mobile->mobile_title); ?>"></a>
                        <div class="hover-wrap">
                        </div>
                    </div> -->

                    <div class="post-content">
                        <h1 class="post-title"><a href="<?php echo url('mobiles/'.$mobile->mobile_slug); ?>"><?php echo @ucwords($mobile->mobile_title); ?></a></h1>
                        <div class="meta">
                            <span class="meta-part"><a href="#"><i class="lni-user"></i> Published By Let Mobile</a></span>
                            <span class="meta-part"><a href="#"><i class="lni-alarm-clock"></i> <?=date_format(date_create($mobile->created_at), 'jS F Y')?></a></span>
                            <!--<span class="meta-part"><a href="#"><i class="lni-folder"></i> Sticky</a></span>-->
                            <!--<span class="meta-part"><a href="#"><i class="lni-comments-alt"></i> 1 Comments</a></span>-->
                        </div>
                        <div class="entry-summary">
                            {!! $mobile->mobile_description !!}
                        </div>
                        <div class="float-right">
                            <div class="share">
                                <div class="social-link">
                                    <a target="_blank" class="facebook" data-toggle="tooltip" data-placement="top" title="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ url('mobiles/') }}/{{ $mobile->mobile_slug }}"><i class="lni-facebook-filled"></i></a>
                                    <a target="_blank" class="twitter" data-toggle="tooltip" data-placement="top" title="twitter" href="https://twitter.com/intent/tweet?status={{ ucwords($mobile->mobile_title) }} here is Link for {{ url('mobiles/') }}/{{ $mobile->mobile_slug }}"><i class="lni-twitter-filled"></i></a>
                                    <a target="_blank" class="linkedin" data-toggle="tooltip" data-placement="top" title="linkedin" href="https://www.linkedin.com/shareArticle?url={{ url('mobiles/') }}/{{ $mobile->mobile_slug }}&title={{ ucwords($mobile->mobile_title) }}&source=Let Mobile"><i class="lni-linkedin-fill"></i></a>
                                    <a target="_blank" class="google" href="whatsapp://send?text=Check this out:{{ ucwords($mobile->mobile_title) }} here is link for {{ url('mobiles/') }}/{{ $mobile->mobile_slug }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--<div id="comments">-->
                <!--    <div class="comment-box">-->
                <!--        <h3>Comments</h3>-->
                <!--        <ol class="comments-list">-->
                <!--            <li>-->
                <!--                <div class="media">-->
                <!--                    <div class="thumb-left">-->
                <!--                        <a href="#">-->
                <!--                            <img class="img-fluid" src="assets/img/mobile/user1.jpg" alt="">-->
                <!--                        </a>-->
                <!--                    </div>-->
                <!--                    <div class="info-body">-->
                <!--                        <div class="media-heading">-->
                <!--                            <h4 class="name">Larsen Mortin</h4>-->
                <!--                            <span class="comment-date"><i class="lni-alarm-clock"></i> June 21, 2020</span>-->
                <!--                            <a href="#" class="reply-link"><i class="lni-reply"></i> Reply</a>-->
                <!--                        </div>-->
                <!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, nemo ipsam eum illo minus voluptatibus ipsa nulla, perferendis aliquid aperiam beatae nihil sapiente eaque atque nesciunt perspiciatis ex saepe, quibusdam..</p>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <ul>-->
                <!--                    <li>-->
                <!--                        <div class="media">-->
                <!--                            <div class="thumb-left">-->
                <!--                                <a href="#">-->
                <!--                                    <img class="img-fluid" src="assets/img/mobile/user2.jpg" alt="">-->
                <!--                                </a>-->
                <!--                            </div>-->
                <!--                            <div class="info-body">-->
                <!--                                <div class="media-heading">-->
                <!--                                    <h4 class="name">Albert Johnes</h4>-->
                <!--                                    <span class="comment-date"><i class="lni-alarm-clock"></i> June 21, 2020</span>-->
                <!--                                    <a href="#" class="reply-link"><i class="lni-reply"></i> Reply</a>-->
                <!--                                </div>-->
                <!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, nemo ipsam eum illo minus voluptatibus ipsa nulla, perferendis aliquid aperiam beatae nihil sapiente eaque atque nesciunt perspiciatis ex saepe, quibusdam..</p>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </li>-->
                <!--                </ul>-->
                <!--            </li>-->
                <!--            <li>-->
                <!--                <div class="media">-->
                <!--                    <div class="thumb-left">-->
                <!--                        <a href="#">-->
                <!--                            <img class="img-fluid" src="assets/img/mobile/user3.jpg" alt="">-->
                <!--                        </a>-->
                <!--                    </div>-->
                <!--                    <div class="info-body">-->
                <!--                        <div class="media-heading">-->
                <!--                            <h4 class="name">Steven Hawkins</h4>-->
                <!--                            <span class="comment-date"><i class="lni-alarm-clock"></i> June 21, 2020</span>-->
                <!--                            <a href="#" class="reply-link"><i class="lni-reply"></i> Reply</a>-->
                <!--                        </div>-->
                <!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, nemo ipsam eum illo minus voluptatibus ipsa nulla, perferendis aliquid aperiam beatae nihil sapiente eaque atque nesciunt perspiciatis ex saepe, quibusdam..</p>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </li>-->
                <!--        </ol>-->

                <!--        <div id="respond">-->
                <!--            <h2 class="respond-title">Leave A Comment</h2>-->
                <!--            <form action="#">-->
                <!--                <div class="row">-->
                <!--                    <div class="col-lg-6 col-md-6 col-xs-12">-->
                <!--                        <div class="form-group">-->
                <!--                            <input id="author" class="form-control" name="author" type="text" value="" size="30" placeholder="Your Name">-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="col-lg-6 col-md-6 col-xs-12">-->
                <!--                        <div class="form-group">-->
                <!--                            <input id="email" class="form-control" name="author" type="text" value="" size="30" placeholder="Your E-Mail">-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="row">-->
                <!--                    <div class="col-lg-12 col-md-12col-xs-12">-->
                <!--                        <div class="form-group">-->
                <!--                            <textarea id="comment" class="form-control" name="comment" cols="45" rows="8" placeholder="Massage..."></textarea>-->
                <!--                        </div>-->
                <!--                        <button type="submit" id="submit" class="btn btn-common">Post Comment</button>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </form>-->
                <!--        </div>-->

                <!--    </div>-->
                <!--</div>-->

            </div>

            <aside id="sidebar" class="col-lg-4 col-md-12 col-xs-12 right-sidebar">
                <div class="widget_search">
                    <form role="search" id="search-form" action="{{ url('search/keyword') }}" method="get">
                        <input type="search" class="form-control" autocomplete="off" name="s" placeholder="Search..." id="search-input">
                        <button type="submit" id="search-submit" class="search-btn"><i class="lni-search"></i></button>
                    </form>
                </div>
                <div class="widget widget-popular-posts">
                    <h4 class="widget-title">Recent New Mobiles</h4>
                    <ul class="posts-list">
                        <?php if(@$mobiles){ foreach($mobiles as $mobile){ ?>
                        <li>
                            <div class="widget-thumb">
                                <a href="<?php echo url('new-mobiles/'.$mobile->mobile_slug); ?>">
                                    <img onerror="this.src='<?php echo url('images/noimage.png'); ?>'" src="<?php echo url('public/mobiles/'.$mobile->mobile_image); ?>" alt="<?php echo @ucwords($mobile->mobile_title); ?>" />
                                </a>
                            </div>
                            <div class="widget-content">
                                <a href="<?php echo url('new-mobiles/'.$mobile->mobile_slug); ?>"><?php echo @ucwords(substr($mobile->mobile_title,0,20)); ?></a>
                                <span><i class="icon-calendar"></i><?=date_format(date_create($mobile->created_at), 'jS F Y')?></span>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                        <?php } } else {  ?>
                           <li> No mobiles Found. </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="widget widget-popular-posts">
                    <h4 class="widget-title">Related Posts</h4>
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