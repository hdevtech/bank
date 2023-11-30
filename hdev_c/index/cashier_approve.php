<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Cashiers waiting for approval</h5>
              </div>
              <div class="card-body table-responsive p-2">
                <?php //var_dump(hdev_data::get_student('',['year'])); ?>
                  <table class="table table-bordered table-hover table-striped text-nowrap" id="rasms_all_tables">
                  <thead class="border-top">
                    <tr>
                      <th>Reg no.</th>
                      <th>Names</th> 
                      <th>National Id</th> 
                      <th>Account Number</th> 
                      <th>DOB</th>
                      <th>Address</th>
                      <th>Tel</th> 
                      <th>Email</th>
                      <th>Reg Date</th>
                      <?php 
                      if (hdev_data::service('cashier_edit') || hdev_data::service('cashier_delete')): ?>
                      <th>Action</th>
                      <?php endif ?> 
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach (hdev_data::cashier('',['approve']) AS $cashier) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $build2 = "ref:cashier_approve;id:".$cashier['c_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject = hdev_data::encd("mod_close:#ld_del_close;app:".$tkn.";".$build2);
                      $build3 = "ref:cashier_reject;id:".$cashier['c_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject1 = hdev_data::encd("mod_close:#ld_app_close;app:".$tkn.";".$build3);
                    ?>

                    <tr>
                      <td>
                        <?php echo $cashier["c_id"]; ?>
                      </td>
                      <td>
                        <?php echo $cashier["c_name"]; ?>
                      </td>
                      <td>
                        <?php echo $cashier["c_nid"]; ?>
                      </td>
                      <td>
                        <?php echo $cashier["c_acc"]; ?>
                      </td>                      
                      <td>
                        <?php echo $cashier["c_dob"]; ?>
                      </td>
                      <td>
                        <?php echo hdev_data::locations('mini',$cashier['loc_id']); ?>
                      </td>
                      <td>
                        <?php echo $cashier["c_tell"]; ?>
                      </td>
                      <td>
                        <?php echo $cashier["c_email"]; ?>    
                      </td>
                      <td>
                        <?php echo $cashier["c_reg_date"]; ?>
                      </td>
                      <?php if (hdev_data::service('cashier_recover')): ?>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <?php if (hdev_data::service('cashier_recover')): ?>
                          <button type="button" hash="<?php echo $tkn; ?>" data="<?php echo $reject; ?>" rel="external" class="btn btn-success ld_delete" dob="<?php echo $cashier["c_dob"]; ?>" name="<?php echo $cashier["c_name"]; ?>" nid="<?php echo $cashier["c_nid"]; ?>" data-toggle="modal" data-target=".modal-delete"><i class="fas fa-check-circle"></i> Approve </button>
                           <?php endif ?>
                           <?php if (hdev_data::service('cashier_recover')): ?>
                          <button type="button" hash="<?php echo $tkn; ?>" data="<?php echo $reject1; ?>" rel="external" class="btn btn-danger ld_reject" dob="<?php echo $cashier["c_dob"]; ?>" name="<?php echo $cashier["c_name"]; ?>" nid="<?php echo $cashier["c_nid"]; ?>" data-toggle="modal" data-target=".modal-reject"><i class="fas fa-times-circle"></i> Reject </button>
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
<?php if (hdev_data::service('cashier_approve')): ?> 
<div class="modal fade modal-delete" id="modal-default">
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
                  <th colspan="2">Are you sure you want to approve this Cashier?</th>
                </tr>
                <tr>
                  <td>Names : </td>
                  <td id="cashier_name"></td>
                </tr>
                <tr>
                  <td>National Id : </td>
                  <td id="cashier_nid"></td>
                </tr>
                <tr>
                  <td>Date Of Birth : </td>
                  <td id="cashier_dob"></td>
                </tr>
              </table>
            <div class="wait" align="center"></div>
          </div>
          <!-- /.form-box --> 
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="ld_del_close">Close</button>
        <button type="button" class="btn btn-success" id="cashier_delete" data="" hash=""><i class="fas fa-check-circle"></i> Approve This cashier</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>
<?php endif ?>


<?php if (hdev_data::service('cashier_reject')): ?> 
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
                  <th colspan="2">Are you sure you want to reject this cashier?</th>
                </tr>
                <tr>
                  <td>Names : </td>
                  <td id="cashier_name"></td>
                </tr>
                <tr>
                  <td>National Id : </td>
                  <td id="cashier_nid"></td>
                </tr>
                <tr>
                  <td>Date of Birth : </td>
                  <td id="cashier_dob"></td>
                </tr>
              </table>
            <div class="wait" align="center"></div>
          </div>
          <!-- /.form-box --> 
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="ld_app_close">Close</button>
        <button type="button" class="btn btn-danger" id="cashier_reject" data="" hash=""><i class="fas fa-times-circle"></i> Reject This Cashier</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>
<?php endif ?>