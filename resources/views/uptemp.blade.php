@extends('adminlte::page')

@section('title', 'Admin | Upload Templates')

@section('content_header')
    <h1>Upload Templates</h1>
@stop

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <form method="POST" class="upload-data">
        <input type="hidden" name="templates_id" value="{{ $data->templates_id }}">
        <div class="col-md-12 mb-3 text-right">
            <a class="btn btn-danger" href="/templates-list">Cancel</a>
            <button type="submit" class="btn btn-success">Save & Publish</button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Templates Name</label>
                <input type="text" id="inputName" class="form-control" name="templates_name" value="{{ $data->templates_name }}">
              </div>
              <div class="form-group">
                <label for="inputDescription">Template Description</label>
                <textarea id="inputDescription" class="form-control" name="templates_description" rows="4">{{ $data->templates_description }}</textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select class="form-control custom-select" name="templates_status">
                  <option selected disabled>Select one</option>
                  <option value="Published">Publish & Save</option>
                  <option value="Only Save">Only Save</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Template Author</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="templates_author" value="{{ $data->templates_author }}">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Normal Price</label>
                <input type="text" min="0" id="inputEstimatedBudget" name="templates_price" class="form-control" value="{{ $data->templates_price }}">
              </div>
              </form>
              <form class="upload-thumbnail" action="{{ route('upload.thumbnail') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="templates_id" value="{{ $data->templates_id }}">
              <div class="form-group justify-content-center">
                <p><label>Upload Thumbnail</label></p>
                @if($data->templates_thumbnail == '')
                <label id="uploads-thumbnail" class="border text-center p-3 font-weight-normal w-100">
                  <span>Drag &amp; Drop files here or click to browse</span>
                  <input class="d-none" id="thumbnail_form" type="file" name="templates_thumbnail">
                </label>
                @else
                <p><i class="fa fa-check"></i> {{ $data->templates_thumbnail }} <a class="text-danger" href="/delete/{{ $data->templates_id }}/thumbnail">[Delete]</a></p>
                @endif
                <div id="progress-t"></div>
                <p id="ifsuccess-t"></p>
              </div>
              </form>

              <form class="upload-template" action="{{ route('upload.files') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="templates_id" value="{{ $data->templates_id }}">
              <div class="form-group justify-content-center">
                <p><label>Upload Templates</label></p>
                @if($data->templates_files == '')
                <label id="uploads-template" class="border text-center p-3 font-weight-normal w-100">
                  <span>Drag &amp; Drop files here or click to browse</span>
                  <input class="d-none" id="templates_form" type="file" name="templates_files">
                </label>
                @else
                <p><i class="fa fa-check"></i> {{ $data->templates_files }} <a class="text-danger" href="/delete/{{ $data->templates_id }}/files">[Delete]</a></p>
                @endif
                <div id="progress"></div>
                <p id="ifsuccess"></p>
              </div>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop

@section('css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('vendor/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('vendor/adminlte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url('vendor/adminlte/dist/css/adminlte.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="{{ url('image-uploader/dist/image-uploader.min.css') }}">
  <link rel="stylesheet" href="{{ url('vendor/toastr/toastr.min.css') }}">
@stop

@section('js')

    <!-- DataTables -->
    <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('vendor/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('vendor/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('image-uploader/dist/image-uploader.min.js') }}"></script>
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
      var recipient = button.data('whatever')
      var name = button.data('name')
      var modal = $(this)
      modal.find('#shoutOutTitle').text("Shout out "+name)
    });
    $('.input-thumbnail').imageUploader();

    $(".upload-template").change(function(e) {
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
          url:"{{ route('upload.files') }}",
          type:'POST',
          data: new FormData(this),
          cache: false,
          processData: false,
          contentType: false,
          enctype: 'multipart/form-data',
          dataType:'json',
          xhr: function()
          {
          var xhr = $.ajaxSettings.xhr();
          xhr.upload.addEventListener("progress", function(evt){
            if (evt.lengthComputable) {
              var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
                $('#progress').html('<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div></div>');
                $('.progress-bar').css("width", percentComplete+"%");
                $('.progress-bar').html(percentComplete+'%');
            }
          }, true);
          return xhr;
        },
          success:function(data){
            toastr.success(data.status);
            $('#uploads-template').css("display", "none");
            $('.progress-bar').html('Success');
            $('#ifsuccess').html('<i class="fa fa-check"></i>'+data.files+'<a class="text-danger" href="/delete/{{ $data->templates_id }}/files">[Delete]</a>');
          },
            error:function(response) {
              $('#progress').css("display", "none");
              var json = JSON.parse(response.responseText);
              toastr.error(json.templates_files);
              //console.log(response.responseText);
          }
      });
    });

    $(".upload-thumbnail").change(function(e) {
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
          url:"{{ route('upload.thumbnail') }}",
          type:'POST',
          data: new FormData(this),
          cache: false,
          processData: false,
          contentType: false,
          enctype: 'multipart/form-data',
          dataType:'json',
          xhr: function()
          {
          var xhr = $.ajaxSettings.xhr();
          xhr.upload.addEventListener("progress", function(evt){
            if (evt.lengthComputable) {
              var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
                $('#progress-t').html('<div class="progress"><div class="progress-bar p-t progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div></div>');
                $('.p-t').css("width", percentComplete+"%");
                $('.p-t').html(percentComplete+'%');
            }
          }, true);
          return xhr;
        },
          success:function(data){
            toastr.success(data.status);
            $('#uploads-thumbnail').css("display", "none");
            $('.p-t').html('Success');
            $('#ifsuccess-t').html('<i class="fa fa-check"></i>'+data.files+'<a class="text-danger" href="/delete/{{ $data->templates_id }}/thumbnail">[Delete]</a>');
          },
            error:function(response) {
              $('#progress-t').css("display", "none");
              var json = JSON.parse(response.responseText);
              toastr.error(json.templates_thumbnail);
              //console.log(response.responseText);
          }
      });
    });

    $(".upload-data").on('submit', function(e) {
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
          url:"{{ route('upload.data') }}",
          type:'POST',
          data: new FormData(this),
          cache: false,
          processData: false,
          contentType: false,
          enctype: 'multipart/form-data',
          dataType:'json',
          success:function(data){
            toastr.success(data.status);
            setInterval(function(){ window.location='{{ url('/templates-list') }}' }, 1000);
          },
            error:function(response) {
              var json = JSON.parse(response.responseText);
              toastr.error(json.status);
          }
      });
    });
  });

    var rupiah = document.getElementById('inputEstimatedBudget');
      rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'IDR ');
      });
   
      /* Fungsi formatRupiah */
      function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
   
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
   
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'IDR ' + rupiah : '');
      }
      $(document).ready(function() {
        @if(session('status'))
        toastr.success('{{ session('status') }}')
        @endif
      });
    </script>
@stop