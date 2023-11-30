<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Pending Statement requests </h5>
              </div>
              <div class="card-body table-responsive p-2">

                <div class="btn-group">
                  <?php if (hdev_data::service('statement_reg')): ?>
                  <button class="btn btn-primary ftb" data-toggle="modal" data-target=".modal-reg"><i class="fas fa-plus-circle"></i> Submit new Statement request</button>&nbsp;
                  <?php endif ?>
                </div>
                <?php //var_dump(hdev_data::get_student('',['year'])); ?>
                  <table class="table table-bordered table-hover table-striped text-nowrap" id="rasms_all_tables">
                  <thead class="border-top">
                    <tr>
                      <th>Reg no.</th>
                      <th>Client info</th> 
                      <th>Account number</th> 
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Reg Date</th>
                      <?php 
                      if (hdev_data::service('statement_approve') || hdev_data::service('statement_reject')): ?>
                      <th>Action</th>
                      <?php endif ?> 
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach (hdev_data::statement('',['wait']) AS $statement) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $build2 = "ref:statement_approve;id:".$statement['s_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $approve = hdev_data::encd("mod_close:#sk_del_close;app:".$tkn.";".$build2);
                      $build1 = "ref:statement_reject;id:".$statement['s_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject = hdev_data::encd("mod_close:#sk_del_close;app:".$tkn.";".$build1);


                      $client = hdev_data::client($statement['c_id'],['data']);
                    ?>

                    <tr>
                      <td>
                        <?php echo $statement["s_id"]; ?>
                      </td>
                      <td>
                        <?php echo $client["c_name"]; ?>
                      </td>
                      <td>
                        <?php echo $client["c_acc"]; ?>
                      </td>
                      <td>
                        <?php echo $statement["s_start_date"]; ?>
                      </td>
                      <td>
                        <?php echo $statement["s_end_date"]; ?>
                      </td>  
                      <td>
                        <?php echo $statement["reg_date"]; ?>
                      </td>
                      <?php if (hdev_data::service('statement_approve') || hdev_data::service('statement_reject')): ?>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <?php if (hdev_data::service('statement_approve')): ?>
                            <button type="button" s_id="<?php echo $statement['s_id'] ?>" c_nid="<?php echo $client['c_nid'] ?>" c_name="<?php echo $client['c_name'] ?>" c_acc="<?php echo $client['c_acc'] ?>" s_start_date="<?php echo $statement['s_start_date'] ?>" s_end_date="<?php echo $statement['s_end_date'] ?>" rel="external" class="btn btn-success statement_approve" data-toggle="modal" data-target=".modal-approve" ><i class="fa fa-check-circle"></i> Approve</button>
                          <?php endif ?>
                        </div>
                      </td>
                      <?php endif ?> 
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col -->
      </div>
</div>
<?php if (hdev_data::service('statement_reg')): ?>
<div class="modal fade modal-reg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Submit new Statement Request</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo hdev_lang::on("form","close"); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">

            <form method="post" id="statement_reg">
              <?php 
                $csrf = new CSRF_Protect();
                $csrf->echoInputField();
                $client = hdev_data::client(hdev_log::uid(),['data']);
              ?>
              <input type="hidden" name="ref" value="statement_reg">
              <div class="form-group">
              <label for="s_amount">
                 Client name  :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <b class="form-control"><?php echo $client['c_name']; ?></b>
              </div>
            </div>
            <div class="form-group">
              <label for="s_amount">
                 Client National Id  :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <b class="form-control"><?php echo $client['c_nid']; ?></b>
              </div>
            </div>  
            <div class="form-group">
              <label for="s_amount">
                 Client Account Number  :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <b class="form-control"><?php echo $client['c_acc']; ?></b>
              </div>
            </div>                       
            <div class="form-group">
              <label for="s_start_date">
                Start date :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" name="s_start_date" id="s_start_date" class="form-control" placeholder="Start date" required="true">
              </div>
            </div>
              <div class="form-group">
              <label for="s_end_date">
                End Date :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" name="s_end_date" id="s_end_date" class="form-control" placeholder="End Date" required="true">
              </div>
            </div>   
            <div class="wait" align="center"></div>
            <input type="hidden" name="mod_close" value="#reg_close">
            </form>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="reg_close"><span class="fa fa-times"></span> <?php echo hdev_lang::on("form","close"); ?></button>
        <button type="button" class="btn btn-primary" id="statement_reg_btn" onclick="fm_submit('statement_reg_btn','statement_reg');"><i class="fas fa-save"></i> Submit new Statement Request</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endif ?>

<div class="modal fade modal-set" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Accept</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo hdev_lang::on("form","close"); ?>">
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
                  <th colspan="2" id="e_tit"></th>
                </tr>
                <tr>
                  <td>Record id : </td>
                  <td id="ref_id"></td>
                </tr>           
              </table>
            <div class="wait" align="center"></div>
          </div>
          <!-- /.form-box --> 
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="sk_del_close">Close</button>
        <button type="button" class="btn btn-danger" id="fm_set_clk" data="" hash="" onclick="fm_app('fm_set_clk')"><i class="fa fa-times-circle"></i> </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>

<?php if (hdev_data::service('statement_approve')): ?>
<div class="modal fade modal-approve">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Approve Stetement Request</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo hdev_lang::on("form","close"); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">

            <form method="post" id="statement_approve" action="<?php echo hdev_url::menu("up") ?>" enctype="multipart/form-data">
              <?php 
                $csrf = new CSRF_Protect();
                $csrf->echoInputField();
                $client = hdev_data::client(hdev_log::uid(),['data']);
              ?>
              <input type="hidden" name="ref" value="statement_approve">
              <input type="hidden" name="s_id" id="s_id" value="">
              <div class="form-group">
              <label for="s_amount">
                 Client name  :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <b class="form-control" id="c_name"></b>
              </div>
            </div>
            <div class="form-group">
              <label for="s_amount">
                 Client National Id  :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <b class="form-control" id="c_nid"></b>
              </div>
            </div>  
            <div class="form-group">
              <label for="s_amount">
                 Client Account Number  :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <b class="form-control" id="c_acc"></b>
              </div>
            </div>                       
            <div class="form-group">
              <label for="s_start_date">
                Start date :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" name="s_start_date" id="s_start_date" class="form-control" placeholder="Start date" required="true">
              </div>
            </div>
              <div class="form-group">
              <label for="s_end_date">
                End Date :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" name="s_end_date" id="s_end_date" class="form-control" placeholder="End Date" required="true">
              </div>
            </div>   
             <div class="form-group">
              <label for="s_att">
                Statement File :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-file-upload"></span>
                  </div>
                </div>
                <input type="file" name="s_att" id="s_att" class="form-control" placeholder="Statement File" required="true">
              </div>
            </div>   
            <div class="progress">
              <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" id="progress-bar">
              </div>
            </div>           
            <div class="wait" align="center"></div>
            <input type="hidden" name="mod_close" value="#reg_close">
            </form>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="reg_close"><span class="fa fa-times"></span> <?php echo hdev_lang::on("form","close"); ?></button>
        <button type="button" class="btn btn-success" id="statement_approve_btn" onclick="$('#statement_approve').submit();"><i class="fas fa-check-circle"></i> Approve Statement Request</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endif ?>