@extends('admin-layouts.default')
@section('page-css')
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
                User List
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
                        User List
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
              <table class="table table-striped- table-bordered table-hover table-checkable kt_table_1">
                  <thead>
                      <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th><center>Phone</center></th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if(isset($user))
                          @foreach($user as $row)
                          <tr>
                              <td>
                                  {{$row->fname}}
                              </td>
                              <td style="text-align: justify;">
                                  {{$row->lname}}
                              </td>
                              <td>
                                  {{$row->email}}
                              </td>
                              <td>
                                   {{$row->phone}}
                              </td>
                              <td>
                                 <center>
                                     <a href="javascript:void(0)" user-data="{{$row->id}}" active-status="{{$row->is_active}}"  class="btn <?php echo ($row->is_active==0)?'btn-danger':'btn-success'; ?> status">
                                              <?php echo ($row->is_active==1)? 'Active':'Inactive'; ?>
                                     </a> 
                                 </center>
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
    $('#users-active').addClass('kt-menu__item--active');
</script>
<script>
$(document).ready(function(){
  $(".status").click(function(){
   var status=$(this).attr('active-status');
   var user_id=$(this).attr('user-data');
   if(status==0){
       status=1;
   }else{
       status=0;
   }
   $.ajax({
        url: '{{url("admin/user/status")}}',
        type: 'GET',
        data: { user_id: user_id,active_status:status},
        success: function(response)
        {
           if(response.status=="success"){
               if(status==1){
                    swal({
                        title: 'Active',
                        text: 'User active Successfully',
                        timer: 2000,
                        icon:'success',
                    });
                    location.reload(true);
                }
               else{
                    swal("InActive", "User inactive successfully", "success");
                    location.reload(true);
                }
           }
        }
    });
  });
});
</script>
@stop