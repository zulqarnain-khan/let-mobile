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
                Blogs </h3>
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
                            Edit Blog
                            </h3>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-2"></div>
                       <div class="col-md-8">
                            <form class="kt-form kt-form--label-right" id="blogForm"  method="post" enctype="multipart/form-data" >
                                {{ @csrf_field() }}
                                <div class="kt-portlet__body">
                                <div class="col-sm-12 col-md-12 col-lg-2">
                                    <ul class="errors" id="error-show"></ul>
                                </div>
                                <div class="alert alert-success" style="display: none;" id="success-msg">
                                    Blog Edit Successfully
                                </div>
                                    <input type="hidden" name="blog_id" value="{{$blog->blog_id}}">
                                    <div class="form-group ">
                                        <label>Blog Title</label>
                                        <div class="input-group input-group-lg-group">
                                            <input type="text" class="form-control" value="{{$blog->blog_title}}" name="blog_title" placeholder="Title" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Blog Category</label>
                                        <div class="input-group input-group-lg-group">
                                            <select class="form-control" name="category_id">
                                                @foreach($categories as $category)
                                                <option value="{{$category->category_id}}" @if($category->category_id == $blog->category_id)selected @endif>{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Blog Image</label>
                                        <div class="input-group input-group-lg-group">
                                            <input type="file" name="blog_image" class="form-control" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Short Description</label>
                                        <div class="input-group input-group-lg-group">
                                            <textarea class="form-control" name="short_description" placeholder="Short Description" aria-describedby="basic-addon1">{{$blog->short_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Blog Description</label>
                                        <div class="input-group input-group-lg-group">
                                            <div class="summernote" id="m_summernote_1">
                                                {!! $blog->blog_description !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Blog Tags</label>
                                        <div class="input-group input-group-lg-group">
                                            <input type="text" value="{{$blog->blog_tags}}" name="blog_tags" class="form-control" placeholder="Blog Slug" aria-describedby="basic-addon1">
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
    $('#blogs').addClass('kt-menu__item--open');
    $('#blog-create').addClass('kt-menu__item--active');
</script>
<script type="text/javascript">
    $("#blogForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#blogForm').submit(function(e){
      e.preventDefault();
      $(".errors").text("");
      $(".errors").hide();
      var formData=new FormData($(this)[0]);
      formData.append("blog_description", $('#m_summernote_1').summernote('code'));
      $.ajax({
               type:'POST',
               url:'{{url("/blog/update")}}',
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
                    $('#blogForm')[0].reset();
                    $('#success-msg').css('display','block');
               }
        });

    });
     
</script>
@stop

