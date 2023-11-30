<?php 
  $c_id = hdev_session::get('c_id');
  $data = hdev_data::cashier($c_id,['data']);
  $location = hdev_data::locations("all",$data['loc_id']);
 ?>
 <script type="text/javascript">
   function you() {
    var og=$('#me_ref').attr('og');if (og=='me') {loc_edit(<?php echo "'".$location['loc_province']."','".$location['loc_district']."','".$location['loc_sector']."','".$location['loc_cell']."','".$location['loc_id']."'"; ?>);$('#me_ref').attr('og','...');}
   }
 </script>
<div id="app_data" onmousemove="you();" onscroll="you();" onload="you();">
  <span id="me_ref" og="me"></span>
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Edit Cashier Info</h5>
              </div>
              <div class="card-body table-responsive p-2">
                         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">

            <form method="post" id="cashier_reg">
              <?php 
                $csrf = new CSRF_Protect();
                $csrf->echoInputField();
              ?>
              <input type="hidden" name="c_id" value="<?php echo $data['c_id'] ?>">
              <input type="hidden" name="ref" value="cashier_edit">
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
                <input type="text" name="c_name" id="c_name" class="form-control" placeholder="Names" required="true" value="<?php echo $data['c_name'] ?>">
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
                <input type="text" id="c_nid" name="c_nid" class="form-control" placeholder="National Id" required="true" value="<?php echo $data['c_nid'] ?>">
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
                <input type="text" id="c_acc" name="c_acc" class="form-control" placeholder="Cashier Account Number" required="true" value="<?php echo $data['c_acc'] ?>">
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
                <input type="date" id="c_dob" name="c_dob" class="form-control" placeholder="Date Of Birth" required="true"  value="<?php echo $data['c_dob'] ?>">
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
                <input type="text" id="c_email" name="c_email" class="form-control" placeholder="Email" required="true" value="<?php echo $data['c_email'] ?>">
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
                <input type="text" id="c_tell" name="c_tell" class="form-control" placeholder="Telephone" required="true" value="<?php echo $data['c_tell']; ?>">
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
                        <?php echo hdev_data::locations("district",$location['loc_province']); ?>
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
                        <?php echo hdev_data::locations("sector",$location['loc_province'],$location['loc_district']); ?>
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
                        <?php echo hdev_data::locations("cell",$location['loc_province'],$location['loc_district'],$location['loc_sector']); ?>
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
                      <select id="village" name="loc_id" class="form-control" required="true" value='<?php echo $location['loc_id']; ?>'>
                        <?php echo hdev_data::locations("village",$location['loc_province'],$location['loc_district'],$location['loc_sector'],$location['loc_cell']); ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
                      <hr>
            <div class="wait" align="center"></div>
            <input type="hidden" name="mod_close" value="#reg_close">
            </form>

          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-primary btn-block" id="reg_cashier"><i class="fas fa-save"></i> Save Cashier Info</button>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
              </div>
            </div>
          </div>
          <!-- /.col -->
      </div>
</div>