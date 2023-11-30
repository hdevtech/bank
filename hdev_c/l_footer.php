  </div>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo hdev_url::menu('plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo hdev_url::menu('plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo hdev_url::menu('dist/js/adminlte.min.js');?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo hdev_url::menu('plugins/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- font awesome -->
<script type="text/javascript" src="<?php echo hdev_url::menu('dist/js/demo.js');?>"></script>
<!-- Preloader -->

<script type="text/javascript">
  //<![CDATA[
    $(window).on('load', function() { // makes sure the whole site is loaded 
      $('#status').fadeOut(); // will first fade out the loading animation 
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(350).css({'overflow':'visible'});
    })
  //]]>
</script> 
<script type="text/javascript">
    function forgot_1() {
        var formData = jQuery('#reset_1').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo hdev_url::menu('login_i');?>",
          data: formData,
          beforeSend: function(){
            // Show image container
            $("#fsave").hide();
            $(".wait1").show();
           },
          success:function(data){
           // alert(data);
            var jsonData = JSON.parse(data);
            if (jsonData.act == 'success') {
                var a = '<span class="text-success">';
                var mg = a+jsonData.message+'</span>';      
                $('.wait1').html(mg);

                $('#reset_2 #tel_2').val(jsonData.tel);
                $('#reset_2 #mask').val(jsonData.mask);
                $('#forgot_1').hide();
                $('#forgot_2').show();
            }else{
                var mg = jsonData.message;      
                $('.wait1').html(mg);
            }
            //alert(data);
            //$('.wait1').html(j);
          },
          complete:function(data){
            // Hide image container
           setTimeout(function(){
              $("#fsave").show();
              $(".wait1").hide();
            }, 4000);
           }
        });
    }
    function forgot_2() {
        var formData = jQuery('#reset_2').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo hdev_url::menu('login_i');?>",
          data: formData,
          beforeSend: function(){
            // Show image container
            $("#fsave2").hide();
            $(".wait2").show();
           },
          success:function(data){
            //alert(data);
            var jsonData = JSON.parse(data);
            if (jsonData.act == 'success') {
                var a = '<span class="text-success">';
                var mg = a+jsonData.message+'</span>';      
                $('.wait2').html(mg);

                $('#reset_3 #tel_3').val(jsonData.tel);
                $('#reset_3 #profiles').html(jsonData.profiles);
                $('#reset_3 #mask2').val(jsonData.mask2);
                $('#forgot_2').hide();
                $('#forgot_3').show();
            }else{
                var mg = jsonData.message;      
                $('.wait2').html(mg);
            }
            //alert(data);
            //$('.wait1').html(j);
          },
          complete:function(data){
            // Hide image container
           setTimeout(function(){
              $("#fsave2").show();
              $(".wait2").hide();
            }, 4000);
           }
        });
    }    
    function forgot_3() {
        var formData = jQuery('#reset_3').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo hdev_url::menu('login_i');?>",
          data: formData,
          beforeSend: function(){
            // Show image container
            $("#fsave3").hide();
            $(".wait3").show();
           },
          success:function(data){
            //alert(data);
            var jsonData = JSON.parse(data);
            if (jsonData.act == 'success') {
                var a = '<span class="text-success">';
                var mg = a+jsonData.message+'</span>';  
                $('.wait3').html(mg);   
                alert(jsonData.message);
                window.location.href = '<?php echo hdev_url::menu('login') ?>';
            }else{
                var mg = jsonData.message;      
                $('.wait3').html(mg);
            }
            //alert(data);
            //$('.wait1').html(j);
          },
          complete:function(data){
            // Hide image container
           setTimeout(function(){
              $("#fsave3").show();
              $(".wait3").hide();
            }, 4000);
           }
        });
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
    function attach(aa='') {
      window.reload();
    }
    function login() {
      //alert('helloooooo');
          const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: fsave,
          timer: 3000
        });
        var formData = jQuery('#login_form').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo hdev_url::menu('login_i');?>",
          data: formData,
          beforeSend: function(){
            // Show image container
            $("#fsave").hide();
            $(".wait").show();
           },
          success:function(html){
            if (html == 'ok'){
              Toast.fire({
                type: 'success',
                title: 'Authorised'
              });
              var delay = 1000;
              setTimeout(function(){
                 window.location.href='<?php echo hdev_url::menu("r/home");?>';
              }, delay);
            }else
            {
            //alert(html);
              Toast.fire({
                type: 'error',
                title: 'Please Check your username and Password and try again'
              });
            }
          },
          complete:function(html){
            // Hide image container
           setTimeout(function(){
              //$("#fsave").show();
              $(".wait").hide();
            }, 3000);
           }
        });
    }
  $load_status= $('<span><img src="<?php echo hdev_url::img(hdev_url::menu('dist/img/loading2.gif'));?>"/></span><i>&nbsp;&nbsp;wait...!!!</i>');
  $saved = $('<span class="text-success"><?php echo hdev_lang::on("validation","saved"); ?></span>');
  $min_wait = $('<span class="text-success"><?php echo hdev_lang::on("validation","loading"); ?></span>');
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
</script>
</body>
</html>
