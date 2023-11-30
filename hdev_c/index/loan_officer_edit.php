<?php 
  $lo_id = hdev_session::get('lo_id');
  $data = hdev_data::loan_officer($lo_id,['data']);
  //var_dump($data);
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
              <div class="card-header">Edit Loan Officer Info</h5>
              </div>
              <div class="card-body table-responsive p-2">
                         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">

            <form method="post" id="loan_officer_reg">
              <?php 
                $csrf = new CSRF_Protect();
                $csrf->echoInputField();
              ?>
              <input type="hidden" name="lo_id" value="<?php echo $data['lo_id'] ?>">
              <input type="hidden" name="ref" value="loan_officer_edit">
              <div class="form-group">
              <label for="lo_name">
                Names :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-alt"></span>
                  </div>
                </div>
                <input type="text" name="lo_name" id="lo_name" class="form-control" placeholder="Names" required="true" value="<?php echo $data['lo_name'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="lo_nid">
                National Id :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-tag"></span>
                  </div>
                </div>
                <input type="text" id="lo_nid" name="lo_nid" class="form-control" placeholder="National Id" required="true" value="<?php echo $data['lo_nid'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="lo_acc">
                Loan Officer Account Number :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-tag"></span>
                  </div>
                </div>
                <input type="text" id="lo_acc" name="lo_acc" class="form-control" placeholder="Loan Officer Account Number" required="true" value="<?php echo $data['lo_acc'] ?>">
              </div>
            </div>            
            <div class="form-group">
              <label for="lo_dob">
                Date Of Birth :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" id="lo_dob" name="lo_dob" class="form-control" placeholder="Date Of Birth" required="true"  value="<?php echo $data['lo_dob'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="lo_email">
                Email :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span>@</span>
                  </div>
                </div>
                <input type="text" id="lo_email" name="lo_email" class="form-control" placeholder="Email" required="true" value="<?php echo $data['lo_email'] ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fa fa-envelope"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="lo_tell">
                Telephone :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
                <input type="text" id="lo_tell" name="lo_tell" class="form-control" placeholder="Telephone" required="true" value="<?php echo $data['lo_tell']; ?>">
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
            <button type="button" class="btn btn-primary btn-block" id="reg_loan_officer"><i class="fas fa-save"></i> Save Loan Officer Info</button>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
              </div>
            </div>
          </div>
          <!-- /.col -->
      </div>
</div>