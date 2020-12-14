@extends('adminlte::page')

@section('title', 'Admin | Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
  @include('adminlte::widgets')
  <div class="row">
    <div class="col-md-6">
      @include('adminlte::data')
    </div>
      <div class="col-md-6">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Orders Growth</h3>
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
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Custom Request</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
              </div>
            <div class="card-body">
            @if($custom == '')
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Orders</th>
                    <th>Date</th>
                    <th>Payment</th>
                    <th>Price</th>
                    <th width="30">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($custom as $c)
                    <tr>
                      <td>{{ $c->order_name }}</td>
                      <td>{{ $c->order_type }}</td>
                      <td>{{ $c->created_at }}</td>
                      <td>{{ $c->payment_type }}</td>
                      <td>{{ $c->order_price }}</td>
                      <td><button type="button" class="btn btn-success" data-toggle="modal" 
                      data-target="#exampleModal" data-whatever="{{ $c->id }}" data-name="{{ $c->order_name }}">
                        <i class="fa fa-eye"></i>
                      </button></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                <p class="text-center">{{ 'Belum Ada Data' }}</p>
              @endif
          </div>
        </div>
      </div>
  </div>
</div>
@stop

@section('css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vendor/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@stop

@section('js')
    <!-- DataTables -->
    <!-- jQuery -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    
    <!-- page script -->
    <script>
    $(document).ready(function() {
      $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever')
      var name = button.data('name')
      $.ajaxSetup({ headers: { '_token' : '' } });

      $.ajax({
        url:"{{ url('/tampil-modal') }}/"+recipient,
        type:'GET',
        dataType:'html',
        success:function(data){
          $(".modal-body").html(data);
        },
        beforeSend:function() {
          $(".modal-body").html("Sedang Memuat...");
        },
          error:function() {
            $(".modal-body").html("Terjadi Kesalahan...");
        }
      });
      
      var modal = $(this)
      modal.find('.modal-title').text(name)
  })
});
$(function () {

  var areaChartData = {
      labels  : [
        @foreach($chartOrders as $ch)
              {{ $ch->order_price}},
        @endforeach
      ],
      datasets: [
        {
          label               : 'Template Orders',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
            @foreach($chartOrders as $ch)
              {{ $ch->total}},
            @endforeach
          ]
        },
        {
          label               : 'Custom Orders',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
            @foreach($chartOrders as $ch)
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