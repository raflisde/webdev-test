<!DOCTYPE html>
<html lang="en">
@include('components.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('components.navbar');
@include('components.sidebar');


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('components.footer')
