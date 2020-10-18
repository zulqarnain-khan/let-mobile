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
        display: none;
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        margin-bottom: 10px;
    }
    .success
    {
        background: #03a9f4;
        padding: 20px;
        color: white;
        border-radius: 5px;
        display: none
    }
    .login-btn
    {
        width: 50%
    }
    .disabled-div {
          pointer-events: none;
          opacity: 0.4;
      }
</style>
@section('content')
<div class="page-header" style="background: url(<?=url('/')?>/public/assets/img/banner1.webp);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">{{ ucwords($item['adtitle']) }}</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?=url('/')?>">Home /</a></li>
                        <li class="current">Edit Ad</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content" class="section-padding">
    <div class="container">
        <div class="row" id="mydiv">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row page-content">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                      <ul class="errors" id="error-show"></ul>
                      <ul class="success"></ul>
                  </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                    <div class="inner-box">
                        <div class="dashboard-box">
                            <h2 class="dashbord-title">Ad Detail</h2>
                        </div>
                        <div class="dashboard-wrapper">
                            <div class="dashboard-wrapper">
                              <form id="postForm"  method="post" enctype="multipart/form-data" class="login-form">
                                {{ @csrf_field() }}
                                  <fieldset>
                                      <input type="hidden" name="category" value="1">
                                      <div class="form-group mb-3">
                                          <label for="title" class="control-label font-weight-bold text-muted">Ad Title</label>
                                          <input type="text" name="title" id="title" placeholder="Ad Title" class="form-control input-md" value="{{ ucwords($item['adtitle']) }}"> <span class="help-block">A great title needs at least 60 characters</span>
                                      </div>
                                      <div class="form-group mb-3">
                                          <div class="form-group">
                                              <label class="font-weight-bold text-muted" for="item">Select Brand</label>
                                              <div class="select2">
                                                  <input class="form-control select2-input bg-white text-capitalize" type="text" placeholder="Select Brand" readonly="readonly" value="{{ ucwords($item['brand']['brand']) }}"  id="select2-input">
                                                  <input class="d-none select2-value invisible" value="{{ $item['br_id'] }}" id="item" name="brand" type="hidden" readonly="readonly">
                                                  <div class="select2-list bg-light w-100 rounded-bottom">
                                                      <div class="container my-2">
                                                          <input class="select2-search form-control form-control-sm" type="text" placeholder="search...">
                                                      @if($brands)
                                                        @foreach($brands as $row)
                                                          <div class="select2-item px-3 py-2 border-bottom text-primary text-capitalize" data-value="{{ $row['bid'] }}">{{ $row['brand'] }}</div>
                                                        @endforeach
                                                      @endif
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group mb-3">
                                          <label for="ades" class="control-label font-weight-bold text-muted">Describe Ad</label>
                                          <div class="col-md-12">
                                              <textarea name="ades" cols="40" rows="6" id="ades" class="form-control input-md" placeholder="Describe what makes your ad unique">{{ $item['ad_description'] }}</textarea>
                                          </div>
                                      </div>
                                      <div class="form-group mb-3">
                                          <label for="price" class="control-label font-weight-bold text-muted">Price</label>
                                          <div class="">
                                              <div class="input-group">
                                                  <input type="text" name="price" value="{{ $item['adprice'] }}" id="price" placeholder="10000" class="form-control"> </div>
                                          </div>
                                      </div>
                                      <div class="form-group mb-3">
                                          <label class="control-label font-weight-bold text-muted">Negotiable</label>
                                          <div class="">
                                              <select name="neg" class="form-control">
                                                  <option value="0" <?= $item['nego']?'':"selected" ?> >Not Negotiable</option>
                                                  <option value="1" <?= $item['nego']?'selected':"" ?>>Negotiable</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group mb-3">
                                          <label class="control-label font-weight-bold text-muted">Condition</label>
                                          <div class="">
                                              <select name="cond" class="form-control">
                                                  <option value="0" <?= $item['cond']?'':"selected" ?>>Used</option>
                                                  <option value="1" <?= $item['cond']?'selected':"" ?>>New</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group mb-3">
                                          <label for="phone" class="control-label font-weight-bold text-muted">Phone</label>
                                          <div class="">
                                              <input type="text" name="phone" value="{{ $item['adphone'] }}" id="phone" placeholder="03xxxxxxxxx"  class="form-control input-md" title="Use phone number as 03xxxxxxxxx">
                                          </div>
                                      </div>
                                  </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                    <div class="inner-box">
                      <?php
                      $img_1 = $img_2 = $img_3 = $img_4 = '';
                      if(@$item) {
                          $ar = explode(',', $item['adimgs']);
                          if(count($ar) > 0 && !empty($ar[0])){
                            $img_1 = "<img style = 'width: 100%; padding: 10px' src='".url('public/images/'.$ar[0])."'>";
                          }
                          if (count($ar) > 1 && !empty($ar[1])) {
                            $img_2 = "<img style = 'width: 100%; padding: 10px' src='".url('public/images/'.$ar[1])."'>";
                          }
                          if (count($ar) > 2 && !empty($ar[2])) {
                            $img_3 = "<img style = 'width: 100%; padding: 10px' src='".url('public/images/'.$ar[2])."'>";
                          }
                          if (count($ar) > 3 && !empty($ar[3])) {
                            $img_4 = "<img style = 'width: 100%; padding: 10px' src='".url('public/images/'.$ar[3])."'>";
                          }
                        }
                      ?>
                        <div class="tg-contactdetail">
                            <div class="dashboard-box">
                                <h2 class="dashbord-title">Upload Images</h2>
                            </div>
                            <div class="dashboard-wrapper text-center">
                                <span>Add up to 4 photos. Use a real image of your product, not catalogs</span>
                                <label class="tg-fileuploadlabel" for="tg-photogallery1">
                                    <div id="divImageMediaPreview1"><?=$img_1?></div>
                                    <span class="btn btn-common">Select File</span>
                                    <input id="tg-photogallery1" class="tg-fileinput1" accept='image/*' type="file" name="image0">
                                </label>
                                <label class="tg-fileuploadlabel" for="tg-photogallery2">
                                    <div id="divImageMediaPreview2"><?=$img_2?></div>
                                    <span class="btn btn-common">Select File</span>
                                    <input id="tg-photogallery2" class="tg-fileinput2" accept='image/*' type="file" name="image1">
                                </label>
                                <label class="tg-fileuploadlabel" for="tg-photogallery3">
                                    <div id="divImageMediaPreview3"><?=$img_3?></div>
                                    <span class="btn btn-common">Select File</span>
                                    <input id="tg-photogallery3" class="tg-fileinput3" accept='image/*' type="file" name="image2">
                                </label>
                                <label class="tg-fileuploadlabel" for="tg-photogallery4">
                                    <div id="divImageMediaPreview4"><?=$img_4?></div>
                                    <span class="btn btn-common">Select File</span>
                                    <input id="tg-photogallery4" class="tg-fileinput4" accept='image/*' type="file" name="image3">
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                     <div class="inner-box" >
                        <div class="tg-contactdetail">
                            <div class="dashboard-box">
                                <h2 class="dashbord-title">Address and City</h2>
                            </div>
                            <div class="dashboard-wrapper">
                              <div class="form-group mb-3">
                                <div class="form-group">
                                    <label class="font-weight-bold text-muted" for="item">Select Location</label>
                                    <div class="select2">
                                        <input class="form-control select2-input_loc bg-white text-capitalize" value="{{ ucwords($item['city']['city']) }}" type="text" placeholder="Select Location" readonly="readonly" id="select2-input_loc">
                                        <input class="d-none select2-value_loc invisible" id="item" value="{{ $item['loc_id'] }}" name="location" type="hidden" readonly="readonly">
                                        <div class="select2-list_loc bg-light w-100 rounded-bottom">
                                            <div class="container my-2">
                                                <input class="select2-search_loc form-control form-control-sm" type="text" placeholder="search...">
                                                @if($cities)
                                                  @foreach($cities as $row)
                                                   <div class="select2-item_loc px-3 py-2 border-bottom text-primary text-capitalize" data-value="{{ $row['ctid'] }}">{{ $row['city'] }}</div>
                                                  @endforeach
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone" class="control-label font-weight-bold text-muted">Street Address</label>
                                <div class="">
                                    <input type="text" name="adadress" value="{{ $item['adadress'] }}" id="adadress" placeholder="Street Address"  class="form-control input-md" title="Street Address">
                                </div>
                            </div>
                            <div class="tg-checkbox">
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="termsandconditions" class="custom-control-input" id="tg-agreetermsandrules">
                                  <label class="custom-control-label" for="tg-agreetermsandrules">I agree to all <a href="https://letmobile.pk/home/termsandconditions.html">Terms of Use &amp; Posting Rules</a></label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="">
                                <input style="width: 50%;" type="submit" name=""  value="Post Ad" class="btn btn-common log-btn"> 
                              </div>
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
</div>
@stop
@section('page-scripts')
<script type="text/javascript">
    $("#postForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#postForm').submit(function(e) {
        $("#mydiv").addClass("disabled-div");
        e.preventDefault();
        $(".errors").text("");
        $(".errors").hide();
        $(".success").text("");
        $(".success").hide();
        var formData = new FormData($(this)[0]);
        $(".fa-spin").show();
        $('.log-btn').attr('disabled', true);
        $.ajax({
            type: 'POST',
            url: '{{ url("/post/update") }}/{{ $item["aid"] }}',
            data: formData,
            cache       : false,
            contentType : false,
            processData : false,
            dataType: 'json',
            error: function(data) {
                var x = JSON.parse(data.responseText);
                $('.log-btn').attr('disabled', false);
                $("#mydiv").removeClass("disabled-div");
                var i = 0;
                for (var error in x.errors) {
                    i++;
                    $(".errors").append("<li>"+i+". "+x.errors[error]+"</li>");
                    $('#'+error).addClass('required');
                }                $(".errors").show();
                $(".fa-spin").hide();
                var errors = 0;
                $("#postForm :input").map(function() {
                    if (!$(this).val()) {
                        $(this).addClass('required');
                        errors++;
                    } else if ($(this).val()) {
                        $(this).removeClass('required');
                    }
                });
                $("html, body").animate({ scrollTop: $('#error-show').offset().top }, 1000);
            },
            success: function(data) {
                $(".fa-spin").hide();
                $('.log-btn').attr('disabled', false);
                $("#mydiv").removeClass("disabled-div");
                $('#postForm')[0].reset();
                $('.log-btn').prop('disabled', false);
                window.location.href = "{{ url('/')}}/"+data.slug;
            }
        });
    });
</script>
<script>
  $(".select2-input").click(function(e) {
      e.preventDefault();
      $(this).parent().find('.select2-list').toggle('active');
  });
  $(".select2-search").on("keyup", function(e) {
    e.preventDefault();
    var value = $(this).val().toLowerCase();
    $(this).parent().parent().parent().find('.select2-item').filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $(".select2-item").click(function(e) {
    e.preventDefault();
    $('#select2-input').removeClass('required');
    $('.select2-input').val($(this).text());
    $('.select2-value').val($(this).data('value'));
    $('.select2-list').toggle('active');
    $('.select2-search').val('');
    $('.select2-item').show();
  });

</script>
<script>
  $(".select2-input_loc").click(function(e) {
      e.preventDefault();
    $(this).parent().find('.select2-list_loc').toggle('active');
  });
  $(".select2-search_loc").on("keyup", function(e) {
    e.preventDefault();
    var value = $(this).val().toLowerCase();
    $(this).parent().parent().parent().find('.select2-item_loc').filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $(".select2-item_loc").click(function(e) {
    e.preventDefault();
    $('#select2-input_loc').removeClass('required');
    $('.select2-input_loc').val($(this).text());
    $('.select2-value_loc').val($(this).data('value'));
    $('.select2-list_loc').toggle('active');
    $('.select2-search_loc').val('');
    $('.select2-item_loc').show();
  });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#file1').attr('src', e.target.result);
                $('#file1').show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $(".tg-fileinput1").change(function(){
        readURL(this);
    });
    });
    
    $(".tg-fileinput1").change(function () {
  if (typeof (FileReader) != "undefined") {
    var dvPreview = $("#divImageMediaPreview1");
    dvPreview.html("");            
    $($(this)[0].files).each(function () {
      var file = $(this);                
        var reader = new FileReader();
        reader.onload = function (e) {
          var img = $("<img />");
          img.attr("style", "width: 100%; padding: 10px");
          img.attr("src", e.target.result);
          dvPreview.append(img);
        }
        reader.readAsDataURL(file[0]);                
    });
  } else {
    alert("This browser does not support HTML5 FileReader.");
  }
    });
  $(".tg-fileinput2").change(function () {
  if (typeof (FileReader) != "undefined") {
    var dvPreview = $("#divImageMediaPreview2");
    dvPreview.html("");            
    $($(this)[0].files).each(function () {
      var file = $(this);                
        var reader = new FileReader();
        reader.onload = function (e) {
          var img = $("<img />");
          img.attr("class", "upload-img");
          img.attr("src", e.target.result);
          dvPreview.append(img);
        }
        reader.readAsDataURL(file[0]);                
    });
  } else {
    alert("This browser does not support HTML5 FileReader.");
  }
  });
  $(".tg-fileinput3").change(function () {
  if (typeof (FileReader) != "undefined") {
    var dvPreview = $("#divImageMediaPreview3");
    dvPreview.html("");            
    $($(this)[0].files).each(function () {
      var file = $(this);                
        var reader = new FileReader();
        reader.onload = function (e) {
          var img = $("<img />");
          img.attr("style", "width: 100%; padding: 10px");
          img.attr("src", e.target.result);
          dvPreview.append(img);
        }
        reader.readAsDataURL(file[0]);                
    });
  } else {
    alert("This browser does not support HTML5 FileReader.");
  }
  });
  $(".tg-fileinput4").change(function () {
  if (typeof (FileReader) != "undefined") {
    var dvPreview = $("#divImageMediaPreview4");
    dvPreview.html("");            
    $($(this)[0].files).each(function () {
      var file = $(this);                
        var reader = new FileReader();
        reader.onload = function (e) {
          var img = $("<img />");
          img.attr("style", "width: 100%; padding: 10px");
          img.attr("src", e.target.result);
          dvPreview.append(img);
        }
        reader.readAsDataURL(file[0]);                
    });
  } else {
    alert("This browser does not support HTML5 FileReader.");
  }
});
</script>
@stop