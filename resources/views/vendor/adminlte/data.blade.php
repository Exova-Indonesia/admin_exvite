
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Last Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Orders</th>
                    <th>Date</th>
                    <th>Payment</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $o)
                  <tr>
                    <td>{{ $o->order_name }}</td>
                    <td>{{ $o->order_type }}</td>
                    <td>{{ $o->created_at }}</td>
                    <td>{{ $o->payment_type }}</td>
                    <td>{{ $o->order_price }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Orders</th>
                    <th>Date</th>
                    <th>Payment</th>
                    <th>Price</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>