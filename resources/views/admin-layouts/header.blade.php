<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav">
            <li id="blogs" class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon2-copy"></i>
                    <span class="kt-menu__link-text">Blogs</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu"><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item" id="blog-list" aria-haspopup="true">
                            <a href="{{url('blog/list')}}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="kt-menu__link-text">Blog List</span>
                            </a>
                        </li>
                        <li class="kt-menu__item" id="blog-create" aria-haspopup="true">
                            <a href="{{url('blog/create')}}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="kt-menu__link-text">Add Blog</span>
                            </a>
                        </li>
                    </ul>
                </div>     
            </li>
            <li id="brand" class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon2-copy"></i>
                    <span class="kt-menu__link-text">Brands</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu"><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item" id="brand-list" aria-haspopup="true">
                            <a href="{{url('admin/brand/show')}}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="kt-menu__link-text">Brands List</span>
                            </a>
                        </li>
                        <li class="kt-menu__item" id="brand-create" aria-haspopup="true">
                            <a href="{{url('admin/brand/create')}}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="kt-menu__link-text">Add Brands</span>
                            </a>
                        </li>
                    </ul>
                </div>     
            </li>
            <li id="mobiles" class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon2-copy"></i>
                    <span class="kt-menu__link-text">Mobiles Info</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu"><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item" id="mobiles-list" aria-haspopup="true">
                            <a href="{{url('admin/mobiles/list')}}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="kt-menu__link-text">Mobiles Info List</span>
                            </a>
                        </li>
                        <li class="kt-menu__item" id="mobiles-create" aria-haspopup="true">
                            <a href="{{url('admin/mobiles/create')}}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="kt-menu__link-text">Add Mobile Info</span>
                            </a>
                        </li>
                    </ul>
                </div>     
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover" id="users-active"><a href="{{url('admin/user')}}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-avatar"></i>
                    <span class="kt-menu__link-text">All Users</span>
                </a>   
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover" id="post-active"><a href="{{url('admin/adpost')}}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-layers"></i>
                    <span class="kt-menu__link-text">Ads Post</span>
                </a>   
            </li>
             <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover" id="locations-active"><a href="{{url('admin/alllocations')}}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-location"></i>
                    <span class="kt-menu__link-text">Locations</span>
                </a>   
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover" id="contacts-active"><a href="{{url('admin/contacts')}}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-book"></i>
                    <span class="kt-menu__link-text">Contacts</span>
                </a>   
            </li>
            
        </ul>
    </div>
</div>