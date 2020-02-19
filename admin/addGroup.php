<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
require "controllers/group_controller.php";
  $privs=$group__controller->get_privs();
?>
  <!-- Topbar -->
        <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
       <div class="row">
      <div class="col-lg-12">
        <div class="card shadow-sm mb-4 mt-1">
          <div class="card-body p-0">
                <div class="login-form">
                <form id="group_form" >
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label>name</label>
                      <input type="hidden" value="2" name="type">
                      <input type="text" class="form-control" id="name" name="name" >
                    </div>
                    <input type="hidden" name="type" value="2">
                    <div class="form-group col-lg-12">
                       <label for="sel2">Mutiple select list (hold shift to select more than one):</label>
                      <select id="privllages_id" name="privllages_id"  class="form-control"  multiple style="height:450px">
                        <?php foreach($privs as $priv){?>
                          <option value="<?php echo$priv['prv_id']?>"><?php echo$priv['prv_name']?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>                    
                    <hr>
                  </form>  
                          <button type="button" class="btn btn-secondary" id="btn-add"><?php echo lang('m1o1'); ?></button>
                          <input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('m1o2'); ?>">
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
<script>

  $('#btn-add').on('click', function() {
        var privllages_id= $('#privllages_id').val();
        alert(privllages_id);
        var name= $('#name').val();
        if(name == ''){
              errMsg('Please enter post group name');
	            $('#name').css('border-color', '#cc0000');
        }
        else if(privllages_id == 0){
              errMsg('Please enter  group privllages');
	            $('#privllages_id').css('border-color', '#cc0000');
        }
        else{
        //  var data = $("#group_form").serialize();
             $.ajax({
                    type: "post",
                    url: "controllers/group_controller.php",
                    data:{
                      type:2,
                      name:name,
                      privllages_id:privllages_id,
            
                   },
                    success: function(dataResult){
                                var dataResult = JSON.parse(dataResult);
                                if(dataResult.statusCode==200){
                                    $('#addgroup').modal('hide');
                                    sucMsg('group added successfully'); 
                                }
                                else if(dataResult.statusCode==201){
                                   alert(dataResult);
                                }
                        }						
                });
              }
  });


</script>
