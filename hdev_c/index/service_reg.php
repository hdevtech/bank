<?php 
//echo   hdev_backup::backup();
//  exit();//
 ?>
<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card" style="height: 100%;">
              <div class="card-header"><h5>Certificates info</h5>
              </div>
              <div class="card-body table-responsive p-2">

                <div class="btn-group">
                  <?php if (hdev_data::service('service_reg')): ?>
                  <button class="btn btn-primary ftb" data-toggle="modal" data-target=".modal-reg"><i class="fa fa-plus-circle"></i> Add new Certificate</button>&nbsp;
                  <?php endif ?>
                </div>
                <?php //var_dump(hdev_data::get_student('',['year'])); ?>
                  <table class="table table-bordered table-hover table-striped text-nowrap" id="rasms_all_tables">
                  <thead class="border-top">
                    <tr>
                      <th class="table-plus datatable-nosort">Reg no</th>
                      <th>Name</th>
                      <th>Certificate description</th> 
                      <th>Certificate Content</th>
                      <th>Reg Date</th>
                      <?php if (hdev_data::service('service_delete') || hdev_data::service('service_edit')): ?>
                      <th>Action</th>
                      <?php endif ?> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $ck = hdev_data::service_data();
                      //var_dump($ck);
                     ?>
                    <?php foreach ($ck AS $service) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $build2 = "ref:service_delete;id:".$service['s_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
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
                           <a  ext_link="ok" target="_blank" class=" btn bg-gradient-primary" href="<?php echo hdev_url::menu('cert/gen/preview/'.$service['s_id']); ?>"><i class="fa fa-print"></i> Preview</a>
                           <?php if (hdev_data::service('service_edit')): ?>
                          <button type="button" rel="external" class="btn btn-success service_edit" s_id="<?php echo $service['s_id'] ?>" s_name="<?php echo $service['s_name'] ?>" s_desc="<?php echo $service['s_desc'] ?>" s_content="<?php echo $service['s_content'] ?>" data-toggle="modal" data-target=".modal-edit"><i class="fa fa-edit"></i> Edit </button>
                           <?php endif ?>
                          <?php if (hdev_data::service('service_delete')): ?>
                          <button type="button" hash="<?php echo $tkn; ?>" data="<?php echo $reject; ?>" s_name="<?php echo $service['s_name'] ?>" rel="external" class="btn btn-danger service_delete"  data-toggle="modal" data-target=".modal-delete"><i class="fa fa-trash"></i> Delete </button>
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
                  <th colspan="2">Are you sure you want to delete this certificate?</th>
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
        <button type="button" class="btn btn-danger" id="service_delete" data="" hash=""><i class="fa fa-trash"></i>Delete Certificate</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>
<?php endif ?>


<?php if (hdev_data::service('service_reg')): ?>
<div class="modal fade modal-reg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add new certificate</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo hdev_lang::on("form","close"); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">

            <form method="post" id="service_reg">
              <?php 
                $csrf = new CSRF_Protect();
                $csrf->echoInputField();
              ?>
              <input type="hidden" name="ref" value="service_reg">
              <div class="form-group">
              <label for="s_name">
                Name of Certificate :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <input type="text" name="s_name" id="s_name" class="form-control" placeholder="Name of Certificate" required="true">
              </div>
            </div>
            <div class="form-group">
              <label for="s_desc">
                Certificate description :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <input type="text" name="s_desc" id="s_desc" class="form-control" placeholder="Certificate description" required="true">
              </div>
            </div>   
            <div class="form-group">
              <label for="s_content">
                Certificate Content :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <textarea type="text" name="s_content" id="s_content" class="form-control" placeholder="Certificate Content" required="true"></textarea>
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
        <button type="button" class="btn btn-primary" id="reg_service"><i class="fas fa-save"></i> Add certificate</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endif ?>



<?php if (hdev_data::service('service_edit')): ?>
<div class="modal fade modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Certificate Info</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo hdev_lang::on("form","close"); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">

            <form method="post" id="service_edit">
              <?php 
                $csrf = new CSRF_Protect();
                $csrf->echoInputField();
              ?>
              <input type="hidden" name="s_id" id="s_id">
              <input type="hidden" name="ref" value="service_edit">
              <div class="form-group">
              <label for="s_name">
                Name of Certificate :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <input type="text" name="s_name" id="s_name" class="form-control" placeholder="Name of Certificate" required="true">
              </div>
            </div>
            <div class="form-group">
              <label for="s_desc">
                Certificate description :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <input type="text" name="s_desc" id="s_desc" class="form-control" placeholder="Certificate description" required="true">
              </div>
            </div>   
            <div class="form-group">
              <label for="s_content">
                Certificate Content :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <textarea type="text" name="s_content" id="s_content" class="form-control" placeholder="Certificate Content" required="true"></textarea>
              </div>
            </div> 
            <div class="wait" align="center"></div>
            <input type="hidden" name="mod_close" value="#edit_close">
            </form>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="edit_close"><span class="fa fa-times"></span> <?php echo hdev_lang::on("form","close"); ?></button>
        <button type="button" class="btn btn-primary" id="edit_service"><i class="fas fa-save"></i> Modify certificate info</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endif ?>