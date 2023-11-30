<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Registered cashiers</h5>
              </div>
              <div class="card-body table-responsive p-2">

                <div class="btn-group">
                  <?php if (hdev_data::service('cashier_reg')): ?>
                  <button class="btn btn-primary ftb" data-toggle="modal" data-target=".modal-reg"><i class="fas fa-plus-circle"></i> Add New Cashier</button>&nbsp;
                  <?php endif ?>
                </div>
                <?php //var_dump(hdev_data::get_student('',['year'])); ?>
                  <table class="table table-bordered table-hover table-striped text-nowrap" id="rasms_all_tables">
                  <thead class="border-top">
                    <tr>
                      <th>Reg no.</th>
                      <th>Names</th> 
                      <th>National Id</th>
                      <th>Account Number</th>
                      <th>Dob</th>
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

                    <?php foreach (hdev_data::cashier() AS $cashier) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $build2 = "ref:cashier_delete;id:".$cashier['c_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject = hdev_data::encd("mod_close:#ld_del_close;app:".$tkn.";".$build2);
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
                      <?php if (hdev_data::service('cashier_delete') || hdev_data::service('cashier_edit')): ?>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <?php if (hdev_data::service('cashier_edit')): ?>
                            <a href="<?php echo hdev_url::menu('edit/'.$cashier['c_id'].'/cashier'); ?>">
                              <button type="button" class="ld_edit btn btn-success" data-toggle="modal" data-target=".modal-edit" >
                                <span class="fas fa-edit"></span>
                                Edit
                              </button>
                            </a>
                          <?php endif ?>
                          <?php if (hdev_data::service('cashier_delete')): ?>
                          <?php 
                            if (hdev_data::get_attend($cashier["c_status"],'valid')) {
                          ?>
                          <button type="button" hash="<?php echo $tkn; ?>" data="<?php echo $reject; ?>" rel="external" class="btn btn-danger ld_delete" dob="<?php echo $cashier["c_dob"]; ?>" name="<?php echo $cashier["c_name"]; ?>" nid="<?php echo $cashier["c_nid"]; ?>" data-toggle="modal" data-target=".modal-delete"><i class="fas fa-trash"></i> Delete </button>
                          <?php
                            }else{
                              ?>
                          <a href="<?php echo hdev_url::menu($recover); ?>" rel="external" class="btn btn-secondary"><i class="fas fa-recycle"></i> Recover </a>
                          <?php
                            }
                           ?>
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
<?php if (hdev_data::service('cashier_reg')): ?>
<div class="modal fade modal-reg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add new Cashier</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo hdev_lang::on("form","close"); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">

            <form method="post" id="cashier_reg">
              <?php 
                $csrf = new CSRF_Protect();
                $csrf->echoInputField();
              ?>
              <input type="hidden" name="ref" value="cashier_reg">
              <div class="form-group">
              <label for="c_name">
                Names :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <input type="text" name="c_name" id="c_name" class="form-control" placeholder="Names" required="true">
              </div>
            </div>
            <div class="form-group">
              <label for="c_nid">
                National Id :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-tag"></span>
                  </div>
                </div>
                <input type="text" id="c_nid" name="c_nid" class="form-control" placeholder="National Id" required="true">
              </div>
            </div>
            <div class="form-group">
              <label for="c_acc">
                Cashier Account Number :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-tag"></span>
                  </div>
                </div>
                <input type="text" id="c_acc" name="c_acc" class="form-control" placeholder="Cashier Account Number" required="true">
              </div>
            </div>            
            <div class="form-group">
              <label for="c_dob">
                Date Of Birth :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" id="c_dob" name="c_dob" class="form-control" placeholder="Date Of Birth" required="true">
              </div>
            </div>
            <div class="form-group">
              <label for="c_email">
                Email :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span>@</span>
                  </div>
                </div>
                <input type="text" id="c_email" name="c_email" class="form-control" placeholder="Email" required="true">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fa fa-envelope"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="c_tell">
                Telephone :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
                <input type="text" id="c_tell" name="c_tell" class="form-control" placeholder="Telephone" required="true">
              </div>
            </div>
            <hr>
            <label>Address : </label>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="province">
                      Province :
                    </label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text" province-ico="fas fa-map-marker-alt">
                          <span class="fas fa-map-marker-alt"></span>
                        </div>
                      </div>
                      <select id="province" class="form-control" required="true" onchange="mr_locator('district',$(this).val())">
                        <?php echo hdev_data::locations("province"); ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="loc_id">
                      District :
                    </label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text" district-ico="fas fa-map-marker-alt">
                          <span class="fas fa-map-marker-alt" ></span>
                        </div>
                      </div>
                      <select id="district" class="form-control" required="true" onchange="mr_locator('sector',$('#province').val(),$(this).val())">
                        <option value="">Select</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="loc_id">
                      Sector :
                    </label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text" sector-ico="fas fa-map-marker-alt">
                          <span class="fas fa-map-marker-alt" ></span>
                        </div>
                      </div>
                      <select id="sector" class="form-control" required="true" onchange="mr_locator('cell',$('#province').val(),$('#district').val(),$(this).val())">
                        <option value="">Select</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="loc_id">
                        Cell :
                      </label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text" cell-ico="fas fa-map-marker-alt">
                            <span class="fas fa-map-marker-alt" ></span>
                          </div>
                        </div>
                        <select id="cell" class="form-control" required="true" onchange="mr_locator('village',$('#province').val(),$('#district').val(),$('#sector').val(),$(this).val())">
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="loc_id">
                      Village :
                    </label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text" village-ico="fas fa-map-marker-alt">
                          <span class="fas fa-map-marker-alt" ></span>
                        </div>
                      </div>
                      <select id="village" name="loc_id" class="form-control" required="true">
                        <option value="">Select</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
                      <hr>
            <div class="form-group">
              <label for="c_password">
                Password :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-lock"></span>
                  </div>
                </div>
                <input type="password" id="c_password" name="c_password" class="form-control" placeholder="Password" required="true">
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
        <button type="button" class="btn btn-primary" id="reg_cashier"><i class="fas fa-save"></i> Save Cashier Data</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endif ?>
<?php if (hdev_data::service('cashier_delete')): ?> 
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
                  <th colspan="2">Are you Sure You Want to delete This cashier?</th>
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
        <button type="button" class="btn btn-danger" id="cashier_delete" data="" hash=""><i class="fas fa-times-circle"></i> Delete This Cashier</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>
<?php endif ?>