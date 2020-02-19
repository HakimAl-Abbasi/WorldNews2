<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
require "controllers/post_controller.php";
  $cate=$post_controller->get_categories();
?>
  <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          
          <!-- Row -->
     <div class="row">
      <div class="col-lg-12">
        <div class="card shadow-sm mb-4 mt-1">
          <div class="card-body p-0">
                <div class="login-form">
                 
                <form id="post_form" >
                    <div class="form-group">
                      <label><?php echo lang('th1'); ?></label>
                      <textarea  id="title" name="title"  class="form-control" cols="30" rows="1" aria-describedby="emailHelp" required
                     ></textarea>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-6">
                      <label><?php echo lang('th2'); ?></label>
                      <input type="hidden" name="type" value="3">
                      <select id="cat" name="cat"  class="form-control">
                        <option value="0">select post category</option>
                        <?php foreach($cate as $cat){?>
                          <option value="<?php echo$cat['cat_id']?>"><?php echo$cat['Cat_name']?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label><?php echo lang('th4'); ?></label>
                        <input type="date" class="form-control" 
                        placeholder="Repeat Password" id="publish"  name="publish">
                    </div>
                    </div>
                   <div class="form-group">
                      <label><?php echo lang('th10'); ?></label>
                      <input type="file" class="form-control" id="image" name='image' >
                      <input type="hidden" class="form-control" id="img" name='img' >
                   </div>
                    <div class="form-group">
                      <label><?php echo lang('th8'); ?></label>
                      <textarea  id="intro" name='intro'  class="form-control" cols="30" rows="3" aria-describedby="emailHelp"
                       ></textarea>
                    </div>
                    <div class="form-group">
                      <label><?php echo lang('th9'); ?></label>
                      <textarea  id="disc" name='content'  class="form-control" cols="30" rows="10" aria-describedby="emailHelp"
                       ></textarea>
                    </div>
                   
                  </form>
                  <div class="form-group">
                      <button  class="btn btn-primary btn-block" id="btn-add"><?php echo lang('m1o1'); ?></button>
                    </div>
                    <hr>
                  <hr>
                </div>
          </div>
        </div>
      </div>
     </div>     
        </div>
         
<?php 

require "footer.php";
?>
<script src="post_ajax.js"></script>

