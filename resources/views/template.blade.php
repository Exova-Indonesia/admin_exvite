@extends('adminlte::page')

@section('title', 'Admin | Templates')

@section('content_header')
    <h1>Upload Templates</h1>
@stop

@section('content')

<div class="container">
  @foreach($data as $d)
    <div class="border mb-1">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand p-0" href="/storage/templates/{{ $d->templates_id }}/index.php">
            <img class="border object-fit-cover" width="80" height="60" 
            src="{{ url('storage/thumbnails/'.$d->templates_id.'/'.$d->templates_thumbnail) }}" alt="Templates Thumbnail">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a href="/storage/templates/{{ $d->templates_id }}/index.php">
                <h5 class="nav-link p-1 m-0 active" >{{ $d->templates_name }}<span class="sr-only">(current)</span></h5>
                <span class="nav-link p-1">{{ $d->templates_description }}</span>
              </a>
            </li>
            </ul>
            <div class="my-2 my-lg-0 col-md-5 h6 text-right nav-link text-muted">
                <a class="mr-3">0 <i class="fa fa-cart-arrow-down"></i></a>
                <a class="mr-3">0 <i class="fa fa-envelope"></i></a>
                <a class="mr-3">0 <i class="fa fa-eye"></i></a>
                <a class="mr-3" href="upload/template/update/{{ $d->templates_id }}"><i class="fa fa-edit"></i></a>
            </div>
            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item text-right">
                    <a class="nav-link p-1 m-0 active"> 
                        {{ $d->templates_author }}
                      <img width="24" height="24" class="rounded-circle align-top" src="https://assets.exova.id/img/user/DSC00426.jpg" alt="avatar">
                    </a>
                    <span class="nav-link p-1" href="#">{{ $d->templates_status }} On <?php echo date('M j, Y H:i a', strtotime($d->updated_at)) ?></span>
                </li>
                </ul>
            </div>
        </div>
      </nav>
  </div>
  @endforeach
</div>

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