<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo site_name ." - ". $title ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <?php
  if ($this->uri->segment('1') == 'addpegawai'){ ?>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/jquery-ui-1.12.1/jquery-ui.css'); ?>" />
  <?php }?>
  
  <style type="text/css">
    .jumbotron hr {
      border-color: blue;
      width : 70vw;
      border-width: 0.5vw;
      position: relative;
    }

  </style>

  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/datepicker/css/bootstrap-datepicker3.css');?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kreon:500&display=swap" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- SIDEBAR -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- NAVBAR -->
        <nav class="navbar navbar-light shadow fixed-top" style="background-color: rgba(110, 102, 112, 0.8);">
          <a class="navbar-brand" href="<?= site_url(''); ?>" style="padding-left: 4.5vw;">
            <span class="text-center text-white" style="font-size: 30px; font-family: 'Kreon', serif;">HOME</span>
          </a>
        </nav>
