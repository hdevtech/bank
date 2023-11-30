<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Certificates waiting for Approval</h5>
              </div>
              <div class="card-body table-responsive p-2">
                <?php //var_dump(hdev_data::get_student('',['year'])); ?>
                  <table class="table table-bordered table-hover table-striped text-nowrap" id="rasms_all_tables">
                  <thead class="border-top">
                    <tr>
                      <th>Reg no.</th>
                      <th>Citizen</th>
                      <th>N. Id</th>
                      <th>Citizen Info</th> 
                      <th>Certificate</th> 
                      <th>Reg Date</th>
                      <?php 
                      if (hdev_data::service('transaction_approve') || hdev_data::service('transaction_reject')): ?>
                      <th>Action</th>
                      <?php endif ?> 
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach (hdev_data::application('',['approve']) AS $transaction) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $build2 = "ref:transaction_approve;id:".$transaction['t_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject = hdev_data::encd("mod_close:#ld_del_close;app:".$tkn.";".$build2);
                      $build3 = "ref:transaction_reject;id:".$transaction['t_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject1 = hdev_data::encd("mod_close:#ld_app_close;app:".$tkn.";".$build3);
                      $citizen = hdev_data::citizen($transaction['c_id'],['data']);
                    ?>

                    <tr>
                      <td>
                        <?php echo $transaction["t_id"]; ?>
                      </td>
                      <td>
                        <?php echo $citizen["c_name"]; ?>
                      </td>
                      <td>
                        <?php echo $citizen["c_nid"]; ?>
                      </td>
                      <td>
                        <button class="btn bg-gradient-primary btn-xs view_ct" v_c_name="<?php echo $citizen['c_name']; ?>" v_c_nid="<?php echo $citizen['c_nid']; ?>" v_c_dob="<?php echo $citizen['c_dob']; ?>" v_c_email="<?php echo $citizen['c_email']; ?>" v_c_tell="<?php echo $citizen['c_tell']; ?>" v_c_location="<?php echo hdev_data::locations('mini',$citizen['loc_id']); ?>" data-toggle="modal" data-target=".modal-view"><i class="fa fa-eye"></i> View info</button>
                      </td>

                      <td>
                        <?php echo hdev_data::service_data($transaction['s_id'],['data'])["s_name"]; ?>
                      </td>
                      <td>
                        <?php echo $transaction["t_reg_date"]; ?>
                      </td>
                      <?php if (hdev_data::service('transaction_approve')): ?>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <?php if (hdev_data::service('transaction_approve')): ?>
                          <button type="button" hash="<?php echo $tkn; ?>" data="<?php echo $reject; ?>" rel="external" class="btn btn-success transaction_approve" t_reg_date="<?php echo $transaction["t_reg_date"]; ?>" c_name="<?php echo hdev_data::citizen($transaction['c_id'],['data'])["c_name"]; ?>" s_name="<?php echo hdev_data::service_data($transaction['s_id'],['data'])["s_name"]; ?>" data-toggle="modal" data-target=".modal-approve"><i class="fas fa-check-circle"></i> Approve </button>
                           <?php endif ?>
                           <?php if (hdev_data::service('transaction_approve')): ?>
                          <button type="button" hash="<?php echo $tkn; ?>" data="<?php echo $reject1; ?>" rel="external" class="btn btn-danger transaction_reject" t_reg_date="<?php echo $transaction["t_reg_date"]; ?>" c_name="<?php echo hdev_data::citizen($transaction['c_id'],['data'])["c_name"]; ?>" s_name="<?php echo hdev_data::service_data($transaction['s_id'],['data'])["s_name"]; ?>" data-toggle="modal" data-target=".modal-reject"><i class="fas fa-times-circle"></i> Reject </button>
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
<div class="modal fade modal-view">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Citizen Info</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo hdev_lang::on("form","close"); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">
            <table class="table border border-bottom">
              <tr>
                <td>Citizen name</td>
                <td id="v_c_name"></td>
              </tr>
              <tr>
              <tr>
                <td>Citizen National Id</td>
                <td id="v_c_nid"></td>
              </tr>
              <tr>
                <td>Citizen Date of Birth</td>
                <td id="v_c_dob"></td>
              </tr>
              <tr>
                <td>Citizen Email</td>
                <td id="v_c_email"></td>
              </tr>

              <tr>
                <td>Citizen Telephone</td>
                <td id="v_c_tell"></td>
              </tr>

              <tr>
                <td>Citizen Address</td>
                <td id="v_c_location"></td>
              </tr>
            </table>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger btn-block" data-dismiss="modal" id="reg_close"><span class="fa fa-times"></span> <?php echo hdev_lang::on("form","close"); ?></button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?php if (hdev_data::service('transaction_approve')): ?> 
<div class="modal fade modal-approve" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Accept</h4>
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
                  <th colspan="2">Are you Sure you want to Approve this certificate?</th>
                </tr>
                <tr>
                  <td>Citizen Name : </td>
                  <td id="c_name"></td>
                </tr>
                <tr>
                  <td>Certificate : </td>
                  <td id="s_name"></td>
                </tr>
                <tr>
                  <td>Reg Date : </td>
                  <td id="t_reg_date"></td>
                </tr>
              </table>
            <div class="wait" align="center"></div>
          </div>
          <!-- /.form-box --> 
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="ld_del_close">Close</button>
        <button type="button" class="btn btn-success" id="transaction_approve" data="" hash=""><i class="fas fa-check-circle"></i> Approve</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>
<?php endif ?>


<?php if (hdev_data::service('transaction_reject')): ?> 
<div class="modal fade modal-reject" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Accept</h4>
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
                  <th colspan="2">Are You sure you want to reject this certificate?</th>
                </tr>
                <tr>
                  <td>Names of citizen : </td>
                  <td id="c_name"></td>
                </tr>
                <tr>
                  <td>Certificate : </td>
                  <td id="s_name"></td>
                </tr>
                <tr>
                  <td>Reg Date : </td>
                  <td id="t_reg_date"></td>
                </tr>
              </table>
            <div class="wait" align="center"></div>
          </div>
          <!-- /.form-box --> 
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="ld_app_close">Close</button>
        <button type="button" class="btn btn-danger" id="transaction_reject" data="" hash=""><i class="fas fa-times-circle"></i> Reject</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>
<?php endif ?>