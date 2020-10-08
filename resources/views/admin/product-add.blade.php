@extends('template.back')
@section('styles')
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
    <style>
    /** /image-upload **/
    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
    background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
    background-color:#fff;
        background-size: cover;
    background-repeat:no-repeat;
        display: inline-block;
    box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
    }
    .btn-primary
    {
    display:block;
    border-radius:0px;
    box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
    margin-top:-5px;
    }
    .imgUp
    {
    margin-bottom:15px;
    }
    .del
    {
    position:absolute;
    top:0px;
    right:15px;
    width:30px;
    height:30px;
    text-align:center;
    line-height:30px;
    background-color:rgba(255,255,255,0.6);
    cursor:pointer;
    }
    .imgAdd
    {
    width:30px;
    height:30px;
    border-radius:50%;
    background-color:#4bd7ef;
    color:#fff;
    box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
    text-align:center;
    line-height:30px;
    margin-top:0px;
    cursor:pointer;
    font-size:15px;
    }
    </style>
@endsection
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Upload </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form add new product</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12">
                      <form class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="control-label col-md-3"><span class="required">*</span>Product Name</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="productname" id="productname">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3"><span class="required">*</span>Product Description</label>
                          <div class="col-md-8">
                              <div id="alerts"></div>
                              <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                                <div class="btn-group">
                                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                  <ul class="dropdown-menu">
                                  </ul>
                                </div>

                                <div class="btn-group">
                                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                  <ul class="dropdown-menu">
                                    <li>
                                      <a data-edit="fontSize 5">
                                        <p style="font-size:17px">Huge</p>
                                      </a>
                                    </li>
                                    <li>
                                      <a data-edit="fontSize 3">
                                        <p style="font-size:14px">Normal</p>
                                      </a>
                                    </li>
                                    <li>
                                      <a data-edit="fontSize 1">
                                        <p style="font-size:11px">Small</p>
                                      </a>
                                    </li>
                                  </ul>
                                </div>

                                <div class="btn-group">
                                  <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                  <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                  <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                  <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                </div>

                                <div class="btn-group">
                                  <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                  <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                  <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                  <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                </div>

                                <div class="btn-group">
                                  <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                  <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                  <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                  <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                </div>

                                <div class="btn-group">
                                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                  <div class="dropdown-menu input-append">
                                    <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                    <button class="btn" type="button">Add</button>
                                  </div>
                                  <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                                </div>

                                <div class="btn-group">
                                  <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                  <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                                </div>

                                <div class="btn-group">
                                  <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                  <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                </div>
                              </div>

                              <div id="editor-one" class="editor-wrapper"></div>

                              <textarea name="descr" id="descr" style="display:none;"></textarea>

                              <br />
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="first-name"><span class="required">*</span>Select Category</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="category" id="category">
                                    <option>Choose Category</option>
                                    @foreach ($categories as $data)
                                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="first-name"><span class="required">*</span>Select Category</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="form-control" name="category2" id="category2">
                                <option disabled="true">Choose Category First</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="first-name"><span class="required">*</span>Select Category</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="category3" id="category3">
                                    <option disabled="true">Choose Category First</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Brand</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control" name="brand" id="brand">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-3"><span class="required">*</span>Price</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="price" id="price" placeholder="100000">
                                <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"><span class="required">*</span>Stock</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control" name="stock" id="stock" placeholder="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product SKU</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control" name="productsku" id="productsku">
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label>
                                </div><!-- col-2 -->
                                <i class="fa fa-plus imgAdd"></i>
                            </div>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection
@section('scripts')
    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{ asset('vendors/google-code-prettify/src/prettify.js') }}"></script>

    <script type="text/javascript">
        $('#category').on('change', function(e){
            console.log(e);
            var parent_id = e.target.value;
            $.get('/rlaadmin/json-category?parent_id=' + parent_id,function(data){
                console.log(data);
                $('#category2').empty();
                $('#category2').append('<option>Choose Category</option>');
                $.each(data, function(index, category2Obj){
                    $('#category2').append('<option value="'+ category2Obj.id +'">'+ category2Obj.name +'</option>')
                })
            });
        });

        $('#category2').on('change', function(e){
            console.log(e);
            var parent_id = e.target.value;
            $.get('/rlaadmin/json-category?parent_id=' + parent_id,function(data){
                console.log(data);
                $('#category3').empty();
                $('#category3').append('<option>Choose Category</option>');
                $.each(data, function(index, category3Obj){
                    $('#category3').append('<option value="'+ category3Obj.id +'">'+ category3Obj.name +'</option>')
                })
            });
        });

        // image upload
        $(".imgAdd").click(function(){
            $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
        });
        $(document).on("click", "i.del" , function() {
            $(this).parent().remove();
        });
        $(function() {
            $(document).on("change",".uploadFile", function()
            {
                    var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function(){ // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                    }
                }

            });
        });
        // end form image upload
    </script>
@endsection
