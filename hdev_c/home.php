

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
              <div class="card-header">Welcome to <?php echo APP_NAME; ?></h5>
              </div>
              <div class="card-body table-responsive p-2">
                <hr>
                <div class="card-group mb-30">
                    <?php if (hdev_log::fid() == "admin" || hdev_log::fid() == "client" || hdev_log::fid() == "cashier"): ?>
                        <div class="row" style="cursor: pointer;">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12"  onclick="window.location.href = '<?php echo hdev_url::menu('reg/withdraw'); ?>?type=pending';">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Pending Withdraw Requests</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo count(hdev_data::withdraw("",['wait'])) ?></h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12" onclick="window.location.href = '<?php echo hdev_url::menu('approve/withdraw'); ?>?type=approve';">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Approved Withdraw Requests</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo count(hdev_data::withdraw("",['approve'])) ?></h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12" onclick="window.location.href = '<?php echo hdev_url::menu('reject/withdraw'); ?>?type=reject';">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Rejected withdraw Requests</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo count(hdev_data::withdraw("",['reject'])) ?></h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>
                        </div>
                        <!--this is first row -->
                        <hr>

                <?php endif ?>
                    <?php if (hdev_log::fid() == "admin" || hdev_log::fid() == "client" || hdev_log::fid() == "cashier"): ?>
                        <div class="row" style="cursor: pointer;">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"  onclick="window.location.href = '<?php echo hdev_url::menu('reg/statement'); ?>?type=pending';">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Pending Statement Requests</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo count(hdev_data::statement("",['wait'])) ?></h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" onclick="window.location.href = '<?php echo hdev_url::menu('approve/statement'); ?>?type=approve';">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Approved Statement Requests</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo count(hdev_data::statement("",['approve'])) ?></h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                        </div>
                        <!--this is first row -->
                        <hr>

                <?php endif ?>                
                    <?php if (hdev_log::fid() == "admin" || hdev_log::fid() == "client" || hdev_log::fid() == "loan_officer"): ?>
                        <div class="row" style="cursor: pointer;">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12"  onclick="window.location.href = '<?php echo hdev_url::menu('reg/loan'); ?>?type=pending';">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Pending Loan Requests</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo count(hdev_data::loan("",['wait'])) ?></h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12" onclick="window.location.href = '<?php echo hdev_url::menu('approve/loan'); ?>?type=approve';">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Approved Loan Requests</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo count(hdev_data::loan("",['approve'])) ?></h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12" onclick="window.location.href = '<?php echo hdev_url::menu('reject/loan'); ?>?type=reject';">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Rejected Loan Requests</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo count(hdev_data::loan("",['reject'])) ?></h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>
                        </div>
                        <!--this is first row -->
                        <hr>

                <?php endif ?>                
                </div>
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-indicators">
                    <?php
                        $m_data = hdev_data::load_view("slide");
                        //$m_data = array();
                        $num = count($m_data); 
                         for ($i=0; $i < $num; $i++) { 
                      $now2 = $i+1;
                      if ($i == 0) {
                        $indic = 'class="active" aria-current="true" aria-label="Slide 1"';
                      }else{
                        $indic = 'aria-label="Slide '.$now2.'"';
                      }

                    ?>
                      <button type="button" data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php echo $indic; ?>></button>
                    <?php
                    } ?>
                    </div>
                    <div class="carousel-inner">
                      <?php 
                        $ct = 0;
                        foreach ($m_data as $slide) {
                          //var_dump($ct);
                          $ct++;
                          if ($ct == 1) {
                            $start1 = "active";
                            $start2 = "text-start";
                          }elseif ($ct == $num) {
                            $start1 = "";
                            $start2 = "text-end";
                          }else{
                            $start1 = "";
                            $start2 = "";
                          }
                      ?>
                      <div class="carousel-item <?php echo $start1 ?>">
                        <img class="bd-placeholder-img" src="<?php echo hdev_url::menu('dist/img/upload/'.$slide['p_pic']); ?>" aria-hidden="true">

                        <div class="container">
                          <div class="carousel-caption <?php echo $start2 ?>" style="background-color: rgba(71, 104, 107, 0.4)!important;">
                            <h1><?php echo $slide['p_title']; ?></h1>
                            <p><?php echo $slide['p_desc'] ?></p>
                          </div>
                        </div>
                      </div>
                      <?php
                        }
                       ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev" style="background: transparent;border: none;">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">.</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next" style="background: transparent;border: none;">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">.</span>
                    </button>
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