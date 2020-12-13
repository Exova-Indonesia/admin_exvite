@extends('adminlte::page')

@section('title', 'Admin | Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
  @include('adminlte::widgets')
  @include('adminlte::data')
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    
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
});
    </script>
@stop