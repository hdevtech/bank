<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Rejected Loan requests </h5>
              </div>
              <div class="card-body table-responsive p-2">
                <?php //var_dump(hdev_data::get_student('',['year'])); ?>
                  <table class="table table-bordered table-hover table-striped text-nowrap" id="rasms_all_tables">
                  <thead class="border-top">
                    <tr>
                      <th>Reg no.</th>
                      <th>Client info</th> 
                      <th>Account number</th> 
                      <th>Amount Requested</th>
                      <th>Description</th>
                      <th>Loan Officer id</th>
                      <th>Loan Officer names</th>
                      <th>Attachment</th> 
                      <th>Reg Date</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach (hdev_data::loan('',['approve']) AS $loan) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $build2 = "ref:loan_approve;id:".$loan['l_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $approve = hdev_data::encd("mod_close:#sk_del_close;app:".$tkn.";".$build2);
                      $build1 = "ref:loan_reject;id:".$loan['l_id'].";src:1;from:".urlencode(hdev_url::get_url_host().$_SESSION['act_url'][2]);
                      $reject = hdev_data::encd("mod_close:#sk_del_close;app:".$tkn.";".$build1);


                      $client = hdev_data::client($loan['c_id'],['data']);
                      $loan_officer = hdev_data::loan_officer($loan['lo_id'],['data']);
                      //var_dump($loan_officer);
                    ?>

                    <tr>
                      <td>
                        <?php echo $loan["l_id"]; ?>
                      </td>
                      <td>
                        <?php echo $client["c_name"]; ?>
                      </td>
                      <td>
                        <?php echo $client["c_acc"]; ?>
                      </td>
                      <td>
                        <?php echo $loan["l_amount"]; ?>
                      </td>
                      <td>
                        <?php echo $loan["l_desc"]; ?>
                      </td>  
                      <td>
                        <?php echo $loan["lo_id"]; ?>
                      </td>
                      <td>
                        <?php echo $loan_officer["lo_name"]; ?>
                      </td>
                      <td>
                        <a target="_blank" ext_link="ok"  href="<?php echo hdev_url::menu("dist/img/docs/".$loan["l_att"]);?>" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;View Attachment</a>
                        
                      </td>                        
                      <td>
                        <?php echo $loan["l_reg_date"]; ?>
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
<div class="modal fade modal-set" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Accept</h4>
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
                  <th colspan="2" id="e_tit"></th>
                </tr>
                <tr>
                  <td>Record id : </td>
                  <td id="ref_id"></td>
                </tr>           
              </table>
            <div class="wait" align="center"></div>
          </div>
          <!-- /.form-box --> 
        </div><!-- /.card -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="sk_del_close">Close</button>
        <button type="button" class="btn btn-danger" id="fm_set_clk" data="" hash="" onclick="fm_app('fm_set_clk')"><i class="fa fa-times-circle"></i> </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog --> 
</div>