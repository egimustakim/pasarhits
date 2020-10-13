@extends('template.back')
@section('styles')
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('backend/css/extra.css') }}" rel="stylesheet">
@endsection
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Plain Page</h3>
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
                    <h2>Plain Page</h2>
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
                    <form id="demo-form2" action="{{ route('products.store') }}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Product Name <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12" type="text" name="name" id="name" required>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-description">Product Description <span class="required">*</span></label>
                            <div id="alerts"></div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
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
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-one">Select Category <span class="required">*</span></label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="category" id="category" required>
                                    <option>Choose Category</option>
                                    @foreach ($categories as $data)
                                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-two">Select Category <span class="required">*</span></label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="form-control" name="category2" id="category2" required>
                                <option disabled="true">Choose Category First</option>
                            </select>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-three">Select Category <span class="required">*</span></label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="category3" id="category3" required>
                                    <option disabled="true">Choose Category First</option>
                                </select>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand">Brand
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="form-control" name="brand" id="brand">
                                <option>Choose Brand</option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="color">Color <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="color" id="color" required>
                                    <option>Choose Color</option>
                                    @foreach ($colors as $color)
                                    <option value="{{ $color['id'] }}">{{ $color['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Material">Material <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="material" id="material" required>
                                    <option>Choose Material</option>
                                    @foreach ($materials as $material)
                                    <option value="{{ $material['id'] }}">{{ $material['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Size <span class="required">*</span></label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <?php
                                $no = 1;
                                foreach ($sizes as $size) {
                                    if ($no <= 5 ) {
                                    echo "
                                <div class=\"checkbox\">
                                    <label>
                                        <input . $no . type=\"checkbox\" class=\"flat\" name=\"size[]\" id=\"size\">" . $size['name'] .
                                    "</label>
                                </div>";
                                $no++;
                                    } else {
                                        $no = 1;
                            echo "</div>
                            <div class=\"col-md-2 col-sm-2 col-xs-12\">";
                                    }
                                }
                                ?>
                            </div>
                        </div><!-- form-group -->
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="price" id="price" placeholder="100000" required>
                                <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="control-label col-md-3"><span class="required" for="stock">*</span>Stock <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control" name="stock" id="stock" placeholder="10" required>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="control-label col-md-3" for="product-sku">Product SKU</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control" name="productsku" id="productsku">
                            </div>
                        </div><!-- form-group -->
                        <br><div class="form-group">
                            <div class="row">
                                <div class="col-sm-2 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-upload">
                                        Browse<input type="file" class="uploadFile img" name="imgupload[]" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                </div><!-- col-2 -->
                                <i class="fa fa-plus imgAdd"></i>
                           </div><!-- row -->
                        </div><!-- form-group -->
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button type="submit" name="savearchive" class="btn btn-primary">Save & Archive</button>
                            <button type="submit" name="savepublish" class="btn btn-success">Save & Publish</button>
                          </div>
                        </div>

                    </form>
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
    <script src="{{ asset('backend/js/extra.js') }}"></script>
@endsection
