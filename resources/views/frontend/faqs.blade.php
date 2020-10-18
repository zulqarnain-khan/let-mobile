@extends('layouts.default')
@section('title')
<title>Faqs | Let Mobile </title>
<meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in Lahore, Karachi, Islamabad, Faisalabad and Multan all over the Pakistan. ">
@stop
@section('content')
<div class="page-header" style="background: url({{ url('/') }}/public/assets/img/banner1.webp);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h1 class="product-title">FAQ</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home /</a></li>
                        <li class="current">FAQ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="faq section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head-faq text-center">
                    <h2 class="section-title">Frequently Asked Questions</h2>
                </div>

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">How do I place an ad?</a></h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse show">
                            <div class="panel-body">
                                <p>Posting an ad is very simple. use upto 4 pictures with your ad and post all relevant details. Remember, phone number and email are neccessory for verification.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="faq section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">If I post an ad, will I also get more spam emails?</a></h4>
                        </div>
                        <div id="collapseOne1" class="panel-collapse collapse show">
                            <div class="panel-body">
                                <p>No. Our system does not generate spam emails, we use to authenticate out clients with phone and if by some problem we are getting trouble sending you message by phone, we will email you.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="faq section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2">How long will my ad remain on the website?</a></h4>
                        </div>
                        <div id="collapseOne2" class="panel-collapse collapse show">
                            <div class="panel-body">
                                <p>By Our automated system you ad will be visible to public for 365 days by default, but you can request the admin to extend the date according to your desired time.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="faq section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion4" href="#collapseOne3">I sold my item. How do I delete my ad?</a></h4>
                        </div>
                        <div id="collapseOne3" class="panel-collapse collapse show">
                            <div class="panel-body">
                                <p>If you are registered user, you can delete your ad manually from the user panel. But if you have posted the ad without registeration, you are required to contact the admin for marking the ad as sold.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop