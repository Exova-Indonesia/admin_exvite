@extends('adminlte::page')

@section('title', 'Admin | Revenue')

@section('content_header')
    <h1>Revenue</h1>
<div class="row">
<div class="col-md-7">
    <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Payment</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
              </div>
              <div class="card-body">
              <div class="chart">
                <canvas class="chartjs-render-monitor" id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
    </div>
</div>
        <!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>IDR {{ number_format($bank, 2) }}</h3>

                <p>Bank Transfer</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>IDR {{ number_format($gopay, 2) }}</h3>

                <p>Go-pay</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $tpay }}</h3>

                <p>Total Payments</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>IDR {{ number_format($trev, 2) }}</h3>

                <p>Total Revenue</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      <div>
        <a class="btn btn-success text-white float-right" href="/revenue/export">Export Revenue</a>
      </div>
</div>
<div class="col-md-5">
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Last Payment</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Payment</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $o)
                  <tr>
                    <td>{{ $o->order_name }}</td>
                    <td>{{ $o->created_at }}</td>
                    <td>{{ $o->payment_type }}</td>
                    <td>IDR {{ number_format($o->order_price, 2) }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Payment</th>
                    <th>Total</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</div>
@stop

@section('content')

@stop

@section('css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('vendor/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('vendor/adminlte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@stop

@section('js')

    <!-- DataTables -->
    <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('vendor/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('vendor/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('vendor/chart.js/Chart.min.js') }}"></script>
    
    <!-- page script -->
    <script>
    $(document).ready(function() {
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
    $('#shoutOut').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever')
      var name = button.data('name')
      var modal = $(this)
      modal.find('#shoutOutTitle').text("Shout out "+name)
    });
  });
  $(function () {

    var areaChartData = {
        labels  : [
            'January', 'February', 'March', 'April', 'May', 'June', 'July'
        ],
        datasets: [
        {
            label               : 'Bank Transfer',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [
            @foreach($orders as $ch)
                {{ $ch->total}},
            @endforeach
            ]
        },
        {
            label               : 'Go-Pay',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [
            @foreach($orders as $ch)
                {{ $ch->total}},
            @endforeach
            ]
        },
        ]
    }

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
        type: 'bar', 
        data: barChartData,
        options: barChartOptions
    })
    })
    </script>
@stop