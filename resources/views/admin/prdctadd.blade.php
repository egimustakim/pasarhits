@extends('template.back')

@section('styles')
<!-- bootstrap-wysiwyg -->
<link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
<!-- Switchery -->
<link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
<!-- Dropzone.js -->
<link href="{{ asset('vendors/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Form Wizards</h3>
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
              <h2>Form Wizards <small>Sessions</small></h2>
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


              <!-- Smart Wizard -->
              <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p>
              <div id="wizard" class="form_wizard wizard_horizontal">
                <ul class="wizard_steps">
                  <li>
                    <a href="#step-1">
                      <span class="step_no">1</span>
                      <span class="step_descr">
                                        Step 1<br />
                                        <small>Step 1 category</small>
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-2">
                      <span class="step_no">2</span>
                      <span class="step_descr">
                                        Step 2<br />
                                        <small>Step 2 description</small>
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-3">
                      <span class="step_no">3</span>
                      <span class="step_descr">
                                        Step 3<br />
                                        <small>Step 3 detail</small>
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-4">
                      <span class="step_no">4</span>
                      <span class="step_descr">
                                        Step 4<br />
                                        <small>Step 4 image</small>
                                    </span>
                    </a>
                  </li>
                </ul>
                <div id="step-1">
                  <h2 class="StepTitle">Step 1 Category</h2>
                  <form class="form-horizontal form-label-left">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Category <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="category" id="category">
                            <option>=== Select Category ===</option>
                            @foreach ($categories as $data)
                            <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="category2" id="category2">
                            <option disabled="true">Choose Category First</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="category3" id="category3">
                            <option disabled="true">Choose Category First</option>
                          </select>
                        </div>
                    </div>
                  </form>

                </div>
                <div id="step-2">
                    <h2 class="StepTitle">Step 2 Description</h2>
                    <div class="col-md-10 center-margin">
                        <form class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="" for="product-name">Product Name <span class="required">*</span></label>
                                <input type="text" name="productName" id="productName" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="form-group">
                                <label class="" for="description">Description <span class="required">*</span></label>
                                <div class="x_content">
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

                                    <div class="ln_solid"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="step-3">
                  <h2 class="StepTitle">Step 3 Detail</h2>
                  <form class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Color <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="form-control" name="color" id="color">
                                <option>Choose Color</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Material <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="form-control" name="category3" id="category3">
                                <option>Choose Material</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Brand <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="form-control" name="category3" id="category3">
                                <option>Choose Brand</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Size</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="flat" name="size[]" id="size">Checked <span class="required">*</span></label>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Price <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" name="price" id="price" placeholder="100000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Stock <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" name="stock" id="stock" placeholder="5">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status" id="status" class="js-switch" /> Unchecked
                                </label>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
                <div id="step-4">
                    <h2 class="StepTitle">Step 4 Image</h2>
                    <div class="x_content">
                        <p>Drag multiple image to the box below for multi upload or click to select files.</p>
                        <form action="" class="dropzone"></form>
                        <br />
                        <br />
                        <br />
                        <br />
                    </div>
                </div>
              </div>
              <!-- End SmartWizard Content -->
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- /page content -->
@endsection

@section('scripts')
<!-- smartWizard -->
<script src="{{ asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{ asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ asset('vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
<script src="{{ asset('vendors/google-code-prettify/src/prettify.js') }}"></script>
<!-- Switchery -->
<script src="{{ asset('vendors/switchery/dist/switchery.min.js') }}"></script>
<!-- Dropzone.js -->
<script src="{{ asset('vendors/dropzone/dist/min/dropzone.min.js') }}"></script>

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
</script>
@endsection
