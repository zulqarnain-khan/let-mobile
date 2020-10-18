@extends('admin-layouts.default')
@section('page-css')  
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ url('/') }}/public/admin/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />    
<style type="text/css">
            
    .required {
        border-color: red !important;
    }
    
    .errors {
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
    .success {
        background: #03a9f4;
        padding: 20px;
        color: white;
        border-radius: 5px;
        display: none
    }
</style>
@stop
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Mobiles
            </h3>
            
            <span class="kt-subheader__separator kt-hidden"></span>
        </div>
    </div>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Create Mobile
                            </h3>
                        </div>
                    </div>
                    <form class="kt-form kt-form--label-right" id="blogForm" method="post" enctype="multipart/form-data">
                        {{ @csrf_field() }}
                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-sm-12 col-md-2 col-lg-2"></div>
                                <div class="col-sm-12 col-md-8 col-lg-8">
                                    <ul class="errors" id="error-show"></ul>
                                    <div class="alert alert-success" style="display: none;" id="success-msg">
                                        Mobile added Successfully
                                    </div>
                                    <div class="form-group ">
                                        <label>Mobile Title</label>
                                        <div class="input-group input-group-lg-group">
                                            <input type="text" class="form-control" name="mobile_title" placeholder="Title" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Mobile Brand</label>
                                        <div class="input-group input-group-lg-group">
                                            <select class="form-control" name="brand_id">
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->bid}}">
                                                    {{$brand->brand}}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Mobile Image</label>
                                        <div class="input-group input-group-lg-group">
                                            <input type="file" name="mobile_image" class="form-control" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Short Description</label>
                                        <div class="input-group input-group-lg-group">
                                            <textarea class="form-control" name="short_description" placeholder="Short Description" aria-describedby="basic-addon1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Blog Description</label>
                                        <div class="input-group input-group-lg-group">
                                            <div class="summernote" id="m_summernote_1"></div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Mobile Tags</label>
                                        <div class="input-group input-group-lg-group">
                                            <input type="text" name="mobile_tags" class="form-control" placeholder="Blog Slug" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="row">
                                    <div class="col-sm-12 col-md-2 col-lg-2"></div>
                                    <div class="col-sm-12 col-md-8 col-lg-8">
                                        <div class="kt-form__actions">
                                            <input type="submit" name="" value="Save" class="btn btn-secondary">
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop @section('page-scripts')
    <script src="{{ url('/')}}/public/admin/assets/app/custom/general/crud/forms/widgets/summernote.js" type="text/javascript"></script>
    

    <script type="text/javascript">
        $('#mobiles').addClass('kt-menu__item--open');
        $('#mobiles-create').addClass('kt-menu__item--active');
    </script>

    <script type="text/javascript">
        $("#blogForm :input").on("keyup", function() {
            if (!$(this).val()) {
                $(this).addClass('required');
            } else if ($(this).val()) {
                $(this).removeClass('required');
            }
        });
        $('#blogForm').submit(function(e) {
            e.preventDefault();
            $(".errors").text("");
            $(".errors").hide();
            $(".success").text("");
            $(".success").hide();
            KTApp.block('#kt_content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                message: 'Please wait...'
            });
            var formData = new FormData($(this)[0]);
            formData.append("mobile_description", $('#m_summernote_1').summernote('code'));
            $.ajax({
                type: 'POST',
                url: '{{url("admin/mobiles/store")}}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                error: function(data) {
                    KTApp.unblock('#kt_content');
                    var x = JSON.parse(data.responseText);
                    console.log(x);
                    var i = 0;
                    for (var error in x.errors) {
                        i++;
                        $(".errors").append("<li>" + i + ". " + x.errors[error] + "</li>");
                        $('#' + error).addClass('required');
                    }
                    $(".errors").show();
                },
                success: function(data) {
                    KTApp.unblock('#kt_content');
                    $('#blogForm')[0].reset();
                    $('#success-msg').css('display', 'block');
                }
            });

        });
    </script>
    @stop