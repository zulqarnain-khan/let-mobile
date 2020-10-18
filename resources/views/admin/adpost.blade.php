@extends('admin-layouts.default')

@section('page-css')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ url('/') }}/public/admin/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" /> 
<style type="text/css">
   .swal-modal {
        width: 350px;
        margin-bottom: 20%;
        margin-left:20%;
    }
    .width-100 {
        width: 20% !important;
    }
</style>
@endsection

@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Show Posts
            </h3>
            
            <span class="kt-subheader__separator kt-hidden"></span>
        </div>
    </div>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Posts List
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable kt_table_1">
                    <thead>
                        <tr>
                            <th>Ad Image</th>
                            <th>Ad Title</th>
                            <th>Ad Price</th>
                            <th>Seller Name</th>
                            <th>Brand</th>
                            <th>City</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($ads))
                            @foreach($ads as $row)
                            <tr>
                                <td> 
                                    <?php $images = explode(',', $row->adimgs);
                                    for ($i=0; $i < count($images); $i++) { ?>
                                    <img class="width-100" src="{{ url('public/images/thumbnail').'/'.$images[$i] }}">
                                <?php } ?>
                                </td>
                                <td> {{$row->adtitle}} </td>
                                <td> {{$row->adprice}} </td>
                                <td> {{$row->selname}} </td>
                                <td> {{$row->brand['brand']}} </td>
                                <td> {{$row->city['city']}} </td>
                                <td> {{ date("F j",strtotime($row->created_at))}} </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ url('/')}}/public/admin/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="{{ url('/')}}/public/admin/assets/app/custom/general/crud/datatables/advanced/multiple-controls.js" type="text/javascript"></script>

<script type="text/javascript">
    $('#post-active').addClass('kt-menu__item--open');
</script>
<script>
$(document).ready(function(){
  $(".status").click(function(){
   var status=$(this).attr('data-value');
   var blog_id=$(this).attr('blog-data-value');
   if(status==0){ status=1; }else{ status=0;}
   $.ajax({
        url: '{{url("blog/status")}}',
        type: 'GET',
        data: { id: status,blog_id:blog_id},
        success: function(response)
        {
           if(response.status=="success"){
               if(status==1){
                    swal({
                        title: 'Active',
                        text: 'Blog active Successfully',
                        timer: 2000,
                        icon:'success',
                    });
                    location.reload(true);
                }
               else{
                    swal("InActive", "Blog inactive successfully", "success");
                    location.reload(true);
                }
           }
        }
    });
  });
});
</script>
@stop