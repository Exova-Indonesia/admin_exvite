@extends('adminlte::page')

@section('title', 'Admin | Import Data')

@section('content_header')
    <h1>Import Data</h1>
@stop

@section('content')
  <div class="m-3">
    <p class="text-right">
        <form method="POST" action="{{ url('/import/data') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">
            <button type="submit" class="btn btn-success">Import Data</button>
        </form>
    </p>
  </div>
  <div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title">Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $o)
                  <tr>
                    <td>{{ $o->name }}</td>
                    <td>{{ $o->email }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
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
  <link rel="stylesheet" href="{{ url('vendor/toastr/toastr.min.css') }}">
@stop

@section('js')

    <!-- DataTables -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('vendor/toastr/toastr.min.js') }}"></script>
    
    <!-- page script -->
    <script>
    $(document).ready(function() {
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
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

    @if(session('status'))
        toastr.success("{{ session('status') }}");
    @endif
});
    </script>
@stop