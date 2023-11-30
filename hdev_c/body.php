<?php if (!isset($_GET) || !isset($_GET['tb']) || $_GET['tb'] != "ok"): ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0"><small><?php echo $_SESSION['act_url'][0]; ?></small></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo hdev_url::menu(""); ?>"><?php echo hdev_lang::on("menu",'home') ?></a></li>
              <li class="breadcrumb-item "><?php echo $_SESSION['act_url'][0]; ?></li>
            </ol>
          </div>
        </div>
        <hr class="">
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" id="main2">
      <div class="container-fluid" id="hdev_app_reference">
        <?php 
          if (!empty($_SESSION['act_url'])) {
            if (!empty($_SESSION['act_url'][0]) && !empty($_SESSION['act_url'][1])) {
              if (file_exists($_SESSION['act_url'][1].".php")) {
                if (hdev_menu_url::url_req($_SESSION['act_url'][0],"user") == "y") {
                  include $_SESSION['act_url'][1].".php";
                }else{
                  //exit("1");
                  include 'error.php';
                }
              }else{
                //exit("2");
                include 'error.php';
              }
            }else{
              /*var_dump($_SESSION);
              exit("3");*/
              include 'error.php';
            }
          }else{
            //exit("4");
            include 'error.php';
          }
        ?>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php else: ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
    <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
      <div class="nav-item dropdown">
        <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Close</a>
        <div class="dropdown-menu mt-0">
          <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Close All</a>
          <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Close All Other</a>
        </div>
      </div>
      <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
      <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
      <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
      <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
    </div>
    <div class="tab-content">
      <div class="tab-empty">
        <h2 class="display-4">No tab selected!</h2>
      </div>
      <div class="tab-loading">
        <div>
          <b>Loading</b>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
<?php endif ?>