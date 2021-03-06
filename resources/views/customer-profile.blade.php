@extends('template.front')

@section('content')
    <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Your profile</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Your profile</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="padding-small">
      <div class="container">
        <div class="row">
          <!-- Customer Sidebar-->
          <div class="customer-sidebar col-xl-3 col-lg-4 mb-md-5">
            <div class="customer-profile"><a href="#" class="d-inline-block"><img src="https://d32d8xzgnjxuvk.cloudfront.net/hub/1-2/img/person-3.jpg" class="img-fluid rounded-circle customer-image"></a>
              <h5>{{ Auth::guard('customer')->user()->name }}</h5>
              <p class="text-muted text-small">Ostrava, Czech republic</p>
            </div>
            <nav class="list-group customer-nav">
                <a href="customer-orders.html" class="list-group-item d-flex justify-content-between align-items-center">
                    <span><span class="icon icon-bag"></span>Orders</span>
                    <small class="badge badge-pill badge-primary">5</small>
                </a>
                <a href="customer-account.html" class="active list-group-item d-flex justify-content-between align-items-center">
                    <span><span class="icon icon-profile"></span>Profile</span>
                </a>
                <a href="customer-addresses.html" class="list-group-item d-flex justify-content-between align-items-center">
                    <span><span class="icon icon-map"></span>Addresses</span>
                </a>
                <a href="logout" class="list-group-item d-flex justify-content-between align-items-center">
                    <span><span class="fa fa-sign-out"></span>Logout</span>
                </a>
            </nav>
          </div>
          <div class="col-lg-8 col-xl-9 pl-lg-3">
            <div class="block-header mb-5">
              <h5>Change password  </h5>
            </div>
            <form class="content-block">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password_old" class="form-label">Old password</label>
                    <input id="password_old" type="password" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password_1" class="form-label">New password</label>
                    <input id="password_1" type="password" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password_2" class="form-label">Retype new password</label>
                    <input id="password_2" type="password" class="form-control">
                  </div>
                </div>
              </div>
              <!-- /.row-->
              <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Change password</button>
              </div>
            </form>
            <div class="block-header mb-5">
              <h5>Personal details</h5>
            </div>
            <form class="content-block">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input id="firstname" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input id="lastname" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="company" class="form-label">Company</label>
                    <input id="company" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="street" class="form-label">Street</label>
                    <input id="street" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="city" class="form-label">Company</label>
                    <input id="city" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="zip" class="form-label">ZIP</label>
                    <input id="zip" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="state" class="form-label">State</label>
                    <select id="state" class="form-control"></select>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="country" class="form-label">Country</label>
                    <select id="country" class="form-control"></select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="phone" class="form-label">Telephone</label>
                    <input id="phone" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection
