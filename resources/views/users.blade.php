@extends('adminlte::page')

@section('title', 'Admin | Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
  <div class="m-3">
    <p class="text-right">
        <button class="btn btn-success"><a class="text-white" href="/users/export">Export Data</a></button>
    </p>
  </div>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Join Date</th>
                    <th width="200">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $o)
                  <tr>
                    <td>{{ $o->name }}</td>
                    <td>{{ $o->email }}</td>
                    <td>{{ $o->phone }}</td>
                    <td>{{ date('F j, Y', strtotime($o->created_at)) }}</td>
                    <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" 
                    data-email="{{ $o->email }}" data-name="{{ $o->name }}">
                      {{ 'Suspend' }}
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#shoutOut" 
                    data-email="{{ $o->email }}" data-name="{{ $o->name }}">
                      {{ 'Shout Out' }}
                    </button>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Join Date</th>
                    <th width="200">Action</th>
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

<!-- Modal Suspend -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="Suspend" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="POST" action="{{ url('/suspend') }}">
    @csrf
      <input type="hidden" class="form-control mb-3" id="emails" name="email">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Caution Suspend Verification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Suspend</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Shout Out -->
<div class="modal fade bd-example-modal-lg" id="shoutOut" tabindex="-1" role="dialog" aria-labelledby="shoutOut" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shoutOutTitle">Shout out </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ url('/shoutout') }}">
      @csrf
        <input type="hidden" class="form-control mb-3" id="email" name="email">
        <input type="text" class="form-control mb-3" name="subyek" placeholder="Subyek">
        <textarea type="text" class="form-control" name="pesan" placeholder="Write a text here"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Send</button>
      </div>
      </form>
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
  <link rel="stylesheet" href="vendor/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="{{ url('vendor/toastr/toastr.min.css') }}">
@stop

@section('js')

    <!-- DataTables -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="vendor/summernote/summernote-bs4.min.js"></script>
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
    $('#shoutOut').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('email')
      var name = button.data('name')
      var modal = $(this)
      modal.find('#shoutOutTitle').text("Shout out "+name)
      $('#email').val(recipient);
    });

    $('#exampleModalCenter').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('email')
      var name = button.data('name')
      var modal = $(this)
      modal.find('.modal-body').text("Are You Sure Suspend "+name+"?")
      $('#email').val(recipient);
      $('#emails').val(recipient);
    });

    $(function () {
      $('.textarea').summernote()
    })
    @if(session('status'))
    toastr.success("{{ session('status') }}");
    @endif
  });
    </script>
@stop