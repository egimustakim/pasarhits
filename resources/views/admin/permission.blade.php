@extends('template.back')

@section('content')
    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Permission <small>table</small></h3>
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

            <!-- Modal Add Permisson-->
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
                            <form method="POST" action="{{ route('permissions.store') }}">
                                @csrf
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Permission Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="permissionName" id="per_name">
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
            <!-- Modal Add Permisson-->

            <!-- Modal Edit Permisson-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="">
                                @csrf

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
            <!-- Modal Edit Permisson-->

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add New Permisson</button>
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
                          <th>Permission</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1 ?>
                          @foreach ($permissions as $result)
                        <tr>
                          <th scope="row">{{ $no }}</th>
                          <td>{{ $result['name'] }}</td>
                          <td><button class="btn btn-info btn-sm" data-matname="" data-matid="" data-toggle="modal" data-target="#modalEdit">Edit</button></td>
                          <td><button class="btn btn-danger btn-sm" data-matid="" data-toggle="modal" data-target="#modalDelete">Delete</button></a></td>
                          <?php $no++ ?>
                          @endforeach
                        </tr>
                      </tbody>
                    </table>
                    {{ $permissions->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- /page content -->
@endsection
