@extends('template.back')

@section('content')
    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Role <small>table</small></h3>
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
            </div>
            <!-- end .flash-message -->

            <!-- Modal Add Role-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Brand</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('roles.store') }}" method="POST" class="form-horizontal form-label-right">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Role Name</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" required='true' class="form-control" name="roleName" placeholder="Role Name">
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
            <!-- Modal Add Role-->

            <!-- Modal Edit Role-->
            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('roles.update', 'update') }}" method="post" class="form-horizontal form-label-right">
                            {{ method_field('patch')}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Role Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="hidden" class="form-control" name="roleId" id="rol_id">
                                    <input type="text" class="form-control" name="roleName" id="rol_name">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
            <!-- Modal Edit Role-->

            <!-- Modal Delete Role-->
            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('roles.destroy', 'delete') }}" method="post" class="form-horizontal form-label-right">
                            {{ method_field('delete')}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <p>Are you sure want to delete this data?</p>
                                <input type="hidden" class="form-control" name="roleId" id="rol_id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
            <!-- Modal Delete Role-->

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add New Role</button>
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
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1 ?>
                          @foreach ($roles as $role)
                        <tr>
                          <th scope="row">{{ $no }}</th>
                          <td>{{ $role['name'] }}</td>
                          <td><button class="btn btn-info btn-sm" data-rolesname="{{ $role['name'] }}" data-roleid="{{ $role['id'] }}" data-toggle="modal" data-target="#modalEdit">Edit</button></td>
                          <td><button class="btn btn-danger btn-sm" data-roleid="{{ $role['id'] }}" data-toggle="modal" data-target="#modalDelete">Delete</button></a></td>
                          <?php $no++ ?>
                          @endforeach
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- /page content -->
@endsection

@section('scripts')
<script>
    $('#modalEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var rol_name = button.data('rolesname') // Extract info from data-* attributes
        var rol_id = button.data('roleid')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body #rol_name').val(rol_name)
        modal.find('.modal-body #rol_id').val(rol_id)
    })

    $('#modalDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var rol_id = button.data('roleid') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body #rol').val(rol_id)
    })
</script>

@endsection
