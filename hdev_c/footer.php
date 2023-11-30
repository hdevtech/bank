<?php if (1==3): ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
    </div>
  </aside>
  <!-- /.control-sidebar --> 
  <div class="loader" align="center">
    <span style="width: auto;text-align: center;"><img src="<?php echo hdev_url::img(hdev_url::menu('dist/img/loading2.gif'));?>" alt="" /><br><i><?php echo hdev_lang::on("form","load"); ?></i></span>
  </div>
<?php endif ?>


</div><!-- ./app body -->
  <!-- Main Footer -->
  <footer class="main-footer bg-dark">
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary">
        <div class="row px-xl-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">Start by creating account and enjoy Our Online System</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+250 783097770</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-5 mb-5">
                        <!--<h5 class="text-secondary text-uppercase mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Houses</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Search</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>-->
                    </div>
                    <div class="col-md-7 mb-5">
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-12 px-xl-0">
                <!-- To the right -->
              <div class="float-right d-none d-sm-inline">
                Powered by <?php echo APP_PROGRAMMER["name"]; ?>
              </div>
              <!-- Default to the left -->
              <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="https://free.facebook.com" class="text-white" target="_blank"><?php echo APP_NAME; ?></a>.</strong> All rights reserved.
            </div>
        </div>
    </div>
    
    <!-- Footer End -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo hdev_url::menu('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo hdev_url::menu('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo hdev_url::menu('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo hdev_url::menu('dist/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo hdev_url::menu('plugins/Smoothproducts/js/jquery-2.1.3.min.js');?>"></script>
<script src="<?php echo hdev_url::menu('plugins/Smoothproducts/js/smoothproducts.js?h='.rand());?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo hdev_url::menu('dist/js/demo.js'); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo hdev_url::menu("plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/datatables-responsive/js/dataTables.responsive.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/datatables-responsive/js/responsive.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/datatables-buttons/js/dataTables.buttons.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/datatables-buttons/js/buttons.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/jszip/jszip.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/pdfmake/pdfmake.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/pdfmake/vfs_fonts.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/datatables-buttons/js/buttons.html5.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/datatables-buttons/js/buttons.print.min.js"); ?>"></script>
<script src="<?php echo hdev_url::menu("plugins/datatables-buttons/js/buttons.colVis.min.js"); ?>"></script>
<!-- BS-Stepper -->
<script src="<?php echo hdev_url::menu('plugins/bs-stepper/js/bs-stepper.min.js');?>"></script>

<script src="<?php echo hdev_url::menu('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<script src="<?php echo hdev_url::menu('plugins/ajax/sl.js');?>"></script>
<script src="<?php echo hdev_url::menu('plugins/ajax/former.js');?>"></script>
<!--<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>-->
  <script src="<?php echo hdev_url::menu('plugins/editor_og/build/ckeditor.js'); ?>"></script>
    <script>
    let editor;
  function init_editor(argument) {

    ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .then( newEditor => {
            editor = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );

    // body...
  }   
  //init_editor();   
    </script>
<script >
      // ClassicEditor
      //      .create( document.querySelector( '#editor1' ) )
      //      .catch( error => {
      //          console.error( error );
      //      } );
  function CKupdate(){
      const editorData = editor.getData();
      //alert(editorData);
      $('#editor1').val(editorData);
    //for ( instance in CKEDITOR.instances )
    //    CKEDITOR.instances[instance].updateElement();
}
  function logout(ur = '') {
    var confim = window.confirm('Are you Sure You Want To logout ?');
    if (confim) {
      window.location.href=ur;
    }
  }
  function id_validator(val_text='',input_icon='',message_box='',sub_btn='') {

    if (val_text.length != 16) {
      errors = "Id must be 16 digits";
      var a = '<span class="text-danger">'+errors+'</span>';
      $(sub_btn).hide();
      $(message_box).html(a);
      $(input_icon).html('<span class="fa fa-times-circle text-danger"></span>');
    }else{
      $(sub_btn).show();
      $(message_box).html('');
      $(input_icon).html('<span class="fa fa-check-circle text-success"></span>');
    }
  }
    var $load_status= '<span><i class="fa fa-spinner fa-spin"></i></span><i>&nbsp;&nbsp;wait...!!!</i>';
    function fm_submit(btn_ck,fm_ck,url_action='') {
      //alert('hello');
        var formData = jQuery('#'+fm_ck).serialize();
        $.ajax({ 
              type: "POST",
              url: "<?php echo hdev_url::menu('up');?>",
              data: formData,
              beforeSend: function(){
                $('.wait').html($load_status);
                $('#'+btn_ck).hide();
               },
              success:function(html){
                  a = '<span class="text-danger">'+html+'</span>';
                  $('.wait').html(a);
                  setTimeout(function(){
                    $('.wait').html('');
                    $('#'+btn_ck).show();
                  }, 4000);
              },
              error: function(){
                $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
                $('#'+btn_ck).show();
              }
            });
    }
    function fm_app(fm_btn) {
      var dtt = $('#'+fm_btn).attr("data");
      var hss = $('#'+fm_btn).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#'+fm_btn).hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#'+fm_btn).show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#'+fm_btn).show();
            }
          });
        return false;
    }
  function mr_step(calll,val=1) {
    var stepper = new Stepper($('.bs-stepper')[0]);
    if (calll == "next") {
      for (var i = 1; i <= val; i++) {
        stepper.next();
      }
    }
    if (calll == "previous") {
      for (var i = 1; i <= val; i++) {
        stepper.previous();
      }
    }
  }
  function provider(ref_dd,prefix) {
      //alert(tx_reff);
      var prefix = "#"+prefix;
      var cv = $(prefix+' #hash').attr('hash');
      var ret = "js"; 
        $.ajax({
        url   : "<?php echo hdev_url::menu('up'); ?>",
        method  : "POST",
        data  : {ref:'req_ext_provider',ref_ld:ref_dd,hash:cv},
        beforeSend: function(){
            $('.ldd').html('<div class="process-loader"></div>');
            //$(".loader").show();
              //var icoo = $('#'+ret).attr(ret+"-ico");
              //$('#'+ret+' input-group-text').html('<div class="process-loader"></div>');
             },
            success:function(data){
              $('.ldd').html("...");
              var jsonData = JSON.parse(data);
              $(prefix+' #name').html(jsonData.name);
              $(prefix+' #email').html(jsonData.email);
              $(prefix+' #username').html(jsonData.username);
              $(prefix+' #tel').html(jsonData.tel);
            }, 
            error: function(){
              alert("refresh a page and try again");
            }
      });
  } 
      function delete_me(ref='',ur='') {
        var cf = window.confirm('Are you sure you want to delete this '+ref);
        if (cf) {
            window.location.href = ur;
        }
    }
  function provider_account(ref_dd,prefix) {
      //alert(tx_reff);
      var prefix = "#"+prefix;
      var cv = $(prefix+' #hash2').attr('hash2');
      var ret = "js"; 
      var icc = $('#acc_ico').attr('ico');
        $.ajax({
        url   : "<?php echo hdev_url::menu('up'); ?>",
        method  : "POST",
        data  : {ref:'req_provider_account_balance',ref_ld:ref_dd,hash:cv},
        beforeSend: function(){
            $('#acc_ico').html('<div class="process-loader"></div>');
             },
            success:function(data){
              //alert(data);
              if (data == 'Data validation failed.') {
                alert(data+' Try again Later.');
                window.location.href=window.location.href;
              }
              //alert(cv);
              var jsonData = JSON.parse(data);
              $('#acc_ico').html(icc);
              $(prefix+' #acc_bal').html(jsonData.balance);
            }, 
            error: function(){
              alert("refresh a page and try again");
            }
      });
  }      
  function mr_locator(ret='',prov_v="",dist_v="",sect_v="",cel_v="") {
    
      var cv = '<?php $csrf = new CSRF_Protect();echo $csrf->getToken();  ?>';
        $.ajax({
        url   : "<?php echo hdev_url::menu('up'); ?>",
        method  : "POST",
        data  : {ref:'location_select',type:ret,prov:prov_v,dist:dist_v,sect:sect_v,cell:cel_v,cover:cv},
        beforeSend: function(){

          var icoo = $('#'+ret).attr(ret+"-ico");
          $('#'+ret+' input-group-text').html('<div class="process-loader"></div>');
             },
            success:function(html){
              //alert(html);
              var icoo = $('#'+ret).attr(ret+"-ico");
              $('#'+ret+' input-group-text').html('<span class="'+icoo+'" ></span>');
              switch(ret) {
                case 'district':
                  $('#'+ret).html(html); 
                  $('#sector').html('<option value="">---choose---</option>');
                  $('#cell').html('<option value="">---choose---</option>'); 
                  $('#village').html('<option value="">---choose---</option>');
                  break;
                case 'sector':
                  $('#'+ret).html(html); 
                  $('#cell').html('<option value="">---choose---</option>'); 
                  $('#village').html('<option value="">---choose---</option>');
                  break;
                case 'cell':
                  $('#'+ret).html(html); 
                  $('#village').html('<option value="">---choose---</option>'); 
                  break; 
                case 'village':
                  $('#'+ret).html(html); 
                  break;   
              }
            }, 
            error: function(){
              alert("refresh a page and try again");
            }
      })
  }
  function call_stepper() {
    // As a jQuery Plugin
    var step_var = $('.bs-stepper').attr('step_val');
    if(step_var == "ok") {
      $(document).ready(function () {
      var stepper = new Stepper($('.bs-stepper')[0]);
    });
    }
    
  }
  function loc_edit(province='',district='',sector='',cell='',village='') {
      $("#province option[value!='"+province+"']").attr("selected",false);
      $("#province option[value='"+province+"']").attr("selected",true);
      $("#district option[value!='"+district+"']").attr("selected",false);
      $("#district option[value='"+district+"']").attr("selected",true);
      $("#sector option[value!='"+sector+"']").attr("selected",false);
      $("#sector option[value='"+sector+"']").attr("selected",true);
      $("#cell option[value!='"+cell+"']").attr("selected",false);
      $("#cell option[value='"+cell+"']").attr("selected",true);
      $("#village option[value!='"+village+"']").attr("selected",false);
      $("#village option[value='"+village+"']").attr("selected",true);
  }; 
  //sm_nt();
  function update_datatable() {
    init_editor();
    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
    //CKEDITOR.replace( 'editor1' );
    //$( '#editor1' ).ckeditor();
    //$('.textarea').summernote()
  })
      //window.stepper = new Stepper(document.querySelector('.bs-stepper'));
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        lazyLoad: true,
        lazyLoadEager: 1,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: true
          },
          600: {
            items: 3,
            nav: true
          },
          1000: {
            items: 4,
            nav: true,
            loop: true,
            margin: 10
          }
        }
      })
    });
  /* wait for images to load */
  $(window).ready(function() { 
    $('.sp-wrap').smoothproducts();
  });

  $("#rasms_all_tables").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print"]
  }).buttons().container().appendTo('#rasms_all_tables_wrapper .col-md-6:eq(0)');

  $("#rasms_all_tables2").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": true,
    "buttons": [""]
  });  
  call_stepper();
    $(document).on('submit','#form_reg',function(e) {
        e.preventDefault();
      if($('#form_reg #p_pic').val()) {

        $(this).ajaxSubmit({  
          target:   '#form_reg .wait',  
          beforeSubmit: function() {
            $("#form_reg #progress-bar").width('0%');
            $('#form_reg .wait').html($load_status);
            $('#form_reg #form_reg_btn').hide();
          },
          uploadProgress: function (event, position, total, percentComplete){ 
            $("#form_reg #progress-bar").width(percentComplete + '%');
            $("#form_reg #progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>');

          },
          success:function (){
              $('#form_reg_btn').show();

            setTimeout(function(){
              $('#form_reg .wait').html('');
            }, 4000);
          },
          resetForm: false 
        }); 
        return false; 
      }else{
              $('#form_reg .wait').html('Select what to upload first');
      }
    });
}
  function attach(cur='') {
    //alert(cur);
    if (cur == "") {
      cur = window.location.href;
    }
    $('#menu_loader').html('<div class="process-loader"></div>');
    var rest =  cur.split("?");
     xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {
            $('body #app_body').html(this.responseText);
            $('#menu_loader').html('<!--loader-->');
            update_datatable();
          }
          if (this.status == 404) {
            //window.location.reload();
          }
        }
      }
      xhttp.open("GET", ""+rest[0]+"/a/b/c", true);
      xhttp.send();
  }

  $load_status= $('<span><img src="<?php echo hdev_url::img(hdev_url::menu('dist/img/loading2.gif'));?>"/></span><i>&nbsp;&nbsp;wait...!!!</i>');
  $saved = $('<span class="text-success"><?php echo hdev_lang::on("validation","saved"); ?></span>');
  $min_wait = $('<span class="text-success"><?php echo hdev_lang::on("validation","loading"); ?></span>');
 $(document).ready(function(){ 
  update_datatable();

    $(document).on('click','.pager_control',function(e) {
        var urr=$(this).attr("url");
        var pgg=$(this).attr("page");
        var lcc = urr+'/'+pgg;
        attach(lcc);
    }); 
    $(document).on('click','.fm_pre_set',function(e) {

      //alert('helloooo');
      var ref_id=$(this).attr("ref_id");
      var e_tit=$(this).attr("e_tit");
      var m_dt=$(this).html();
      var set_btn = $(this).attr('set_btn');
      var precls = $(this).attr('class');

      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");

      $('.modal-set #ref_id').html(ref_id);
      $('.modal-set #e_tit').html(e_tit);

      $('.modal-set #'+set_btn).attr("data","");
      $('.modal-set #'+set_btn).attr("hash","");      
      $('.modal-set #'+set_btn).attr("data",dt);
      $('.modal-set #'+set_btn).attr("hash",hs);
      $('.modal-set #'+set_btn).html(m_dt);
      $('.modal-set #'+set_btn).attr('class',precls);
      $('.modal-set #'+set_btn).removeClass('fm_pre_set');
      //alert(dt);
    }); 
  <?php if (hdev_data::service('client_reg')): ?> 
    $(document).on('click','#reg_client',function(e) {
      e.preventDefault();
      var formData = jQuery('#client_reg').serialize();
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('up');?>",
            data: formData,
            beforeSend: function(){
              $('.wait').html($load_status);
              $('#reg_client').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#reg_client').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#reg_client').show();
            }
          });
        return false; 
    }); 
    <?php endif ?>
    $(document).on('submit','#loan_reg',function(e) {
        e.preventDefault();
      if($('#loan_reg #l_att').val()) {

        $(this).ajaxSubmit({  
          target:   '#loan_reg .wait',  
          beforeSubmit: function() {
            $("#loan_reg #progress-bar").width('0%');
            $('#loan_reg .wait').html($load_status);
            $('#loan_reg #loan_reg_btn').hide();
          },
          uploadProgress: function (event, position, total, percentComplete){ 
            $("#loan_reg #progress-bar").width(percentComplete + '%');
            $("#loan_reg #progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>');

          },
          success:function (){
              $('#loan_reg_btn').show();

            setTimeout(function(){
              $('#loan_reg .wait').html('');
            }, 4000);
          },
          resetForm: false 
        }); 
        return false; 
      }else{
              $('#loan_reg .wait').html('Select what to upload first');
      }
    });
    <?php if (hdev_data::service('statement_approve')): ?> 
    $(document).on('submit','#statement_approve',function(e) {
        e.preventDefault();
      if($('#statement_approve #s_att').val()) {

        $(this).ajaxSubmit({  
          target:   '#statement_approve .wait',  
          beforeSubmit: function() {
            $("#statement_approve #progress-bar").width('0%');
            $('#statement_approve .wait').html($load_status);
            $('#statement_approve #statement_approve_btn').hide();
          },
          uploadProgress: function (event, position, total, percentComplete){ 
            $("#statement_approve #progress-bar").width(percentComplete + '%');
            $("#statement_approve #progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>');

          },
          success:function (){
              $('#statement_approve_btn').show();

            setTimeout(function(){
              $('#statement_approve .wait').html('');
            }, 4000);
          },
          resetForm: false 
        }); 
        return false; 
      }else{
              $('#statement_approve .wait').html('Select what to upload first');
      }
    });      
    $(document).on('click','.statement_approve',function(e) {
      var s_id=$(this).attr("s_id");
      var c_nid=$(this).attr("c_nid");
      var c_name=$(this).attr("c_name");
      var c_acc=$(this).attr("c_acc");
      var s_start_date=$(this).attr("s_start_date");
      var s_end_date=$(this).attr("s_end_date"); 

      $('.modal-approve #s_id').val(s_id);
      $('.modal-approve #c_nid').html(c_nid);
      $('.modal-approve #c_name').html(c_name);
      $('.modal-approve #c_acc').html(c_acc);
      $('.modal-approve #s_start_date').val(s_start_date);
      $('.modal-approve #s_end_date').val(s_end_date);     

    });    
    <?php endif; ?> 
    <?php if (hdev_data::service('client_delete')): ?> 
    $(document).on('click','.ld_delete',function(e) {
      var client_name=$(this).attr("name");
      var client_dob=$(this).attr("dob");
      var client_nid=$(this).attr("nid");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-delete #client_name').html(client_name);
      $('.modal-delete #client_dob').html(client_dob);
      $('.modal-delete #client_nid').html(client_nid);
      $('.modal-delete #client_delete').attr("data","");
      $('.modal-delete #client_delete').attr("hash","");      
      $('.modal-delete #client_delete').attr("data",dt);
      $('.modal-delete #client_delete').attr("hash",hs);
      //alert(dt);
    }); 
    $(document).on('click','#client_delete',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#client_delete').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#client_delete').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#client_delete').show();
            }
          });
        return false; 
    });
    <?php endif ?>
    <?php if (hdev_data::service('client_reject')): ?> 
    $(document).on('click','.ld_reject',function(e) {
      var client_name=$(this).attr("name");
      var client_dob=$(this).attr("dob");
      var client_nid=$(this).attr("nid");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-reject #client_name').html(client_name);
      $('.modal-reject #client_dob').html(client_dob);
      $('.modal-reject #client_nid').html(client_nid);
      $('.modal-reject #client_reject').attr("data","");
      $('.modal-reject #client_reject').attr("hash","");      
      $('.modal-reject #client_reject').attr("data",dt);
      $('.modal-reject #client_reject').attr("hash",hs);
      //alert(dt);
    }); 
    $(document).on('click','#client_reject',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#client_reject').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#client_reject').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#client_reject').show();
            }
          });
        return false; 
    });
    <?php endif ?>
  <?php if (hdev_data::service('cashier_reg')): ?> 
    $(document).on('click','#reg_cashier',function(e) {
      e.preventDefault();
      var formData = jQuery('#cashier_reg').serialize();
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('up');?>",
            data: formData,
            beforeSend: function(){
              $('.wait').html($load_status);
              $('#reg_cashier').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#reg_cashier').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#reg_cashier').show();
            }
          });
        return false; 
    }); 
    <?php endif ?>
    <?php if (hdev_data::service('cashier_delete')): ?> 
    $(document).on('click','.ld_delete',function(e) {
      var cashier_name=$(this).attr("name");
      var cashier_dob=$(this).attr("dob");
      var cashier_nid=$(this).attr("nid");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-delete #cashier_name').html(cashier_name);
      $('.modal-delete #cashier_dob').html(cashier_dob);
      $('.modal-delete #cashier_nid').html(cashier_nid);
      $('.modal-delete #cashier_delete').attr("data","");
      $('.modal-delete #cashier_delete').attr("hash","");      
      $('.modal-delete #cashier_delete').attr("data",dt);
      $('.modal-delete #cashier_delete').attr("hash",hs);
      //alert(dt);
    }); 
    $(document).on('click','#cashier_delete',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#cashier_delete').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#cashier_delete').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#cashier_delete').show();
            }
          });
        return false; 
    });
    <?php endif ?>
    <?php if (hdev_data::service('cashier_reject')): ?> 
    $(document).on('click','.ld_reject',function(e) {
      var cashier_name=$(this).attr("name");
      var cashier_dob=$(this).attr("dob");
      var cashier_nid=$(this).attr("nid");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-reject #cashier_name').html(cashier_name);
      $('.modal-reject #cashier_dob').html(cashier_dob);
      $('.modal-reject #cashier_nid').html(cashier_nid);
      $('.modal-reject #cashier_reject').attr("data","");
      $('.modal-reject #cashier_reject').attr("hash","");      
      $('.modal-reject #cashier_reject').attr("data",dt);
      $('.modal-reject #cashier_reject').attr("hash",hs);
      //alert(dt);
    }); 
    $(document).on('click','#cashier_reject',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#cashier_reject').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#cashier_reject').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#cashier_reject').show();
            }
          });
        return false; 
    });
    <?php endif ?>
  <?php if (hdev_data::service('loan_officer_reg')): ?> 
    $(document).on('click','#reg_loan_officer',function(e) {
      e.preventDefault();
      var formData = jQuery('#loan_officer_reg').serialize();
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('up');?>",
            data: formData,
            beforeSend: function(){
              $('.wait').html($load_status);
              $('#reg_loan_officer').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#reg_loan_officer').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#reg_loan_officer').show();
            }
          });
        return false; 
    }); 
    <?php endif ?>
    <?php if (hdev_data::service('loan_officer_delete')): ?> 
    $(document).on('click','.ld_delete',function(e) {
      var loan_officer_name=$(this).attr("name");
      var loan_officer_dob=$(this).attr("dob");
      var loan_officer_nid=$(this).attr("nid");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-delete #loan_officer_name').html(loan_officer_name);
      $('.modal-delete #loan_officer_dob').html(loan_officer_dob);
      $('.modal-delete #loan_officer_nid').html(loan_officer_nid);
      $('.modal-delete #loan_officer_delete').attr("data","");
      $('.modal-delete #loan_officer_delete').attr("hash","");      
      $('.modal-delete #loan_officer_delete').attr("data",dt);
      $('.modal-delete #loan_officer_delete').attr("hash",hs);
      //alert(dt);
    }); 
    $(document).on('click','#loan_officer_delete',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#loan_officer_delete').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#loan_officer_delete').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#loan_officer_delete').show();
            }
          });
        return false; 
    });
    <?php endif ?>
    <?php if (hdev_data::service('loan_officer_reject')): ?> 
    $(document).on('click','.ld_reject',function(e) {
      var loan_officer_name=$(this).attr("name");
      var loan_officer_dob=$(this).attr("dob");
      var loan_officer_nid=$(this).attr("nid");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-reject #loan_officer_name').html(loan_officer_name);
      $('.modal-reject #loan_officer_dob').html(loan_officer_dob);
      $('.modal-reject #loan_officer_nid').html(loan_officer_nid);
      $('.modal-reject #loan_officer_reject').attr("data","");
      $('.modal-reject #loan_officer_reject').attr("hash","");      
      $('.modal-reject #loan_officer_reject').attr("data",dt);
      $('.modal-reject #loan_officer_reject').attr("hash",hs);
      //alert(dt);
    }); 
    $(document).on('click','#loan_officer_reject',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#loan_officer_reject').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#loan_officer_reject').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#loan_officer_reject').show();
            }
          });
        return false; 
    });
    <?php endif ?>
  <?php if (hdev_data::service('service_reg')): ?> 
    $(document).on('click','#reg_service',function(e) {
      e.preventDefault();
      var formData = jQuery('#service_reg').serialize();
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('up');?>",
            data: formData,
            beforeSend: function(){
              $('.wait').html($load_status);
              $('#reg_service').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#reg_service').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#reg_service').show();
            }
          });
        return false; 
    }); 
    <?php endif ?>
    <?php if (hdev_data::service('service_edit')): ?> 
    $(document).on('click','.service_edit',function(e) {
      var s_id=$(this).attr("s_id");
      var s_name=$(this).attr("s_name");
      var s_desc=$(this).attr("s_desc");
      var s_content=$(this).attr("s_content");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-edit #s_id').val(s_id);
      $('.modal-edit #s_name').val(s_name);
      $('.modal-edit #s_desc').val(s_desc);
      $('.modal-edit #s_content').html(s_content);
      $('.modal-edit #client_delete').attr("data","");
      $('.modal-edit #client_delete').attr("hash","");      
      $('.modal-edit #client_delete').attr("data",dt);
      $('.modal-edit #client_delete').attr("hash",hs);
      //alert(dt);
    });  
    $(document).on('click','#edit_service',function(e) {
      e.preventDefault();
      var formData = jQuery('#service_edit').serialize();
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('up');?>",
            data: formData,
            beforeSend: function(){
              $('.wait').html($load_status);
              $('#edit_service').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#edit_service').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#edit_service').show();
            }
          });
        return false; 
    });    
    <?php endif ?>   
    <?php if (hdev_data::service('service_delete')): ?> 
    $(document).on('click','.service_delete',function(e) {
      var s_name=$(this).attr("s_name");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-delete #s_name').html(s_name);
      $('.modal-delete #service_delete').attr("data","");
      $('.modal-delete #service_delete').attr("hash","");      
      $('.modal-delete #service_delete').attr("data",dt);
      $('.modal-delete #service_delete').attr("hash",hs);
      //alert(dt);
    }); 
    $(document).on('click','#service_delete',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#service_delete').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#service_delete').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#service_delete').show();
            }
          });
        return false; 
    });
    <?php endif ?>
    $(document).on('click','.view_ct',function(e) {
      var v_c_name=$(this).attr("v_c_name");
      var v_c_nid=$(this).attr("v_c_nid");
      var v_c_dob=$(this).attr("v_c_dob");
      var v_c_email=$(this).attr("v_c_email");
      var v_c_tell=$(this).attr("v_c_tell");
      var v_c_location=$(this).attr("v_c_location");    
      $('.modal-view #v_c_name').html(': '+v_c_name);
      $('.modal-view #v_c_nid').html(': '+v_c_nid);
      $('.modal-view #v_c_dob').html(': '+v_c_dob);
      $('.modal-view #v_c_email').html(': '+v_c_email);
      $('.modal-view #v_c_tell').html(': '+v_c_tell);
      $('.modal-view #v_c_location').html(': '+v_c_location);
      //alert(dt);
    });     
    <?php if (hdev_data::service('transaction_reg')): ?> 
    $(document).on('click','.transaction_reg',function(e) {
      var c_name=$(this).attr("c_name");
      var s_name=$(this).attr("s_name");
      var s_desc=$(this).attr("s_desc");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-reg #c_name').html(c_name);
      $('.modal-reg #s_name').html(s_name);
      $('.modal-reg #s_desc').html(s_desc);
      $('.modal-reg #transaction_reg').attr("data","");
      $('.modal-reg #transaction_reg').attr("hash","");      
      $('.modal-reg #transaction_reg').attr("data",dt);
      $('.modal-reg #transaction_reg').attr("hash",hs);
      //alert(dt);
    }); 
    $(document).on('click','#transaction_reg',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#transaction_approve').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#transaction_reg').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#transaction_reg').show();
            }
          });
        return false; 
    });
    <?php endif ?>  
    <?php if (hdev_data::service('transaction_approve')): ?> 
    $(document).on('click','.transaction_approve',function(e) {
      var t_reg_date=$(this).attr("t_reg_date");
      var c_name=$(this).attr("c_name");
      var s_name=$(this).attr("s_name");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-approve #t_reg_date').html(t_reg_date);
      $('.modal-approve #c_name').html(c_name);
      $('.modal-approve #s_name').html(s_name);
      $('.modal-approve #transaction_approve').attr("data","");
      $('.modal-approve #transaction_approve').attr("hash","");      
      $('.modal-approve #transaction_approve').attr("data",dt);
      $('.modal-approve #transaction_approve').attr("hash",hs);
      //alert(dt);
    }); 
    $(document).on('click','#transaction_approve',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#transaction_approve').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#transaction_approve').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#transaction_approve').show();
            }
          });
        return false; 
    });
    <?php endif ?>  
    <?php if (hdev_data::service('transaction_reject')): ?> 
    $(document).on('click','.transaction_reject',function(e) {
      var t_reg_date=$(this).attr("t_reg_date");
      var c_name=$(this).attr("c_name");
      var s_name=$(this).attr("s_name");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-reject #t_reg_date').html(t_reg_date);
      $('.modal-reject #c_name').html(c_name);
      $('.modal-reject #s_name').html(s_name);
      $('.modal-reject #transaction_reject').attr("data","");
      $('.modal-reject #transaction_reject').attr("hash","");      
      $('.modal-reject #transaction_reject').attr("data",dt);
      $('.modal-reject #transaction_reject').attr("hash",hs);
      //alert(dt);
    }); 
    $(document).on('click','#transaction_reject',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#transaction_reject').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#transaction_reject').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#transaction_reject').show();
            }
          });
        return false; 
    });
    <?php endif ?>
  <?php if (hdev_data::service('provider_edit')): ?> 
    $(document).on('click','.ld_edit',function(e) {
      var l_id=$(this).attr("l_id");
      var l_l_name=$(this).attr("l_l_name");
      var sex=$(this).attr("sex");
      var e_s_s_qualification=$(this).attr("l_l_username");
      var tel=$(this).attr("tel");
      var email=$(this).attr("email");     
      $('.modal-edit #e_s_sd').val(l_id);
      $('.modal-edit #e_s_s_name').val(l_l_name);
      $('.modal-edit #e_sex').val(sex);
      $('.modal-edit #e_s_s_qualification').val(e_s_s_qualification);
      $('.modal-edit #e_tel').val(tel);
      $('.modal-edit #e_email').val(email); 
    }); 
    $(document).on('click','#edit_provider',function(e) {
      e.preventDefault();
      var formData = jQuery('#provider_edit').serialize();
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('up');?>",
            data: formData,
            beforeSend: function(){
              $('.wait').html($load_status);
              $('#edit_provider').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#edit_provider').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#edit_provider').show();
            }
          });
        return false; 
    }); 
    <?php endif ?>
    //////////////////////////////post////////////////////////
    <?php if (hdev_data::service('post_approve')): ?> 
    $(document).on('click','.ld_approve',function(e) {
      var post_title=$(this).attr("name");
      var post_short_desc=$(this).attr("username");
      var post_email=$(this).attr("email");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-approve #post_title').html(post_title);
      $('.modal-approve #post_short_desc').html(post_short_desc);
      $('.modal-approve #post_email').html(post_email);
      $('.modal-approve #post_approve').attr("data","");
      $('.modal-approve #post_approve').attr("hash","");      
      $('.modal-approve #post_approve').attr("data",dt);
      $('.modal-approve #post_approve').attr("hash",hs);
    }); 
    $(document).on('click','#post_approve',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#post_approve').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#post_approve').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#post_approve').show();
            }
          });
        return false; 
    });
    <?php endif ?>
    <?php if (hdev_data::service('post_reject')): ?> 
    $(document).on('click','.ld_reject',function(e) {
      var post_title=$(this).attr("name");
      var post_short_desc=$(this).attr("username");
      var post_email=$(this).attr("email");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      $('.modal-reject #post_title').html(post_title);
      $('.modal-reject #post_short_desc').html(post_short_desc);
      $('.modal-reject #post_email').html(post_email);
      $('.modal-reject #post_reject').attr("data","");
      $('.modal-reject #post_reject').attr("hash","");      
      $('.modal-reject #post_reject').attr("data",dt);
      $('.modal-reject #post_reject').attr("hash",hs);
    }); 
    $(document).on('click','#post_reject',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#post_reject').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#post_reject').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#post_reject').show();
            }
          });
        return false; 
    });
    <?php endif ?>
  <?php if (hdev_data::service('post_reg')): ?> 


    $(document).on('submit','#post_reg',function(e) {
      if($('#reg_post_pic').val() || $('#edit_loader').val()) {
        e.preventDefault();

        $(this).ajaxSubmit({  
          target:   '.wait',  
          beforeSubmit: function() {
            $("#progress-bar").width('0%');
            $('.wait').html($load_status);
            $('#reg_post').hide();
          },
          uploadProgress: function (event, position, total, percentComplete){ 
            $("#progress-bar").width(percentComplete + '%');
            $("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>');

          },
          success:function (datas){
            //alert(datas);
              $('#reg_post').show();

            setTimeout(function(){
              $('.wait').html('');
            }, 9000);
          },
          resetForm: false 
        }); 
        return false; 
      }else{ 
        a = '<span class="text-danger">Choose what to upload first</span>';
        $('.wait').html(a);
        setTimeout(function(){
          $('.wait').html('');
        }, 3000);
        return false;
      }
    });
    <?php endif ?>
    <?php if (hdev_data::service('post_delete')): ?> 
    $(document).on('click','.pst_delete',function(e) {
      var post_title=$(this).attr("p_title");
      var post_short_desc=$(this).attr("p_short_desc");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      alert 
      $('.modal-delete #p_title').html(post_title);
      $('.modal-delete #p_short_desc').html(post_short_desc);
      $('.modal-delete #post_delete').attr("data","");
      $('.modal-delete #post_delete').attr("hash","");      
      $('.modal-delete #post_delete').attr("data",dt);
      $('.modal-delete #post_delete').attr("hash",hs);
      //alert(dt);
    }); 
    <?php if (hdev_data::service('post_approve')): ?> 
    $(document).on('click','.pst_approve',function(e) {
      var post_title=$(this).attr("p_title");
      var post_short_desc=$(this).attr("p_short_desc");
      var dt = $(this).attr("data");
      var hs = $(this).attr("hash");
      alert 
      $('.modal-approve #p_title').html(post_title);
      $('.modal-approve #p_short_desc').html(post_short_desc);
      $('.modal-approve #post_approve').attr("data","");
      $('.modal-approve #post_approve').attr("hash","");      
      $('.modal-approve #post_approve').attr("data",dt);
      $('.modal-approve #post_approve').attr("hash",hs);
      //alert(dt);
    });   
    <?php endif ?>
    $(document).on('click','#post_delete',function(e) {
      e.preventDefault();
      var dtt = $(this).attr("data");
      var hss = $(this).attr("hash");
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('app/setting');?>/"+hss+"/"+dtt,
            data: {req:'ajax'},
             beforeSend: function(){
              $('.wait').html($load_status);
              $('#post_delete').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#post_delete').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#post_delete').show();
            }
          });
        return false; 
    });
    <?php endif ?>
  <?php if (hdev_data::service('post_edit')): ?> 
    $(document).on('click','.ld_edit',function(e) {
      var l_id=$(this).attr("l_id");
      var l_l_name=$(this).attr("l_l_name");
      var sex=$(this).attr("sex");
      var e_s_s_qualification=$(this).attr("l_l_username");
      var tel=$(this).attr("tel");
      var email=$(this).attr("email");     
      $('.modal-edit #e_s_sd').val(l_id);
      $('.modal-edit #e_s_s_name').val(l_l_name);
      $('.modal-edit #e_sex').val(sex);
      $('.modal-edit #e_s_s_qualification').val(e_s_s_qualification);
      $('.modal-edit #e_tel').val(tel);
      $('.modal-edit #e_email').val(email); 
    }); 
    $(document).on('click','#edit_post',function(e) {
      e.preventDefault();
      var formData = jQuery('#post_edit').serialize();
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('up');?>",
            data: formData,
            beforeSend: function(){
              $('.wait').html($load_status);
              $('#edit_post').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#edit_post').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#edit_post').show();
            }
          });
        return false; 
    }); 
    <?php endif ?>
    /////////////////////post/////////////////////////

    <?php if (hdev_data::service('user_edit')): ?> 
    $(document).on('click','#edit_user_btn',function(e) {
      e.preventDefault();
      var formData = jQuery('#user_edit').serialize();
      $.ajax({ 
            type: "POST",
            url: "<?php echo hdev_url::menu('up');?>",
            data: formData,
            beforeSend: function(){
              $('.wait').html($load_status);
              $('#edit_user_btn').hide();
             },
            success:function(html){
                a = '<span class="text-danger">'+html+'</span>';
                $('.wait').html(a);
                setTimeout(function(){
                  $('.wait').html('');
                  $('#edit_user_btn').show();
                }, 4000);
            },
            error: function(){
              $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
              $('#edit_user_btn').show();
            }
          });
        return false; 
    }); 
    <?php endif ?>        
<?php if (hdev_data::service('self_change_user_pwd')): ?> 
$(document).on('click','#self_sec_p_btn',function(e) {
    e.preventDefault();
    var formData = jQuery('#self_sec_p').serialize();
    $.ajax({ 
          type: "POST",
          url: "<?php echo hdev_url::menu('up');?>",
          data: formData,
          beforeSend: function(){
            $('.wait').html($load_status);
            $('#self_sec_p_btn').hide();
           },
          success:function(html){
            a = '<span class="text-danger">'+html+'</span>';
            $('.wait').html(a);
            setTimeout(function(){
              $('.wait').html('');
              $('#self_sec_p_btn').show();
            }, 4000);
          },
          error: function(){
            $('.wait').html('<span class="text-warning"><?php echo hdev_lang::on("validation","check_conn"); ?></span>');
            $('#self_sec_p_btn').show();
          }
        });
    });
<?php endif ?>
  });

  /*$(function () {
    $("#rasms_all_tables").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#rasms_all_tables_wrapper .col-md-6:eq(0)');
  });*/
</script>
<script src="<?php echo hdev_url::menu('script-1'); ?>"></script>

</body>
</html>
