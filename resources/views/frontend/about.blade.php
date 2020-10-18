@extends('layouts.default')
@section('title')
<title>About Us | Let Mobile</title>
<meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in Lahore, Karachi, Islamabad, Faisalabad and Multan all over the Pakistan. ">
@stop
@section('content')
<div class="page-header" style="background: url({{url('/')}}/public/assets/img/banner1.webp);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">About Us</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home /</a></li>
                        <li class="current">About Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="about" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-xs-12">
                <div class="about-wrapper">
                    <h2 class="intro-title">What Makes Us Special</h2>
                    <p class="intro-desc"> We are the leading classified portal of Pakistan, providing the best features and functions to our clients related to online selling. We are providing non stop availability of cheap and new products to all over pakistan with just a phone call.

We are here to provide 24/7 support to our clients related to online marketing. With good knowledge of your product we can sell it as good as it should be. We'll provide clients from all over Pakistan for your top rated products as quick as possible.

We are observing that no one provides the best portal for selling online in Pakistan. So we started to provide a best and easy to use portal for our clients across Pakistan.

We are here to devliver the best of us to everyone across Pakistan. In order to achieve this, we are providing 24 hour support to our clients. We are welcoming your feedbacks.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12">
                <img class="img-fluid" src="{{ url('public/assets/img/info.webp') }}" alt="">
            </div>
        </div>
    </div>
</section>
<section class="counter-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-6 work-counter-widget">
                <div class="counter">
                    <div class="icon"><i class="lni-layers"></i></div>
                    <h2 class="counterUp">116</h2>
                    <p> Brands</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 work-counter-widget">
                <div class="counter">
                    <div class="icon"><i class="lni-users"></i></div>
                    <h2 class="counterUp">5487</h2>
                    <p>TRUSTED SELLER</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 work-counter-widget">
                <div class="counter">
                    <div class="icon"><i class="lni-facebook"></i></div>
                    <h2 class="counterUp">400</h2>
                    <p>FACEBOOK FANS</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 work-counter-widget">
                <div class="counter">
                    <div class="icon"><i class="lni-map"></i></div>
                    <h2 class="counterUp">649</h2>
                    <p>Locations</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services section-padding">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-lg-4 col-xs-12">
                <div class="services-item wow fadeInRight" data-wow-delay="0.2s">
                    <div class="icon">
                        <i class="lni-book"></i>
                    </div>
                    <div class="services-content">
                        <h3><a href="#">BACKGROUND</a></h3>
                        <p>We are observing that no one provides the best portal for selling online in Pakistan. <br>So we started to provide a best and easy <br> to use portal for our clients across <br> Pakistan.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xs-12">
                <div class="services-item wow fadeInRight" data-wow-delay="0.4s">
                    <div class="icon">
                        <i class="lni-leaf"></i>
                    </div>
                    <div class="services-content">
                        <h3><a href="#">SELLER SATISFACTION</a></h3>
                        <p>We are here to devliver the best of us to everyone across Pakistan. In order to achieve this, we are providing 24 hour support to our clients. We are welcoming your feedbacks.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xs-12">
                <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                    <div class="icon">
                        <i class="lni-map"></i>
                    </div>
                    <div class="services-content">
                        <h3><a href="#">METHODOLOGY</a></h3>
                        <p>We are using the best methods and techniquies to get connected with our clients. We are using the latest techniques and technologies to provide the best to our clients without delay.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop