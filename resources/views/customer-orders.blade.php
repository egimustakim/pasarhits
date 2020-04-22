
@extends('template.front')

@section('content')
    <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Your orders</h1><p class="lead">Your orders in one place.</p>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
              <h5>Julie Machallova</h5>
              <p class="text-muted text-small">Ostrava, Czech republic</p>
            </div>
            <nav class="list-group customer-nav"><a href="customer-orders.html" class="active list-group-item d-flex justify-content-between align-items-center"><span><span class="icon icon-bag"></span>Orders</span><small class="badge badge-pill badge-light">5</small></a><a href="customer-account.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="icon icon-profile"></span>Profile</span></a><a href="customer-addresses.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="icon icon-map"></span>Addresses</span></a><a href="customer-login.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="fa fa-sign-out"></span>Log out</span></a>
            </nav>
          </div>
          <div class="col-lg-8 col-xl-9 pl-lg-3">
            <table class="table table-hover table-responsive-md">
              <thead>
                <tr>
                  <th>Order</th>
                  <th>Date</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th># 1735</th>
                  <td>22/6/2017</td>
                  <td>$150.00</td>
                  <td><span class="badge badge-info">Being prepared</span></td>
                  <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                </tr>
                <tr>
                  <th># 1734</th>
                  <td>7/5/2017</td>
                  <td>$150.00</td>
                  <td><span class="badge badge-warning">Action needed</span></td>
                  <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                </tr>
                <tr>
                  <th># 1730</th>
                  <td>30/9/2016</td>
                  <td>$150.00</td>
                  <td><span class="badge badge-success">Received</span></td>
                  <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                </tr>
                <tr>
                  <th># 1705</th>
                  <td>22/6/2016</td>
                  <td>$150.00</td>
                  <td><span class="badge badge-danger">Cancelled</span></td>
                  <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
@endsection
