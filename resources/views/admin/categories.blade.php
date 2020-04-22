@extends('template.back')

@section('styles')
<!-- Datatables -->
<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Categories Page</h3>
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
          <!-- Modal Add Category-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('categories.store')}}" method="POST" class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">New Categories</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="inputName" placeholder="Categories Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent Categories</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="form-control" name="parentCat" id="">
                                        <option value="">---- SELECT PARENT ----</option>
                                        @foreach ($categories as $cat)
                                        <option value="{{ $cat['id'] }}">{{ $cat['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                        </form>
                </div>
                </div>
            </div>
            <!-- Modal Add Category-->



            <!-- Modal Edit Sub Category-->
            <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Categories Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('categories.update', 'update')}}" method="POST" class="form-horizontal form-label-left">
                        {{method_field('patch')}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="hidden" class="form-control" id="inputcatid" name="idcat">
                                    <input type="text" class="form-control" id="inputcat" name="inputName" placeholder="Categories Name">
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                        </form>
                </div>
                </div>
            </div>
            <!-- Modal Edit Category-->

          <div class="clearfix"></div>

        <!-- Tabel Category-->
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <div class="x_panel">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Add Categories</button>
                <div class="x_title">
                  <h2>Data Table <small>Categories</small></h2>
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
                  <table id="" class="display table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1 ?>
                    @foreach ($categories as $cat)
                      <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $cat['name'] }}</td>
                        <td>
                        @foreach ($categories->where('id',$cat['parent_id']) as $item)
                        {{ $item['name'] }}
                        @endforeach
                        </td>
                        <td class="text-center"><button type="button" class="btn btn-info btn-sm" disabled>Edit</button></td>
                        <td class="text-center"><button type="button" class="btn btn-danger btn-sm" disabled>Delete</button></td>
                      </tr>
                    <?php $no++ ?>
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

{{-- <script>
$(document).ready(function() {
    $('table.display').DataTable();
} );
</script> --}}

<script>
$('#editCategory').on('show.bs.modal', function (event) {
  console.log('modal open')
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('catname')
  var cat_id = button.data('catid') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body #inputcat').val(recipient);
  modal.find('.modal-body #inputcatid').val(cat_id);
})
</script>

@endsection