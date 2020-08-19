@extends('template.back')

@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Permission List</h3>
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

            <!-- error message-->
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div>
            <!-- end .flash-message -->

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Permission list <small>check permissions that will be assigned to the role.</small></h2>
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
                    <form class="" action="{{ route('permissionassign') }}" method="POST">
                        @csrf
                        <div class="form-group page-header">
                            <label class=""><h4>Role : </h4></label>
                            @foreach ($roles as $role)
                           <label><h4> {{ $role['name'] }} <h4></label>
                            <input type="hidden" name="roleid" id="roleid" value="{{ $role['id'] }}">
                            @endforeach
                        </div>

                        <section id="web-application">
                            <div class="row fontawesome-icon-list">
                                @foreach ($roles as $result)
                                    <?php
                                    $percount = $result['permissions']->count();
                                    for ($no = 0; $percount > $no; $no++){
                                    ?>
                                    <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                                        <div class="checkbox">
                                            <label>
                                            <input name="permissions[]" type="checkbox" value="{{ $result['permissions'][$no]['id'] }}"> {{ $result['permissions'][$no]['name'] }}
                                            </label>
                                        </div>
                                    </div>
                                     <?php } ?>
                                @endforeach
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <button type="submit" class="btn btn-primary">Assign Permission</a>
                                    <a href="{{ url('rlaadmin/roles') }}"><button type="button" class="btn btn-info">Cancel</button></a>
                                </div>
                            </div>
                        </section>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection
