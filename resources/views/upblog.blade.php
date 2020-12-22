@extends('adminlte::page')

@section('title', 'Admin | Upload')

@section('content_header')
    <h1>Upload Blogs</h1>
@stop

@section('content')
  <div class="m-3 text-right">
      <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Option
        </button>
        <div class="dropdown-menu">
          <div class="form-check m-2">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
             Tampilkan Kolom Komentar
            </label>
          </div>
          <div class="form-check m-2">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
             Default checkbox
            </label>
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Preview</a>
        </div>
      </div>
      <button class="btn btn-primary"><a class="text-white" href="/users/export">Save</a></button>
      <button class="btn btn-success"><a class="text-white" href="/users/export">Publish</a></button>
  </div>

<body class="hold-transition sidebar-mini">
  <section class="content">
    <div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-body pad">
            <div class="mb-3 row">
              <div class="col-md-6">
                <input type="text" name="title" class="form-control mb-3" placeholder="Title">
              </div>
              <div class="col-md-6">
                <input type="text" name="meta" class="form-control mb-3" placeholder="Deskripsi Penelusuran">
              </div>
              <div class="col-md-12">
                <textarea class="textarea" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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
        <input type="text" class="form-control mb-3" name="subyek" placeholder="Subyek">
        <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <p class="text-sm mb-0">
                Editor <a href="https://github.com/summernote/summernote">Documentation and license
                information.</a>
              </p>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Send</button>
      </div>
    </div>
  </div>
</div>

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
  <link rel="stylesheet" href="{{ url('vendor/summernote/summernote-bs4.css') }}">
@stop

@section('js')

    <!-- DataTables -->
    <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('vendor/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('vendor/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('vendor/summernote/summernote-bs4.min.js') }}"></script>
    
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
    $(function () {
      $('.textarea').summernote()
    })
  });
    </script>
@stop