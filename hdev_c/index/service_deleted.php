<?php 
//echo   hdev_backup::backup();
//  exit();//
 ?>
<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card" style="height: 100%;">
              <div class="card-header"><h5>Deleted Certificates</h5>
              </div>
              <div class="card-body table-responsive p-2">
                <?php //var_dump(hdev_data::get_student('',['year'])); ?>
                  <table class="table table-bordered table-hover table-striped text-nowrap" id="rasms_all_tables">
                  <thead class="border-top">
                    <tr>
                      <th class="table-plus datatable-nosort">Reg no</th>
                      <th>Names</th>
                      <th>Certificate Description</th> 
                      <th>Certificate content</th>
                      <th>Reg date</th>
                      <?php if (hdev_data::service('service_delete') || hdev_data::service('service_edit')): ?>
                      <th>action</th>
                      <?php endif ?> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $ck = hdev_data::service_data('',['delete']);
                      //var_dump($ck);
                     ?>
                    <?php foreach ($ck AS $service) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $build2 = "ref:service_recover;id:".$service['s_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject = hdev_data::encd("mod_close:#eq_del_close;app:".$tkn.";".$build2);
                    ?>

                    <tr>
                      <td class="table-plus">
                        <?php echo $service["s_id"]; ?>
                      </td>
                      <td>
                        <?php echo $service["s_name"]; ?>
                      </td>
                      <td>
                        <?php echo $service["s_desc"]; ?>
                      </td>
                      <td>
                        <?php echo $service["s_content"]; ?>
                      </td>
                      <td>
                        <?php echo $service["s_reg_date"]; ?>
                      </td>
                      <?php if (hdev_data::service('service_delete') || hdev_data::service('service_edit')): ?>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <?php if (hdev_data::service('service_delete')): ?>
                          <button type="button" hash="<?php echo $tkn; ?>" data="<?php echo $reject; ?>" s_name="<?php echo $service['s_name'] ?>" rel="external" class="btn btn-secondary service_delete"  data-toggle="modal" data-target=".modal-delete"><i class="fa fa-recycle"></i> Garura </button>
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
<?php if (hdev_data::service('service_delete')): ?> 
<div class="modal fade modal-delete" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirm</h4>
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
                  <th colspan="2">Are you sure you want to recover this certificate?</th>
                </tr>
                <tr>
                  <td>Name of the certificate : </td>
                  <td id="s_name"></td>
                </tr>
              </table>
            <div class="wait" align="center"></div>
          </div>
          <!-- /.form-box --> 
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="eq_del_close"><?php echo hdev_lang::on("form","close"); ?></button>
        <button type="button" class="btn btn-secondary" id="service_delete" data="" hash=""><i class="fa fa-recycle"></i> Recover</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>
<?php endif ?>