@extends('template.back')

@section('styles')
<!-- Datatables -->
<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
                <a href="{{ route('productadd') }}"><button type="button" class="btn btn-success">Add New Product</button></a>
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
                  <h2>Default Example <small>Users</small></h2>
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
                  <p class="text-muted font-13 m-b-30">
                    DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                  </p>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($products as $product)
                            @foreach ($product->meta as $meta)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $product['name'] }}</td>
                                    <td>{{ $product['color']['name'] }}</td>
                                    <td>{{ $product['category']['name'] }}</td>
                                    <td>{{ $product['brand']['name'] }}</td>
                                    <td>{{ $meta->size->name }}</td>
                                    <td>{{ $meta->stock }}</td>
                                    <td>{{ $product['price'] }}</td>
                                    <td><img src="{{ asset($product['image'][0]['guide'].$product['image'][0]['name']) }}" height="30px" width="30px" /></td>
                                </tr>
                                <?php $no++; ?>
                            @endforeach
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('scripts')
<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
@endsection
