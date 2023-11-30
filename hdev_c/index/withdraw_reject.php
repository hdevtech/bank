<div id="app_data">
      <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary card-outline" style="height: 100%;">
              <div class="card-header">Rejected Withdraw requests </h5>
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
                      <th>Expected withdraw date</th>
                      <th>Cashier id</th>
                      <th>Cashier name</th> 
                      <th>Reg Date</th> 
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach (hdev_data::withdraw('',['reject']) AS $withdraw) { 
                      $csrf = new CSRF_Protect();
                      $tkn = $csrf->getToken();

                      $client = hdev_data::client($withdraw['c_id'],['data']);
                      $cashier = hdev_data::cashier($withdraw['r_c_id'],['data']);
                    ?>

                    <tr>
                      <td>
                        <?php echo $withdraw["w_id"]; ?>
                      </td>
                      <td>
                        <?php echo $client["c_name"]; ?>
                      </td>
                      <td>
                        <?php echo $client["c_acc"]; ?>
                      </td>
                      <td>
                        <?php echo $withdraw["w_amount"]; ?>
                      </td>
                      <td>
                        <?php echo $withdraw["w_ref"]; ?>
                      </td> 
                      <td>
                        <?php echo $withdraw["w_rec_date"]; ?>
                      </td> 
                      <td>
                        <?php echo $withdraw["r_c_id"]; ?>
                      </td>
                      <td>
                        <?php echo $cashier["c_name"]; ?>
                      </td>                      
                      <td>
                        <?php echo $withdraw["reg_date"]; ?>
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