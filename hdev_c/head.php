<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_NAME; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
  
   <link rel="ICON" type="ICON/ico" href="<?php echo hdev_url::menu('dist/img/rasms.png');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/datatables-bs4/css/dataTables.bootstrap4.css');?>">
  <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');?>">

    <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css');?>">

    <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/summernote/summernote-bs4.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo hdev_url::menu('dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/summernote/summernote-bs4.css'); ?>">
  <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/Smoothproducts/css/smoothproducts.css');?>">
    <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/bs-stepper/css/bs-stepper.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo hdev_url::menu('dist/css/main.css?i='.md5(rand())); ?>">
</head>
<?php 
  if (hdev_log::loged()) {
?>
    <body class="hold-transition sidebar-mini layout-fixed ">
<?php
  }else{
?>
    <body class="hold-transition layout-top-nav layout-fixed ">
<?php
  }
 ?><!--layout-navbar-fixed layout-footer-fixed-->
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <i class="animation__wobble mb-0"><?php echo hdev_lang::on("form","load"); ?></i><br>
    <div class="cssload-loader">
      <img class="animation__wobble" src="<?php echo hdev_url::menu('dist/img/rasms.png'); ?>" alt="HCMS" height="60" width="60">
    </div>
    
  </div>
 
<!-- Site wrapper -->
<div class="wrapper" id="all_system_dta">
    <style>
        .ck-editor{
         color: #000 !important;   
        }
    </style>