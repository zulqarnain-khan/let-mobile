@extends('admin-layouts.default')

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
        display: none;
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        margin-bottom: 10px;
    }
</style>
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Brand </h3>
            <span class="kt-subheader__separator kt-hidden"></span>

        </div>
    </div>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
           
            <div class="col-md-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            Edit Brand
                            </h3>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-2"></div>
                       <div class="col-md-8">
                            <form class="kt-form kt-form--label-right" id="brandForm"  method="post" enctype="multipart/form-data" >
                                {{ @csrf_field() }}
                                <div class="kt-portlet__body">
                                <div class="col-sm-12 col-md-12 col-lg-2">
                                    <ul class="errors" id="error-show"></ul>
                                </div>
                                <div class="alert alert-success" style="display: none;" id="success-msg">  
                                    Brand Updated Successfully
                                </div>
                                    
                                    <div class="form-group ">
                                        <label>Brand Title</label>
                                        <div class="input-group input-group-lg-group">
                                            <input type="text" class="form-control" value=" <?php echo $brand[0]->brand; ?>" name="brand" placeholder="Title" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <input  type="submit" name=""  value="Save" class="btn btn-secondary">
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
                <div class="col-md-3"></div>

            </div>
        </div>
    </div>
</div>
@stop

@section('page-scripts')
<script src="{{ url('/')}}/public/admin/assets/app/custom/general/crud/forms/widgets/summernote.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#brand').addClass('kt-menu__item--open');
    $('#brand-create').addClass('kt-menu__item--active');
</script>
<script type="text/javascript">
    $("#brandForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#brandForm').submit(function(e){
      e.preventDefault();
      $(".errors").text("");
      $(".errors").hide();
      var formData=new FormData($(this)[0]);
      formData.append("brandslug", $('#m_summernote_1').summernote('code'));
      $.ajax({
               type:'POST',
               url:'{{url("admin/brand/update")}}/<?php echo $brand[0]->bid; ?>',
               data:formData,
               cache       : false,
               contentType : false,
               processData : false,
               dataType: 'json',
               error: function(data) {
                var x = JSON.parse(data.responseText);
                console.log(x);
                var i = 0;
                for (var error in x.errors) {
                    i++;
                    $(".errors").append("<li>"+i+". "+x.errors[error]+"</li>");
                    $('#'+error).addClass('required');
                }
                $(".errors").show();
                },
                success:function(data){
                    $('#brandForm')[0].reset();
                    $('#success-msg').css('display','block');
               }
        });

    });
     
</script>
@stop

