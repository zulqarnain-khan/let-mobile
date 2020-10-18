 <header id="header-wrap">
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
            <div class="theme-header clearfix">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                    </button>
                    <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ url('/') }}/public/let-mobile.webp"  alt="Let Mobile"></a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav mr-auto w-100 justify-content-left">
                        <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                            <a class="nav-link" href="<?php echo url('/'); ?>">Home</a>
                        </li>
                        <!-- <li class="nav-item <?php if (strpos($url, "items/new/") != FALSE) { ?> active <?php } ?>">
                            <a class="nav-link" href="<?php echo url('items/new/mobile'); ?>">New Mobiles</a>
                        </li> -->
                        <li class="nav-item dropdown {{ (request()->segment(1) == 'mobile') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brands <i class="lni-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'iphone') ? 'active' : '' }}" href="<?=url('mobile/apple')?>">iPhone</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'samsung') ? 'active' : '' }}" href="<?=url('mobile/samsung')?>">Samsung</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'oppo') ? 'active' : '' }}" href="<?=url('mobile/oppo')?>">OPPO</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'qmobile') ? 'active' : '' }}" href="<?=url('mobile/qmobile')?>">Qmobile</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'huawei') ? 'active' : '' }}" href="<?=url('mobile/huawei')?>">Huawei</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'oneplus') ? 'active' : '' }}" href="<?=url('mobile/oneplus')?>">Oneplus</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'vivo') ? 'active' : '' }}" href="<?=url('mobile/vivo')?>">Vivo</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'nokia') ? 'active' : '' }}" href="<?=url('mobile/nokia')?>">Nokia</a></li>
                            </ul>
                        </li>
                        <li class="nav-item {{ (request()->segment(1) == 'blogs') ? 'active' : '' }}">
                            <a class="nav-link" href="<?=url("blogs/all")?>">Blogs</a>
                        </li>
                        <li class="nav-item {{ (request()->is('support/contact')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('support/contact')}}">Contact</a>
                        </li>
                    </ul>
                    <div class="header-top-right float-right">
                        @if ( Auth::guest() )
                         <a href="{{ url('user/signin') }}" class="header-top-button"><i class="lni-user"></i> Log In</a> |
                        <a href="{{ url('user/signup') }}" class="header-top-button"><i class="lni-emoji-smile"></i> Register</a>
                        @else
                        <a class="header-top-button" href="{{url('user')}}/{{ Session::get('slug') }}">{{ Session::get('name') }}</a> |
                        <a class="header-top-button" href="{{url('user/logout')}}">Logout </a>
                         @endif
                    </div>
                    <div class="post-btn">
                        <a class="btn btn-common" href="<?php echo url('post/postad'); ?>"><i class="lni-pencil-alt"></i> Post an Ad</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu" data-logo="{{ url('/') }}/public/let-mobile.webp"></div>
    </nav>
</header>