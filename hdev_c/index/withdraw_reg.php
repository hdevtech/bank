<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Pending Withdraw requests </h5>
              </div>
              <div class="card-body table-responsive p-2">

                <div class="btn-group">
                  <?php if (hdev_data::service('withdraw_reg')): ?>
                  <button class="btn btn-primary ftb" data-toggle="modal" data-target=".modal-reg"><i class="fas fa-plus-circle"></i> Submit new Withdraw request</button>&nbsp;
                  <?php endif ?>
                </div>
                <?php //var_dump(hdev_data::get_student('',['year'])); ?>
                  <table class="table table-bordered table-hover table-striped text-nowrap" id="rasms_all_tables">
                  <thead class="border-top">
                    <tr>
                      <th>Reg no.</th>
                      <th>Client info</th> 
                      <th>Account number</th> 
                      <th>Amount Requested</th>
                      <th>Description</th>
                      <th>Expected withdraw date</th> 
                      <th>Reg Date</th>
                      <?php 
                      if (hdev_data::service('withdraw_approve') || hdev_data::service('withdraw_reject')): ?>
                      <th>Action</th>
                      <?php endif ?> 
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach (hdev_data::withdraw('',['wait']) AS $withdraw) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $build2 = "ref:withdraw_approve;id:".$withdraw['w_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $approve = hdev_data::encd("mod_close:#sk_del_close;app:".$tkn.";".$build2);
                      $build1 = "ref:withdraw_reject;id:".$withdraw['w_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject = hdev_data::encd("mod_close:#sk_del_close;app:".$tkn.";".$build1);


                      $client = hdev_data::client($withdraw['c_id'],['data']);
                    ?>

                    <tr>
                      <td>
                        <?php echo $withdraw["w_id"]; ?>
                      </td>
                      <td>
                        <?php echo $client["c_name"]; ?>
                      </td>
                      <td>
                        <?php echo $client["c_acc"]; ?>
                      </td>
                      <td>
                        <?php echo $withdraw["w_amount"]; ?>
                      </td>
                      <td>
                        <?php echo $withdraw["w_ref"]; ?>
                      </td> 
                      <td>
                        <?php echo $withdraw["w_rec_date"]; ?>
                      </td>  
                      <td>
                        <?php echo $withdraw["reg_date"]; ?>
                      </td>
                      <?php if (hdev_data::service('withdraw_approve') || hdev_data::service('withdraw_reject')): ?>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <?php if (hdev_data::service('withdraw_approve')): ?>
                            <button type="button" set_btn='fm_set_clk' e_tit="Are you Sure That You Want to Approve This withdraw request?" ref_id="<?php echo $withdraw['w_id']; ?>" data="<?php echo $approve; ?>" hash="<?php echo $tkn; ?>" rel="external" class="btn btn-success fm_pre_set" data-toggle="modal" data-target=".modal-set" ><i class="fa fa-check-circle"></i> Approve</button>
                          <?php endif ?>
                          <?php if (hdev_data::service('withdraw_reject')): ?>
                            <button type="button" set_btn='fm_set_clk' e_tit="Are you Sure That You Want to Reject This withdraw request?" ref_id="<?php echo $withdraw['w_id']; ?>" data="<?php echo $reject; ?>" hash="<?php echo $tkn; ?>" rel="external" class="btn btn-danger fm_pre_set" data-toggle="modal" data-target=".modal-set" ><i class="fa fa-times-circle"></i> Reject</button>
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
<?php if (hdev_data::service('withdraw_reg')): ?>
<div class="modal fade modal-reg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Submit new Withdraw Request</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo hdev_lang::on("form","close"); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">

            <form method="post" id="withdraw_reg">
              <?php 
                $csrf = new CSRF_Protect();
                $csrf->echoInputField();
                $client = hdev_data::client(hdev_log::uid(),['data']);
              ?>
              <input type="hidden" name="ref" value="withdraw_reg">
              <div class="form-group">
              <label for="w_amount">
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
              <label for="w_amount">
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
              <label for="w_amount">
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
              <label for="w_amount">
                Amount To withdraw :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <input type="text" name="w_amount" id="w_amount" class="form-control" placeholder="Amount To withdraw" required="true">
              </div>
            </div>
              <div class="form-group">
              <label for="w_ref">
                Withdraw Description :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <input type="text" name="w_ref" id="w_ref" class="form-control" placeholder="Withdraw Description" required="true">
              </div>
            </div>  
              <div class="form-group">
              <label for="w_rec_date">
                Expected Withdraw Date :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <input type="date" name="w_rec_date" id="w_rec_date" class="form-control" placeholder="Expected Withdraw Date" required="true">
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
        <button type="button" class="btn btn-primary" id="withdraw_reg_btn" onclick="fm_submit('withdraw_reg_btn','withdraw_reg');"><i class="fas fa-save"></i> Submit new Withdraw Request</button>
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