<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta Data -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Balans - Admin</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Place favicon.ico in the root directory -->
  <link rel="icon" href="<?= base_url() ?>asset/main_asset/gam/logo.png" type="image/x-icon">
  <link rel="shortcut icon" href="<?= base_url() ?>asset/main_asset/gam/logo.png" type="image/x-icon">
  <meta name="description" content="Deskripsi singkat tentang situs Anda.">
  <meta name="keywords" content="Kata kunci terkait situs Anda">
  <meta name="author" content="Nama Anda atau nama perusahaan Anda">
  <!-- Metadata Open Graph untuk platform sosial -->
  <meta property="og:title" content="Balans - Aplikasi Akuntansi">
  <meta property="og:description" content="Balans - Aplikasi Akuntansi">
  <meta property="og:image" content="<?= base_url() ?>asset/main_asset/gam/logo.png">
  <meta property="og:url" content="<?= base_url() ?>">
  <meta property="og:type" content="website">
  <!-- Metadata Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Balans - Aplikasi Akuntansi">
  <meta name="twitter:description" content="Balans - Aplikasi Akuntansi">
  <meta name="twitter:image" content="<?= base_url() ?>asset/main_asset/gam/logo.png">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/admin_asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/admin_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/admin_asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>asset/admin_asset/dist/css/adminlte.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/admin_asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/admin_asset/plugins/summernote/summernote-bs4.min.css">

  <!-- Link CSS Admin sendiri -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/main_asset/css/admin.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/main_asset/css/style.css">




  <style type="text/css">
    table td, table th{
      text-align: center;
    }
  </style>

  <!-- Sweetalert -->
  <!-- <script type="text/javascript" src="<?= base_url() ?>asset/main_asset/js/sweetalert2.js"></script>  sudah di load di template modal_aplikasi.php-->

</head>
<body class="hold-transition sidebar-mini layout-fixed">


  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?=base_url()?>asset/admin_asset/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!--         <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

