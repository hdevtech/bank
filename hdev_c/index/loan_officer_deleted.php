<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Deleted Loan Officers</h5>
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
                      if (hdev_data::service('loan_officer_edit') || hdev_data::service('loan_officer_delete')): ?>
                      <th>Action</th>
                      <?php endif ?> 
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach (hdev_data::loan_officer('',['delete']) AS $loan_officer) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $build2 = "ref:loan_officer_recover;id:".$loan_officer['lo_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject = hdev_data::encd("mod_close:#ld_del_close;app:".$tkn.";".$build2);
                    ?>

                    <tr>
                      <td>
                        <?php echo $loan_officer["lo_id"]; ?>
                      </td>
                      <td>
                        <?php echo $loan_officer["lo_name"]; ?>
                      </td>
                      <td>
                        <?php echo $loan_officer["lo_nid"]; ?>
                      </td>
                      <td>
                        <?php echo $loan_officer["lo_acc"]; ?>
                      </td>                      
                      <td>
                        <?php echo $loan_officer["lo_dob"]; ?>
                      </td>
                      <td>
                        <?php echo hdev_data::locations('mini',$loan_officer['loc_id']); ?>
                      </td>
                      <td>
                        <?php echo $loan_officer["lo_tell"]; ?>
                      </td>
                      <td>
                        <?php echo $loan_officer["lo_email"]; ?>    
                      </td>
                      <td>
                        <?php echo $loan_officer["lo_reg_date"]; ?>
                      </td>
                      <?php if (hdev_data::service('loan_officer_recover')): ?>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <?php if (hdev_data::service('loan_officer_recover')): ?>
                          <button type="button" hash="<?php echo $tkn; ?>" data="<?php echo $reject; ?>" rel="external" class="btn btn-secondary ld_delete" dob="<?php echo $loan_officer["lo_dob"]; ?>" name="<?php echo $loan_officer["lo_name"]; ?>" nid="<?php echo $loan_officer["lo_nid"]; ?>" data-toggle="modal" data-target=".modal-delete"><i class="fas fa-recycle"></i> Recover </button>
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
<?php if (hdev_data::service('loan_officer_recover')): ?> 
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
                  <th colspan="2">Are you susre you want to recover this Loan Officer?</th>
                </tr>
                <tr>
                  <td>Names : </td>
                  <td id="loan_officer_name"></td>
                </tr>
                <tr>
                  <td>National Id : </td>
                  <td id="loan_officer_nid"></td>
                </tr>
                <tr>
                  <td>Date Of Birth : </td>
                  <td id="loan_officer_dob"></td>
                </tr>
              </table>
            <div class="wait" align="center"></div>
          </div>
          <!-- /.form-box --> 
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="ld_del_close">Close</button>
        <button type="button" class="btn btn-success" id="loan_officer_delete" data="" hash=""><i class="fas fa-check-circle"></i> Recover This Loan Officer</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>
<?php endif ?>