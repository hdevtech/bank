<div class="box">
  <div align="center">
    <img src="<?php echo hdev_url::img(hdev_url::menu('dist/img/rasms.png'));?>" style="height: 138px;width: 138px;">
  </div>
  
  <h3>Log in at <br> <?php echo APP_NAME ?></h3>
  
  <form id="login_form" class="form-signin" method="POST">
    <input type="hidden" name="ref" value="login">
    <div class="inputBox">
      <input type="text" name="usn" onkeyup="login();" required />
      <label>Email</label>
    </div>

    <div class="inputBox">
      <input type="password" name="psw" onkeyup="login();" required />
      <label>Password</label>
    </div>
    <div class="wait" align="center" style="display: none;color: #ffffff;">
        <span><img src="<?php echo hdev_url::img(hdev_url::menu('dist/img/loading2.gif'));?>" alt="" /></span>
        <br>
        <i>Processing ... Please wait!!!</i>
    </div>
    <div id="fsave"></div>
    <div class="inputBox">
      <button type="button" class="btn btn-primary btn-block ftb" onclick="window.location.href='<?php echo hdev_url::menu('forgot'); ?>'"><i class="fas fa-question-circle"></i> Forgot password ?</button>&nbsp;
      <button type="button" class="btn btn-primary btn-block ftb" data-toggle="modal" data-target=".modal-reg" ><i class="fas fa-user-tie"></i> Create Client Account</button>&nbsp;
    </div>
    <hr>
    <i style="color: #fff;">&copy;- <?php echo date("Y"); ?> - <a href="https://hdev.rw" target="_blank" style="background-color: transparent!important;">  <?php echo APP_PROGRAMMER["name"] ?> </a> --- All rights Reserved</i>
  </form>
</div>

<?php if (hdev_data::service('client_reg')): ?>
<div class="modal fade modal-reg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Client Account Creation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo hdev_lang::on("form","close"); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card">
          <div class="card-body register-card-body table-responsive p-3">

            <form method="post" id="client_reg">
              <?php 
                $csrf = new CSRF_Protect();
                $csrf->echoInputField();
              ?>
              <input type="hidden" name="ref" value="client_reg">
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
                Client Account Number :
              </label>
              <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user-tag"></span>
                  </div>
                </div>
                <input type="text" id="c_acc" name="c_acc" class="form-control" placeholder="Client Account Number" required="true">
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
        <button type="button" class="btn btn-primary" id="reg_client"><i class="fas fa-save"></i> Submit Application</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endif ?>