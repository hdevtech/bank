 <?php
    $langg = $_SESSION['lang'];
    //$lang = $_SESSION['exp']; 
    $menutop = array(
      "1" => array(
        "name" => hdev_lang::on("menu","home"),
        "trees" => "1",
        "icon" => "fa fa-home",
        "link" => "r...home"
      ),
      "2" => array(
        "name" => hdev_lang::on("menu","contact"),
        "trees" => "1",
        "icon" => "fas fa-phone fa-3x",
        "link" => "r...contact"
      ),
      "3" => array(
        "name" => "All Providers",
        "trees" => "1",
        "icon" => "fas fa-users",
        "link" => "view...provider"
      ),
    );

  ?> 
<?php
    $menumask = array("hm","sld", "prof","client","loan_officer","statement","cashier","withdraw","loan","service","post");
    $menumain = array(
      "hm" => array(
        "name" => hdev_lang::on("menu","home"), 
        "trees" => "1",
        "icon" => "fas fa-home",
        "link" => "r...home",
        "power" => ""
      ),
       "sld" => array(
        "name" => "Slides info", 
        "trees" => "1",
        "icon" => "fas fa-cubes",
        "link" => "modify...slide",
        "power" => ""
      ),
      "prof" => array(
        "name" => hdev_lang::on("menu","profile")."^^".hdev_lang::on("menu","my_profile"),
        "trees" => "2",
        "icon" => " fa fa-user-cog  ^^  fas fa-user",
        "link" => "# ^^  r...profile",
        "power" => "no"
      ),
      "client" => array(
        "name" => "Clients"."^^"."Clients info"."^^"."Deleted clients"."^^"."Clients waiting for approval", 
        "trees" => "2",
        "icon" => "fa fa-user-tie ^^ fa fa-user-tie ^^ fa fa-trash ^^ fa fa-tasks",
        "link" => "# ^^ r...reg_client ^^ deleted...client ^^ approve...client",
        "power"=> ""
      ),
      "cashier" => array(
        "name" => "Cashiers"."^^"."Cashiers info"."^^"."Deleted Cashiers"."^^"."Cashiers waiting for approval", 
        "trees" => "2",
        "icon" => "fa fa-user-tie ^^ fa fa-user-tie ^^ fa fa-trash ^^ fa fa-tasks",
        "link" => "# ^^ r...reg_cashier ^^ deleted...cashier ^^ approve...cashier",
        "power"=> ""
      ),  
      "loan_officer" => array(
        "name" => "Loan Officers"."^^"."Loan Officers info"."^^"."Deleted Loan Officer"."^^"."Loan Officers waiting for approval", 
        "trees" => "2",
        "icon" => "fa fa-user-tie ^^ fa fa-user-tie ^^ fa fa-trash ^^ fa fa-tasks",
        "link" => "# ^^ r...reg_loan_officer ^^ deleted...loan_officer ^^ approve...loan_officer",
        "power"=> ""
      ),  
      "statement" => array(
        "name" => "bank Statement Requests"."^^"."pending requests"."^^"."Approved Requests"."^^"."Rejected Requests", 
        "trees" => "2",
        "icon" => "fa fa-tasks ^^ fa fa-exclamation-circle ^^ fa fa-check-circle ^^ fa fa-times-circle",
        "link" => "# ^^ reg...statement ^^ approve...statement ^^ reject...statement",
        "power"=> ""
      ),               
      "withdraw" => array(
        "name" => "Withdraw Requests"."^^"."pending requests"."^^"."Approved Requests"."^^"."Rejected Requests", 
        "trees" => "2",
        "icon" => "fa fa-tasks ^^ fa fa-exclamation-circle ^^ fa fa-check-circle ^^ fa fa-times-circle",
        "link" => "# ^^ reg...withdraw ^^ approve...withdraw ^^ reject...withdraw",
        "power"=> ""
      ),  
      "loan" => array(
        "name" => "Loan Requests"."^^"."pending requests"."^^"."Approved Requests"."^^"."Rejected Requests", 
        "trees" => "2",
        "icon" => "fa fa-tasks ^^ fa fa-exclamation-circle ^^ fa fa-check-circle ^^ fa fa-times-circle",
        "link" => "# ^^ reg...loan ^^ approve...loan ^^ reject...loan",
        "power"=> ""
      ),          
      "service" => array(
        "name" => "Services"."^^"."Certificates info"."^^"."Deleted certificates",
        "trees" => "2",
        "icon" => "fa fa-tasks ^^ fa fa-tasks ^^ fa fa-trash",
        "link" => "# ^^ r...reg_service ^^ deleted...service",
        "power"=> ""
      ),
      "post" => array(
        "name" => "Certificates applications"."^^"."Issued Certificates"."^^"."Applied certificates"."^^"."Rejected certificates", 
        "trees" => "2",
        "icon" => "fa fa-cubes ^^ fa fa-check-circle ^^ fa fa-tasks ^^ fa fa-times-circle",
        "link" => "# ^^ all...transaction ^^ approve...transaction ^^ reject...transaction",
        "power"=> ""
      ),    
    );

  ?>
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark text-sm">
    <div class="container">
      <a href="<?php echo hdev_url::menu(""); ?>" class="navbar-brand" align="center">
        <img src="<?php echo hdev_url::img(hdev_url::menu('dist/img/rasms.png'));?>" alt="<?php echo APP_NAME; ?> Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8;height: auto;width: 2.1rem;">
        <span class="font-weight-light text-md"><?php echo "<b>".APP_NAME."</b>"; ?></span>
      </a>
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
              <?php
                if (hdev_log::loged()) {
              ?>
                <a class="nav-link ind" rel="external" onclick="logout('<?php echo hdev_url::menu('r/home'); ?>?logout=ok')" href="#" ext_link="ok">
                  <i class="fas fa-power-off" title="logout"></i>&nbsp;
              <?php
                  echo hdev_lang::on("menu","logout")."<b>&nbsp;(&nbsp;".hdev_data::active_user("username")."&nbsp;)</b>";
                }else{
              ?>
                  <a class="nav-link ind" rel="external" href="<?php echo hdev_url::menu('login'); ?>" ext_link="ok" >
                    <i class="fas fa-power-off" title=""></i>&nbsp;
              <?php
                  echo hdev_lang::on("menu","login");
                }
              ?>
            </a>
        </li> 
      </ul>
      </div>
  </nav>
  <!-- Navbar -->
  <nav class="mr_head main-header navbar navbar-expand navbar-dark text-sm top_nav">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
          <?php 
              hdevmenu::topmenu($menutop[1]['trees'],$menutop[1]['name'],$menutop[1]['link'],$menutop[1]['icon']);
          ?>
          <?php 
              hdevmenu::topmenu($menutop[2]['trees'],$menutop[2]['name'],$menutop[2]['link'],$menutop[2]['icon']);
          ?>
          <?php 
              hdevmenu::topmenu($menutop[3]['trees'],$menutop[3]['name'],$menutop[3]['link'],$menutop[3]['icon']);
          ?>           
          <div id="google_translate_element" class="nav-item bg-white"></div>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-sm-inline-block">
        <div class="nav-link" id="menu_loader"></div>
        <!--loader-->
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>      
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- SEARCH FORM -->
        <!--<form class="form-inline ml-0 ml-md-3" method="GET" action="<?php echo hdev_url::menu('search'); ?>">
          <div class="input-group input-group-sm">
            <?php 
              if ($_GET) {
                if (isset($_GET['q']) && !empty($_GET['q'])) {
                  $serch = $_GET['q'];
                }else{
                  $serch = "";
                }
              }else{
                $serch = "";
              } 
            ?>
            <input class="form-control form-control-navbar" type="search" placeholder="Search Text" aria-label="Search Text" name="q" value="<?php echo($serch); ?>">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>-->
      </ul>
    </ul>
  </nav>
  <!-- /.navbar --> 

<?php if (hdev_log::loged()): ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark main-sidebar-custom sidebar-dark-primary elevation-4" id="left_nav">
    <!-- Brand Logo -->
    <div class="brand-link row" style="display: inline-flex;">
      <span style="width: 95%;">
        <a href="index3.html" class="text-light">
          <img src="<?php echo hdev_url::menu('dist/img/rasms.png'); ?>" alt="<?php echo APP_NAME;?>" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><?php echo hdev_data::abbr(constant("APP_NAME")); ?></span>
        </a>
      </span>
      <span class="text-md" align="right" style="width: 5%;">
         <a class="text-light close_nv" data-widget="pushmenu" href="#" role="button"><i class="fas fa-times"></i></a>
      </span>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <span class="fa fa-user-circle fa-2x img-circle elevation-2"></span>
        </div>
        <div class="info text-nowrap">
          <a ext_link="ok" class="d-sm-inline-block"><?php echo hdev_data::active_user("name"); ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php 
            for ($i=0; $i < count($menumask); $i++) { 
              $mmenu = $menumask;
              hdevmenu::mainmenu($menumain[$mmenu[$i]]['trees'],$menumain[$mmenu[$i]]['name'],$menumain[$mmenu[$i]]['link'],$menumain[$mmenu[$i]]['icon'],$menumain[$mmenu[$i]]['power']);
            }
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
      <?php 
        if (hdev_log::loged()) {
      ?>
        <span class="bg-secondary" align="center">
          <i><span href="#" class="hide-on-collapse text-xs">Working as :</span> <?php echo hdev_data::active_user("fid") ?></i>        
        </span>
      <?php
        }else{
      ?>
        <span class="bg-secondary" align="center">
          <i><span href="#" class="hide-on-collapse text-xs">Working as :</span> Guest</i>        
        </span>

      <?php
        }
      ?>
      
    </div>
    <!-- /.sidebar-custom -->
  </aside>
  
<?php endif ?>
  <div id="app_body">
