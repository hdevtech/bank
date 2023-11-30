<?php $var_slide = 1; ?>
<div class="content">
      <div class="container" style="">
  	<hr>
	  <div style="width: 100%;text-align: center;margin-top: 5%;">
	  	<h2>
	  		Our slides
	  	</h2>
	  </div>
	  <hr> 
	  <div class="row">
  <div class="col-sm-2">
 
  </div>
  <div class="col-sm-8">
	  	<div class="accordion accordion-flush" id="accordionExample">
		  <div class="accordion-item border-top border-right border-bottom border-left" align="center">
		    <h3 class="accordion-header" id="headingOne" style="text-align: center;align-items: center;">
		        Add new slide		    </h3>
		        <hr>
		    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
		    	<form method="post" action="<?php echo hdev_url::menu('up'); ?>" id="form_reg" enctype="multipart/form-data">
		    		    <?php 
                  $csrf = new CSRF_Protect();
                  $csrf->echoInputField();
                ?>
		    		<input type="hidden" name="ref" value="slide">
		      <div class="accordion-body">
		      	<div class="form-group">
	              <label for="p_title">
	                slide Title :
	              </label>
	              <div class="input-group mb-0">
	                <textarea name="p_title" id="p_title" class="form-control" placeholder="slide Title" required="true"></textarea>
	              </div>
	            </div> 
		        <div class="form-group">
	              <label for="p_desc">
	                slide Description :
	              </label>
	              <div class="input-group mb-0">
	                <textarea name="p_desc" id="p_desc" class="form-control" placeholder="slide Description" required="true"></textarea>
	              </div>
	            </div>                        
	            <div class="form-group">
	              <label for="cata2">
	                Choose Slide picture to upload :
	              </label>
	              <div class="input-group mb-3">
	                  <input type="file" name="p_pic" class="form-control" id="p_pic">
	                <div class="input-group-append">
	                  <div class="input-group-text">
	                    <span class="fas fa-file-image"></span>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="wait" align="center"></div>
		            <div class="row">
		              <div class="col-sm-12">
		                <div class="progress">
		                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" id="progress-bar">
		                    </div>
		                  </div>

		              </div>
		            </div>	        
	            <div class="form-group">
	              <button class="btn btn-secondary" type="submit" id="form_reg_btn"><i class="fa fa-save"></i> Add new slide</button>
	            </div>
		      </div>
		  </form>
		    </div>
		  </div>
		</div>
  </div>
</div>      
	  <hr>

        <div class="card-group mb-30">
        <?php 
          $counter = 0;
          $counter_group = 1;
          $alld = count(hdev_data::load_view("slide"));
          foreach (hdev_data::load_view("slide") as $slide) {
            $counter++;
        ?>
          <div class="card card-box item">
                 <img class="card-img-top" src="<?php echo hdev_url::menu('dist/img/upload/'.$slide['p_pic']); ?>" alt="image" style="height: 300px !important;">
                <div class="card-body">
                	<h5 ><?php echo $slide['p_title'] ?></h5>
                  <p class="card-text">
                  	<?php echo $slide['p_desc']; ?>
                  </p>
                  <p style="align-items: center;">
		                <button class="btn btn-danger" onclick="delete_me('Slide','<?php echo hdev_url::menu('up'); ?>?ref=slide&hash=<?php echo md5($slide['p_id']); ?>&id=<?php echo $slide['p_id']; ?>');"><i class="fa fa-trash"></i> Delete</button>
		                  	
                  </p>
                </div>
          </div>
        <?php
            if (($counter%3) == 0) {	
              echo '</div><div class="card-group mb-30">';
              $counter_group++;
            }elseif ($counter == $alld){
            	$nm = 3-($counter%3);
            	$nmm = "";
            	for ($i=1; $i <= $nm; $i++) { 
            		$nmm .='<div class="card"></div>';
            	}
            	echo $nmm;
            }
          }
         ?>
        </div>
	  <hr>
</div>
</div>