<?php 
  $load_reg_shop = 1;
 ?>
<style type="text/css">
  
    .carousel-item {
    height: 70% !important;
    border-radius: 20px;
    }
    main{
      padding-right: 10px;
      padding-left: 10px;
    }
    #myCarousel div,#mn_cnt{
      border-radius: 10px;
    }
    .carousel-item img{
      width: 100%!important;
      height: auto!important;
    }   
</style>
<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">All certificate are found here</h5>
              </div>
              <div class="card-body table-responsive p-2">
                <div class="card-group mb-30">
                  <?php 
                    if ($_GET) {
                      if (isset($_GET['q']) && !empty($_GET['q'])) {
                        $serch = $_GET['q'];
                        $var = hdev_data::service_data('',['search']);
                      }else{
                        $serch = "";
                        $var = hdev_data::service_data();
                      }
                    }else{
                      $serch = "";
                      $var = hdev_data::service_data();
                    } 
                    $counter = 0;
                    $counter_group = 1;
                    $maxer = (is_array($var)) ? count($var) : 0 ;
                    $maxer_rec = ($maxer%3);
                    $countt = 1;
                    foreach ($var as $service_data) {
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $build2 = "ref:transaction_reg;id:".$service_data['s_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject = hdev_data::encd("mod_close:#ld_del_close;app:".$tkn.";".$build2);


                      $countt++;
                      $counter++;

                   ?>
                    <div class="border-secondary border-top border-right border-left border-bottom card">
                      
                          <div class="ribbon-wrapper">
                            <div class="ribbon bg-gradient-success" style="font-size: 10px;">
                              Service
                            </div>
                          </div> 
                          <div class="card-body">
                            <i style="text-align: center;" class="card-text">
                              <h5 class="" style="text-align: center;">
                                <?php echo $service_data['s_name'] ?>
                              </h5>
                            </i>
                            <p class="card-text btn btn-block btn-outline-secondary btn-flat text-light" align="center">
                              <?php echo $service_data['s_desc']; ?>
                            </p>
                              <div align="btn-group btn-block"> 
                                
                            <div class="card-footer" align="center">
                              <?php 
                                if (hdev_log::fid() == "citizen") {
                                  $data = hdev_data::citizen(hdev_log::uid(),['data']);
                              ?>
                              <button class="btn btn-secondary transaction_reg" hash="<?php echo $tkn; ?>" data="<?php echo $reject; ?>" type="button" data-toggle="modal" data-target=".modal-reg" s_name="<?php echo $service_data['s_name'] ?>" s_desc="<?php echo $service_data['s_desc'] ?>" c_name="<?php echo $data['c_name'] ?>"><i class="fa fa-cubes"></i> Apply for this certificate</button>
                              <?php 
                                 // code...
                                }
                               ?>
                            </div>                  
                              </div> 
                          </div> 
                        </div>
                <?php
                    if (($counter%3) == 0) {
                      echo '</div><div class="card-group mb-30">';
                      $counter_group++;
                    }
                  }
                 ?>
                <?php 
                  if ($counter == $maxer) {
                    //echo $maxer_rec;
                    if ($maxer_rec == 1) {
                      echo '<div class="card card-box"></div>';
                      echo '<div class="card card-box"></div>';
                    }elseif ($maxer_rec == 2) {
                      echo '<div class="card card-box"></div>';
                    }
                  }
                 ?>
                </div>
                <hr>
              </div>
            </div>
          </div>
          <!-- /.col -->
      </div>
</div>

<?php if (hdev_data::service('transaction_reg')): ?> 
<div class="modal fade modal-reg" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Certificate application</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Funga">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">
              <?php 
                  $csrf = new CSRF_Protect();
                  $csrf->echoInputField();
                ?>
              <table class="table border-bottom">
                <tr>
                  <th colspan="2">Submit your certificate application</th>
                </tr>
                <tr>
                  <td>Citizen names : </td>
                  <td id="c_name"></td>
                </tr>
                <tr>
                  <td>Certificate : </td>
                  <td id="s_name"></td>
                </tr>
                <tr>
                  <td>certificate description : </td>
                  <td id="s_desc"></td>
                </tr>
              </table>
            <div class="wait" align="center"></div>
          </div>
          <!-- /.form-box --> 
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="ld_del_close">Close</button>
        <button type="button" class="btn btn-success" id="transaction_reg" data="" hash=""><i class="fas fa-check-circle"></i> Submit application</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>
<?php endif ?>