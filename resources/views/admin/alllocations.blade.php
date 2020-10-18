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
                All Locations
            </h3>
            
            <span class="kt-subheader__separator kt-hidden"></span>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Countries
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                  
                       <table class="table table-striped- table-bordered table-hover table-checkable kt_table_1" id="kt_table_1">
                        <thead>
                            <tr>
                                <th>Country Name</th>
                                <th>Country Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($countries))
                                @foreach($countries as $row)
                                <tr>
                                    <td>
                                        {{$row->country}}
                                    </td>
                                    <td style="text-align: justify;">
                                        {{$row->ctryslug}}
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
      <div class="col-md-6">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Provinces
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                  
                       <table class="table table-striped- table-bordered table-hover table-checkable kt_table_1" id="kt_table_1">
                        <thead>
                            <tr>
                                <th>Province Name</th>
                                <th>Province Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($provinces))
                                @foreach($provinces as $row)
                                <tr>
                                    <td>
                                        {{$row->province}}
                                    </td>
                                    <td style="text-align: justify;">
                                        {{$row->provslug}}
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
      <div class="col-md-12">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Cities
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                  
                       <table class="table table-striped- table-bordered table-hover table-checkable kt_table_1" id="kt_table_1">
                        <thead>
                            <tr>
                                <th>City Name</th>
                                <th>City Slug</th>
                                <th>Latitude</th>
                                <th>longitude</th>
                                <th>Type</th>
                                <th>Country Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($cities))
                                @foreach($cities as $row)
                                <tr>
                                    <td>
                                        {{$row->city}}
                                    </td>
                                    <td style="text-align: justify;">
                                        {{$row->cityslug}}
                                    </td>
                                    <td>
                                        {{$row->lat}}
                                    </td>
                                    <td>
                                        {{$row->lng}}
                                    </td>
                                    <td>
                                        {{$row->type}}
                                    </td>
                                    <td>
                                        {{$row->province}}
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
    </div>
  </div>
@stop

@section('page-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ url('/')}}/public/admin/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="{{ url('/')}}/public/admin/assets/app/custom/general/crud/datatables/advanced/multiple-controls.js" type="text/javascript"></script>

<script type="text/javascript">
    $('#locations-active').addClass('kt-menu__item--active');
</script>
@stop