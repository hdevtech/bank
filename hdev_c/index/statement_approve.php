<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Approve Statement requests </h5>
              </div>
              <div class="card-body table-responsive p-2">
                <?php //var_dump(hdev_data::get_student('',['year'])); ?>
                  <table class="table table-bordered table-hover table-striped text-nowrap" id="rasms_all_tables">
                  <thead class="border-top">
                    <tr>
                      <th>Reg no.</th>
                      <th>Client info</th> 
                      <th>Account number</th> 
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Attachment</th> 
                      <th>Cashier id</th>
                      <th>Cashier names</th>
                      <th>Reg Date</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach (hdev_data::statement('',['approve']) AS $statement) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();
                      $client = hdev_data::client($statement['c_id'],['data']);
                      $cashier = hdev_data::cashier($statement['r_c_id'],['data']);
                    ?>

                    <tr>
                      <td>
                        <?php echo $statement["s_id"]; ?>
                      </td>
                      <td>
                        <?php echo $client["c_name"]; ?>
                      </td>
                      <td>
                        <?php echo $client["c_acc"]; ?>
                      </td>
                      <td>
                        <?php echo $statement["s_start_date"]; ?>
                      </td>
                      <td>
                        <?php echo $statement["s_end_date"]; ?>
                      </td> 
                      <td>
                        <a target="_blank" ext_link="ok"  href="<?php echo hdev_url::menu("dist/img/docs/".$statement["s_att"]);?>" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;View Attachment</a>
                        
                      </td>  
                      <td>
                        <?php echo $cashier["c_id"]; ?>
                      </td>
                      <td>
                        <?php echo $cashier["c_name"]; ?>
                      </td>                   
                      <td>
                        <?php echo $statement["reg_date"]; ?>
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