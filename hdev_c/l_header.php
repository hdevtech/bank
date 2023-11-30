<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo APP_NAME; ?> --- AUTH</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo hdev_url::menu('dist/css/adminlte.min.css');?>">
  <link rel="stylesheet" href="<?php echo hdev_url::menu('dist/css/main.css');?>">
  <link rel="stylesheet" href="<?php echo hdev_url::menu('dist/css/lgn.css');?>">
  <link rel="stylesheet" href="<?php echo hdev_url::menu('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');?>">
   <link rel="ICON" type="ICON/ico" href="<?php echo hdev_url::menu('dist/img/rasms.png');?>">
  <!-- Google Font: Source Sans Pro -->
  <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
</head>
<body  style="width: 100%; background : url('<?php echo hdev_url::menu('dist/img/bg.png');?>'); background-size:cover;">
  <style type="text/css">
    #status{
      background-image:url(<?php echo hdev_url::menu('dist/img/loading2.gif');?>); /* path to your loading animation */
    }
  </style>
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <i class="animation__wobble mb-0"><?php echo hdev_lang::on("form","load"); ?></i><br>
    <div class="cssload-loader">
      <img class="animation__wobble" src="<?php echo hdev_url::menu('dist/img/rasms.png'); ?>" alt="HCMS" height="60" width="60">
    </div>
    
  </div>
<div>
<div>