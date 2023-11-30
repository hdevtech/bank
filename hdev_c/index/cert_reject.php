<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Rejected Certificates</h5>
              </div>
              <div class="card-body table-responsive p-2">
                <?php //var_dump(hdev_data::get_student('',['year'])); ?>
                  <table class="table table-bordered table-hover table-striped text-nowrap" id="rasms_all_tables">
                  <thead class="border-top">
                    <tr>
                      <th>Reg no.</th>
                      <th>Citizen</th>
                      <th>N. Id</th>
                      <th>View Info</th> 
                      <th>Certificate</th> 
                      <th>Reg Date</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    foreach (hdev_data::application('',['reject']) AS $transaction) { 
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