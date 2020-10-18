    @extends('layouts.default')
    <style type="text/css">
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
    #user-icon
    {
        width: 50%;
    }
    .image {
        overflow: hidden;
        position: relative;
    }

    .label {
        background: rgba(0, 0, 0, 0.5) none repeat scroll 0 0;
        bottom: -25px;
        color: #fff;
        left: 0;
        margin: 0;
        position: absolute;
        right: 0;
        text-align: center;
        transition:0.1s all;
        cursor:pointer;
    }
    .input
    {
        visibility:hidden;
        height: 0px !important;
    }
    .image:hover .label {
      bottom: 0px;
    }
</style>
    @section('content')
    <div></div>
    <div class="page-header" style="background: url({{ url('/') }}/public/assets/img/banner1.webp);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Welcome ! {{ Session::get('name') }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home /</a></li>
                            <li class="current">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
                    <aside>
                        <div class="sidebar-box">
                            <div class="user">
                                <figure class="image" id="mydiv1">
                                    <img src="{{ asset('public/profiles') }}/{{ Session::get('image') }}" onerror="this.src='{{ asset('site/user-icon.png') }}'"  alt="User Icon" id="user-icon">
                                    <form id="profileForm" enctype="multipart/form-data">
                                        {{ @csrf_field() }}
                                        <input id="profile" class="input" accept="image/*" type="file" name="profile" onchange="profileForm()">
                                    </form>
                                    <span class="label" onclick="document.getElementById('profile').click()"><strong>Change Profile</strong></span>
                                </figure>
                                <div class="usercontent">
                                    <h3>Hello {{ Session::get('name') }}!</h3>
                                    <h4>Administrator</h4>
                                </div>
                            </div>
                            <nav class="navdashboard">
                                <ul>
                                    <li>
                                        <a href="{{url('user')}}/{{ Session::get('slug') }}">
                                            <i class="lni-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ (request()->segment(4) == 'published') ? 'active' : '' }}" href="{{url('user')}}/{{ Session::get('slug') }}/ads/published">
                                            <i class="lni-layers"></i>
                                            <span>My Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ (request()->segment(4) == 'unverified') ? 'active' : '' }}" href="{{url('user')}}/{{ Session::get('slug') }}/ads/unverified">
                                            <i class="lni-support"></i>
                                            <span>Unverified Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ (request()->segment(4) == 'deleted') ? 'active' : '' }}" href="{{url('user')}}/{{ Session::get('slug') }}/ads/deleted">
                                            <i class="lni-trash"></i>
                                            <span>Deleted Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ (request()->segment(4) == 'solded') ? 'active' : '' }}" href="{{url('user')}}/{{ Session::get('slug') }}/ads/solded">
                                            <i class="lni-layers"></i>
                                            <span>Sold Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('user')}}/logout">
                                            <i class="lni-enter"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="page-content">
                        <div class="inner-box">
                            <div class="dashboard-box">
                                <h2 class="dashbord-title">Dashboard</h2>
                            </div>
                            <div class="dashboard-wrapper">
                                <div class="dashboard-sections">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-write"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="{{url('user')}}/{{ Session::get('slug') }}/ads/published">Total Posted</a></h2>
                                                    <h3>{{ $published }} Ad Published</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-support"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="{{url('user')}}/{{ Session::get('slug') }}/ads/unverified">Unverified </a></h2>
                                                    <h3>{{ $unverified }} Ad Unverified</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-layers"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="{{url('user')}}/{{ Session::get('slug') }}/ads/solded">Sold </a></h2>
                                                    <h3>{{ $sold }} Ad Solded</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-trash"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="{{url('user')}}/{{ Session::get('slug') }}/ads/deleted">Deleted </a></h2>
                                                    <h3>{{ $deleted }} Ad Deleted</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-responsive dashboardtable tablemyads">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Ad Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($ads)
                                    @foreach($ads as $ad)
                                        <?php $images = explode(',', $ad['adimgs']) ?>
                                        <tr data-category="active">
                                            <td class="photo">
                                                <a href="{{ url($ad['adslug'])}}">
                                                    <img class="img-fluid" src="{{ url('public/images/thumbnail').'/'.$images[0] }}" alt="{{ @ucwords($row['adtitle']) }}">
                                                </a>
                                            </td>
                                            <td data-title="Title">
                                                <h3>{{ @ucwords($ad['adtitle']) }}</h3>
                                                <span><b>Date:</b> {{ date('d M Y h:i a', $ad['adtime']) }}</span><br>
                                                <span><b>Visitors: </b> {{@ucwords($ad['postview_count'])}} </span>
                                            </td>
                                            <td data-title="Price">
                                                <h3>PKR {{ number_format(@$ad['adprice']) }}</h3>
                                            </td>
                                            <td data-title="Ad Status"><span class="adstatus adstatusactive">
                                                @if($ad['vcode'] == 1)
                                                Deleted
                                                @elseif($ad['is_sold'] == 1)
                                                Solded
                                                @else
                                                Active
                                                @endif
                                            </span></td>
                                            <td data-title="Action">
                                                <div class="btns-actions">
                                                    <a class="btn-action btn-view" href="{{ $ad['is_sold']?'javascript:void(0)' :url('user/ads/marksold/'.$ad['aid']) }}">    Sold
                                                    </a>
                                                    
                                                    <a class="btn-action btn-view" href="{{ url($ad['adslug']) }}">
                                                        <i class="lni-eye"></i>
                                                    </a>
                                                    <a class="btn-action btn-edit" href="{{ url('user/'.Session::get('slug').'/ads/edit/'.$ad['aid']) }}">
                                                        <i class="lni-pencil"></i>
                                                    </a>
                                                    <a class="btn-action btn-delete" href="{{ $ad['vcode']?'javascript:void(0)' :url('user/ads/delete/'.$ad['aid']) }}">
                                                        <i class="lni-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else:
                                            <tr><td colspan="6">No Items Found</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="pagination-bar">
                                    {{ $ads->onEachSide(1)->links('vendor.pagination.default') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
@section('page-scripts')
<script type="text/javascript">
    function profileForm(){
        var formData = new FormData($('#profileForm')[0]);
        $("#mydiv1").addClass("disabled-div");
        $.ajax({
            type: 'POST',
            url: '{{ url("/user/profile") }}/{{ $user->id }}',
            data: formData,
            cache       : false,
            contentType : false,
            processData : false,
            dataType: 'json',
            error: function(data) {
                $("#mydiv1").removeClass("disabled-div");
            },
            success: function(data) {
                console.log(data.image);
                $("#mydiv1").removeClass("disabled-div");
                $("#user-icon").attr({ "src": data.image});
            }
        });
    }
</script>
@stop