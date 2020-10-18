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
</style>
@endsection

@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                All Blogs
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
                        Blog List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            &nbsp;
                            <a href="{{ url('blog/create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i> New Record
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>Blog Title</th>
                            <th>Blog Description</th>
                            <th>Blog Image</th>
                            <th>Publish</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($blog))
                            @foreach($blog as $row)
                            <tr>
                                <td> {{$row->blog_title}} </td>
                                <td> {{$row->short_description}} </td>
                                <td>
                                    <img src="{{url('public/blogimages/thumbnail').'/'.$row->blog_image}}" alt="blog image">
                                </td>
                                <td>
                                    <a href="javascript:void(0)" blog-data-value="{{$row->blog_id}}" data-value="{{$row->is_publish}}"  class="btn <?php echo ($row->is_publish==0)?'btn-danger':'btn-success'; ?> status">
                                        <?php echo ($row->is_publish==1)? 'Active':'Inactive'; ?>
                                    </a>
                                </td>
                                <td> {{$row->created_at}} </td>
                                <td>
                                    <a href="{{url('blog/delete')}}/{{$row->blog_id}}">
                                        <i class="la la-trash"></i>
                                    </a>
                                    <a href="{{url('blog/edit')}}/{{$row->blog_id}}">
                                        <i class="la la-edit"></i>
                                    </a>
                                </td>
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
    $('#blogs').addClass('kt-menu__item--open');
    $('#blog-list').addClass('kt-menu__item--active');
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