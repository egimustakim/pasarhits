@extends('template.back')
@section('styles')
    <!-- extra -->
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
            <!-- error message-->
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div> <!-- end .flash-message -->

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
                    <form id="demo-form2" action="{{ route('products.store') }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
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
                                <textarea class="form-control" name="description" id="description"></textarea>
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
                        <div class="ln_solid"></div>
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
                        <div class="field_wrapper">
                            <!--added outers class-->
                            <div class="outers">
                              <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Size & Stock <span class="required">*</span></label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                  <!--dummy selct options-->
                                  <select class="form-control" name="size[]" id="color" required>
                                    <option>Choose Size</option>

                                    <option value="1">S</option>
                                    <option value="2">M</option>
                                    <option value="3">L</option>
                                    <option value="4">XL</option>
                                    <option value="5">One Size</option>
                                    <option value="45">35</option>
                                    <option value="46">36</option>
                                    <option value="47">37</option>
                                    <option value="48">38</option>
                                    <option value="49">39</option>
                                    <option value="50">40</option>
                                    <option value="51">41</option>
                                    <option value="52">42</option>
                                    <option value="53">43</option>
                                    <option value="54">44</option>
                                  </select>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                  <input type="text" class="form-control" name="stock[]" id="stock" placeholder="10" required>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                  <a href="javascript:void(0);" class="add_button" title="Add field">
                                    <span class="glyphicon glyphicon-plus red" aria-hidden="true" style="font-size:20px;top:6px;"></span>
                                  </a>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="price" id="price" placeholder="100000" required>
                                <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
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
                                        Browse<input type="file" class="uploadFile img" name="imgupload[]" id="imgupload" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                </div><!-- col-2 -->
                                <i class="fa fa-plus imgAdd"></i>
                           </div><!-- row -->
                        </div><!-- form-group -->
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button type="submit" name="submit" value="savearchive" class="btn btn-primary">Save & Archive</button>
                            <button type="submit" name="submit" value="savepublish" class="btn btn-success">Save & Publish</button>
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
    <!-- extra -->
    <script src="{{ asset('backend/js/extra.js') }}"></script>
    <!-- tinumce-wysiwyg -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '#description'
      });
    </script>
@endsection
